<?php
/**
 *
 * Include require plugins the TGM Plugin Activation.
 *
 * @package CustomThemeHeadless
 *
 */

require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

function custom_theme_require_plugins()
{
    $plugins = array(
        array(
            'name'               => 'WPGraphql',
            'slug'               => 'wp-graphql',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql.1.13.8.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/wp-graphql/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'WPGraphql ACF',
            'slug'               => 'wp-graphql-acf',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-acf-master.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://github.com/wp-graphql/wp-graphql-acf', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'WPGraphql CORS',
            'slug'               => 'wp-graphql-cors',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-cors-master.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://github.com/wp-graphql/wp-graphql-acf', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'WPGraphql JWT Authentication',
            'slug'               => 'wp-graphql-jwt-authentication',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-jwt-authentication-develop.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://github.com/wp-graphql/wp-graphql-acf', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),
        
        array(
            'name'               => 'Advanced Custom Fields',
            'slug'               => 'advanced-custom-fields',
            'source'             => get_stylesheet_directory() . '/plugins/advanced-custom-fields.6.0.7.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/advanced-custom-fields/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Custom Post Type UI',
            'slug'               => 'custom-post-type-ui',
            'source'             => get_stylesheet_directory() . '/plugins/custom-post-type-ui.1.13.4.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/custom-post-type-ui/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Classic Editor',
            'slug'               => 'classic-editor',
            'source'             => get_stylesheet_directory() . '/plugins/classic-editor.1.6.2.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/classic-editor', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Safe SVG',
            'slug'               => 'safe-svg',
            'source'             => get_stylesheet_directory() . '/plugins/safe-svg.2.1.1.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/safe-svg/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),
    );

    $config = array( /* The array to configure TGM Plugin Activation */ );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'custom_theme_require_plugins');
