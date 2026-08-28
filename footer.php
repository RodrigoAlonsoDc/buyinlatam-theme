    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="footer-widget about-widget">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="BuyInLatam Logo" class="footer-logo">
                <p>BuyInLatam es la boutique exclusiva B2B dedicada a llevar los productos peruanos más finos al mundo entero. Exportación directa, calidad certificada.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-widget links-widget">
                <h4 class="widget-title">Enlaces Rápidos</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
                    <li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Catálogo de Productos</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                </ul>
            </div>
            
            <div class="footer-widget contact-widget">
                <h4 class="widget-title">Contacto</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Lima, Perú</li>
                    <li><i class="fas fa-envelope"></i> exportaciones@buyinlatam.com</li>
                    <li><i class="fab fa-whatsapp"></i> +51 997 309 032</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> BuyInLatam. Todos los derechos reservados.</p>
        </div>
    </footer>
    
    <a href="https://wa.me/51997309032?text=Hola,%20quisiera%20m%C3%A1s%20informaci%C3%B3n" class="floating-whatsapp" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <?php wp_footer(); ?>
</body>
</html>
