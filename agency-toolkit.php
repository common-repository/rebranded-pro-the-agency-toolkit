<?php
/**
 * Agency WP Tools
 *
 * Plugin Name: Re:Branded Pro | The Agency Toolkit
 * Plugin URI:  https://betacore.tech/plugins/rebranded-pro-agency-toolkit/
 * Description: This is a total rebranding package for the Wordpress admin built for for agencies, designers and website builders. This plugin also protects essential parts of the Wordpress installation in order to create an awesome user experience for the client on the WP-admin dashboard. 
 * Version:     2.3.5
 * Author:      Rik Janssen (Beta)
 * Author URI:  https://betacore.tech/plugins/re-branding-wordpress-plugin
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: agencytools
 * Domain Path: /lang
 *
 */


/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-style.php'); // style sheet loading
include_once('inc/functions-pages.php'); // the wp-admin settings pages
include_once('inc/functions-forms.php'); // premade forms
include_once('inc/functions-roles.php'); // role functions
include_once('inc/functions-docs.php'); // documentation functions

/* Embedded code from others */

/** 
* This awesome piece of code was written by @johnbillion. 
* What it does is adding a switch user button to the user list.
*/

include_once('inc/functions-ext-switch.php'); // external functions



/* Adding some things to the plugin row */

function bcATS_pl_links( $links ) {

    $links = array_merge( array(
    '<a href="' . esc_url( 'https://www.patreon.com/betadev' ) . '">' . __( 'Patreon', 'agencytools' ) . '</a>'
    ), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/admin.php?page=bcATC_settings' ) ) . '">' . __( 'Settings', 'agencytools' ) . '</a>'
    ), $links );

    
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcATS_pl_links' );
?>
