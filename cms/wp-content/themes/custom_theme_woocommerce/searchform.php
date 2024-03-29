<?php

/**
 *
 * The template for displaying search results pages
 *
 * @package CustomTheme
 *
 */

?>

<form method="get" action="<?php echo home_url(); ?>" id="search-blog">
    <div class="input-group">
        <input class="form-control" type="text" type="search" name="s" placeholder="<?php _e('buscar notícias', 'custom_theme_woocommerce'); ?>" aria-label="<?php _e('busca notícias', 'custom_theme_woocommerce'); ?>" aria-describedby="button-search" />
        <button class="btn btn-search" id="button-search" type="submit" aria-label="buscar produto" title="buscar produto">
            <svg fill="#FFF" width="30" height="30" version="1.1" viewBox="0 0 64 64">
                <path d="M62.1,57L44.6,42.8c3.2-4.2,5-9.3,5-14.7c0-6.5-2.5-12.5-7.1-17.1v0c-9.4-9.4-24.7-9.4-34.2,0C3.8,15.5,1.3,21.6,1.3,28
                    c0,6.5,2.5,12.5,7.1,17.1c4.7,4.7,10.9,7.1,17.1,7.1c6.1,0,12.1-2.3,16.8-6.8l17.7,14.3c0.3,0.3,0.7,0.4,1.1,0.4
                    c0.5,0,1-0.2,1.4-0.6C63,58.7,62.9,57.6,62.1,57z M10.8,42.7C6.9,38.8,4.8,33.6,4.8,28s2.1-10.7,6.1-14.6c4-4,9.3-6,14.6-6
                    c5.3,0,10.6,2,14.6,6c3.9,3.9,6.1,9.1,6.1,14.6S43.9,38.8,40,42.7C32,50.7,18.9,50.7,10.8,42.7z" />
            </svg>
        </button>
    </div>
</form>
