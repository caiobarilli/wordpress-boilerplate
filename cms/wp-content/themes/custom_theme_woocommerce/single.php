<?php

/**
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CustomTheme
 *
 */

get_header();

$id = get_the_ID();
$categories = get_the_category();
$tags = get_the_tags();
// $fonte = get_field('fonte');

?>

<section id="page_single_post">
    <header>
        <div class="header-content">
            <?php

            if (has_post_thumbnail()) {
                the_post_thumbnail('post-single', array('class' => 'post-img-header'));
            } else {
                echo '<img class="sticky-post-cover" src="https://dummyimage.com/1920x300" alt="..." />';
            }

            ?>
        </div>
    </header>

    <section class="single-post">
        <div class="container">
            <?php

            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'single');
                endwhile;
            endif;

            ?>
        </div>
    </section>

    <section class="infos">
        <div class="container">
            <div class="wrap-infos">
                <div class="categories-infos">
                    <?php if (!empty($categories)) : ?>
                        <p>
                            <strong>
                                <?php _e('Categorias:', 'custom_theme_woocommerce'); ?>
                            </strong>
                        </p>
                    <?php

                        echo '<ul>';
                        foreach ($categories as $category) :
                            printf(
                                '<li><a href="%1$s">%2$s</a></li>',
                                esc_url(get_category_link($category->term_id)),
                                esc_html($category->name)
                            );
                        endforeach;
                        echo '</ul>';
                    endif;

                    ?>
                </div>

                <div class="fontes">
                    <p>
                        <?php if (!empty($fonte)) : ?>
                            <strong>
                                Fonte:
                            </strong>
                        <?php echo $fonte;
                        endif; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="tags-infos">
                <?php if (!empty($tags)) : ?>
                    <p>
                        <strong>
                            <?php _e('Tags:', 'custom_theme_woocommerce'); ?>
                        </strong>
                    </p>

                <?php

                    $count = 0;
                    $qtdTags = count($tags);
                    echo '<ul>';
                    foreach ($tags as $tag) :
                        $count++;
                        if ($count === $qtdTags) {
                            printf(
                                '<li><a href="%1$s">%2$s</a>.</li>',
                                esc_url(get_category_link($tag->term_id)),
                                esc_html($tag->name)
                            );
                        } else {
                            printf(
                                '<li><a href="%1$s">%2$s</a>,</li>',
                                esc_url(get_category_link($tag->term_id)),
                                esc_html($tag->name)
                            );
                        }
                    endforeach;
                    echo '</ul>';
                endif;

                ?>
            </div>
        </div>
    </section>

    <section class="related-posts">
        <div class="container">
            <h2>
                <?php _e('Leia também', 'custom_theme_woocommerce'); ?>
            </h2>

            <div class="wrap-related">
                <?php

                set_query_var('post_id', $id);
                set_query_var('categories', $categories);
                get_template_part('loop-related');

                ?>
            </div>
        </div>
    </section>
</section>

<?php

get_footer();

?>
