<?php
/**
 *
 * The template part displaying blog posts
 *
 * @package CustomTheme
 *
 */

$sticky = get_option('sticky_posts');
$args = array( 'post__in' => $sticky, 'showposts' => 1, 'ignore_sticky_posts' => 1 );
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/content', 'sticky');
    endwhile;
    wp_reset_postdata();
endif;

?>