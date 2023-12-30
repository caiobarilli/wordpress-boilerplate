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
