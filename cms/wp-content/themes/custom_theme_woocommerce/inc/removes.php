<?php

/**
 * Remove customizer default configurations
 * @hooked customize_register
 * @param object $wp_customize
 * @return void
 */
function customizer_removes($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_panel('widgets');
}
add_action('customize_register', 'customizer_removes', 50);

/**
 * Remove admin bar
 * @hooked show_admin_bar
 * @return bool
 */
function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');

/**
 * Remove global styles from WordPress
 * @hooked wp_enqueue_scripts
 * @return void
 */
function remove_global_styles()
{
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'remove_global_styles', 99);

/**
 * Remove jquery scripts from WordPress
 * @hooked init
 * @return void
 */
// function jquery_scripts()
// {
//     if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
//         wp_dequeue_script('jquery'); // Dequeue it!
//         wp_deregister_script('jquery'); // Deregister it!
//     }
// }
// add_action('init', 'jquery_scripts');

/**
 * Remove auto p tag on contact form 7
 */
// add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Remove Emoji
 * @hooked after_setup_theme
 * @return void
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Remove os estilos do WooCommerce
 * @hooked woocommerce_enqueue_styles
 * @param array $enqueue_styles
 * @return array
 */
// function remove_styles_woocommerce($enqueue_styles)
// {
//     unset($enqueue_styles['woocommerce-layout']);
//     unset($enqueue_styles['woocommerce-smallscreen']);
//     unset($enqueue_styles['woocommerce-general']);
//     return $enqueue_styles;
// }
// add_filter('woocommerce_enqueue_styles', 'remove_styles_woocommerce');
