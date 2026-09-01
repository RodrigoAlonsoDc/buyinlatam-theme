<?php
/**
 * B2B Export Catalog / WooCommerce Shop Template
 * Theme: BuyInLatam - International Trade & Export
 */

get_header(); ?>

<div class="site-wrapper catalog-page-wrapper">
    
    <!-- =========================================================================
         1. B2B CATALOG HERO
         ========================================================================= -->
    <section class="catalog-hero-section">
        <div class="container">
            <div class="catalog-hero-content">
                <span class="catalog-hero-pill">
                    <i class="fas fa-globe-americas"></i> OFFICIAL B2B CATALOG · PERUVIAN ORIGIN
                </span>
                <h1 class="catalog-hero-title">
                    Export <span class="highlight-yellow">Catalog</span>
                </h1>
                <p class="catalog-hero-subtitle">
                    Premium Latin American products ready for worldwide freight, bulk orders, and custom private label (OEM) manufacturing.
                </p>

                <!-- Category Quick Filter Pills -->
                <div class="catalog-category-pills">
                    <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="cat-pill <?php echo ( !is_product_category() ) ? 'active' : ''; ?>">
                        <i class="fas fa-th-large"></i> All Products
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
         2. MAIN CATALOG: TOOLBAR & PRODUCT GRID
         ========================================================================= -->
    <main class="catalog-main-content">
        <div class="container">
            
            <!-- Catalog Toolbar -->
            <div class="catalog-toolbar">
                <div class="catalog-results-count">
                    <?php
                    global $wp_query;
                    $total_products = $wp_query->found_posts;
                    ?>
                    <span>Showing <strong><?php echo esc_html( $total_products ); ?></strong> export products</span>
                </div>

                <div class="catalog-toolbar-badges">
                    <span class="toolbar-badge"><i class="fas fa-shield-alt"></i> Certified Quality</span>
                    <span class="toolbar-badge"><i class="fas fa-tags"></i> Private Label OEM</span>
                    <span class="toolbar-badge"><i class="fas fa-plane-departure"></i> FOB / CIF Shipping</span>
                </div>
            </div>

            <!-- B2B Product Grid -->
            <div class="b2b-product-grid">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) : the_post(); global $product;
                        $terms = get_the_terms( get_the_ID(), 'product_cat' );
                        $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Export';
                        $product_title = get_the_title();
                        $wa_message = urlencode( "Hello BuyInLatam, I would like to request a wholesale quote for: " . $product_title );
                        ?>
                        <div class="b2b-product-card">
                            
                            <!-- Image & Badges -->
                            <div class="b2b-card-image-wrap">
                                <span class="b2b-badge-origin">🇵🇪 Peru</span>
                                <span class="b2b-badge-oem">OEM</span>
                                <a href="<?php the_permalink(); ?>" class="b2b-image-link">
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'b2b-card-img' ) );
                                    } else { ?>
                                        <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php echo esc_attr( $product_title ); ?>" class="b2b-card-img">
                                    <?php } ?>
                                </a>
                            </div>

                            <!-- B2B Card Body -->
                            <div class="b2b-card-body">
                                <span class="b2b-card-category"><?php echo esc_html( $cat_name ); ?></span>
                                <h3 class="b2b-card-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $product_title ); ?>">
                                        <?php echo esc_html( $product_title ); ?>
                                    </a>
                                </h3>

                                <div class="b2b-pricing-label">
                                    <span class="pricing-badge"><i class="fas fa-chart-line"></i> Wholesale FOB Price</span>
                                    <p class="pricing-subtext">Volume-based customized pricing</p>
                                </div>

                                <!-- B2B Conversion Actions -->
                                <div class="b2b-card-actions">
                                    <a href="https://wa.me/51997309032?text=<?php echo $wa_message; ?>" target="_blank" class="btn-b2b-quote" title="Quote via WhatsApp">
                                        <i class="fab fa-whatsapp"></i> Request Wholesale Quote
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn-b2b-details" title="View technical specifications">
                                        Technical Specs
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
                        <h3>No products found in this category</h3>
                        <p>Contact us directly to request our private wholesale catalog and customized quotes.</p>
                        <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url('/?page_id=29') ); ?>" class="btn-b2b-quote" style="display:inline-block; margin-top:15px;">
                            Contact B2B Specialist
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="catalog-pagination-wrap">
                <?php woocommerce_pagination(); ?>
            </div>

            <!-- =========================================================================
                 3. PRIVATE LABEL OEM BANNER
                 ========================================================================= -->
            <div class="catalog-oem-banner">
                <div class="oem-banner-content">
                    <span class="oem-tag">EXCLUSIVE SERVICE FOR IMPORTERS & BRANDS</span>
                    <h2>Need these products manufactured under your own brand?</h2>
                    <p>We manage custom labeling, luxury embroidery, personalized packaging, origin certificates, and phytosanitary documentation tailored to your company.</p>
                    <div class="oem-banner-actions">
                        <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20information%20about%20Private%20Label%20OEM%20manufacturing" target="_blank" class="btn-hero-cta">
                            Speak with an OEM Specialist <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url('/?page_id=29') ); ?>" class="btn-hero-secondary">
                            Request Samples
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>

<?php get_footer(); ?>
