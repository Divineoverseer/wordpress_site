<?php
/**
 * Plugin Name: Facebook Page Plugin
 * Description: Shows a Facebook page plugin (Likebox)
 * Version: 1.0
 * Author: Dmytro Maltsev
 *
 **/

//Exit if Accessed Directly
if(!defined('ABSPATH')){
    exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/facebook-page-plugin-scripts.php');

//Load Content
require_once(plugin_dir_path(__FILE__).'/includes/facebook-page-plugin-class.php');

// Register Widget
function register_facebook_page_plugin(){
    register_widget('Facebook_Page_Plugin_Widget');
}

add_action('widgets_init', 'register_facebook_page_plugin');