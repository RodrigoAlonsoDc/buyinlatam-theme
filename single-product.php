<?php
/**
 * Plantilla de Detalle de Producto WooCommerce
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="single-product-container">
    <?php while ( have_posts() ) : the_post(); global $product; ?>
        
        <div class="product-detail-layout">
            <!-- Galería e Imágenes -->
            <div class="product-detail-gallery">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="main-image">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'featured-product-img', 'style' => 'width:100%; border-radius:12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);' ) ); ?>
                    </div>
                <?php else : ?>
                    <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; border-radius:12px;">
                <?php endif; ?>
            </div>

            <!-- Información y Cotización B2B -->
            <div class="product-detail-summary">
                <span class="product-badge" style="position:static; display:inline-block; margin-bottom:12px;">Exportación B2B</span>
                <h1 class="product-detail-title"><?php the_title(); ?></h1>
                
                <div class="product-price-box" style="margin-bottom: 20px;">
                    <span style="font-size: 22px; font-weight:700; color:var(--primary-blue);">Cotización al Por Mayor</span>
                    <p style="color:var(--text-secondary); font-size:14px; margin-top:4px;"><i class="fas fa-check-circle highlight-yellow"></i> Descuentos por volumen de exportación</p>
                </div>

                <div class="product-description" style="color:var(--text-secondary); line-height:1.7; margin-bottom:24px;">
                    <?php the_content(); ?>
                </div>

                <!-- Ficha Técnica B2B -->
                <div class="b2b-specs-box" style="background:var(--primary-blue-light); padding:20px; border-radius:12px; margin-bottom:24px; border:1px solid rgba(0,102,255,0.15);">
                    <h4 style="margin:0 0 12px 0; color:var(--primary-blue); font-family:var(--font-title); text-transform:uppercase; font-size:14px;"><i class="fas fa-box-open"></i> Especificaciones de Exportación</h4>
                    <table class="spec-table">
                        <tr>
                            <th>Origen:</th>
                            <td>Perú (Calidad Certificada)</td>
                        </tr>
                        <tr>
                            <th>Marca Propia (OEM):</th>
                            <td><span style="color:var(--primary-blue); font-weight:700;">¡Sí, incluimos tu marca!</span></td>
                        </tr>
                        <tr>
                            <th>Disponibilidad:</th>
                            <td>Envíos por Mar o Aire a nivel internacional</td>
                        </tr>
                    </table>
                </div>

                <!-- Botones de Acción B2B -->
                <div class="product-cta-group" style="display:flex; gap:16px; flex-wrap:wrap;">
                    <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hola, deseo cotizar al por mayor el producto: ' . get_the_title()); ?>" target="_blank" class="btn-primary" style="flex:1; justify-content:center; padding:16px 24px; font-size:16px;">
                        <i class="fab fa-whatsapp" style="font-size:22px;"></i> Cotizar este producto por WhatsApp
                    </a>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
