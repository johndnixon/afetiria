<?php
/**
 * Remove WP generated content from the head
 * 
 * @package     AFP
 * @subpackage  AFP/includes
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      John Nixon <johndnixonwebdev@gmail.com>
 */

class AFP_Clean_Up_Head {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'clean_up_head' ) );
	}

	/**
     * Remove WP generated content from the head
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
	public function clean_up_head() {
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
	}
}