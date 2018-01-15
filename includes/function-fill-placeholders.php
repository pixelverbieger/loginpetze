<?php

/**
 * This function will replace the placeholders with the respective data for each field.
 *
 * @author          Christian Sabo
 * @link            https://profiles.wordpress.org/pixelverbieger
 *
 * @version         1.0
 * @since           1.0
 * @package         Loginpetze
 * @link            https://wordpress.org/plugins/loginpetze/
 */

if ( ! function_exists('loginpetze_fill_placeholders') ) {

    /**
     * This function will replace the placeholders with the respective data for each field.
     *
     * @param string $user_login contains the username of the user who successfully logged-in, inserted by hook wp_login
     * @link https://developer.wordpress.org/reference/hooks/wp_login/
     *
     * @param string $haystack contains the text to edit, including the placeholders
     *
     * @return string returns text (containing the correct data)
     */

    function loginpetze_fill_placeholders( $user_login, $haystack ) {

        /*
         * retrieve the name of the blog/website from database
         */
        $replace_blogname       = get_option( 'blogname' );

        /*
         * retrieve the date and time format from wp settings
         * and prepare the strings for output
         */
        $replace_date       = date_i18n( get_option( 'date_format' ) );
        $replace_time       = date_i18n( get_option( 'time_format' ) );

        /*
         * now we need to do some search and replace
         */
        $haystack = str_replace('[blogname]',   $replace_blogname,  $haystack );
        $haystack = str_replace('[username]',   $user_login,        $haystack );
        $haystack = str_replace('[date]',       $replace_date,      $haystack );
        $haystack = str_replace('[time]',       $replace_time,      $haystack );

        /*
         * return the text containing the correct data
         */
        return $haystack;

    }

}