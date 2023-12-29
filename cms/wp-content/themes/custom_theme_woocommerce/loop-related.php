<?php
/**
 *
 * The template part displaying related posts
 *
 * @package CustomTheme
 *
 */

$categories = get_query_var('categories');
$id = get_query_var('post_id');

$terms = get_the_terms( $id, 'category' );
$term_list = wp_list_pluck( $terms, 'slug' );

$related_args = array(
	'post_type' => 'post',
    'showposts' => 3,
	'post_status' => 'publish',
	'post__not_in' => array( $id ),
	'orderby' => 'rand',
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $term_list
		)
	),
    'ignore_sticky_posts' => 1
);

$query = new WP_Query($related_args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('template-parts/content', 'related');
    endwhile;
    wp_reset_postdata();
endif;

?>