<?php
/**
 * Add new mime types
 *
 * @package     AFP
 * @subpackage  AFP/includes
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      John Nixon <johndnixonwebdev@gmail.com>
 */

class AFP_Add_Mime_Types {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_filter( 'upload_mimes', array( $this, 'add_svg' ) );
	}

	/**
     * Add SVG mime type
     *
     * @since  1.0.0
     * @access public
     * @return viod
     */
	public function add_svg( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	
}