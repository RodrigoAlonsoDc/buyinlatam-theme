<?php
function buildlatam_scripts() {
    wp_enqueue_style( 'buildlatam-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'buildlatam_scripts' );

function buildlatam_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'buildlatam_setup' );

// Remove WooCommerce tabs
add_filter( 'woocommerce_product_tabs', 'buildlatam_remove_product_tabs', 98 );
function buildlatam_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );          // Remove the reviews tab
    // unset( $tabs['description'] );   // Remove the description tab
    // unset( $tabs['additional_information'] );  // Remove the additional information tab
    return $tabs;
}
