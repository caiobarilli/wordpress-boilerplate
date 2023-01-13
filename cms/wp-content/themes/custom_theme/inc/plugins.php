<?php
/**
 *
 * Include require plugins the TGM Plugin Activation.
 *
 * @package CustomTheme
 *
 */

require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

function custom_theme_require_plugins()
{
    $plugins = array(

        // array(
        //     'name'               => 'Show Current Template',
        //     'slug'               => 'show-current-template',
        //     'source'             => get_stylesheet_directory() . '/plugins/show-current-template.0.4.5.zip',
        //     'required'           => false, // this plugin is required
        //     'external_url'       => 'https://pt.wordpress.org/plugins/show-current-template/', // page of my plugin
        //     'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        // ),

        // array(
        //     'name'               => 'Show Hooks',
        //     'slug'               => 'show-hooks',
        //     'source'             => get_stylesheet_directory() . '/plugins/show-hooks.0.1.4.zip',
        //     'required'           => false, // this plugin is required
        //     'external_url'       => 'https://br.wordpress.org/plugins/show-hooks/', // page of my plugin
        //     'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        // ),

        array(
            'name'               => 'Advanced Custom Fields',
            'slug'               => 'advanced-custom-fields',
            'source'             => get_stylesheet_directory() . '/plugins/advanced-custom-fields.5.9.5.zip',
            'required'           => true, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/advanced-custom-fields/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Custom Post Type UI',
            'slug'               => 'custom-post-type-ui',
            'source'             => get_stylesheet_directory() . '/plugins/custom-post-type-ui.1.8.2.zip',
            'required'           => true, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/custom-post-type-ui/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Safe Svg',
            'slug'               => 'safe-svg',
            'source'             => get_stylesheet_directory() . '/plugins/safe-svg.1.9.9.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://pt.wordpress.org/plugins/safe-svg/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'source'             => get_stylesheet_directory() . '/plugins/contact-form-7.5.4.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/contact-form-7/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Flamingo',
            'slug'               => 'flamingo',
            'source'             => get_stylesheet_directory() . '/plugins/flamingo.2.2.1.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/flamingo/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Loco Translate',
            'slug'               => 'loco-translate',
            'source'             => get_stylesheet_directory() . '/plugins/loco-translate.2.5.2.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://br.wordpress.org/plugins/loco-translate/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

        array(
            'name'               => 'Admin Menu Editor',
            'slug'               => 'admin-menu-editor',
            'source'             => get_stylesheet_directory() . '/plugins/admin-menu-editor.1.9.9.zip',
            'required'           => false, // this plugin is required
            'external_url'       => 'https://wordpress.org/plugins/admin-menu-editor/', // page of my plugin
            'force_deactivation' => true, // deactivate this plugin when the user switches to another theme
        ),

    );

    $config = array( /* The array to configure TGM Plugin Activation */ );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'custom_theme_require_plugins');
