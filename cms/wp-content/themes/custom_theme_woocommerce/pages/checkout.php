<?php

/**
 * The template part for displaying checkout
 *
 * @package CustomTheme
 *
 * Template Name: Checkout
 *
 */

get_header();
?>

<div class="checkout_wrapper">
    <?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>

<?php
get_footer();
?>
