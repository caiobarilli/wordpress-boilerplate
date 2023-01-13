<?php
/**
 *
 * wp_custom_theme Theme Customizer
 *
 * @package CustomTheme
 *
*/

require_once get_stylesheet_directory() . '/inc/customizer-repeater/functions.php';

function custom_theme_customizer($wp_customize)
{
    require get_template_directory() . '/inc/customizer/contact.php';
}

add_action('customize_register', 'custom_theme_customizer'); // Add custom menu in wp customizer