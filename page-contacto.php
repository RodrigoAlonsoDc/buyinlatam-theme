<?php
/**
 * Template Name: Página de Contacto
 */

get_header(); ?>

<main id="primary" class="site-main contact-page-wrapper">
    <!-- Hero Banner Contacto -->
    <section class="contact-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/alpaca-model.png');">
        <div class="contact-hero-overlay">
            <div class="container">
                <h1 class="contact-hero-title">Contáctanos</h1>
            </div>
        </div>
    </section>

    <!-- Sección Principal 2 Columnas -->
    <section class="contact-main-content">
        <div class="container contact-container">
            
            <div class="contact-header-text">
                <h2>Comencemos una conversación</h2>
            </div>

            <div class="contact-row">
                <!-- Columna Izquierda: Información -->
                <div class="contact-col-info">
                    <h3>Consulta cómo podemos ayudarte:</h3>

                    <div class="contact-info-block">
                        <h4>Únete como proveedor B2B</h4>
                        <p>Solicita colocar tu producto en nuestro catálogo de exportación para llegar a mercados internacionales. <a href="#">Exporta con Buy In Latam</a>.</p>
                    </div>

                    <div class="contact-info-block">
                        <h4>Asesoría en exportaciones</h4>
                        <p>Aprende de nuestros expertos sobre normativas, certificaciones de origen y logística internacional. <a href="#">Nuestros servicios corporativos</a>.</p>
                    </div>

                    <div class="contact-info-block">
                        <h4>Soporte al cliente</h4>
                        <p>¿Tienes dudas sobre un pedido en curso o sobre nuestros envíos internacionales? Nuestro equipo de soporte está listo para ayudarte.</p>
                    </div>
                </div>

                <!-- Columna Derecha: Formulario de Contacto -->
                <div class="contact-col-form">
                    <p class="form-notice">Por favor nota: todos los campos son requeridos.</p>
                    
                    <?php 
                    // Si el envío fue exitoso, mostramos el mensaje
                    if ( isset($_GET['envio']) && $_GET['envio'] == 'exito' ) : ?>
                        <div class="alert alert-success">
                            ¡Gracias! Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto pronto.
                        </div>
                    <?php elseif( isset($_GET['envio']) && $_GET['envio'] == 'error' ): ?>
                        <div class="alert alert-danger">
                            Hubo un error al enviar tu mensaje. Por favor intenta de nuevo.
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" class="custom-contact-form">
                        <!-- Seguridad y Acción -->
                        <input type="hidden" name="action" value="procesar_formulario_contacto">
                        <?php wp_nonce_field( 'enviar_contacto', 'contacto_nonce' ); ?>
                        <input type="hidden" name="pagina_retorno" value="<?php echo esc_url(get_permalink()); ?>">

                        <div class="form-group">
                            <label for="contact_name">Nombre completo</label>
                            <input type="text" id="contact_name" name="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Correo electrónico</label>
                            <input type="email" id="contact_email" name="contact_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_phone">Número de WhatsApp / Teléfono</label>
                            <input type="tel" id="contact_phone" name="contact_phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message">Detalles del producto / Mensaje</label>
                            <textarea id="contact_message" name="contact_message" rows="4" required></textarea>
                        </div>
                        
                        <button type="submit" class="contact-submit-btn">ENVIAR MENSAJE</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>
