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

<!-- Promotional Top Bar -->
<div class="top-bar">
    <div class="top-bar-content">
        <span><i class="fas fa-globe-americas"></i> PREMIUM EXPORTS FROM PERU & LATAM — WORLDWIDE DIRECT SHIPPING</span>
    </div>
</div>

<!-- Header Principal E-Commerce B2B -->
<header class="site-header nebula-header">
    
    <!-- Middle Row: Logo + Search + Actions -->
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

            <!-- Central Search Bar -->
            <div class="header-search-box">
                <form role="search" method="get" class="search-form-nebula" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search search-input-icon"></i>
                        <input type="search" class="search-field" placeholder="Search export products, alpaca knitwear, coffee, cacao..." value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="post_type" value="product" />
                    </div>
                    <button type="submit" class="search-submit-btn" aria-label="Search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- B2B User Actions -->
            <div class="header-user-actions">
                <a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url( '/?page_id=29' ) ); ?>" class="action-item" title="Request Quote">
                    <div class="action-icon-wrap">
                        <i class="far fa-heart"></i>
                    </div>
                    <span class="action-label">Quote</span>
                </a>

                <a href="https://wa.me/51997309032?text=Hello,%20I%20would%20like%20information%20about%20export%20products" target="_blank" class="action-item whatsapp-action" title="WhatsApp Advisory">
                    <div class="action-icon-wrap">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <span class="action-label">WhatsApp</span>
                </a>

                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="action-item cart-action" title="View Inquiries / Order">
                    <div class="action-icon-wrap">
                        <i class="fas fa-shopping-bag"></i>
                        <?php 
                        $cart_count = ( function_exists('WC') && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
                        ?>
                        <span class="cart-badge-count"><?php echo esc_html( $cart_count ); ?></span>
                    </div>
                    <span class="action-label">Inquiry</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Navigation & Support Row -->
    <div class="header-nav-row">
        <div class="container header-nav-container">

            <!-- Category Dropdown Button -->
            <div class="categories-dropdown-btn-wrap">
                <button class="btn-categories-toggle" id="categoriesToggleBtn" aria-expanded="false" aria-haspopup="true">
                    <i class="fas fa-bars"></i>
                    <span>Categories</span>
                    <i class="fas fa-chevron-down toggle-arrow"></i>
                </button>
                
                <div class="categories-dropdown-menu" id="categoriesDropdownMenu">
                    <a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>" class="cat-drop-item active-all">
                        <i class="fas fa-th-large"></i> All Products
                    </a>
                    <?php
                    $nav_categories = get_terms( array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                    ) );

                    if ( ! empty( $nav_categories ) && ! is_wp_error( $nav_categories ) ) {
                        foreach ( $nav_categories as $cat ) {
                            if ( $cat->slug === 'uncategorized' || $cat->slug === 'sin-categorizar' ) continue;
                            echo '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="cat-drop-item">';
                            echo '<i class="fas fa-tag"></i> ' . esc_html( $cat->name );
                            if ( $cat->count > 0 ) {
                                echo '<span class="cat-item-count">' . esc_html( $cat->count ) . '</span>';
                            }
                            echo '</a>';
                        }
                    } else {
                        // Fallback items if WooCommerce terms not loaded
                        echo '<a href="' . esc_url( home_url( '/?post_type=product' ) ) . '" class="cat-drop-item"><i class="fas fa-tshirt"></i> Alpaca Knitwear</a>';
                        echo '<a href="' . esc_url( home_url( '/?post_type=product' ) ) . '" class="cat-drop-item"><i class="fas fa-cookie"></i> Chocolate Bars</a>';
                        echo '<a href="' . esc_url( home_url( '/?post_type=product' ) ) . '" class="cat-drop-item"><i class="fas fa-coffee"></i> Packaged Coffee</a>';
                        echo '<a href="' . esc_url( home_url( '/?post_type=product' ) ) . '" class="cat-drop-item"><i class="fas fa-seedling"></i> Rice Sacks & Grains</a>';
                    }
                    ?>
                </div>
            </div>

            <!-- Main Navigation Links -->
            <nav class="main-nav-nebula">
                <ul>
                    <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li class="<?php echo ( is_shop() || is_post_type_archive('product') || is_product_category() || is_product_tag() ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/?post_type=product' ) ); ?>">Catalog</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/nosotros' ) ); ?>">About Us</a></li>
                    <li class="<?php echo ( is_page(29) || is_page('contacto') ) ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( function_exists('buyinlatam_get_contact_url') ? buyinlatam_get_contact_url() : home_url( '/?page_id=29' ) ); ?>">Contact</a></li>
                </ul>
            </nav>

            <!-- B2B Support Phone -->
            <div class="header-support-info">
                <i class="fas fa-headset"></i>
                <div class="support-text">
                    <span class="support-label">B2B Support:</span>
                    <a href="tel:+51997309032" class="support-phone">+51 997 309 032</a>
                </div>
            </div>

        </div>
    </div>

</header>

<!-- JavaScript para el botón de categorías -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtn = document.getElementById('categoriesToggleBtn');
    var dropMenu = document.getElementById('categoriesDropdownMenu');
    
    if (toggleBtn && dropMenu) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = dropMenu.classList.toggle('show');
            toggleBtn.classList.toggle('active', isOpen);
            toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
        
        document.addEventListener('click', function(e) {
            if (!toggleBtn.contains(e.target) && !dropMenu.contains(e.target)) {
                dropMenu.classList.remove('show');
                toggleBtn.classList.remove('active');
                toggleBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
</script>
