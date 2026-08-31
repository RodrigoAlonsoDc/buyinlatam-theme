<?php
/**
 * WooCommerce Fallback & Router Template
 * Tema BuyInLatam B2B
 */

if ( is_singular( 'product' ) ) {
    include get_template_directory() . '/single-product.php';
} elseif ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
    include get_template_directory() . '/archive-product.php';
} else {
    get_header(); ?>
    <div class="site-wrapper woocommerce-page-wrapper">
        <main class="page-content-wrapper" style="padding: 40px 0;">
            <div class="container">
                <div class="page-body-card" style="background:white; padding:40px; border-radius:16px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm);">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        </main>
    </div>
    <?php get_footer();
}
