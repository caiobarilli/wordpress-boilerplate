<?php

/**
 *
 * The template for displaying search results pages
 *
 * @package CustomTheme
 *
 */

get_header();

$order = $wp_query->query['order'];

?>

<section id="page_search">
    <header>
        <div class="container">
            <div class="header-content">
                <?php get_template_part('searchform'); ?>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="search-filter">
            <div class="filter-content">
                <h3>
                    <?php echo sprintf(__('Busca por: <strong>%s</strong>', 'custom_theme'), $s); ?>
                </h3>

                <div class="form-order">
                    <p>
                        <strong>
                            <?php _e('Ordenar por: ', 'custom_theme'); ?>
                        </strong>
                    </p>
                    <form id="filter_sort" method="get" action="<?php echo home_url(); ?>">
                        <input type="hidden" type="search" name="s" value="<?php echo $s; ?>" />
                        <select name="order">
                            <?php

                                if($order)
                                {
                                    if($order == 'desc')
                                    {
                                        echo '<option value="DESC" selected>Recentes</option>';
                                        echo '<option value="ASC">Antigos</option>';

                                    } else {

                                        echo '<option value="DESC">Recentes</option>';
                                        echo '<option value="ASC" selected>Antigos</option>';
                                    }

                                } else {
                                    echo '<option value="DESC" selected>Recentes</option>';
                                    echo '<option value="ASC">Antigos</option>';

                                }

                            ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <?php

            if($order): set_query_var('order', $order); endif;

            set_query_var('search_query', $s);
            get_template_part('loop', 'search');

        ?>
    </div>

</section>

<?php

get_footer();

?>
