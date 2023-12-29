<?php

/**
 *
 * App functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CustomTheme
 *
 */

/*------------------------------------*\
    Define Constants
\*------------------------------------*/

define('THEME_VERSION', wp_get_theme()->get('Version'));

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

require_once get_stylesheet_directory() . '/inc/plugins.php';

/*------------------------------------*\
    Theme Suport
\*------------------------------------*/

if (function_exists('add_theme_support')) {
    add_theme_support('menus'); // Add Menu Support
    add_theme_support('custom-logo'); // Add Custom Logo Support

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('post-sticky', 350, 1020, true);
    add_image_size('post-thumbnail', 440, 300, true);
    add_image_size('post-single', 300, 1920, true);
    add_image_size('post-search', 150, 200, true);
    add_image_size('thumbnail-product', 150, 150, true);

    // Localisation Support
    // load_theme_textdomain('custom_theme_woocommerce', get_template_directory() . '/languages');
}


/*------------------------------------*\
    Functions
\*------------------------------------*/

require_once get_stylesheet_directory() . '/inc/removes.php';
require_once get_stylesheet_directory() . '/inc/menu.php';
require_once get_stylesheet_directory() . '/inc/utils.php';
require_once get_stylesheet_directory() . '/inc/woocommerce.php';
require_once get_stylesheet_directory() . '/inc/smtp.php';
require_once get_stylesheet_directory() . '/inc/loadmore.php';

/*------------------------------------*\
    Assets
\*------------------------------------*/

// Load Scripts
function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        global $wp_query;

        $loadmoreParams = array(
            'ajaxurl'       => site_url() . '/wp-admin/admin-ajax.php',
            'posts'         => json_encode($wp_query->query_vars),
            'current_page'  => get_query_var('paged') ? get_query_var('paged') : 1,
            'max_page'      => $wp_query->max_num_pages,
        );

        wp_register_script('custom_theme_woocommerce_scripts', get_template_directory_uri() . '/dist/main.bundle.js', array(), THEME_VERSION); // Custom scripts
        wp_localize_script('custom_theme_woocommerce_scripts', 'loadmore_params', $loadmoreParams);
        wp_localize_script('custom_theme_woocommerce_scripts', 'loadmore_search_params', $loadmoreParams);
        wp_localize_script('custom_theme_woocommerce_scripts', 'loadmore_category_params', $loadmoreParams);
        wp_localize_script('custom_theme_woocommerce_scripts', 'loadmore_tags_params', $loadmoreParams);
        wp_enqueue_script('custom_theme_woocommerce_scripts'); // Enqueue it!
    }
}
add_action('init', 'header_scripts', 0);

// Load Styles
function public_assets()
{
    wp_register_style('custom_theme_woocommerce_styles', get_template_directory_uri() . '/dist/main.css', array(), THEME_VERSION);
    wp_enqueue_style('custom_theme_woocommerce_styles'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'public_assets', 0);
