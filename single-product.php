<?php
/**
 * Plantilla de Detalle de Producto WooCommerce
 * Tema BuyInLatam B2B - Ficha estilo catálogo B2B
 *
 * Los datos comerciales (precio FOB, pedido mínimo, puerto, etc.) salen de los
 * atributos del producto: ver buyinlatam_product_specs() en functions.php.
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
            <?php while ( have_posts() ) : the_post();
                $product        = wc_get_product( get_the_ID() );
                $product_name   = $product ? $product->get_name() : get_post_field( 'post_title', get_the_ID() ); // sin entidades HTML (para textos de WhatsApp/correo)
                $sku            = $product ? $product->get_sku() : '';
                $specs          = buyinlatam_product_specs( $product );
                $image_ids      = array();
                if ( has_post_thumbnail() ) {
                    $image_ids[] = get_post_thumbnail_id();
                }
                if ( $product ) {
                    $image_ids = array_unique( array_merge( $image_ids, $product->get_gallery_image_ids() ) );
                }
                $product_tags   = get_the_terms( get_the_ID(), 'product_tag' );
                $quote_message  = 'Hello BuyInLatam, I would like a quote for: ' . $product_name . ( $sku ? ' (Ref: ' . $sku . ')' : '' ) . "\nEstimated volume: \nDestination port: ";
                $whatsapp_url   = 'https://wa.me/51969765560?text=' . rawurlencode( 'Hello BuyInLatam, I would like a quote for: ' . $product_name . ( $sku ? ' (Ref: ' . $sku . ')' : '' ) . ' - ' . get_permalink() );
                $sent_status    = isset( $_GET['envio'] ) ? sanitize_key( $_GET['envio'] ) : '';

                // Marca: Productos → Marcas de WooCommerce; si no hay, atributo "Brand"/"Marca".
                $brand_html = '';
                $brands     = taxonomy_exists( 'product_brand' ) ? get_the_terms( get_the_ID(), 'product_brand' ) : false;
                if ( $brands && ! is_wp_error( $brands ) ) {
                    $brand_html = '<a href="' . esc_url( get_term_link( $brands[0] ) ) . '">' . esc_html( $brands[0]->name ) . '</a>';
                } elseif ( ! empty( $specs['brand']['values'] ) ) {
                    $brand_html = esc_html( $specs['brand']['values'][0] );
                }
            ?>

                <!-- Ficha principal: galería + datos comerciales -->
                <section class="pd-top">

                    <div class="pd-gallery<?php echo count( $image_ids ) > 1 ? '' : ' is-single'; ?>">
                        <?php if ( count( $image_ids ) > 1 ) : ?>
                            <div class="pd-thumbs">
                                <?php foreach ( $image_ids as $i => $image_id ) : ?>
                                    <button type="button" class="pd-thumb<?php echo 0 === $i ? ' active' : ''; ?>"
                                        data-full="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'large' ) ); ?>"
                                        aria-label="<?php echo esc_attr( sprintf( 'Image %d', $i + 1 ) ); ?>">
                                        <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="pd-main-image">
                            <?php if ( $image_ids ) : ?>
                                <?php echo wp_get_attachment_image( $image_ids[0], 'large', false, array( 'id' => 'pd-main-img', 'alt' => esc_attr( $product_name ) ) ); ?>
                            <?php else : ?>
                                <img id="pd-main-img" src="<?php echo esc_url( wc_placeholder_img_src( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="pd-summary">
                        <?php if ( $brand_html ) : ?>
                            <p class="pd-brand"><?php echo $brand_html; // escapado arriba ?></p>
                        <?php endif; ?>
                        <h1 class="pd-title"><?php the_title(); ?></h1>
                        <hr class="pd-divider">

                        <?php if ( 'exito' === $sent_status ) : ?>
                            <div class="pd-alert pd-alert-success"><i class="fas fa-check-circle"></i> Thank you! Your quote request was sent. An export advisor will contact you shortly.</div>
                        <?php elseif ( 'error' === $sent_status ) : ?>
                            <div class="pd-alert pd-alert-error"><i class="fas fa-exclamation-circle"></i> We could not send your request. Please try again or contact us via WhatsApp.</div>
                        <?php endif; ?>

                        <dl class="pd-specs">
                            <?php
                            foreach ( array( 'unit_price', 'fob_price', 'moq', 'payment', 'port', 'reference' ) as $key ) {
                                buyinlatam_render_spec( $specs[ $key ] );
                            }
                            ?>
                        </dl>

                        <button type="button" class="pd-quote-btn" data-open-quote>
                            <i class="fas fa-envelope"></i> Send Quote Request
                        </button>
                        <a href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener" class="pd-whatsapp-link">
                            <i class="fab fa-whatsapp"></i> Or quote via WhatsApp
                        </a>

                        <?php if ( has_excerpt() ) : ?>
                            <div class="pd-short-desc">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </section>

                <hr class="pd-section-divider">

                <!-- Descripción + datos de producción y logística -->
                <section class="pd-details">
                    <div class="pd-description">
                        <h2>Description</h2>
                        <div class="pd-description-body">
                            <?php the_content(); ?>
                        </div>

                        <?php if ( $product_tags && ! is_wp_error( $product_tags ) ) : ?>
                            <ul class="pd-tags">
                                <?php foreach ( $product_tags as $tag ) : ?>
                                    <li><a href="<?php echo esc_url( get_term_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <dl class="pd-specs pd-specs-secondary">
                        <?php
                        foreach ( array( 'capacity', 'lead_time', 'incoterms', 'packaging' ) as $key ) {
                            buyinlatam_render_spec( $specs[ $key ] );
                        }
                        ?>
                    </dl>
                </section>

                <!-- Modal: solicitud de cotización (usa el mismo envío que la página de contacto) -->
                <div class="pd-modal" id="pd-quote-modal" hidden>
                    <div class="pd-modal-backdrop" data-close-quote></div>
                    <div class="pd-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="pd-quote-title">
                        <button type="button" class="pd-modal-close" data-close-quote aria-label="Close"><i class="fas fa-times"></i></button>
                        <h2 id="pd-quote-title">Send Quote Request</h2>
                        <p class="pd-modal-product"><?php echo esc_html( $product_name ); ?></p>

                        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" class="pd-quote-form">
                            <input type="hidden" name="action" value="procesar_formulario_contacto">
                            <?php wp_nonce_field( 'enviar_contacto', 'contacto_nonce' ); ?>
                            <input type="hidden" name="pagina_retorno" value="<?php echo esc_url( get_permalink() ); ?>">

                            <label for="pd_contact_name">Full Name / Company Name</label>
                            <input type="text" id="pd_contact_name" name="contact_name" placeholder="John Doe / Global Imports LLC" required>

                            <label for="pd_contact_email">Corporate Email Address</label>
                            <input type="email" id="pd_contact_email" name="contact_email" placeholder="buyer@company.com" required>

                            <label for="pd_contact_phone">WhatsApp / Phone (with country code)</label>
                            <input type="tel" id="pd_contact_phone" name="contact_phone" placeholder="+1 555 123 4567" required>

                            <label for="pd_contact_message">Message</label>
                            <textarea id="pd_contact_message" name="contact_message" rows="4" required><?php echo esc_textarea( $quote_message ); ?></textarea>

                            <button type="submit" class="pd-quote-submit">Send Request</button>
                        </form>
                    </div>
                </div>

                <!-- Productos Relacionados B2B -->
                <?php
                $related_query = new WP_Query( array(
                    'post_type'      => 'product',
                    'posts_per_page' => 4,
                    'post__not_in'   => array( get_the_ID() ),
                    'orderby'        => 'rand',
                ) );
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
                                            <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="product-price">Wholesale quote</p>
                                    <div class="product-actions">
                                        <a href="https://wa.me/51969765560?text=<?php echo rawurlencode( 'Hello, I would like a quote for ' . get_post_field( 'post_title', get_the_ID() ) ); ?>" target="_blank" rel="noopener" class="btn-add-cart">
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
(function () {
    // Galería: cambiar imagen principal al pulsar una miniatura
    var mainImg = document.getElementById('pd-main-img');
    document.querySelectorAll('.pd-thumb').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            if (mainImg) {
                mainImg.removeAttribute('srcset');
                mainImg.removeAttribute('sizes');
                mainImg.src = thumb.getAttribute('data-full');
            }
            document.querySelectorAll('.pd-thumb').forEach(function (t) { t.classList.remove('active'); });
            thumb.classList.add('active');
        });
    });

    // Modal de cotización
    var modal = document.getElementById('pd-quote-modal');
    if (!modal) return;
    function openModal() {
        modal.hidden = false;
        document.body.style.overflow = 'hidden';
        var first = modal.querySelector('input:not([type=hidden])');
        if (first) first.focus();
    }
    function closeModal() {
        modal.hidden = true;
        document.body.style.overflow = '';
    }
    document.querySelectorAll('[data-open-quote]').forEach(function (b) { b.addEventListener('click', openModal); });
    modal.querySelectorAll('[data-close-quote]').forEach(function (b) { b.addEventListener('click', closeModal); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) closeModal(); });
})();
</script>

<?php get_footer(); ?>
