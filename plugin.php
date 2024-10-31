<?php
/*
Plugin Name: Tim Hortons Rim Diary
Plugin URI: http://portfolio.planetjon.ca/projects/rim-diary/
Description: Track your Tim Hortons rim rolls and share your winnings with the world.
Version: 1.0.18
Requires at least: 3.5.0
Tested up to: 4.9.4
Author: Jonathan Weatherhead
Author URI: http://jonathanweatherhead.com
Text Domain: rim-diary
Domain Path: /languages/
*/

if( ! rim_diary_meets_requirements() ) {
	add_action( 'admin_notices', 'rim_diary_requirements_notice' );
	return;
}

require_once( plugin_dir_path( __file__ ) . 'core-plugin.php' );

if( ! defined( 'DOING_AJAX') && is_admin() )
	require_once( plugin_dir_path( __file__ ) . 'admin-plugin.php' );

function rim_diary_requirements_notice() {
	printf( '<div class="error"><p>%s</p></div>', __( 'Tim Hortons Rim Diary requires PHP 5.3 or later to run. Please update your server.', 'rim-diary' ) );
}

function rim_diary_meets_requirements() {
	return true; //version_compare( PHP_VERSION, '5.3.0' ) >= 0;
}

register_activation_hook( __FILE__, array( 'RimDiary', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'RimDiary', 'deactivate' ) );
register_uninstall_hook( __FILE__, array( 'RimDiary', 'uninstall' ) );
