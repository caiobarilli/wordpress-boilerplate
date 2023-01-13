<?php
/**
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CustomTheme
 *
*/

get_header();

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
