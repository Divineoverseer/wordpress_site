<?php
/**
 * Plugin Name: Youtube Video Gallery
 * Description: Add a Youtube video gallery to your website
 * Version: 1.0
 * Author: Dmytro Maltsev
 *
 **/

//Exit if Accessed Directly
if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-scripts.php');

// Load Shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-shortcodes.php');

// Check if admin
if(is_admin()){
    // Load Custom Post Type
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-cpt.php');

    // Load Settings
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-settings.php');

    // Load Custom Fields
    require_once(plugin_dir_path(__FILE__) . '/includes/youtube-vid-gallery-fields.php');
}