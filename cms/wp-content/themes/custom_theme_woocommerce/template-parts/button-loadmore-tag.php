<?php
/**
 *
 * The template part for displaying button for loadmore content
 *
 * @package CustomTheme
 *
*/

$tag = get_query_var('tag');

?>

<?php if ($wp_query->max_num_pages > 1) : ?>

<form id="loadmore-tags" class="mt-5 d-flex justify-content-center">
    <input type="button" tags="<?php echo $tag ; ?>" total="<?php echo $wp_query->max_num_pages ?>" class="btn btn-loadmore-tags" value="Carregar Mais Notícias" />
</form>

<?php endif; ?>
