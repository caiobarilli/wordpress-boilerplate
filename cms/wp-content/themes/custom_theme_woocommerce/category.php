<?php

/**
 *
 * The template for displaying category page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CustomTheme
 *
 */

get_header();

$category_id = get_cat_ID(single_cat_title("", false));

?>

<section id="page_category">
    <header>
        <div class="container">
            <div class="header-content">
                <h1>
                    <?php _e('Category: ', 'custom_theme_woocommerce'); ?>
                    <strong>
                        <?php single_cat_title(); ?>
                    </strong>
                </h1>
            </div>
        </div>
    </header>

    <div class="category-content">
        <div class="container">
            <?php
            set_query_var('category_id', $category_id);
            get_template_part('loop', 'category');
            ?>
        </div>
    </div>
</section>

<?php



get_footer();

?>
