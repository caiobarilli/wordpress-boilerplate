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

<div class="cart_wrapper">
    <a href="<?php echo wc_get_cart_url(); ?>" class="cart-contents">
        <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
        <?php if ($cart_count <= 0) : ?>
            <img src="<?php echo get_theme_file_uri('assets/img/cart.svg'); ?>" alt="Cart" />
        <?php else : ?>
            <img src="<?php echo get_theme_file_uri('assets/img/cart-full.svg'); ?>" alt="Cart" />
        <?php endif; ?>

        <span class="cart-contents-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>

    <div class="full-cart">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
</div>

<?php
get_footer();
?>
