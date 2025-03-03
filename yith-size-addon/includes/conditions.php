<?php
// Defines logic for hiding options based on size.
if (!defined('ABSPATH')) {
    exit;
}

function yith_size_addon_check_conditions($product_id, $size) {
    $threshold = get_post_meta($product_id, '_size_threshold', true);
    return $size > $threshold ? 'hidden' : 'visible';
}
