<?php
/**
 * Plantilla de Error 404
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper">
    <main class="page-content-wrapper" style="margin-top:60px; text-align:center;">
        <div class="container">
            <div style="background:white; padding:60px 40px; border-radius:16px; border:1px solid var(--border-color); box-shadow:var(--shadow-sm); max-width:700px; margin:0 auto;">
                <div style="font-size:72px; font-weight:800; color:var(--primary-blue); font-family:var(--font-title); line-height:1;">404</div>
                <h2 style="font-family:var(--font-title); font-size:28px; margin:16px 0; color:var(--text-primary);">Página No Encontrada</h2>
                <p style="color:var(--text-secondary); font-size:16px; margin-bottom:30px;">
                    Lo sentimos, la página que buscas no existe o ha sido movida. Te invitamos a explorar nuestro catálogo de productos de exportación o regresar al inicio.
                </p>
                <div style="display:flex; justify-content:center; gap:16px;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">
                        <i class="fas fa-home"></i> Ir al Inicio
                    </a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-yellow">
                        <i class="fas fa-boxes"></i> Ver Catálogo
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
