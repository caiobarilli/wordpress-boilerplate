/**
 * Import Styles
 */
import './styles'

/**
 * Import Lazyload Scripts
 */
import './lazyload'

/**
 * Import load more Scripts
 */
import './loadmore'
import './loadmore-search'
import './loadmore-category'
import './loadmore-tag'

/**
 * Import Search Scripts
 */
import './search'

/**
 * Import Cookies Scripts
 */
import './cookies'

/**
 * Jquery
 */
$.when($.ready).then(function () {

    /**
     * Remove Price for not logged in users
     */
    let elementosPrice = document.querySelectorAll('.Custom_Theme_product_infos .price');
    if (elementosPrice) {
        elementosPrice.forEach(function (elemento) {
            elemento.remove();
        });

    }
});
