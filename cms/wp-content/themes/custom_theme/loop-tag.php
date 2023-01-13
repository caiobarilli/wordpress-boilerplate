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
        $tag = get_query_var('tag');
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'order' => 'DESC',
            'tag' => $tag,
            'paged' =>  $paged);
        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                get_template_part('template-parts/content', 'search');
            endwhile;
            wp_reset_postdata();
        endif;

    ?>
</div>

<?php

set_query_var('tag', $tag);
get_template_part('template-parts/button', 'loadmore-tag');

?>