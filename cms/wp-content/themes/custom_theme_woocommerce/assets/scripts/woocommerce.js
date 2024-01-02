const { set } = require("immutable");

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

    /**
     * Add cart items to cart component
     */
    $(document).on('click', '.ajax_add_to_cart', function(e) {
        e.preventDefault();
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: cart_params.ajax_url,
                data: {
                    action: 'get_cart_items',
                },
                success: function(response) {
                    $('#carrinho-itens').html(response);
                },
            });
        }, 500);
    });
});
