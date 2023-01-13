<?php
/**
 *
 * The template part for displaying button for loadmore content
 *
 * @package CustomTheme
 *
*/

$category_id = get_query_var('category_id');

?>

<?php if ($wp_query->max_num_pages > 1) : ?>

<form id="loadmore-category" class="mt-5 d-flex justify-content-center">
    <input type="button" category="<?php echo $category_id; ?>" total="<?php echo $wp_query->max_num_pages ?>" class="btn btn-loadmore-category" value="Carregar Mais Notícias" />
</form>

<?php endif; ?>
