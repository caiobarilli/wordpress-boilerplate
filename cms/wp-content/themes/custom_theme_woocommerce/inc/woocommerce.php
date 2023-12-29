<?php

/**
 * Add WooCommerce support
 */
if (!function_exists('Custom Theme_add_woocommerce_support')) {
    function Custom Theme_add_woocommerce_support()
    {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}

add_action('after_setup_theme', 'Custom Theme_add_woocommerce_support', 5);

/**
 * Hide price for unlogged users
 * @hooked hide_price
 * @return bool
 */
if (!function_exists('Custom Theme_product_infos')) {
    function Custom Theme_product_infos_open()
    {
        if (!is_user_logged_in()) {
            echo '<div class="Custom Theme_product_infos">';
        }
    }
}
if (!function_exists('Custom Theme_hide_price')) {
    function Custom Theme_product_infos_close()
    {
        if (!is_user_logged_in()) {
            echo '</div>';
        }
    }
}
add_action('woocommerce_shop_loop_item_title', 'Custom Theme_product_infos_open', 0);
add_action('woocommerce_after_shop_loop_item', 'Custom Theme_product_infos_close', 10);
