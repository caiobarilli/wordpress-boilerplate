<?php


/**
 * Register Header Menu
 * @return void
 */
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

/**
 * Register Custom Menu
 * @hooked init
 * @return void
 */
function custom_theme_woocommerce_menu()
{
    register_nav_menus(array(
        'header-menu'  => __('Menu Principal', 'custom_theme_woocommerce'), // Main Navigation
    ));
}
add_action('init', 'custom_theme_woocommerce_menu');
