<?php
/**
 * Plugin Name: Movie Listings
 * Description: List movies and info
 * Version: 1.0
 * Author: Gentian Nuka
 **/

if(!defined('ABSPATH')){
	exit;
}


require_once(plugin_dir_path(__FILE__) . '/inc/movie-listings-scripts.php');

if(is_admin()) {
	require_once(plugin_dir_path(__FILE__) . '/inc/movie-listings-fields.php');
	require_once(plugin_dir_path(__FILE__) . '/inc/movie-listings-settings.php');

}


require_once(plugin_dir_path(__FILE__) . '/inc/movie-listings-cpt.php');
require_once(plugin_dir_path(__FILE__) . '/inc/movie-listings-shortcodes.php');