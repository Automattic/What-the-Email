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

	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new What_The_Email;
		}
		return self::$instance;
	}

}

function What_The_Email() {
	return What_The_Email::instance();
}