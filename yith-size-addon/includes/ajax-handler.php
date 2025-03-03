<?php
// Handles AJAX for updating price based on size input.
if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_yith_size_update_price', 'yith_size_update_price');
add_action('wp_ajax_nopriv_yith_size_update_price', 'yith_size_update_price');

function yith_size_update_price() {
    $size = isset($_POST['size']) ? floatval($_POST['size']) : 0;
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    
    $threshold = get_post_meta($product_id, '_size_threshold', true);
    $new_price = get_post_meta($product_id, '_price', true);

    if ($size > $threshold) {
        $new_price *= 1.2; // Increase price by 20% for example
    } else {
        $new_price *= 1.1; // Increase price by 10%
    }

    wp_send_json(['new_price' => $new_price]);
}
