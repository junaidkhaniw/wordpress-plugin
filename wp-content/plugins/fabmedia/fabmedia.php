<?php

/**
 * Plugin Name:       Fab Media
 * Plugin URI:        https://fabmedia.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Junaid Khan
 * Author URI:        https://fabmedia.com/
 * Text Domain:       fabmedia
 * Domain Path:       /languages
 */

if (!defined( 'WPINC' )) {
    die();
}

if (!defined( 'FM_PLUGIN_VERSION' )) {
    define('FM_PLUGIN_VERSION', '1.0.0');
}

if (!defined( 'FM_PLUGIN_DIR_PATH' )) {
    define('FM_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

if (!defined( 'FM_PLUGIN_DIR_URL' )) {
    define('FM_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
}

if (!function_exists( 'fm_plugin_scripts' )) {                             
    function fm_plugin_scripts() {                                         
        wp_enqueue_style('fm-css', FM_PLUGIN_DIR_URL . 'assets/css/style.css', '', FM_PLUGIN_VERSION);
        wp_enqueue_script('fm-js', FM_PLUGIN_DIR_URL . 'assets/js/script.js', '', FM_PLUGIN_VERSION, true); 
    }                                                                      
                                                                           
    add_action('init', 'fm_plugin_scripts');                 
                                                                           
}

include_once FM_PLUGIN_DIR_PATH . "inc/functions.php";

function fm_custom_menu() {
    add_menu_page(
        'Fab Media',                // page_title
        'Fab Media',                // menu_title
        'manage_options',           // capability
        'fabmedia',                 // menu_slug - parent slug
        'fm_all_pages_function',    // function 
        'dashicons-thumbs-up',      // icon_url 
        30                          // position 
    );

    add_submenu_page(
        'fabmedia',                  // parent_slug
        'All Pages',                 // page_title
        'All Pages',                 // menu_title
        'manage_options',            // capability
        'fabmedia',                 // menu_slug
        'fm_all_pages_function',     // function
    );

    add_submenu_page(
        'fabmedia',                  // parent_slug
        'Add New',                   // page_title
        'Add New',                   // menu_title
        'manage_options',            // capability
        'add-new',                  // menu_slug
        'fm_add_new_function',       // function
    );

    
}

add_action( 'admin_menu', 'fm_custom_menu' );

function fm_all_pages_function() {
    
    include_once FM_PLUGIN_DIR_PATH . "inc/views/all-pages.php";

}

function fm_add_new_function() {
    
    include_once FM_PLUGIN_DIR_PATH . "inc/views/add-new.php";

}


//////
// Create Table on Plugin Activation
//////

function fm_custom_plugin_table() {
    
    include_once FM_PLUGIN_DIR_PATH . "inc/fm_custom_plugin_table.php";

}

register_activation_hook(__FILE__, 'fm_custom_plugin_table');

//////
// Delete Table on Plugin Delete
//////

function fm_custom_plugin_table_deactivate() {
    
    include_once FM_PLUGIN_DIR_PATH . "inc/fm_custom_plugin_table_deactivate.php";

}

register_uninstall_hook(__FILE__, 'fm_custom_plugin_table_deactivate');


function fm_custom_shortcode() {
    
    echo "Hello this is Short Code";

}

add_shortcode('fm_shortcode', 'fm_all_pages_function');