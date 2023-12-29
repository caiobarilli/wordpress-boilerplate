<?php

/**
 * Load more posts
 * @return void
 */
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
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');

/**
 * Load more posts on search page
 * @return void
 */
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
add_action('wp_ajax_loadmore_search', 'loadmore_search_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_search', 'loadmore_search_ajax_handler');

/**
 * Load more posts on category page
 * @return void
 */
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
add_action('wp_ajax_loadmore_category', 'loadmore_category_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_category', 'loadmore_category_ajax_handler');

/**
 * Load more posts on tag page
 * @return void
 */
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
add_action('wp_ajax_loadmore_tags', 'loadmore_tags_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_tags', 'loadmore_tags_ajax_handler');
