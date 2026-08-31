<?php
/**
 * Plantilla de Catálogo / Tienda WooCommerce
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper">
    <section class="page-hero">
        <div class="container">
            <h4 style="color:var(--accent-yellow); font-weight:700; text-transform:uppercase; letter-spacing:2px; margin-bottom:10px;"><i class="fas fa-boxes"></i> CATÁLOGO DE EXPORTACIÓN</h4>
            <h1><?php woocommerce_page_title(); ?></h1>
            <p>Explora nuestras líneas de productos peruanos disponibles para envío internacional y personalización con tu marca.</p>
        </div>
    </section>

    <main class="page-content-wrapper">
        <div class="container">
            
            <div class="product-grid">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) : the_post(); global $product;
                        ?>
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="product-badge">Exportación</span>
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
                    echo '<p style="text-align:center; grid-column: 1 / -1; padding:40px; color:var(--text-secondary);">No se encontraron productos en este catálogo.</p>';
                }
                ?>
            </div>

            <!-- Pagina WooCommerce -->
            <div style="margin-top:40px; text-align:center;">
                <?php woocommerce_pagination(); ?>
            </div>

        </div>
    </main>
</div>

<?php get_footer(); ?>
