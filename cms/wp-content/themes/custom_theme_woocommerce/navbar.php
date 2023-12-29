<?php

/**
 *
 * The template part for navigation
 *
 * @package CustomTheme
 *
 */
?>

<nav id="main-nav" class="navbar navbar-expand-lg">
    <div class="wrap-content">
        <div class="navbar-brand">
            <?php
            if (has_custom_logo() && function_exists('the_custom_logo')) {
                the_custom_logo();
            } else {
                echo '<a href="' . home_url() . '">' . '<img src="' . get_theme_file_uri('assets/img/Logo.svg') . '" class="CustomTheme-logo" width="28" height="28" alt="Logo CustomTheme"/>' . '</a>';
            }
            ?>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" data-bs-popper="static" aria-label="Toggle navigation">
            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <?php main_nav(); ?>
    </div>
</nav>
