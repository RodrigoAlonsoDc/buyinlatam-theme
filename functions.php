<?php
function buildlatam_scripts() {
    wp_enqueue_style( 'buildlatam-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'buildlatam_scripts' );

function buildlatam_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'buildlatam_setup' );

// Remove WooCommerce tabs
add_filter( 'woocommerce_product_tabs', 'buildlatam_remove_product_tabs', 98 );
function buildlatam_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );          // Remove the reviews tab
    // unset( $tabs['description'] );   // Remove the description tab
    // unset( $tabs['additional_information'] );  // Remove the additional information tab
    return $tabs;
}

// --- Procesar formulario de contacto nativo ---
add_action( 'admin_post_nopriv_procesar_formulario_contacto', 'procesar_formulario_contacto' );
add_action( 'admin_post_procesar_formulario_contacto', 'procesar_formulario_contacto' );

function procesar_formulario_contacto() {
    // 1. Verificar nonce de seguridad
    if ( ! isset( $_POST['contacto_nonce'] ) || ! wp_verify_nonce( $_POST['contacto_nonce'], 'enviar_contacto' ) ) {
        wp_die( 'Acceso denegado.' );
    }

    // 2. Sanitizar datos
    $nombre = sanitize_text_field( $_POST['contact_name'] );
    $email = sanitize_email( $_POST['contact_email'] );
    $telefono = sanitize_text_field( $_POST['contact_phone'] );
    $mensaje = sanitize_textarea_field( $_POST['contact_message'] );
    $pagina_retorno = esc_url_raw( $_POST['pagina_retorno'] );

    // 3. Preparar correo
    $to = get_option('admin_email'); // Se enviará al correo del administrador de WP
    $subject = 'Nueva solicitud de proveedor/contacto: ' . $nombre;
    $body = "Has recibido una nueva solicitud desde la página de contacto de Buy In Latam.\n\n";
    $body .= "Detalles del contacto:\n";
    $body .= "Nombre: $nombre\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono/WhatsApp: $telefono\n\n";
    $body .= "Mensaje/Detalles del producto:\n$mensaje\n";

    $headers = array('Reply-To: ' . $nombre . ' <' . $email . '>');

    // 4. Enviar correo
    $envio = wp_mail( $to, $subject, $body, $headers );

    // 5. Redireccionar con estado
    if ( $envio ) {
        $redirect_url = add_query_arg( 'envio', 'exito', $pagina_retorno );
    } else {
        $redirect_url = add_query_arg( 'envio', 'error', $pagina_retorno );
    }

    wp_safe_redirect( $redirect_url );
    exit;
}

/**
 * Datos comerciales de la ficha de producto.
 *
 * Se cargan en WooCommerce → Producto → Atributos, como atributos personalizados
 * (uno por dato; varios valores separados por "|"). El nombre del atributo puede
 * estar en inglés o en español: se compara sin mayúsculas ni tildes.
 *
 * Devuelve [ clave => [ 'label' => ..., 'values' => [...] ] ]; 'values' vacío
 * significa "No informado".
 */
