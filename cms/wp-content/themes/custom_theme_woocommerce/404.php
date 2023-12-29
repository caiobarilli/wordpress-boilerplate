<?php

/**
 *
 * The template for displaying 404 pages (not found)
 *
 * @package CustomTheme
 *
 */

get_header();

?>

<section id="page_404">
    <header></header>

    <section class="content">
        <div class="container">
            <div class="page_content">
                <h1>
                    <?php _e('Página não encontrada!', 'custom_theme_woocommerce'); ?>
                </h1>

                <p>
                    <?php _e('Esta página não existe ou ela pode ter sido removida.', 'custom_theme_woocommerce'); ?>
                </p>

                <a href="javascript:history.go(-1)" alt="voltar">
                    <?php _e('Voltar', 'custom_theme_woocommerce'); ?>
                </a>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>
