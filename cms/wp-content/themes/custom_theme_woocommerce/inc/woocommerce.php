<?php

/**
 * Add WooCommerce support
 */
if (!function_exists('Custom_Theme_add_woocommerce_support')) {
    function Custom_Theme_add_woocommerce_support()
    {
        add_theme_support(
            'woocommerce',
            array(
                'thumbnail_image_width' => 150,
                'single_image_width' => 150,
                'product_grid' => array(
                    'default_rows' => 2,
                    'min_rows' => 2,
                    'max_rows' => 4,
                    'default_columns' => 2,
                    'min_columns' => 2,
                    'max_columns' => 4,
                ),
            )
        );
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

if (!function_exists('get_cart_items')) {
    function get_cart_items()
    {
        ob_start(); // Turn on output buffering
        $items = WC()->cart->get_cart();
        $cart_count = WC()->cart->get_cart_contents_count();
        echo '<img src="' . get_theme_file_uri('assets/img/cart-full.svg') . '" alt="Cart" />';
        echo '<span class="cart-contents-count">' . $cart_count . '</span>';
        foreach ($items as $item => $values) {
            $product = wc_get_product($values['data']->get_id());
            echo '<p>' . esc_html($product->get_name()) . ' ' . wc_price($values['data']->get_price()) . '</p>';
        }
        $response = ob_get_clean(); // Clear and return output
        echo $response;
        die();
    }
}
add_action('wp_ajax_get_cart_items', 'get_cart_items');
add_action('wp_ajax_nopriv_get_cart_items', 'get_cart_items');
