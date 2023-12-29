<?php

/**
 *
 * The template part for displaying loop sticky post content
 *
 * @package CustomTheme
 *
 */
?>

<a class="post-search" href="<?php the_permalink(); ?>">
    <div class="post-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-sticky', array('class' => 'sticky-post-search')); ?>
        <?php else : ?>
            <img class="search-post-cover" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="https://dummyimage.com/200x150" alt="..." />
        <?php endif; ?>
    </div>

    <div class="post-content">
        <h2>
            <?php the_title(); ?>
        </h2>

        <p class="post-date">
            <?php

            $post_date = get_the_date('d\\/m\\/Y');
            echo '• ';
            echo $post_date;

            ?>
        </p>
    </div>
</a>
