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

?>

<section id="page_blank">
    <div class="container">
        <div class="page-content">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</section>

<?php

get_footer();

?>