function buyinlatam_product_specs( $product ) {
    $fields = array(
        'unit_price' => array( 'Unit Price', array( 'unit price', 'precio de unidad', 'precio unitario' ) ),
        'fob_price'  => array( 'FOB Price', array( 'fob price', 'precio fob' ) ),
        'moq'        => array( 'Minimum Order Quantity', array( 'minimum order quantity', 'minimum order', 'moq', 'cantidad minima de orden', 'pedido minimo' ) ),
        'payment'    => array( 'Payment Terms', array( 'payment terms', 'payment type', 'tipo de pago', 'forma de pago' ) ),
        'port'       => array( 'Port of Preference', array( 'port of preference', 'port', 'puerto de preferencia', 'puerto' ) ),
        'reference'  => array( 'Reference', array( 'reference', 'referencia' ) ),
        'capacity'   => array( 'Production Capacity', array( 'production capacity', 'capacidad de produccion' ) ),
        'lead_time'  => array( 'Lead Time', array( 'lead time', 'delivery time', 'plazo de entrega' ) ),
        'incoterms'  => array( 'Incoterms', array( 'incoterms', 'incoterm' ) ),
        'packaging'  => array( 'Packaging', array( 'packaging', 'packaging description', 'descripcion de empaque', 'empaque' ) ),
        'brand'      => array( 'Brand', array( 'brand', 'marca' ) ), // respaldo si no se usa Productos → Marcas
    );

    // Valores por defecto de BuyInLatam cuando el producto no trae el dato.
    $defaults = array(
        'payment'   => array( 'L/C (Letter of Credit)', 'T/T (Bank Transfer)' ),
        'port'      => array( 'Chancay, Peru' ),
        'incoterms' => array( 'FOB - Free on Board', 'CIF - Cost, Insurance and Freight', 'DDP - Delivered Duty Paid' ),
    );

    $normalize = function ( $text ) {
        return trim( strtolower( remove_accents( wp_strip_all_tags( $text ) ) ), " \t\n:" );
    };

    // Atributos del producto indexados por nombre normalizado.
    $attrs = array();
    if ( $product ) {
        foreach ( $product->get_attributes() as $attribute ) {
            if ( ! is_object( $attribute ) ) {
                continue;
            }
            if ( $attribute->is_taxonomy() ) {
                $values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'names' ) );
            } else {
                $values = $attribute->get_options();
            }
            $values = array_values( array_filter( array_map( 'trim', (array) $values ), 'strlen' ) );
            $attrs[ $normalize( wc_attribute_label( $attribute->get_name(), $product ) ) ] = $values;
        }
    }

    $specs = array();
    foreach ( $fields as $key => $field ) {
        $values = array();
        foreach ( $field[1] as $alias ) {
            if ( ! empty( $attrs[ $alias ] ) ) {
                $values = $attrs[ $alias ];
                break;
            }
        }

        // Precios siempre en dólares (exportación), aunque la tienda esté en soles.
        if ( ! $values && 'unit_price' === $key && $product && '' !== $product->get_price() && (float) $product->get_price() > 0 ) {
            $values = array( $product->get_price() );
        }
        if ( in_array( $key, array( 'unit_price', 'fob_price' ), true ) ) {
            $values = array_map( 'buyinlatam_format_usd', $values );
        }
        if ( ! $values && 'reference' === $key && $product && $product->get_sku() ) {
            $values = array( $product->get_sku() );
        }
        if ( ! $values && isset( $defaults[ $key ] ) ) {
            $values = $defaults[ $key ];
        }

        $specs[ $key ] = array(
            'label'  => $field[0],
            'values' => $values,
        );
    }

    return $specs;
}

/**
 * Formatea un precio en dólares: "4500" / "4,500" / "$4500.5" → "USD 4,500.00".
 * Un texto que no es solo un número (ej. "USD 4,500 / ton", "A consultar") se deja tal cual.
 */
function buyinlatam_format_usd( $value ) {
    $clean = trim( preg_replace( '/^(USD|US\$|\$)\s*/i', '', trim( (string) $value ) ) );
    $clean = str_replace( ',', '', $clean );
    if ( ! is_numeric( $clean ) ) {
        return $value;
    }
    return 'USD ' . number_format( (float) $clean, 2, '.', ',' );
}

/**
 * Imprime una celda "ETIQUETA: valor" de la ficha de producto.
 * Con $icon (clase de Font Awesome, ej. "fa-clock") se imprime como card con ícono.
 */
function buyinlatam_render_spec( $spec, $icon = '' ) {
    $empty = empty( $spec['values'] );
    echo '<div class="pd-spec' . ( $icon ? ' pd-spec-card' : '' ) . ( $empty ? ' is-empty' : '' ) . '">';
    if ( $icon ) {
        echo '<span class="pd-spec-icon" aria-hidden="true"><i class="fas ' . esc_attr( $icon ) . '"></i></span>';
    }
    echo '<dt>' . esc_html( $spec['label'] ) . ':</dt>';
    echo '<dd>';
    if ( $empty ) {
        echo 'Not informed';
    } else {
        echo implode( '<br>', array_map( 'esc_html', $spec['values'] ) );
    }
    echo '</dd></div>';
}

/**
 * En la descripción del producto, un párrafo hecho solo de guiones o guiones bajos
 * ("————", "____") se usa como separador entre idiomas. Como no tiene espacios no se
 * puede partir y se sale de la card: se reemplaza por una línea <hr>.
 */
function buyinlatam_product_separator_lines( $content ) {
    if ( ! is_singular( 'product' ) ) {
        return $content;
    }
    return preg_replace_callback(
        '#<p[^>]*>(.*?)</p>#su',
        function ( $match ) {
            $text = html_entity_decode( wp_strip_all_tags( $match[1] ), ENT_QUOTES, 'UTF-8' );
            $text = preg_replace( '/[\s\x{00A0}]+/u', '', $text );
            if ( preg_match( '/^[\x{2014}\x{2013}\x{2015}\x{2500}_\-=]{5,}$/u', $text ) ) {
                return '<hr class="pd-description-sep">';
            }
            return $match[0];
        },
        $content
    );
}
add_filter( 'the_content', 'buyinlatam_product_separator_lines', 20 );

// Helper para obtener URL de contacto (Página ID: 29)
function buyinlatam_get_contact_url() {
    $permalink = get_permalink( 29 );
    if ( $permalink ) {
        return $permalink;
    }
    return home_url( '/?page_id=29' );
}
