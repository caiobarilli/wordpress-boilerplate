<?php
/**
 * The template part for displaying content
 *
 * @package CustomTheme
 *
 * Template Name: Product
 *
*/

get_header();

// Categories
$categories = array();
$args = array('post_type' => 'produto', 'posts_per_page' => -1, 'order' => 'ASC');
$wp_query = new WP_Query($args);

if($wp_query->have_posts()):
    while($wp_query->have_posts()) : $wp_query->the_post();
        $terms = get_the_terms($post->ID, 'categoria_produto');
        if($terms):
            $terms = array_reverse($terms);
            foreach($terms as $term):
                $categories[] = array("name" => $term->name, "id" => $term->term_id );
            endforeach;
        endif;
    endwhile;
endif;

usort($categories, function($a, $b) {
    return $a["id"] <=> $b["id"];
});

$categories = array_unique($categories, SORT_REGULAR);

?>

<section id="page_products">
    <header>
        <div class="container">
            <div class="header-content">
                <h1>
                    <?php _e(' Produtos ', 'custom_theme'); ?>
                </h1>
            </div>
        </div>
    </header>

    <div class="products">
        <div class="container">
            <div class="content-products">
                <?php

                    if($categories): foreach($categories as $cat):
                        _e($cat["name"], 'custom_theme');
                    endforeach; endif;


                    if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();

                    $terms = get_the_terms($post->ID, 'categoria_produto');

                ?>

                    <a href="<?php the_permalink(); ?>" class="product">
                        <?php the_post_thumbnail('post-product', array( 'class' => 'thumbnail-product' )); ?>

                        <p>
                            <strong>
                                <?php _e(get_the_title(), 'custom_theme'); ?>
                            </strong>
                        </p>

                        <?php

                            if($terms): foreach($terms as $term):

                                _e($term->name . ', ', 'custom_theme');

                            endforeach; endif;

                        ?>

                    </a>

                <?php endwhile; wp_reset_query(); endif; ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();

?>
