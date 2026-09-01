<?php
/**
 * Template Name: Contact Page (B2B Inquiries)
 */

get_header(); ?>

<main id="primary" class="site-main contact-page-wrapper">
    <!-- Contact Hero Banner -->
    <section class="contact-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/alpaca-model.png');">
        <div class="contact-hero-overlay">
            <div class="container">
                <h1 class="contact-hero-title">Contact Us</h1>
            </div>
        </div>
    </section>

    <!-- Main 2-Column Section -->
    <section class="contact-main-content">
        <div class="container contact-container">
            
            <div class="contact-header-text">
                <h2>Let's Start a Conversation</h2>
            </div>

            <div class="contact-row">
                <!-- Left Column: Information -->
                <div class="contact-col-info">
                    <h3>How can we help your business?</h3>

                    <div class="contact-info-block">
                        <h4>Join as a B2B Supplier / Producer</h4>
                        <p>Request to feature your Latin American product in our export catalog to reach buyers across North America, Europe, and Asia.</p>
                    </div>

                    <div class="contact-info-block">
                        <h4>International Trade & Logistics</h4>
                        <p>Our trade experts manage phytosanitary certificates, origin documentation, customs clearance, and global air/ocean freight logistics.</p>
                    </div>

                    <div class="contact-info-block">
                        <h4>Customer & Order Support</h4>
                        <p>Have inquiries regarding bulk wholesale orders, product samples, or active freight shipments? Our support team is ready 24/7.</p>
                    </div>
                </div>

                <!-- Right Column: Contact & Quote Form -->
                <div class="contact-col-form">
                    <p class="form-notice">Please note: all fields are required.</p>
                    
                    <?php 
                    if ( isset($_GET['envio']) && $_GET['envio'] == 'exito' ) : ?>
                        <div class="alert alert-success">
                            Thank you! Your message has been sent successfully. An export specialist will contact you shortly.
                        </div>
                    <?php elseif( isset($_GET['envio']) && $_GET['envio'] == 'error' ): ?>
                        <div class="alert alert-danger">
                            There was an error sending your message. Please try again or contact us directly via WhatsApp.
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" class="custom-contact-form">
                        <!-- Security & Action -->
                        <input type="hidden" name="action" value="procesar_formulario_contacto">
                        <?php wp_nonce_field( 'enviar_contacto', 'contacto_nonce' ); ?>
                        <input type="hidden" name="pagina_retorno" value="<?php echo esc_url(get_permalink()); ?>">

                        <div class="form-group">
                            <label for="contact_name">Full Name / Company Name</label>
                            <input type="text" id="contact_name" name="contact_name" placeholder="John Doe / Global Imports LLC" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Corporate Email Address</label>
                            <input type="email" id="contact_email" name="contact_email" placeholder="buyer@company.com" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_phone">WhatsApp / Phone (with country code)</label>
                            <input type="tel" id="contact_phone" name="contact_phone" placeholder="+1 555 123 4567" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message">Products of Interest / Inquiry Details</label>
                            <textarea id="contact_message" name="contact_message" rows="4" placeholder="Mention the products, estimated volume, target destination port, and custom OEM requirements..." required></textarea>
                        </div>
                        
                        <button type="submit" class="contact-submit-btn">SEND INQUIRY</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>
