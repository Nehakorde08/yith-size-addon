<?php
// Settings for managing size-based price rules and hidden options.
if (!defined('ABSPATH')) {
    exit;
}

// Function to add settings in WooCommerce product data
function yith_size_addon_add_custom_fields() {
    global $post;

    echo '<div class="options_group">';
    
    woocommerce_wp_text_input([
        'id' => '_size_threshold',
        'label' => __('Size Threshold', 'yith-size-addon'),
        'description' => __('Set the size threshold for price increase.', 'yith-size-addon'),
        'desc_tip' => true,
        'type' => 'number'
    ]);

    echo '</div>';
}
add_action('woocommerce_product_options_general_product_data', 'yith_size_addon_add_custom_fields');

// Save custom fields
function yith_size_addon_save_custom_fields($post_id) {
    $size_threshold = isset($_POST['_size_threshold']) ? sanitize_text_field($_POST['_size_threshold']) : '';
    update_post_meta($post_id, '_size_threshold', $size_threshold);
}
add_action('woocommerce_process_product_meta', 'yith_size_addon_save_custom_fields');
