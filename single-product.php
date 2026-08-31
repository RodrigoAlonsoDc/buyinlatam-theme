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
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Inicio</a>
                <span class="sep"><i class="fas fa-chevron-right"></i></span>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Catálogo de Exportación</a>
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
                                <span class="product-badge-float"><i class="fas fa-certificate"></i> Origen Perú</span>
                                <span class="product-badge-oem"><i class="fas fa-tag"></i> Marca Propia (OEM)</span>
                                
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
                                        <strong>Vía Aérea Express</strong>
                                        <span>3 a 6 días hábiles</span>
                                    </div>
                                </div>
                                <div class="shipping-divider"></div>
                                <div class="shipping-item">
                                    <i class="fas fa-ship"></i>
                                    <div>
                                        <strong>Carga Marítima FCL/LCL</strong>
                                        <span>FOB Callao / CIF Destino</span>
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
                            <span class="stock-status in-stock"><i class="fas fa-check-circle"></i> Disponible para Exportación</span>
                            <span class="verified-origin"><i class="fas fa-shield-alt"></i> Control de Calidad 100%</span>
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
                                    <i class="fas fa-cubes"></i> Venta Exclusiva al Por Mayor
                                </div>
                                <div class="moq-info">
                                    <strong>Pedido Mínimo (MOQ):</strong> <span>50 unidades / Consultar</span>
                                </div>
                            </div>

                            <!-- Escala de Volumen -->
                            <div class="volume-pricing-table">
                                <div class="volume-tier">
                                    <span class="tier-qty">50 - 199 un.</span>
                                    <span class="tier-price">Precio Base FOB</span>
                                </div>
                                <div class="volume-tier popular">
                                    <span class="tier-tag">Más Solicitado</span>
                                    <span class="tier-qty">200 - 499 un.</span>
                                    <span class="tier-price">Descuento -15%</span>
                                </div>
                                <div class="volume-tier">
                                    <span class="tier-qty">+500 un.</span>
                                    <span class="tier-price">Tarifa Contenedor</span>
                                </div>
                            </div>

                            <p class="incoterms-note">
                                <i class="fas fa-info-circle"></i> Cotizamos bajo Incoterms <strong>FOB (Callao - Perú), CIF o DDP</strong> según el país de destino.
                            </p>

                            <!-- Botones de Acción B2B -->
                            <div class="product-cta-group">
                                <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hola BuyInLatam, deseo cotizar al por mayor el producto: ' . get_the_title() . ($sku ? ' (SKU: ' . $sku . ')' : '') . ' - Enlace: ' . get_permalink()); ?>" target="_blank" class="btn-whatsapp-quote">
                                    <i class="fab fa-whatsapp"></i>
                                    <div class="btn-text">
                                        <span class="main-label">Cotizar por WhatsApp</span>
                                        <span class="sub-label">Respuesta inmediata de un asesor de exportación</span>
                                    </div>
                                </a>

                                <a href="#b2b-inquiry-section" class="btn-rfq-email">
                                    <i class="fas fa-envelope-open-text"></i> Solicitar Cotización Formal por Correo
                                </a>
                            </div>
                        </div>

                        <!-- Mini Highlights B2B -->
                        <div class="b2b-feature-highlights">
                            <div class="highlight-box">
                                <i class="fas fa-tags highlight-icon"></i>
                                <div>
                                    <strong>Marca Propia (OEM)</strong>
                                    <span>Incluimos tus etiquetas y empaque</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-file-contract highlight-icon"></i>
                                <div>
                                    <strong>Documentación Completa</strong>
                                    <span>Certificados de origen y fitosanitarios</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-box highlight-icon"></i>
                                <div>
                                    <strong>Muestras Disponibles</strong>
                                    <span>Envíos directos a tu país</span>
                                </div>
                            </div>
                            <div class="highlight-box">
                                <i class="fas fa-handshake highlight-icon"></i>
                                <div>
                                    <strong>Asesoría Integral</strong>
                                    <span>Acompañamiento en aduanas y logística</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Pestañas / Ficha Técnica Completa B2B -->
                <div class="b2b-tabs-container">
                    <div class="b2b-tabs-nav">
                        <button class="tab-btn active" onclick="openB2BTab(event, 'tab-specs')">
                            <i class="fas fa-clipboard-list"></i> Ficha Técnica & Especificaciones
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-oem')">
                            <i class="fas fa-palette"></i> Personalización & Marca Propia (OEM)
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-shipping')">
                            <i class="fas fa-shipping-fast"></i> Logística & Condiciones de Envío
                        </button>
                        <button class="tab-btn" onclick="openB2BTab(event, 'tab-description')">
                            <i class="fas fa-align-left"></i> Descripción Completa
                        </button>
                    </div>

                    <div class="b2b-tabs-content">
                        <!-- Tab 1: Ficha Técnica -->
                        <div id="tab-specs" class="tab-pane active">
                            <h3><i class="fas fa-box-open"></i> Especificaciones del Producto para Exportación</h3>
                            <table class="spec-table-modern">
                                <tr>
                                    <th>País de Origen</th>
                                    <td>Perú (Zonas de Producción Seleccionadas)</td>
                                </tr>
                                <tr>
                                    <th>Disponibilidad</th>
                                    <td>Producción continua y despachos por lote / contenedor</td>
                                </tr>
                                <tr>
                                    <th>Personalización OEM</th>
                                    <td><strong style="color:var(--primary-blue);">¡Sí! Etiquetas, bordados, grabado y empaque con tu propia marca</strong></td>
                                </tr>
                                <tr>
                                    <th>Estándares de Calidad</th>
                                    <td>100% Calidad de Exportación certificada antes del despacho</td>
                                </tr>
                                <tr>
                                    <th>Incoterms Soportados</th>
                                    <td>FOB (Puerto del Callao / Aeropuerto Jorge Chávez), CIF, DDP</td>
                                </tr>
                                <tr>
                                    <th>Formas de Pago Aceptadas</th>
                                    <td>Transferencia Bancaria Internacional (T/T), Carta de Crédito (L/C)</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Tab 2: OEM y Marca Propia -->
                        <div id="tab-oem" class="tab-pane">
                            <h3><i class="fas fa-crown"></i> Fabricación con tu Marca y Diseño Exclusivo</h3>
                            <p>En <strong>BuyInLatam</strong> no solo exportamos los mejores productos de Perú, sino que también los adaptamos completamente para que lleguen listos para comercializar bajo la identidad de tu negocio.</p>
                            
                            <div class="oem-steps-grid">
                                <div class="oem-step-card">
                                    <div class="step-num">01</div>
                                    <h4>Envío de tu Logo y Arte</h4>
                                    <p>Nos compartes tus especificaciones de marca, colores y empaque deseado.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">02</div>
                                    <h4>Muestra & Prototipo</h4>
                                    <p>Elaboramos una muestra física o digital para tu estricta validación.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">03</div>
                                    <h4>Producción en Masa</h4>
                                    <p>Confeccionamos y procesamos tu lote con riguroso control de calidad.</p>
                                </div>
                                <div class="oem-step-card">
                                    <div class="step-num">04</div>
                                    <h4>Empaque & Despacho</h4>
                                    <p>Empacado con códigos de barra y despachado con destino a tu país.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3: Logística y Envíos -->
                        <div id="tab-shipping" class="tab-pane">
                            <h3><i class="fas fa-globe"></i> Envíos Internacionales y Logística</h3>
                            <p>Gestionamos toda la cadena logística desde nuestros almacenes en Lima hasta el puerto, aeropuerto o bodega de tu preferencia en cualquier parte del mundo.</p>
                            
                            <div class="shipping-modes-grid">
                                <div class="mode-card">
                                    <i class="fas fa-plane"></i>
                                    <h4>Carga Aérea (Air Freight)</h4>
                                    <ul>
                                        <li>Ideal para pedidos de alta rotación o muestras urgentes.</li>
                                        <li>Tiempo estimado: <strong>3 a 6 días hábiles</strong>.</li>
                                        <li>Salida: Aeropuerto Internacional Jorge Chávez (LIM).</li>
                                    </ul>
                                </div>
                                <div class="mode-card">
                                    <i class="fas fa-ship"></i>
                                    <h4>Carga Marítima (Ocean Freight)</h4>
                                    <ul>
                                        <li>Contenedor Completo (FCL) o Carga Consolidada (LCL).</li>
                                        <li>Tiempo estimado: <strong>12 a 25 días</strong> según destino.</li>
                                        <li>Salida: Puerto del Callao (Perú).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 4: Descripción Completa -->
                        <div id="tab-description" class="tab-pane">
                            <h3><i class="fas fa-info-circle"></i> Detalles y Descripción</h3>
                            <div class="full-content-typography">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Formulario de Cotización Rápida B2B -->
                <div id="b2b-inquiry-section" class="b2b-inquiry-section">
                    <div class="inquiry-header">
                        <span class="inquiry-subtitle">Atención Directa al Importador</span>
                        <h2>¿Deseas una Cotización Formal para <?php the_title(); ?>?</h2>
                        <p>Envíanos los detalles de tu solicitud y nuestro equipo de comercio exterior te responderá con una propuesta comercial y ficha técnica detallada.</p>
                    </div>

                    <div class="inquiry-form-container">
                        <form action="<?php echo esc_url( home_url( '/contacto' ) ); ?>" method="GET" class="b2b-quick-form">
                            <input type="hidden" name="producto" value="<?php echo esc_attr( get_the_title() ); ?>">
                            <div class="form-row">
                                <div class="form-group">
                                    <label><i class="fas fa-user"></i> Tu Nombre / Empresa</label>
                                    <input type="text" name="nombre" placeholder="Ej: John Doe / Latin Imports LLC" required>
                                </div>
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Correo Corporativo</label>
                                    <input type="email" name="email" placeholder="compras@tuempresa.com" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label><i class="fas fa-globe"></i> País de Destino</label>
                                    <input type="text" name="pais" placeholder="Ej: Estados Unidos, España, México..." required>
                                </div>
                                <div class="form-group">
                                    <label><i class="fas fa-cubes"></i> Cantidad Estimada (Unidades / Kg)</label>
                                    <input type="text" name="cantidad" placeholder="Ej: 100 unidades" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-comment-alt"></i> Comentarios adicionales o requerimientos especiales</label>
                                <textarea name="mensaje" rows="3" placeholder="Indícanos si requieres tu propia marca (OEM), empaque personalizado o especificaciones particulares..."></textarea>
                            </div>
                            <button type="submit" class="btn-submit-inquiry">
                                <i class="fas fa-paper-plane"></i> Enviar Solicitud de Cotización
                            </button>
                        </form>
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
                        <h4 style="color:var(--primary-blue); font-size:14px; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:5px;">Otros Productos de Exportación</h4>
                        <h2 style="font-size:26px; margin:0;">También te puede interesar</h2>
                    </div>

                    <div class="product-grid">
                        <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <span class="product-badge">Exportación</span>
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
                                    <p class="product-price">Cotizar al por mayor</p>
                                    <div class="product-actions">
                                        <a href="https://wa.me/51997309032?text=<?php echo urlencode('Hola, quiero cotizar ' . get_the_title()); ?>" target="_blank" class="btn-add-cart">
                                            <i class="fab fa-whatsapp"></i> Cotizar
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="btn-view">Detalles</a>
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
