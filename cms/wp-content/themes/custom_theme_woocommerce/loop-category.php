<?php
/**
 *
 * The template part displaying category for blog posts
 *
 * @package CustomTheme
 *
*/

global $wp_query;

?>

<div class="wrap-posts">
    <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $category_id = get_query_var('category_id');
        $args = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'category__in' => $category_id,
            'paged' =>  $paged,
            'showposts' => 4);

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts() && $category_id) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content', 'search');
            endwhile;
            wp_reset_postdata();
        endif;

    ?>
</div>

<?php

set_query_var('category_id', $category_id);
get_template_part('template-parts/button', 'loadmore-category');

?>
