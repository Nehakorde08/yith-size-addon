<?php
/**
 * Plugin Name: Custom Plugin of YITH Size-Based Price & Option Control
 * Description: Extends YITH WooCommerce Product Add-Ons to dynamically adjust prices and hide options based on size input.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include necessary files.
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/ajax-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/conditions.php';

class YITH_Size_Based_Addon {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function enqueue_scripts() {
        if (is_product()) {
            wp_enqueue_script('yith-size-addon', plugin_dir_url(__FILE__) . 'assets/js/custom.js', ['jquery'], null, true);
            wp_localize_script('yith-size-addon', 'yithSizeAjax', ['ajax_url' => admin_url('admin-ajax.php')]);
        }
    }
}

new YITH_Size_Based_Addon();
