<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CustomTheme
 */

get_header();

woocommerce_content();

do_shortcode('[woocommerce_cart]');
?>

<section id="page_blog">
    <header>
        <div class="container">
            <div class="header-content">
                <?php get_template_part('searchform'); ?>
            </div>
        </div>
    </header>

    <div class="sticky-post">
        <div class="container">
            <?php get_template_part('loop-sticky-post'); ?>
        </div>
    </div>

    <div id="loop-posts">
        <div class="container">
            <?php get_template_part('loop'); ?>
        </div>
    </div>
</section>

<?php

get_footer();

?>
