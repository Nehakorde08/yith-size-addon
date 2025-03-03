jQuery(document).ready(function($) {
    $('#size-input').on('input', function() {
        var size = $(this).val();
        var product_id = $('input[name=product_id]').val();

        $.post(yithSizeAjax.ajax_url, {
            action: 'yith_size_update_price',
            size: size,
            product_id: product_id
        }, function(response) {
            $('.woocommerce-Price-amount').text(response.new_price);
        });
    });
});
