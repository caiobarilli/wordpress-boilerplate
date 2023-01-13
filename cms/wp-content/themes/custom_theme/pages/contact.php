<?php
/**
 * The template part for displaying content
 *
 * @package CustomTheme
 *
 * Template Name: Contact
 *
*/

get_header();

$title_contact = get_theme_mod('set_title_contact');
$title_form_contact = get_theme_mod('set_title_form_contact');
$shortcode_form_contact = get_theme_mod('set_shortcode_form_contact');

$customizer_repeater_social = get_theme_mod('customizer_repeater_social', json_encode(array()) );
$customizer_repeater_social_decoded = json_decode($customizer_repeater_social);

?>

<section id="page_contact">
    <header>
        <div class="container">
            <div class="header-content">
                <?php if($title_contact): ?>
                <h1>
                    <?php _e($title_contact , 'custom_theme'); ?>
                </h1>
                <?php else: ?>
                <h1>
                    <?php the_title(); ?>
                </h1>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="social-media">
        <div class="container">
            <?php if( count($customizer_repeater_social_decoded) >= 2) : ?>
            <ul>
                <?php foreach($customizer_repeater_social_decoded as $repeater_item): ?>
                    <?php


                        if($repeater_item->image_url): ?>
                        <li>
                            <a href="<?php _e($repeater_item->link, 'custom_theme'); ?>">

                                <img src="<?php echo $repeater_item->image_url; ?>" alt="Imagem ilustrativa" />

                                <strong>
                                    <?php _e($repeater_item->title, 'custom_theme'); ?>
                                </strong>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="form">
        <div class="container">
            <?php if($title_form_contact): ?>
            <h2>
                <?php _e($title_form_contact , 'custom_theme'); ?>
            </h2>
            <?php else: ?>
            <h2>
                <?php _e('Preencha os dados a baixo:', 'custom_theme'); ?>
            </h2>
            <?php endif; ?>

            <?php if($shortcode_form_contact): ?>
            <div class="contact-form">
                <?php echo do_shortcode($shortcode_form_contact); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>


</section>

<?php

get_footer();

?>