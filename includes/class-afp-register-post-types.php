<?php
/**
 * Register custom post types
 *
 * @package     AFP
 * @subpackage  AFP/includes
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

class AFP_Register_Post_Types {

    /**
     * Initialize the class
     */
    public function __construct() {
       add_action( 'init', array( $this, 'register_post_types' ) );
    }


    /**
     * Register Screenshots Post Type
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register_post_types() {
        //$this->setup_post_type( array( 'Singular Name', 'Name', 'key', 'slug' ), array( 'menu_position' => '1' ) );
    }


    public function setup_post_type( $type, $args = array() ) {
 		if ( is_array( $type ) ) {
 			$types = isset( $type[1] ) ? $type[1] : $type . 's';
 			$key = isset( $type[2] ) ? $type[2] : strtolower( str_ireplace( ' ', '_', $type[1] ) );
 			$slug = isset( $type[3] ) ? $type[3] : str_ireplace( '_', '-', $key );
 			$type = $type[1];
 		} else {
 			$types = $type . 's';
 			$key = strtolower( str_ireplace( ' ', '_', $type ) );
 			$slug = str_ireplace( '_', '-', $key );
 		}
 		$labels = array(
 			'name'                => $type,
 			'singular_name'       => $type,
 			'add_new'             => 'Add New',
 			'add_new_item'        => 'Add New ' . $type,
 			'edit_item'           => 'Edit ' . $type,
 			'new_item'            => 'New ' . $type,
 			'view_item'           => 'View ' . $type,
 			'search_items'        => 'Search ' . $types,
 			'not_found'           => 'No ' . $types . ' found',
 			'not_found_in_trash'  => 'No ' . $types . ' found in Trash',
 			'parent_item_colon'   => '',
 			'menu_name'           => $types
 		);
 		$rewrite = array(
 			'slug'                => $slug,
 			'with_front'          => true,
 			'pages'               => true,
 			'feeds'               => true,
 		);
 		$args = wp_parse_args( $args, array(
 			'labels'              => $labels,
 			'public'              => true,
 			'publicly_queryable'  => true,
 			'show_ui'             => true,
 			'query_var'           => true,
 			'rewrite'             => $rewrite,
 			'capability_type'     => 'post',
 			'hierarchical'        => false,
 			'menu_position'       => '5',
            'show_in_rest'        => true,
 			'has_archive'         => true,
 			'exclude_from_search' => false,
 			'supports'            => array( 'title', 'editor'),
 			'taxonomies'          => array(),
            'template'            => array(), //gutenberg template
            'rest_controller_class' => 'WP_REST_Posts_Controller',
 		));
 		register_post_type( $key, $args );
 	}
}
