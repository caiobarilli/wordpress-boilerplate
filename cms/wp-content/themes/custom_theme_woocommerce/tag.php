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

// Get the current tag
$tag = single_tag_title('', false);

?>

<section id="page_tags">
    <header>
        <div class="container">
            <div class="header-content">
                <h1>
                    <?php _e('Tag: ', 'custom_theme_woocommerce'); ?>
                    <strong>
                        <?php single_tag_title(); ?>
                    </strong>
                </h1>
            </div>
        </div>
    </header>

    <div class="tag-content">
        <div class="container">
            <div class="row flex-row">
                <?php set_query_var('tag', $tag); ?>
                <?php get_template_part('loop', 'tag'); ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();

?>
