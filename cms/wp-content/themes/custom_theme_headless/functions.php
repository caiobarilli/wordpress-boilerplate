<?php

/**
 *
 * App functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CustomThemeHeadless
 *
*/

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

require_once get_stylesheet_directory() . '/inc/customizer.php';
require_once get_stylesheet_directory() . '/inc/plugins.php';

/*------------------------------------*\
    Theme
\*------------------------------------*/

define('THEME_VERSION', wp_get_theme()->get('Version'));

// Theme Support
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

// Register Navigation
function custom_theme_menu()
{
    register_nav_menus(array(
        'main-menu'  => __('Main', 'custom_theme_headless'), // Main Navigation
        'social-menu'  => __('Social', 'custom_theme_headless') // Social Navigation
    ));
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// Wp Customizer Remove Sections
function customizer_removes($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_panel('widgets');
}

/*------------------------------------*\
    Actions
\*------------------------------------*/

add_action('init', 'custom_theme_menu'); // Add site menu
add_action('customize_register', 'customizer_removes', 50); // Remove static_front_page from Wp Customizer

/*------------------------------------*\
    Graphql
\*------------------------------------*/

add_action( 'graphql_register_types', function() { 
    register_graphql_object_type( 'ThemeMod', [
        'description' => 'The theme_mod object.',
        'fields' => [
            'page_title' => [
                'type' => 'String',
                'description' => 'The value of the page title from wordpress.',
                'resolve' => function( $source, $args, $context, $info ) {
                    return get_bloginfo('name');
                },
            ],
            'page_description' => [
                'type' => 'String',
                'description' => 'The value of the page description from wordpress.',
                'resolve' => function( $source, $args, $context, $info ) {
                    return get_bloginfo('description');
                },
            ],
            'logo_url' => [
                'type' => 'String',
                'description' => 'The value of the custom logo in customizer option.',
                'resolve' => function( $source, $args, $context, $info ) {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    return $image[0];
                },
            ]
        ],
    ]);

    register_graphql_field( 'RootQuery', 'theme_mod', [
        'type' => 'ThemeMod',
        'description' => 'The theme_mod object.',
        'resolve' => function( $source, $args, $context, $info ) {
            return (object) [];
        },
    ]);
});

// add_filter( 'graphql_jwt_auth_secret_key', function() {
//     return '-@6|qtYqxZPJ#zj~;ulM3J~q.mSFMN7XzY,I#CL+.o H+(pS%uvIA1=&:*1F7u%E';
// });

// add_filter('graphql_jwt_auth_expire', function() {
//     return 60 * 60 * 24 * 30; // 1 mês (30 dias)
// });

// define('GRAPHQL_DEBUG', true);
