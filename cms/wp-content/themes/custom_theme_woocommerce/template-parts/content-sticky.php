<?php

/**
 *
 * The template part for displaying loop sticky post content
 *
 * @package CustomTheme
 *
 */
?>

<a class="sticky-post-content" href="<?php the_permalink(); ?>">
    <div class="sticky-post-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-sticky', array('class' => 'sticky-post-cover')); ?>
        <?php else : ?>
            <img class="sticky-post-cover" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="https://dummyimage.com/1020x350" alt="..." />
        <?php endif; ?>
    </div>

    <div class="post-content">
        <h2>
            <?php the_title(); ?>
        </h2>

        <p class="post-date">
            <?php echo '• ' . wp_date(get_option('date_format'), get_post_timestamp()); ?>
        </p>

        <div class="post-excerpt">
            <?php post_excerpt(45); ?>
        </div>

        <p class="read-more">
            <?php _e('Leia mais', 'custom_theme'); ?>
            <svg viewBox="0 0 30 25" height="32" width="32" focusable="false" role="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="m13.172 12-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"></path>
            </svg>
        </p>
    </div>
</a>
