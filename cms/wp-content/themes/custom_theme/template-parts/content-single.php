<?php
/**
 *
 * The template part for displaying single content
 *
 * @package CustomTheme
 *
 */

?>

<article class="post">
    <h2>
        <?php the_title(); ?>
    </h2>

    <p class="post-date">
        <?php echo '• ' . wp_date( get_option( 'date_format' ), get_post_timestamp() ); ?>
    </p>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
</article>
