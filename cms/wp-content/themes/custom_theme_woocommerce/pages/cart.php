<?php

/**
 * The template part for displaying cart
 *
 * @package CustomTheme
 *
 * Template Name: Cart
 *
 */

get_header();

?>

<div class="container">
    <div class="cart_wrapper">
        <div class="full-cart">
            <?php echo do_shortcode('[woocommerce_cart]'); ?>
        </div>
    </div>
</div>

<?php

get_footer();

?>
