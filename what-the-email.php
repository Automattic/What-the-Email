<?php
/**
 * Plugin Name: What the Email
 * Plugin URI: https://github.com/Automattic/What-the-Email
 * Description: Parse that email and tell me what it is!
 * Author: Daniel Bachhuber, Automattic
 * Version: 0.0
 * Author URI: http://automattic.com/
 */

class What_The_Email
{

	private static $instance;

	private static $email_body_regex = array(
			// On Saturday, October 27, 2012 at 3:28 PM, Testing wrote:
			'(On|At|In|Il|Em|Pada|Le|Am){1}\s.+(wrote|writes|scritto|escreveu|menulis|écrit|(schrieb.+)){1}\s?:',
		);

	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new What_The_Email;
		}
		return self::$instance;
	}

	/**
	 * Given body text for an email, parse out all of the quoted
	 * junk, stuff added by the email client, etc.
	 */
	public function get_message( $email_body ) {
		foreach( self::$email_body_regex as $pattern ) {
			if ( preg_match( '/^((.|\n)*)' . $pattern . '/iU', $email_body, $matches ) ) {
				return trim( $matches[1] );
			}
		}
		return $email_body;
	}

}

function What_The_Email() {
	return What_The_Email::instance();
}