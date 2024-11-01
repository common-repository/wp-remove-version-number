<?php
/**
 * Plugin Name: WP Remove Version Number
 * Plugin URI: https://eastsidecode.com
 * Description: This plugin removes the version number from WordPress scripts and styles.
 * Version: 1.1
 * Author: EastSide Code
 * Author URI: http://eastsidecode.com
 * License: GPL12
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from the feed
add_filter('the_generator', '__return_empty_string');

// remove version numbers from js and css
function escode_remove_version_scripts_styles($src) {

    // only remove version numbers that begin with ver=
	if (strpos($src,'ver=') !== false) {
		$src = remove_query_arg('ver', $src);
	}
    return $src;
    
}
add_filter('style_loader_src', 'escode_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'escode_remove_version_scripts_styles', 9999);