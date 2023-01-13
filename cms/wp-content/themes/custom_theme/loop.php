<?php
/**
 *
 * The template part displaying blog posts
 *
 * @package CustomTheme
 *
 */

global $wp_query;

?>

<div class="wrap-posts">
    <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $sticky = get_option('sticky_posts');

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'post__not_in' => $sticky,
            'ignore_sticky_posts' => 1,
            'paged' =>  $paged);

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content');
            endwhile;
            wp_reset_postdata();
        endif;

    ?>
</div>

<?php

get_template_part('template-parts/button', 'loadmore');

?>
