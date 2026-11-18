<?php
/**
 * Plantilla de Detalle de Producto WooCommerce
 * Tema BuyInLatam B2B - Exportación Premium
 */

get_header(); ?>

<div class="site-wrapper single-product-page">
    
    <!-- Migas de Pan (Breadcrumbs) -->
    <div class="b2b-breadcrumbs-bar">
        <div class="container">
            <nav class="b2b-breadcrumbs">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Home</a>
                <span class="sep"><i class="fas fa-chevron-right"></i></span>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Export Catalog</a>
                <span class="sep"><i class="fas fa-chevron-right"></i></span>
                <?php
                global $post, $product;
                $terms = get_the_terms( $post->ID, 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    $main_term = $terms[0];
                    echo '<a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a>';
                    echo '<span class="sep"><i class="fas fa-chevron-right"></i></span>';
                }
                ?>
                <span class="current"><?php the_title(); ?></span>
            </nav>
        </div>
    </div>

    <main class="single-product-main">
        <div class="container">
            <?php while ( have_posts() ) : the_post(); global $product; 
                $sku = $product ? $product->get_sku() : '';
                $attachment_ids = $product ? $product->get_gallery_image_ids() : array();
            ?>
                
                <div class="product-detail-layout">
                    
                    <!-- Columna Izquierda: Galería e Imágenes -->
                    <div class="product-detail-gallery">
                        <div class="gallery-wrapper">
                            <div class="main-image-container">
                                <span class="product-badge-float"><i class="fas fa-certificate"></i> Origin: Peru</span>
                                <span class="product-badge-oem"><i class="fas fa-tag"></i> Private Label (OEM)</span>
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="main-image-box" id="main-product-image-box">
                                        <?php the_post_thumbnail( 'large', array( 'class' => 'featured-product-img', 'id' => 'main-product-img' ) ); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="main-image-box">
                                        <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php the_title_attribute(); ?>" id="main-product-img">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Miniaturas de Galería (si existen) -->
                            <?php if ( ! empty( $attachment_ids ) || has_post_thumbnail() ) : ?>
                                <div class="product-thumbnails-grid">
                                    <?php if ( has_post_thumbnail() ) : 
                                        $main_img_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' );
                                    ?>
                                        <div class="thumbnail-item active" onclick="switchProductImage('<?php echo esc_url($main_img_url); ?>', this)">
                                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php foreach ( $attachment_ids as $attachment_id ) : 
                                        $full_img_url = wp_get_attachment_image_url( $attachment_id, 'large' );
                                    ?>
                                        <div class="thumbnail-item" onclick="switchProductImage('<?php echo esc_url($full_img_url); ?>', this)">
                                            <?php echo wp_get_attachment_image( $attachment_id, 'thumbnail' ); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Banner de Envíos Internacionales -->
                            <div class="export-shipping-card">
                                <div class="shipping-item">
                                    <i class="fas fa-plane-departure"></i>
                                    <div>
                                        <strong>Express Air Freight</strong>
                                        <span>3 to 6 business days</span>
                                    </div>
                                </div>
                                <div class="shipping-divider"></div>
                                <div class="shipping-item">
                                    <i class="fas fa-ship"></i>
                                    <div>
                                        <strong>Ocean Freight FCL/LCL</strong>
                                        <span>FOB Callao / CIF Destination</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha: Información y Cotizador B2B -->
                    <div class="product-detail-summary">
                        <div class="b2b-category-sku">
                            <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                                <span class="category-tag"><i class="fas fa-folder"></i> <?php echo esc_html( $terms[0]->name ); ?></span>
                            <?php endif; ?>
                            <?php if ( $sku ) : ?>
                                <span class="sku-tag">SKU: <?php echo esc_html( $sku ); ?></span>
                            <?php endif; ?>
                        </div>

                        <h1 class="product-detail-title"><?php the_title(); ?></h1>
                        
                        <div class="b2b-status-bar">
                            <span class="stock-status in-stock"><i class="fas fa-check-circle"></i> Available for Export</span>
                            <span class="verified-origin"><i class="fas fa-shield-alt"></i> 100% Quality Control</span>
                        </div>

                        <!-- Resumen y Descripción Corta -->
                        <div class="product-short-desc">
                            <?php 
                            if ( has_excerpt() ) {
                                the_excerpt();
                            } else {
                                echo '<p>' . wp_trim_words( get_the_content(), 35 ) . '</p>';
                            }
                            ?>
                        </div>

                        <!-- Caja de Cotización B2B por Volumen -->
                        <div class="b2b-quote-box">
                            <div class="quote-header">
                                <div class="quote-badge">
                                    <i class="fas fa-cubes"></i> Wholesale Only
                                </div>
                                <div class="moq-info">
                                    <strong>Minimum Order (MOQ):</strong> <span>50 units / Inquire</span>
                                </div>
                            </div>

                            <!-- Escala de Volumen -->
                            <div class="volume-pricing-table">
                                <div class="volume-tier">
                                    <span class="tier-qty">50 - 199 units</span>
                                    <span class="tier-price">Base FOB Price</span>
                                </div>
                                <div class="volume-tier popular">
                                    <span class="tier-tag">Most Requested</span>
                                    <span class="tier-qty">200 - 499 units</span>
                                    <span class="tier-price">15% Discount</span>
                                </div>
                                <div class="volume-tier">
                                    <span class="tier-qty">500+ units</span>
                                    <span class="tier-price">Container Rate</span>
                                </div>
                            </div>

                            <p class="incoterms-note">
                                <i class="fas fa-info-circle"></i> We quote under Incoterms <strong>FOB (Callao - Peru), CIF or DDP</strong> depending on the destination country.
                            </p>

                            <!-- Botones de Acción B2B -->
                            <div class="product-cta-group">
                                <a href="https://wa.me/51969765560?text=<?php echo urlencode('Hello BuyInLatam, I would like a wholesale quote for: ' . ( $product ? $product->get_name() : get_post_field( 'post_title', get_the_ID() ) ) . ($sku ? ' (SKU: ' . $sku . ')' : '') . ' - Link: ' . get_permalink()); ?>" target="_blank" class="btn-whatsapp-quote">
                                    <i class="fab fa-whatsapp"></i>
                                    <div class="btn-text">
                                        <span class="main-label">Quote via WhatsApp</span>
                                        <span class="sub-label">Instant reply from an export advisor</span>
                                    </div>
                                </a>

                                <a href="#b2b-inquiry-section" class="btn-rfq-email">
                                    <i class="fas fa-envelope-open-text"></i> Request a Formal Quote by Email
                                </a>
                            </div>
                        </div>

                        <!-- Mini Highlights B2B -->
                        <div class="b2b-feature-highlights">
                            <div class="highlight-box">
                                <i class="fas fa-tags highlight-icon"></i>
                                <div>
                                    <strong>Private Label (OEM)</strong>
                                    <span>We include your labels and packaging</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-file-contract highlight-icon"></i>
                                <div>
                                    <strong>Complete Documentation</strong>
                                    <span>Certificates of origin and phytosanitary certificates</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-box highlight-icon"></i>
                                <div>
                                    <strong>Samples Available</strong>
                                    <span>Direct shipping to your country</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-handshake highlight-icon"></i>
                                <div>
                                    <strong>End-to-End Advisory</strong>
                                    <span>Support with customs and logistics</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Pestañas / Ficha Técnica Completa B2B -->
                <div class="b2b-tabs-container">
                    <div class="b2b-tabs-nav">
                        <button class="tab-btn active" onclick="openB2BTab(event, 'tab-specs')">
                            <i class="fas fa-clipboard-list"></i> Technical Sheet & Specifications
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-oem')">
                            <i class="fas fa-palette"></i> Customization & Private Label (OEM)
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-shipping')">
                            <i class="fas fa-shipping-fast"></i> Logistics & Shipping Terms
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-description')">
                            <i class="fas fa-align-left"></i> Full Description
                        </button>
                    </div>

                    <div class="b2b-tabs-content">
                        <!-- Tab 1: Ficha Técnica -->
                        <div id="tab-specs" class="tab-pane active">
                            <h3><i class="fas fa-box-open"></i> Export Product Specifications</h3>
                            <table class="spec-table-modern">
                                <tr>
                                    <th>Country of Origin</th>
                                    <td>Peru (Selected Production Regions)</td>
                                </tr>
                                <tr>
                                    <th>Availability</th>
                                    <td>Continuous production with shipments by batch / container</td>
                                </tr>
                                <tr>
                                    <th>OEM Customization</th>
                                    <td><strong style="color:var(--primary-blue);">Yes! Labels, embroidery, engraving and packaging with your own brand</strong></td>
                                </tr>
                                <tr>
                                    <th>Quality Standards</th>
                                    <td>100% export quality certified before shipment</td>
                                </tr>
                                <tr>
                                    <th>Supported Incoterms</th>
                                    <td>FOB (Port of Callao / Jorge Chávez Airport), CIF, DDP</td>
                                </tr>
                                <tr>
                                    <th>Accepted Payment Methods</th>
                                    <td>International Wire Transfer (T/T), Letter of Credit (L/C)</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Tab 2: OEM y Marca Propia -->
                        <div id="tab-oem" class="tab-pane">
                            <h3><i class="fas fa-crown"></i> Manufacturing with Your Brand and Exclusive Design</h3>
                            <p>At <strong>BuyInLatam</strong> we not only export the finest products from Peru, we also fully adapt them so they arrive ready to sell under your business identity.</p>
                            
                            <div class="oem-steps-grid">
                                <div class="oem-step-card">
                                    <div class="step-num">01</div>
                                    <h4>Send Your Logo and Artwork</h4>
                                    <p>Share your brand specifications, colors and preferred packaging with us.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">02</div>
                                    <h4>Sample & Prototype</h4>
                                    <p>We produce a physical or digital sample for your approval.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">03</div>
                                    <h4>Mass Production</h4>
                                    <p>We manufacture and process your batch under strict quality control.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">04</div>
                                    <h4>Packaging & Dispatch</h4>
                                    <p>Packed with barcodes and shipped to your country.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3: Logística y Envíos -->
                        <div id="tab-shipping" class="tab-pane">
                            <h3><i class="fas fa-globe"></i> International Shipping & Logistics</h3>
                            <p>We manage the entire supply chain from our warehouses in Lima to the port, airport or warehouse of your choice anywhere in the world.</p>
                            
                            <div class="shipping-modes-grid">
                                <div class="mode-card">
                                    <i class="fas fa-plane"></i>
                                    <h4>Air Freight</h4>
                                    <ul>
                                        <li>Ideal for fast-moving orders or urgent samples.</li>
                                        <li>Estimated time: <strong>3 to 6 business days</strong>.</li>
                                        <li>Departure: Jorge Chávez International Airport (LIM).</li>
                                    </ul>
                                </div>
                                <div class="mode-card">
                                    <i class="fas fa-ship"></i>
                                    <h4>Ocean Freight</h4>
                                    <ul>
                                        <li>Full Container Load (FCL) or Less than Container Load (LCL).</li>
                                        <li>Estimated time: <strong>12 to 25 days</strong> depending on destination.</li>
                                        <li>Departure: Port of Callao (Peru).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 4: Descripción Completa -->
                        <div id="tab-description" class="tab-pane">
                            <h3><i class="fas fa-info-circle"></i> Details & Description</h3>
                            <div class="full-content-typography">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Productos Relacionados B2B -->
                <?php
                $related_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 4,
                    'post__not_in'   => array( get_the_ID() ),
                    'orderby'        => 'rand'
                );
                $related_query = new WP_Query( $related_args );
                if ( $related_query->have_posts() ) :
                ?>
                <div class="b2b-related-products">
                    <div class="section-title-wrapper" style="text-align:left; margin-bottom:30px;">
                        <h4 style="color:var(--primary-blue); font-size:14px; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:5px;">Other Export Products</h4>
                        <h2 style="font-size:26px; margin:0;">You may also like</h2>
                    </div>

                    <div class="product-grid">
                        <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <span class="product-badge">Export</span>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'product-image' ) );
                                        } else { ?>
                                            <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="product-price">Wholesale quote</p>
                                    <div class="product-actions">
                                        <a href="https://wa.me/51969765560?text=<?php echo urlencode('Hello, I would like a quote for ' . get_post_field( 'post_title', get_the_ID() )); ?>" target="_blank" class="btn-add-cart">
                                            <i class="fab fa-whatsapp"></i> Quote
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="btn-view">Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    </main>

</div>

<script>
function switchProductImage(imgUrl, el) {
    var mainImg = document.getElementById('main-product-img');
    if (mainImg) {
        mainImg.src = imgUrl;
    }
    var thumbs = document.querySelectorAll('.thumbnail-item');
    thumbs.forEach(function(item) {
        item.classList.remove('active');
    });
    if (el) {
        el.classList.add('active');
    }
}

function openB2BTab(evt, tabId) {
    var tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(function(pane) {
        pane.classList.remove('active');
    });

    var tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(function(btn) {
        btn.classList.remove('active');
    });

    document.getElementById(tabId).classList.add('active');
    evt.currentTarget.classList.add('active');
}
</script>

<?php get_footer(); ?>
