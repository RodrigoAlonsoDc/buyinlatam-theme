<?php get_header(); ?>

<div class="site-wrapper">
    <main class="main-content">
        
        <!-- Hero Slider (Full width) -->
        <section class="hero-slider">
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=1920&q=80" alt="Exportación de América Latina" class="hero-bg">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h4 class="hero-subtitle"><i class="fas fa-globe-americas"></i> EXPORTACIÓN B2B DIRECTA</h4>
                    <h1 class="hero-title">PRODUCTOS DE <span class="highlight-yellow">LATINOAMÉRICA</span><br>PARA EL MUNDO</h1>
                    <p class="hero-desc">Prendas de alpaca, cacao fino, café de origen y snacks seleccionados al por mayor. <strong>¡Incluimos tu propia marca!</strong></p>
                    <a href="https://wa.me/51997309032?text=Hola,%20quiero%20cotizar%20productos%20de%20exportaci%C3%B3n" target="_blank" class="btn-primary btn-large">
                        Cotizar por mayor <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Icon Boxes / Features -->
        <section class="features-section">
            <div class="container">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fas fa-tags"></i></div>
                    <div class="feature-text">
                        <h3>Incluimos Tu Marca</h3>
                        <p>Personalizamos prendas y productos con el logo de tu empresa.</p>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature-icon"><i class="fas fa-certificate"></i></div>
                    <div class="feature-text">
                        <h3>Calidad Superior 100%</h3>
                        <p>Alpaca, cacao y café peruanos de la más alta exigencia.</p>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature-icon"><i class="fas fa-plane-departure"></i></div>
                    <div class="feature-text">
                        <h3>Exportación Directa</h3>
                        <p>Entregas B2B a cualquier puerto o aeropuerto del mundo.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Grid -->
        <section class="categories-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Nuestras Líneas</h2>
                    <div class="title-divider"></div>
                </div>
                
                <div class="categories-grid">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="category-box">
                        <img src="https://images.unsplash.com/photo-1549488344-c5a452efeb33?auto=format&fit=crop&w=500&q=80" alt="Textiles de Alpaca">
                        <div class="category-overlay">
                            <h3>Textiles de Alpaca</h3>
                        </div>
                    </a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="category-box">
                        <img src="https://images.unsplash.com/photo-1559525839-b184a4d698c7?auto=format&fit=crop&w=500&q=80" alt="Cacao Fino">
                        <div class="category-overlay">
                            <h3>Cacao Fino</h3>
                        </div>
                    </a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="category-box">
                        <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=500&q=80" alt="Café de Origen">
                        <div class="category-overlay">
                            <h3>Café de Origen</h3>
                        </div>
                    </a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="category-box">
                        <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=500&q=80" alt="Granos Seleccionados">
                        <div class="category-overlay">
                            <h3>Granos Selectos</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Dynamic WooCommerce Products -->
        <section class="products-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Catálogo Completo</h2>
                    <div class="title-divider"></div>
                </div>

                <div class="product-grid">
                    <?php
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 8,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $loop = new WP_Query( $args );

                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                            ?>
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'product-image' ) );
                                        } else { ?>
                                            <img src="<?php echo wc_placeholder_img_src(); ?>" alt="Placeholder" class="product-image">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="product-price">Cotizar al por mayor</p>
                                    <div class="product-actions">
                                        <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hola, quiero cotizar ' . get_the_title()); ?>" target="_blank" class="btn-add-cart">
                                            <i class="fab fa-whatsapp"></i> Cotizar
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="btn-view">Detalles</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    } else {
                        echo '<p>No hay productos disponibles por ahora.</p>';
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>
