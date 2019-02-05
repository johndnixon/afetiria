<?php
/**
 * Main Init Class
 *
 * @package     AFP
 * @subpackage  AFP/includes
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      John Nixon <johndnixonwebdev@gmail.com>
 */

class AFP_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {

		$register_post_types     = new AFP_Register_Post_Types();
		//$register_taxonomies     = new AFP_Register_Taxonomies();
		$clean_up_head		     = new AFP_Clean_Up_Head();
		$add_mime_types		     = new AFP_Add_Mime_Types();

	}

}
