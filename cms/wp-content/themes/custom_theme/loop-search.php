<?php
/**
 *
 * The template part displaying search results content
 *
 * @package CustomTheme
 *
 */

global $wp_query;

?>

<div class="wrap-posts">
    <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $s = get_query_var('search_query');

        if(get_query_var('order'))
        {
            $order = get_query_var('order');
        } else {
            $order = 'DESC';
        }

        $args = array(
            'post_type' => 'post',
            's' => $s,
            'paged' =>  $paged,
            'order' => $order,
            'showposts' => 5);

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

set_query_var('search_query', $s);
set_query_var('order', $order);
get_template_part('template-parts/button', 'loadmore-search');

?>
