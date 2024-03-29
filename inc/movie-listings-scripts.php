<?php

if(is_admin()) {
	function ml_add_admin_scripts() {
		wp_enqueue_style('jquery_style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('ml_admin_style', plugins_url() . '/Movie-Listings-Plugin/css/style-admin.css');
		wp_enqueue_script('ml-script', plugins_url().'/Movie-Listings-Plugin/js/main.js', array('jquery') );
	}

	add_action('admin_init', 'ml_add_admin_scripts');
}

// Add scripts
function ml_add_scripts(){
	wp_enqueue_style('ml-main-style', plugins_url() . '/Movie-Listings-Plugin/css/style.css');
	wp_enqueue_script('ml-script', plugins_url() . '/Movie-Listings-Plugin/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'ml_add_scripts');