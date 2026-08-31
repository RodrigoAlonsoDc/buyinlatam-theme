<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Script de Carga Temprana de Paleta Guardada -->
    <script>
    (function() {
        var savedPalette = localStorage.getItem('buyinlatam_theme_palette');
        if (savedPalette) {
            try {
                var colors = JSON.parse(savedPalette);
                var root = document.documentElement;
                for (var key in colors) {
                    root.style.setProperty(key, colors[key]);
                }
            } catch(e) {}
        }
    })();
    </script>
</head>
<body <?php body_class(); ?>>

<div class="top-bar">
    <div class="top-bar-content">
        <span><i class="fas fa-globe-americas"></i> Exportación premium desde Perú — Envíos a todo el mundo</span>
    </div>
</div>

<header class="site-header">
    <div class="header-main">
        <div class="header-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
                <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="logo-brand-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="BuyInLatam Logo" class="brand-logo-img" onerror="this.style.display='none'; document.getElementById('text-logo-fallback').style.display='flex';">
                        <div id="text-logo-fallback" class="text-logo" style="display:none;">
                            <i class="fas fa-globe-americas logo-icon"></i>
                            <div class="text-logo-content">
                                <span class="logo-main">BUY IN</span>
                                <span class="logo-sub">LATAM</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </a>
        </div>
        
        <div class="header-icons">
            <a href="https://wa.me/51997309032?text=Hola,%20quiero%20cotizar" target="_blank" class="header-icon" title="Cotizar por WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#" class="header-icon" title="Mi Cuenta">
                <i class="far fa-user"></i>
            </a>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-icon cart-icon" title="Carrito">
                <i class="fas fa-shopping-bag"></i>
            </a>
        </div>
    </div>
    
    <div class="header-nav-wrapper">
        <nav class="main-nav">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
                <li><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Catálogo</a></li>
                <li><a href="<?php echo esc_url( home_url( '/nosotros' ) ); ?>">Nosotros</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>
