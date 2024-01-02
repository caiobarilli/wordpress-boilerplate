<?php

/**
 * Include Bootstrap Navwalker
 * @package custom_theme_woocommerce
 */
require_once get_stylesheet_directory() . '/inc/classes/class-wp-bootstrap-navwalker.php';

/*------------------------------------*\
    Theme Functions
\*------------------------------------*/

/**
 * Filter the except length to custom length.
 * @param int $limit
 * @return string
 */
function post_excerpt($limit)
{
    $my_excerpt = apply_filters('the_excerpt', get_the_excerpt());
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

/*------------------------------------*\
    Theme Filters
\*------------------------------------*/

/**
 * Set default excerpt length
 * @hooked excerpt_length
 * @param int $length
 * @return int
 */
function custom_excerpt_length($length)
{
    return 45;
}
add_filter('excerpt_length', 'custom_excerpt_length');

/**
 * Customize custom logo from theme
 * @hooked get_custom_logo
 */
function custom_theme_woocommerce_custom_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $custom_logo_attr = array(
            'class'    => 'CustomTheme-logo',
            'itemprop' => 'logo',
        );
        $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
        }
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            home_url(),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr)
        );
    }
    return $html;
}
add_filter('get_custom_logo', 'custom_theme_woocommerce_custom_logo');

/**
 * Add defer attribute to enqueued script
 * @hooked script_loader_tag
 * @param string $tag
 * @param string $handle
 * @param string $src
 * @return string
 */
function script_defer_attribute($tag, $handle, $src)
{
    if ($handle === 'custom_theme_woocommerce_scripts') {
        if (false === stripos($tag, 'defer')) {
            $tag = str_replace('<script ', '<script defer ', $tag);
        }
    }
    return $tag;
}
add_filter('script_loader_tag', 'script_defer_attribute', 10, 3);

/*------------------------------------*\
    Custom Login Page
\*------------------------------------*/

/**
 * Change login headertitle
 * @hooked login_headertitle
 * @return string
 */
function change_login_headertitle()
{
    return get_option('blogname');
}
add_filter('login_headertitle', 'change_login_headertitle');

/**
 * Change login headerurl
 * @hooked login_headerurl
 * @return string
 */
function change_login_headerurl($value)
{
    return home_url();
}
add_filter('login_headerurl', 'change_login_headerurl');

/**
 * Change login logo
 * @hooked login_head
 * @return string
 */
function change_logo_login_head()
{
    $customStyle =
        '<style>' .
        '
            .login .privacy-policy-page-link { display: none; }
            .login h1 a { background-image: url(' .  get_template_directory_uri() . '/assets/img/Logo.svg' . ');
            background-size: contain; background-position: center center; width: 210px; }
        ' .
        '</style>';
    echo $customStyle;
}
add_action('login_head', 'change_logo_login_head');

/*------------------------------------*\
   Minify HTML
\*------------------------------------*/

function minify_html()
{
    ob_start('html_minify');
}

function html_minify($buffer)
{
    $search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s');
    $replace = array('>', '<', '\\1');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

// if (!is_admin()) {
//     add_action('init', 'minify_html');
//     add_action('shutdown', 'flush_html_minify');
// }

function flush_html_minify()
{
    ob_end_flush();
}
