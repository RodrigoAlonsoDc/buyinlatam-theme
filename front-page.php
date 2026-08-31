<?php
/**
 * Plantilla de Página de Inicio (Front Page)
 * Diseño Moderno E-Commerce B2B (Estilo NEBULA)
 * Tema BuyInLatam
 */

get_header(); ?>

<div class="site-wrapper nebula-homepage">

    <!-- =========================================================================
         1. HERO SECTION: FULL-WIDTH MAIN BANNER
         ========================================================================= -->
    <section class="nebula-hero-section">
        <div class="container hero-full-container">

            <!-- Banner Principal Hero con Banner1.png -->
            <div class="hero-main-banner-card">
                <div class="hero-banner-bg-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Banner1.png" alt="Exportación BuyInLatam - Productos Peruanos y de Latinoamérica" class="hero-banner-main-img">
                    <div class="hero-banner-gradient-overlay"></div>
                </div>

                <div class="hero-banner-inner">
                    <div class="hero-text-content">
                        <span class="hero-tag-pill">NUEVA COLECCIÓN B2B · ORIGEN PERÚ</span>
                        <h1 class="hero-main-title">
                            Productos de <span class="highlight-yellow">Latinoamérica</span><br>Para el Mundo
                        </h1>
                        <p class="hero-main-desc">
                            Prendas de baby alpaca, cacao fino de aroma, café de especialidad y superfoods al por mayor. <strong>¡Incluimos tu propia marca (OEM)!</strong>
                        </p>
                        <div class="hero-btn-group">
                            <a href="https://wa.me/51997309032?text=Hola,%20deseo%20cotizar%20productos%20de%20exportaci%C3%B3n" target="_blank" class="btn-hero-cta">
                                Cotizar al Por Mayor <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-hero-secondary">
                                Ver Catálogo
                            </a>
                        </div>
                    </div>

                    <!-- Indicadores de Slider -->
                    <div class="hero-slider-dots">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- =========================================================================
         2. BROWSE BY CATEGORIES (CIRCULAR CARDS ROW)
         ========================================================================= -->
    <section class="nebula-categories-section">
        <div class="container">
            <div class="section-title-center">
                <h2>Explora por Categorías</h2>
                <p>Colecciones seleccionadas con los más altos estándares de exportación internacional.</p>
            </div>

            <div class="circle-categories-grid">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=400&q=80" alt="Prendas de alpaca">
                    </div>
                    <span class="circle-cat-title">Prendas de alpaca</span>
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1606312619070-d48b4c652a52?auto=format&fit=crop&w=400&q=80" alt="Barras de chocolate">
                    </div>
                    <span class="circle-cat-title">Barras de chocolate</span>
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&w=400&q=80" alt="Café envasado">
                    </div>
                    <span class="circle-cat-title">Café envasado</span>
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=400&q=80" alt="Sacos de arroz">
                    </div>
                    <span class="circle-cat-title">Sacos de arroz</span>
                </a>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         3. TRENDING RIGHT NOW (MÁS COTIZADOS)
         ========================================================================= -->
    <section class="nebula-trending-section">
        <div class="container">
            <div class="section-title-row">
                <div class="title-with-badge">
                    <h2>Productos Más Cotizados <span class="badge-fire">🔥</span></h2>
                    <p>Las líneas con mayor demanda internacional de importadores este mes.</p>
                </div>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="view-all-link">
                    Ver Catálogo Completo <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="trending-products-grid">
                <?php
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); global $product;
                    ?>
                        <div class="nebula-product-card">
                            <div class="product-thumb-box">
                                <span class="product-origin-tag">Perú</span>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'product-img-clean' ) );
                                    } else { ?>
                                        <img src="<?php echo wc_placeholder_img_src(); ?>" alt="Producto" class="product-img-clean">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="product-details-clean">
                                <h3 class="clean-product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="product-moq-rate">
                                    <span class="price-b2b">Cotizar al por mayor</span>
                                    <div class="stars-rate">
                                        <i class="fas fa-star"></i> 5.0
                                    </div>
                                </div>
                                <div class="card-action-bar">
                                    <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hola, quiero cotizar al por mayor: ' . get_the_title()); ?>" target="_blank" class="btn-quote-cart" title="Cotizar por WhatsApp">
                                        <i class="fab fa-whatsapp"></i> Cotizar
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn-details-minimal" title="Ficha Técnica">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Tarjetas de Ejemplo si la base de datos está vacía -->
                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Perú</span>
                            <img src="https://images.unsplash.com/photo-1549488344-c5a452efeb33?auto=format&fit=crop&w=400&q=80" alt="Chompas de Baby Alpaca" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="#">Chompas de Baby Alpaca Fina</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 50 unidades</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 5.0</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hola,%20deseo%20cotizar%20Chompas%20de%20Baby%20Alpaca" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Cotizar</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Perú</span>
                            <img src="https://images.unsplash.com/photo-1559525839-b184a4d698c7?auto=format&fit=crop&w=400&q=80" alt="Cacao Criollo Fino" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="#">Cacao Criollo en Grano Orgánico</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 500 kg</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 4.9</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hola,%20deseo%20cotizar%20Cacao%20Criollo" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Cotizar</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Perú</span>
                            <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=400&q=80" alt="Café de Especialidad" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="#">Café de Especialidad Cusco 86+</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 10 Sacos</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 5.0</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hola,%20deseo%20cotizar%20Cafe%20de%20Especialidad" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Cotizar</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Perú</span>
                            <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=400&q=80" alt="Quinua Real Blanca" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="#">Quinua Real Orgánica Certificada</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 1 Tonelada</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 4.8</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hola,%20deseo%20cotizar%20Quinua%20Real" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Cotizar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         4. DUAL PROMO BANNERS
         ========================================================================= -->
    <section class="nebula-promo-banners-section">
        <div class="container promo-grid">
            
            <div class="promo-banner-card promo-card-1">
                <div class="promo-content">
                    <span class="promo-tag">DESCUENTOS POR CONTENEDOR</span>
                    <h2>Hasta 20% Off en Lotes al por Mayor</h2>
                    <p>Optimiza tus costos de flete marítimo y aéreo consolidando pedidos de exportación.</p>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-promo">
                        Ver Lotes Disponibles
                    </a>
                </div>
                <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=600&q=80" alt="Descuentos Exportación" class="promo-img">
            </div>

            <div class="promo-banner-card promo-card-2">
                <div class="promo-content">
                    <span class="promo-tag">NUEVA COSECHA & DISEÑO</span>
                    <h2>Colección 2026: Marca Propia OEM</h2>
                    <p>Preparamos tus productos con tus propias etiquetas, bordados y empaques de lujo.</p>
                    <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="btn-promo btn-promo-light">
                        Solicitar Muestras
                    </a>
                </div>
                <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=600&q=80" alt="Marca Propia OEM" class="promo-img">
            </div>

        </div>
    </section>


    <!-- =========================================================================
         5. FEATURED COLLECTIONS (4-BENTO GRID)
         ========================================================================= -->
    <section class="nebula-collections-section">
        <div class="container">
            <div class="section-title-row">
                <div class="title-with-badge">
                    <h2>Colecciones Destacadas</h2>
                    <p>Líneas de producción seleccionadas para marcas y distribuidores globales.</p>
                </div>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="view-all-link">
                    Ver Todas las Líneas <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="collections-bento-grid">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Prendas de Alpaca</h3>
                        <p>Hilados y tejidos finos</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?auto=format&fit=crop&w=400&q=80" alt="Alpaca" class="bento-img">
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Cacao & Derivados</h3>
                        <p>Nibs, manteca y licor</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1548907040-4baa42d10919?auto=format&fit=crop&w=400&q=80" alt="Cacao" class="bento-img">
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Café Gourmet</h3>
                        <p>Micro-lotes de altura</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=400&q=80" alt="Café" class="bento-img">
                </a>

                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Granos Andinos</h3>
                        <p>Quinua, maca y chía</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=400&q=80" alt="Superfoods" class="bento-img">
                </a>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         6. VALUE PROPOSITION BAR (4 TRUST BADGES)
         ========================================================================= -->
    <section class="nebula-trust-bar-section">
        <div class="container">
            <div class="trust-bar-grid">
                <div class="trust-item">
                    <i class="fas fa-plane-departure trust-icon"></i>
                    <div class="trust-content">
                        <strong>Envíos Globales</strong>
                        <span>Vía Aérea Express & Marítima</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-tags trust-icon"></i>
                    <div class="trust-content">
                        <strong>Marca Propia (OEM)</strong>
                        <span>Tus etiquetas y empaques</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-shield-alt trust-icon"></i>
                    <div class="trust-content">
                        <strong>Control de Calidad 100%</strong>
                        <span>Certificados de exportación</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-headset trust-icon"></i>
                    <div class="trust-content">
                        <strong>Soporte Comercial 24/7</strong>
                        <span>Asesoría aduanera directa</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
