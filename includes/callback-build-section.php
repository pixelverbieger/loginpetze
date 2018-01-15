<?php

/**
 * Within the settings page, this file sets up the required 'section'
 *
 * @author          Christian Sabo
 * @link            https://profiles.wordpress.org/pixelverbieger
 *
 * @version         1.0
 * @since           1.0
 * @package         Loginpetze
 * @link            https://wordpress.org/plugins/loginpetze/
 */

if ( ! function_exists( 'loginpetze_build_section_callback' ) ) {

	/**
	 * @param $args object coming from add_settings_section in the main init section
	 */
	function loginpetze_build_section_callback( $args ) {

		/*
		 * We need to retrieve some data from the database to be able to print out some examples:
		 * - Blogname
		 * - Date/Time in the correct format
		 * - Name of the current backend user
		 */

		// blog title is found in the standard options table
		$blogname       = get_option( 'blogname' );

		// date and time is found in the standard options table
		$date           = date_i18n( get_option( 'date_format' ) );
		$time           = date_i18n( get_option( 'time_format' ) );

		// current user name can also be found
		$current_user   = wp_get_current_user();
		$username       = esc_html( $current_user->user_login );

		?>

        <p class="description">

			<?php

			/*
			 * Output: short instructions what a user can do in this screen
			 */

			/* translators: help text/instructions */
			esc_html_e( 'Please select who should receive the notification mails.', 'loginpetze' );
			echo '<br />';
			/* translators: help text/instructions */
			esc_html_e( 'If you wish to change the default texts for subject or body, you can do so.', 'loginpetze' );
			echo '<br />';
			/* translators: help text/instructions */
			esc_html_e( 'There are some placeholders available. Use them as often as you want:', 'loginpetze' );
			?>

        </p>

        <p>

			<?php

			/*
			 * Output: available placeholders and examples what they are filled with
			 */

			echo '<code>[username]</code> – ';

			printf(
			/* translators: help text explaining the placeholder [username]; %s: example for a username */
				__( 'will be replaced by the login name of the user; e.g. <code>%s</code>', 'loginpetze' ),
				$username
			);

			echo '<br />';
			echo '<code>[blogname]</code> – ';

			printf(
			/* translators: help text explaining the placeholder [blogname]; %s: the name of your website */
				__( 'will be replaced by your website&#x27;s name: <code>%s</code>', 'loginpetze' ),
				$blogname
			);

			echo '<br />';
			echo '<code>[date]</code> – ';

			printf(
			/* translators: help text explaining the placeholder [datetime] %s: example for date and time */
				__( 'will be replaced by the date corresponding to your blog settings: <code>%s</code>', 'loginpetze' ),
				$date
			);

			echo '<br />';
			echo '<code>[time]</code> – ';

			printf(
			/* translators: help text explaining the placeholder [datetime] %s: example for date and time */
				__( 'will be replaced by the time corresponding to your blog settings: <code>%s</code>', 'loginpetze' ),
				$time
			);
			?>

        </p>

		<?php

	}

}
