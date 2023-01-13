<?php
/**
 *
 * The template part for displaying button for loadmore content
 *
 * @package CustomTheme
 *
 */
?>

<?php if ($wp_query->max_num_pages > 1) : ?>

<form id="loadmore" class=" mt-5 d-flex justify-content-center">
    <input type="button" total="<?php echo $wp_query->max_num_pages ?>" class="btn btn-loadmore" value="Carregar Mais Notícias" />
</form>

<?php endif; ?>
