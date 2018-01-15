<?php

/**
 * This file is automatically called by Wordpress if the plugin is deleted via the Dashboard link.
 * It deletes the Loginpetze options from the WordPress database.
 * WordPress itself will delete the plugin files.
 *
 * @author          Christian Sabo
 * @link            https://profiles.wordpress.org/pixelverbieger
 *
 * @version         1.0
 * @since           1.0
 * @package         Loginpetze
 * @link            https://wordpress.org/plugins/loginpetze/
 */

/*
 * Directly calling this file is forbidden, so exit
 */
if ( ! defined( 'ABSPATH' ) || ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();  // silence is golden
}


require_once ('includes/function-delete-options.php');

if ( ! is_multisite() ) {

	loginpetze_delete_options();

} else {

	global $wpdb;

	$old_blog = $wpdb->blogid;

	// Get all blog ids
	$all_blog_ids = $wpdb->get_col( 'SELECT blog_id FROM $wpdb->blogs' );

	/*
	 * Loop through all blogs and delete the Loginpetze options
	 */

	foreach ( $all_blog_ids as $blog_id ) {
		switch_to_blog( $blog_id );
		loginpetze_delete_options();
	}

	/*
	 * Switch back to the main blog
	 */

	switch_to_blog( $old_blog );

}