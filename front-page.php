<?php
/**
 * Front Page Template
 * Modern B2B E-Commerce Layout (NEBULA Style)
 * Theme: BuyInLatam
 */

get_header(); ?>

<div class="site-wrapper nebula-homepage">

    <!-- =========================================================================
         1. HERO SECTION: FULL-WIDTH MAIN BANNER
         ========================================================================= -->
    <section class="nebula-hero-section">
        <div class="container hero-full-container">

            <!-- Main Hero Banner Card -->
            <div class="hero-main-banner-card">
                <div class="hero-banner-inner">
                    
                    <!-- Left Side: B2B Texts & CTA Buttons -->
                    <div class="hero-text-content">
                        <span class="hero-tag-pill">NEW B2B COLLECTION · PERUVIAN ORIGIN</span>
                        <h1 class="hero-main-title">
                            Products from <span class="highlight-yellow">Latin America</span><br>to the World
                        </h1>
                        <p class="hero-main-desc">
                            Fine baby alpaca knitwear, single-origin cacao, specialty coffee, and superfoods in bulk. <strong>Custom Private Label (OEM) Available!</strong>
                        </p>
                        <div class="hero-btn-group">
                            <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20to%20request%20a%20wholesale%20quote" target="_blank" class="btn-hero-cta">
                                Request Wholesale Quote <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="btn-hero-secondary">
                                View Catalog
                            </a>
                        </div>
                    </div>

                    <!-- Right Side: Andean Artisan & Alpaca Portrait -->
                    <div class="hero-visual-content">
                        <div class="hero-arch-outline"></div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alpaca-model.png" alt="Andean Artisan and Alpaca - BuyInLatam" class="hero-model-portrait">
                    </div>

                    <!-- Slider Dot Indicators -->
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
                <h2>Explore by Category</h2>
                <p>Curated export lines meeting the highest international trade and quality standards.</p>
            </div>

            <div class="circle-categories-grid">
                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=400&q=80" alt="Alpaca knitwear">
                    </div>
                    <span class="circle-cat-title">Alpaca Knitwear</span>
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1606312619070-d48b4c652a52?auto=format&fit=crop&w=400&q=80" alt="Chocolate bars">
                    </div>
                    <span class="circle-cat-title">Chocolate Bars</span>
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&w=400&q=80" alt="Packaged coffee">
                    </div>
                    <span class="circle-cat-title">Packaged Coffee</span>
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="circle-cat-card">
                    <div class="circle-img-wrap">
                        <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=400&q=80" alt="Rice sacks">
                    </div>
                    <span class="circle-cat-title">Rice Sacks</span>
                </a>
            </div>
        </div>
    </section>


    <!-- =========================================================================
         3. TRENDING RIGHT NOW (MOST QUOTED)
         ========================================================================= -->
    <section class="nebula-trending-section">
        <div class="container">
            <div class="section-title-row">
                <div class="title-with-badge">
                    <h2>Trending Products <span class="badge-fire">🔥</span></h2>
                    <p>Highest international demand from importers and distributors this month.</p>
                </div>
                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="view-all-link">
                    View Full Catalog <i class="fas fa-arrow-right"></i>
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
                                <span class="product-origin-tag">Peru</span>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'product-img-clean' ) );
                                    } else { ?>
                                        <img src="<?php echo wc_placeholder_img_src(); ?>" alt="Product" class="product-img-clean">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="product-details-clean">
                                <h3 class="clean-product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="product-moq-rate">
                                    <span class="price-b2b">Wholesale Quote</span>
                                    <div class="stars-rate">
                                        <i class="fas fa-star"></i> 5.0
                                    </div>
                                </div>
                                <div class="card-action-bar">
                                    <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hello, I would like to quote: ' . get_the_title()); ?>" target="_blank" class="btn-quote-cart" title="Quote via WhatsApp">
                                        <i class="fab fa-whatsapp"></i> Quote
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn-details-minimal" title="Technical Specs">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Sample Fallback Cards -->
                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Peru</span>
                            <img src="https://images.unsplash.com/photo-1549488344-c5a452efeb33?auto=format&fit=crop&w=400&q=80" alt="Baby Alpaca Sweaters" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Fine Baby Alpaca Sweaters</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 50 units</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 5.0</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20to%20quote%20Baby%20Alpaca%20Sweaters" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Quote</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Peru</span>
                            <img src="https://images.unsplash.com/photo-1559525839-b184a4d698c7?auto=format&fit=crop&w=400&q=80" alt="Organic Raw Cacao Beans" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Organic Raw Criollo Cacao Beans</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 500 kg</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 4.9</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20to%20quote%20Raw%20Cacao" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Quote</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Peru</span>
                            <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=400&q=80" alt="Specialty Coffee" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Specialty Coffee Cusco 86+</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 10 Sacks</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 5.0</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20to%20quote%20Specialty%20Coffee" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Quote</a>
                            </div>
                        </div>
                    </div>

                    <div class="nebula-product-card">
                        <div class="product-thumb-box">
                            <span class="product-origin-tag">Peru</span>
                            <img src="https://images.unsplash.com/photo-1586201375761-83865001e8ac?auto=format&fit=crop&w=400&q=80" alt="Organic White Quinoa" class="product-img-clean">
                        </div>
                        <div class="product-details-clean">
                            <h3 class="clean-product-title"><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Certified Organic Royal Quinoa</a></h3>
                            <div class="product-moq-rate">
                                <span class="price-b2b">MOQ: 1 Metric Ton</span>
                                <div class="stars-rate"><i class="fas fa-star"></i> 4.8</div>
                            </div>
                            <div class="card-action-bar">
                                <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20to%20quote%20Royal%20Quinoa" target="_blank" class="btn-quote-cart"><i class="fab fa-whatsapp"></i> Quote</a>
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
                    <span class="promo-tag">CONTAINER LOAD DISCOUNTS</span>
                    <h2>Up to 20% Off Wholesale Freight Lots</h2>
                    <p>Optimize your ocean and air freight costs by consolidating Latin American export orders.</p>
                    <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="btn-promo">
                        View Available Batches
                    </a>
                </div>
                <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=600&q=80" alt="Export Discounts" class="promo-img">
            </div>

            <div class="promo-banner-card promo-card-2">
                <div class="promo-content">
                    <span class="promo-tag">NEW HARVEST & CRAFTSMANSHIP</span>
                    <h2>2026 Collection: Private Label OEM</h2>
                    <p>Custom branding, personalized packaging, embroidery, and certified luxury presentation.</p>
                    <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url( '/?page_id=29' ) ); ?>" class="btn-promo btn-promo-light">
                        Request Samples
                    </a>
                </div>
                <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=600&q=80" alt="Private Label OEM" class="promo-img">
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
                    <h2>Featured Export Lines</h2>
                    <p>Selected manufacturing lines for global brands, boutiques, and bulk importers.</p>
                </div>
                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="view-all-link">
                    View All Lines <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="collections-bento-grid">
                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Alpaca Knitwear</h3>
                        <p>Luxury yarns & handcrafted weaves</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?auto=format&fit=crop&w=400&q=80" alt="Alpaca" class="bento-img">
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Cacao & Derivatives</h3>
                        <p>Nibs, butter, and liquor</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1548907040-4baa42d10919?auto=format&fit=crop&w=400&q=80" alt="Cacao" class="bento-img">
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Gourmet Coffee</h3>
                        <p>High-altitude single micro-lots</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=400&q=80" alt="Coffee" class="bento-img">
                </a>

                <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="bento-collection-card">
                    <div class="bento-info">
                        <h3>Andean Superfoods</h3>
                        <p>Quinoa, maca & chia seeds</p>
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
                        <strong>Global Logistics</strong>
                        <span>Air Express & Ocean Freight</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-tags trust-icon"></i>
                    <div class="trust-content">
                        <strong>Private Label (OEM)</strong>
                        <span>Custom branding & packaging</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-shield-alt trust-icon"></i>
                    <div class="trust-content">
                        <strong>100% Quality Certified</strong>
                        <span>Export origin certificates</span>
                    </div>
                </div>

                <div class="trust-item">
                    <i class="fas fa-headset trust-icon"></i>
                    <div class="trust-content">
                        <strong>24/7 B2B Support</strong>
                        <span>Direct customs & trade advisory</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
