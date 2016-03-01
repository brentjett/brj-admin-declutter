<?php
/*
Plugin Name: Admin De-Clutter
Version: 1.0
Author: Brent Jett
Description: A simple collection of admin de-cluttering, mostly involving the admin bar. This removes extra admin bar and admin menu items from the Yoast SEO plugin, Modern Tribe Events, and WordPress' built-in Comments and Links.
*/

// Check that no one is trying to run this code outside of WordPress itself.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* Removes Modern Tribe Events from WP Admin Bar
*/
define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);

/**
* De-clutter the admin bar.
*/
function brj_modify_admin_bar() {
	global $wp_admin_bar;

    //Yoast SEO Plugin - Remove yoast SEO from admin bar.
	$wp_admin_bar->remove_menu('wpseo-menu');

    // Remove WordPress Comments Count from Admin Bar
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'brj_modify_admin_bar' );

/**
* De-clutter the admin menu (sidebar).
*/
function brj_modify_admin_menu() {
    // Remove Links Item from Admin Sidebar
    remove_menu_page('link-manager.php');
}
add_action( 'admin_menu', 'brj_modify_admin_menu' );
?>
