<?php

/**
 * Add WooCommerce support
 */
if (!function_exists('Custom_Theme_add_woocommerce_support')) {
    function Custom_Theme_add_woocommerce_support()
    {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}
add_action('after_setup_theme', 'Custom_Theme_add_woocommerce_support', 5);

/**
 * Hide price for unlogged users
 */
if (!function_exists('Custom_Theme_product_infos_open')) {
    function Custom_Theme_product_infos_open()
    {
        if (!is_user_logged_in()) {
            echo '<div class="Custom_Theme_product_infos">';
        }
    }
}
if (!function_exists('Custom_Theme_product_infos_close')) {
    function Custom_Theme_product_infos_close()
    {
        if (!is_user_logged_in()) {
            echo '</div>';
        }
    }
}
add_action('woocommerce_shop_loop_item_title', 'Custom_Theme_product_infos_open', 0);
add_action('woocommerce_after_shop_loop_item', 'Custom_Theme_product_infos_close', 10);
