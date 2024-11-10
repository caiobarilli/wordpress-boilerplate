<?php
/**
 *
 * wp_custom_theme Theme Customizer
 *
 * @package CustomThemeHeadless
 *
*/

function custom_theme_customizer($wp_customize)
{
    require get_template_directory() . '/inc/customizer/footer.php';
}

add_action('customize_register', 'custom_theme_customizer'); // Add custom menu in wp customizer