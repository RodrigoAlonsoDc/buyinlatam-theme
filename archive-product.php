<?php
/**
 * Plantilla de Catálogo B2B / Tienda WooCommerce
 * Tema BuyInLatam - Estilo Internacional de Exportación
 */

get_header(); ?>

<div class="site-wrapper catalog-page-wrapper">
    
    <!-- =========================================================================
         1. HERO DE CATÁLOGO B2B
         ========================================================================= -->
    <section class="catalog-hero-section">
        <div class="container">
            <div class="catalog-hero-content">
                <span class="catalog-hero-pill">
                    <i class="fas fa-globe-americas"></i> CATÁLOGO OFICIAL B2B · ORIGEN PERÚ
                </span>
                <h1 class="catalog-hero-title">
                    Catálogo de <span class="highlight-yellow">Exportación</span>
                </h1>
                <p class="catalog-hero-subtitle">
                    Productos peruanos de alta gama listos para despacho internacional, venta al por mayor y personalización con tu propia marca (OEM).
                </p>

                <!-- Píldoras Rápidas de Categorías -->
                <div class="catalog-category-pills">
                    <a href="<?php echo esc_url( function_exists('wc_get_page_permalink') ? wc_get_page_permalink( 'shop' ) : home_url( '/?post_type=product' ) ); ?>" class="cat-pill <?php echo ( !is_product_category() ) ? 'active' : ''; ?>">
                        <i class="fas fa-th-large"></i> Todos los Productos
                    </a>
                    <?php
                    $categories = get_terms( array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'number'     => 8,
                    ) );

                    $current_cat_id = is_product_category() ? get_queried_object_id() : 0;

                    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                        foreach ( $categories as $cat ) {
                            if ( $cat->slug === 'uncategorized' || $cat->slug === 'sin-categorizar' ) continue;
                            $is_active = ( $current_cat_id === $cat->term_id ) ? 'active' : '';
                            echo '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="cat-pill ' . $is_active . '">';
                            echo esc_html( $cat->name );
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         2. CONTENIDO PRINCIPAL: BARRA DE HERRAMIENTAS Y GRID DE PRODUCTOS
         ========================================================================= -->
    <main class="catalog-main-content">
        <div class="container">
            
            <!-- Barra Superior del Catálogo -->
            <div class="catalog-toolbar">
                <div class="catalog-results-count">
                    <?php
                    global $wp_query;
                    $total_products = $wp_query->found_posts;
                    ?>
                    <span>Mostrando <strong><?php echo esc_html( $total_products ); ?></strong> productos de exportación</span>
                </div>

                <div class="catalog-toolbar-badges">
                    <span class="toolbar-badge"><i class="fas fa-shield-alt"></i> Calidad Certificada</span>
                    <span class="toolbar-badge"><i class="fas fa-tags"></i> Marca Propia OEM</span>
                    <span class="toolbar-badge"><i class="fas fa-plane-departure"></i> Envíos FOB / CIF</span>
                </div>
            </div>

            <!-- Grid de Productos B2B -->
            <div class="b2b-product-grid">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) : the_post(); global $product;
                        $terms = get_the_terms( get_the_ID(), 'product_cat' );
                        $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Exportación';
                        $product_title = get_the_title();
                        $wa_message = urlencode( "Hola BuyInLatam, deseo cotizar al por mayor el producto: " . $product_title );
                        ?>
                        <div class="b2b-product-card">
                            
                            <!-- Imagen y Badges -->
                            <div class="b2b-card-image-wrap">
                                <span class="b2b-badge-origin">🇵🇪 Perú</span>
                                <span class="b2b-badge-oem">OEM</span>
                                <a href="<?php the_permalink(); ?>" class="b2b-image-link">
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'b2b-card-img' ) );
                                    } else { ?>
                                        <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php echo esc_attr( $product_title ); ?>" class="b2b-card-img">
                                    <?php } ?>
                                </a>
                            </div>

                            <!-- Información B2B -->
                            <div class="b2b-card-body">
                                <span class="b2b-card-category"><?php echo esc_html( $cat_name ); ?></span>
                                <h3 class="b2b-card-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $product_title ); ?>">
                                        <?php echo esc_html( $product_title ); ?>
                                    </a>
                                </h3>

                                <div class="b2b-pricing-label">
                                    <span class="pricing-badge"><i class="fas fa-chart-line"></i> Precio FOB Mayorista</span>
                                    <p class="pricing-subtext">Cotización personalizada según volumen</p>
                                </div>

                                <!-- Botones de Conversión B2B -->
                                <div class="b2b-card-actions">
                                    <a href="https://wa.me/51997309032?text=<?php echo $wa_message; ?>" target="_blank" class="btn-b2b-quote" title="Cotizar por WhatsApp">
                                        <i class="fab fa-whatsapp"></i> Cotizar al Por Mayor
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn-b2b-details" title="Ver ficha técnica">
                                        Ficha Técnica
                                    </a>
                                </div>
                            </div>

                        </div>
                        <?php
                    endwhile;
                } else {
                    ?>
                    <div class="catalog-empty-state">
                        <i class="fas fa-box-open"></i>
                        <h3>No se encontraron productos en esta categoría</h3>
                        <p>Contáctanos directamente para solicitar catálogos privados y cotizaciones a medida.</p>
                        <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url('/?page_id=29') ); ?>" class="btn-b2b-quote" style="display:inline-block; margin-top:15px;">
                            Contactar Asesor B2B
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Paginación -->
            <div class="catalog-pagination-wrap">
                <?php woocommerce_pagination(); ?>
            </div>

            <!-- =========================================================================
                 3. BANNER DE MARCA PROPIA OEM EN EL CATÁLOGO
                 ========================================================================= -->
            <div class="catalog-oem-banner">
                <div class="oem-banner-content">
                    <span class="oem-tag">SERVICIO EXCLUSIVO PARA IMPORTADORES</span>
                    <h2>¿Necesitas fabricar estos productos con tu propia marca?</h2>
                    <p>Gestionamos el etiquetado, bordado, empaques personalizados y certificaciones fitosanitarias y de origen para tu empresa.</p>
                    <div class="oem-banner-actions">
                        <a href="https://wa.me/51997309032?text=Hola,%20deseo%20asesoría%20para%20fabricación%20de%20Marca%20Propia%20OEM" target="_blank" class="btn-hero-cta">
                            Hablar con un Especialista OEM <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url('/?page_id=29') ); ?>" class="btn-hero-secondary">
                            Solicitar Muestras
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>

<?php get_footer(); ?>
