<?php
function buildlatam_scripts() {
    wp_enqueue_style( 'buildlatam-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
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
