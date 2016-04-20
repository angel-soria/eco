<?php
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_script( 'jquery-22', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js' );
	wp_enqueue_script( 'jquery-22');
	wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_script( 'bs-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' );
	wp_enqueue_script( 'bs-js'); 
	wp_register_style( 'global', get_template_directory_uri().'/eco-style/stylesheets/global.css' );
	wp_enqueue_style( 'global' );
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );