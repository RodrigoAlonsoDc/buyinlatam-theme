<?php
/**
 * Plantilla genérica para páginas (Cart, Checkout, Mi Cuenta, etc.)
 * Tema BuyInLatam B2B
 */

get_header(); ?>

<div class="site-wrapper generic-page">
    <section class="page-hero">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <main class="page-content-wrapper">
        <div class="container">
            <div class="page-body-card">
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
