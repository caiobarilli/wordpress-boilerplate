<?php
/**
 *
 * The template part for displaying button for loadmore content
 *
 * @package CustomTheme
 *
*/

$s = get_query_var('search_query');
$order = get_query_var('order');

?>

<?php if ($wp_query->max_num_pages > 1) : ?>

<form id="loadmore-search" class="mt-5 d-flex justify-content-center">
    <input type="button" order="<?php echo $order; ?>" s="<?php echo $s; ?>" total="<?php echo $wp_query->max_num_pages ?>" class="btn btn-loadmore-search" value="Carregar Mais Notícias" />
</form>

<?php endif; ?>
