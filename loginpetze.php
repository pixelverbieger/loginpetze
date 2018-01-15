<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/plugins/loginpetze/
 * @since             1.0
 * @package           Loginpetze
 *
 * @wordpress-plugin
 * Plugin Name:       Loginpetze
 * Plugin URI:        https://wordpress.org/plugins/loginpetze/
 * Description:       Notifies the admin by email as soon as a user has successfully logged in.
 * Version:           0.99
 * Author:            Christian Sabo
 * Author URI:        https://profiles.wordpress.org/pixelverbieger
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       loginpetze
 * Domain Path:       /languages
 *
 * Loginpetze is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Loginpetze is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Loginpetze. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
*/


// todo: start-dateien, hooks und ladereihenfolge aufräumen/richtig sortieren - capabilities kontrollieren - conditional loading

// todo: mindestens benötigte PHP- und Wordpress-Version testen und Readme anpassen

// todo: Doku fertigstellen, siehe @link http://manual.phpdoc.org/HTMLSmartyConverter/PHP/phpDocumentor/tutorial_tags.pkg.html

// todo: POT-Datei erstellen, siehe https://developer.wordpress.org/themes/functionality/localization/#poedit

// todo: Plugin einreichen



	/*
	 * If this file is called directly, abort.
	 */
	if ( ! defined( 'WPINC' ) ) {
		die( 'Direct access is not allowed.' );
	}



	/*
	 * For future reference, we define a version number for the options
	 */
	define( 'LOGINPETZE_DB_VERSION', '1.0');

	define('LOGINPETZE_PLUGIN_URL',         plugin_dir_url(__FILE__));
	define('LOGINPETZE_PLUGIN_DIR',         plugin_dir_path(__FILE__));
	define('LOGINPETZE_PLUGIN_BASE_NAME',   plugin_basename(__FILE__));
	define('LOGINPETZE_PLUGIN_FILE',        basename(__FILE__));
	define('LOGINPETZE_PLUGIN_FULL_PATH',   __FILE__);




	/*
	 * Before we begin, let's load some functions.
	 */
	require_once( 'includes/_loader.php' );




	/* on activation of the plugin, do things */
	register_activation_hook( __FILE__, 'set_default_values' );




	// Main purpose: on successful login (hook), send an email (action)
	add_action( 'wp_login', 'loginpetze_generate_email', 10 );





	/* thanks to tfrommen */
	add_action( 'delete_user_form', function ( $whatever, array $userids ) {

		loginpetze_warning_before_deleting_user( $userids );

	}, 10, 2 );






	add_filter( 'plugin_action_links_' . LOGINPETZE_PLUGIN_BASE_NAME , 'loginpetze_plugin_action_links' );
	function loginpetze_plugin_action_links( $links ) {
		$loginpetze_links = array(
			/* translators: action link (displayed in the Plugins list table) */
			'<a href="options-general.php?page=loginpetze-options">'. __( 'Settings', 'loginpetze' ) . '</a>'
		);

		return array_merge( $links, $loginpetze_links );
	}









	/**
	 * register our loginpetze_register_options_page to the admin_menu action hook
	 */

	// add_action( 'admin_menu', 'loginpetze_register_settings_page');


	//add_action( 'admin_head-users.php', 'mark_candidate', 1, 2 );
	// add_action( 'delete_user_form', 'loginpetze_warning_before_deleting_user', 10, 2 );

	// add_action('admin_init', 'loginpetze_generate_email', 1000);
