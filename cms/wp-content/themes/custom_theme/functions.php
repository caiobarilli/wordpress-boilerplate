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
    External Modules/Files
\*------------------------------------*/

require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_stylesheet_directory() . '/inc/customizer.php';
require_once get_stylesheet_directory() . '/inc/plugins.php';

/*------------------------------------*\
    Theme
\*------------------------------------*/

define('THEME_VERSION', wp_get_theme()->get('Version'));

// Theme Support
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
    // load_theme_textdomain('custom_theme', get_template_directory() . '/languages');
}

// Navigation: Main Menu
function main_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse collapse-horizontal',
            'container_id'    => 'menu',
            'menu_class'      => 'navbar-nav',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ),
    );
}

// Register Navigation
function custom_theme_menu()
{
    register_nav_menus(array(
        'header-menu'  => __('Menu Principal', 'custom_theme'), // Main Navigation
    ));
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// Load More
function loadmore_ajax_handler()
{

    $sticky = get_option('sticky_posts');
    $args = json_decode(wp_unslash($_POST['query']), true);
    $args['showposts'] = '3';
    $args['post__not_in'] = $sticky;
    $args['ignore_sticky_posts'] = 1;
    $args['paged'] = $_POST['page'] + 1;

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part('template-parts/content');
        endwhile;
    endif;

    wp_reset_query();
    wp_reset_postdata();
    wp_die();
}

// Load More Search
function loadmore_search_ajax_handler()
{
    $args = json_decode(wp_unslash($_POST['query']), true);
    $args['s']      = $_POST['s_query'];
    $args['order']  = $_POST['order'];
    $args['paged']  = $_POST['page'] + 1;
    $args['showposts'] = '5';

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part('template-parts/content', 'search');
        endwhile;
    endif;

    wp_reset_query();
    wp_reset_postdata();
    wp_die();
}

// Load More Category
function loadmore_category_ajax_handler()
{
    $args = json_decode(wp_unslash($_POST['query']), true);
    $args['showposts'] = '4';
    $args['category__in']  = $_POST['category'];
    $args['paged']  = $_POST['page'] + 1;
    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part('template-parts/content', 'search');
        endwhile;
    endif;

    wp_reset_query();
    wp_reset_postdata();
    wp_die();
}

// Load More Tags
function loadmore_tags_ajax_handler()
{
    $args = json_decode(wp_unslash($_POST['query']), true);
    $args['showposts'] = '4';
    $args['tag']  = $_POST['tag'];
    $args['paged']  = $_POST['page'] + 1;

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part('template-parts/content', 'search');
        endwhile;
    endif;

    wp_reset_query();
    wp_reset_postdata();
    wp_die();
}

// Load Scripts
function header_scripts()
{

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        global $wp_query;

        $loadmoreParams = array(
            'ajaxurl'       => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
            'posts'         => json_encode($wp_query->query_vars),
            'current_page'  => get_query_var('paged') ? get_query_var('paged') : 1,
            'max_page'      => $wp_query->max_num_pages,
        );

        wp_register_script('custom_theme_scripts', get_template_directory_uri() . '/dist/main.js', array(), THEME_VERSION); // Custom scripts
        wp_localize_script('custom_theme_scripts', 'loadmore_params', $loadmoreParams);
        wp_localize_script('custom_theme_scripts', 'loadmore_search_params', $loadmoreParams);
        wp_localize_script('custom_theme_scripts', 'loadmore_category_params', $loadmoreParams);
        wp_localize_script('custom_theme_scripts', 'loadmore_tags_params', $loadmoreParams);
        wp_enqueue_script('custom_theme_scripts'); // Enqueue it!

    }
}

// Load Styles
function public_assets()
{
    wp_register_style('custom_theme_styles', get_template_directory_uri() . '/dist/main.css', array(), THEME_VERSION);
    wp_enqueue_style('custom_theme_styles'); // Enqueue it!
}

// Custom Excerpt
function post_excerpt($limit)
{
    $my_excerpt = apply_filters( 'the_excerpt', get_the_excerpt() );
    $excerpt = explode(' ', $my_excerpt, $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    echo $excerpt;
}

// Custom Excerpt Length (the_excerpt)
function custom_excerpt_length( $length )
{
    return 45;
}

// Wp Login: change login headertitle
function change_login_headertitle()
{
    return get_option('blogname');
}

// Wp Login: change login headerurl
function change_login_headerurl($value)
{
    return home_url();
}

// Wp Login: change login image
function change_logo_login_head()
{
    echo '<style>
            .login .privacy-policy-page-link { display: none; }
            .login h1 a { background-image: url(' .  get_template_directory_uri() . '/assets/img/Logo.svg' . ');
            background-size: contain; background-position: center center; width: 210px; }
        </style>';
}

// Wp Customizer Remove Sections
function customizer_removes($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_panel('widgets');
}

// Change the custom logo
function custom_theme_custom_logo()
{

    // The logo
    $custom_logo_id = get_theme_mod('custom_logo');

    // If has logo
    if ($custom_logo_id) {

        // Attr
        $custom_logo_attr = array(
            'class'    => 'CustomTheme-logo',
            'itemprop' => 'logo',
        );

        // Image alt
        $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
        }

        // Get the image
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            home_url(),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr)
        );
    }

    // Return
    return $html;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// add defer attribute to enqueued script
function script_defer_attribute($tag, $handle, $src)
{
    if ($handle === 'custom_theme_scripts') {
        if (false === stripos($tag, 'defer')) {
            $tag = str_replace('<script ', '<script defer ', $tag);
        }
    }

    return $tag;
}

// Remove Global styles from WordPress
function remove_global_styles()
{
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('classic-theme-styles');
}

/*------------------------------------*\
    Filters
\*------------------------------------*/

// Add Filters
add_filter('login_headertitle', 'change_login_headertitle'); // Change admin header title
add_filter('login_headerurl', 'change_login_headerurl'); // Change admin logo url
add_filter('get_custom_logo', 'custom_theme_custom_logo'); // Change admin logo
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('script_loader_tag', 'script_defer_attribute', 10, 3); // Add defer to enqueued script
add_filter('excerpt_length', 'custom_excerpt_length'); // Custom Excerpt Length (the_excerpt)
add_filter('wpcf7_autop_or_not', '__return_false'); // Remove p tag cf7

/*------------------------------------*\
    Actions
\*------------------------------------*/

// Add Actions
add_action('init', 'custom_theme_menu'); // Add site menu
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head

add_action('login_head', 'change_logo_login_head'); // Change admin logo

add_action('wp_enqueue_scripts', 'public_assets', 99); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'remove_global_styles', 99); // Remove Global styles from WordPress

add_action('customize_register', 'customizer_removes', 50); // Remove static_front_page from Wp Customizer

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_search', 'loadmore_search_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_search', 'loadmore_search_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_category', 'loadmore_category_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_category', 'loadmore_category_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_tags', 'loadmore_tags_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_tags', 'loadmore_tags_ajax_handler'); // Non-authenticated users

// Remove Actions
remove_action('wp_head', 'print_emoji_detection_script', 7); // Remove wp emoji
remove_action('wp_print_styles', 'print_emoji_styles'); // Remove wp emoji
remove_action('admin_print_scripts', 'print_emoji_detection_script' ); // Remove wp emoji
remove_action('admin_print_styles', 'print_emoji_styles' ); // Remove wp emoji