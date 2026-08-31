<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
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

<!-- Barra Superior Promocional -->
<div class="top-bar">
    <div class="top-bar-content">
        <span><i class="fas fa-globe-americas"></i> EXPORTACIÓN PREMIUM DESDE PERÚ — ENVÍOS DIRECTOS A TODO EL MUNDO</span>
    </div>
</div>

<!-- Encabezado Principal Estilo E-Commerce B2B -->
<header class="site-header nebula-header">
    
    <!-- Fila Central: Logo + Buscador + Utilidades -->
    <div class="header-main-row">
        <div class="container header-main-container">
            
            <!-- Logo BuyInLatam -->
            <div class="header-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
                    <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="logo-brand-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo2.png" alt="BuyInLatam Logo" class="brand-logo-img" onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo.png';">
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

            <!-- Buscador Central Integrado -->
            <div class="header-search-box">
                <form role="search" method="get" class="search-form-nebula" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search search-input-icon"></i>
                        <input type="search" class="search-field" placeholder="Buscar productos de exportación, alpaca, café, cacao..." value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="post_type" value="product" />
                    </div>
                    <button type="submit" class="search-submit-btn" aria-label="Buscar">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Utilidades / Accesos Directos B2B -->
            <div class="header-user-actions">
                <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="action-item" title="Solicitar Cotización">
                    <div class="action-icon-wrap">
                        <i class="far fa-heart"></i>
                    </div>
                    <span class="action-label">Cotizar</span>
                </a>

                <a href="https://wa.me/51997309032?text=Hola,%20deseo%20asesoría%20para%20exportación" target="_blank" class="action-item whatsapp-action" title="Asesoría WhatsApp">
                    <div class="action-icon-wrap">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <span class="action-label">WhatsApp</span>
                </a>

                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="action-item cart-action" title="Ver Solicitud de Pedido">
                    <div class="action-icon-wrap">
                        <i class="fas fa-shopping-bag"></i>
                        <?php 
                        $cart_count = ( function_exists('WC') && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
                        ?>
                        <span class="cart-badge-count"><?php echo esc_html( $cart_count ); ?></span>
                    </div>
                    <span class="action-label">Pedido</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Fila de Navegación & Soporte -->
    <div class="header-nav-row">
        <div class="container header-nav-container">

            <!-- Menú Principal -->
            <nav class="main-nav-nebula">
                <ul>
                    <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
                    <li class="<?php echo is_shop() ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Catálogo</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/nosotros' ) ); ?>">Nosotros</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>">Contacto</a></li>
                </ul>
            </nav>

            <!-- Teléfono / Soporte B2B -->
            <div class="header-support-info">
                <i class="fas fa-headset"></i>
                <div class="support-text">
                    <span class="support-label">Soporte B2B:</span>
                    <a href="tel:+51997309032" class="support-phone">+51 997 309 032</a>
                </div>
            </div>

        </div>
    </div>

</header>
