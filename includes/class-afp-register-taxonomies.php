<?php
/**
 * Register Custom Taxonomies
 *
 * @package     AFP
 * @subpackage  AFP/includes
 * @copyright   Copyright (c) 2019, John Nixon
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

class AFP_Register_Taxonomies {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }


    function register_taxonomies(  ) {
        // $this->set_up_taxonomy(
        //     array( 'Plural', 'Singular', 'tax-slug', 'tax-key' ),
        //     array( 'hierarchical' => true )
        // );
    }

    function set_up_taxonomy( $labelSettings = array(), $args = array() ) {

        $labels = array(
            'name'                       => _x( $labelSettings[0], 'Taxonomy General Name', 'afp' ),
            'singular_name'              => _x( $labelSettings[1], 'Taxonomy Singular Name', 'afp' ),
            'menu_name'                  => __( $labelSettings[0], 'afp' ),
            'all_items'                  => __( 'All ' . $labelSettings[1], 'afp' ),
            'parent_item'                => __( 'Parent ' . $labelSettings[1], 'afp' ),
            'parent_item_colon'          => __( 'Parent Speaker:', 'afp' ),
            'new_item_name'              => __( 'New Speaker Name', 'afp' ),
            'add_new_item'               => __( 'Add New ' . $labelSettings[1], 'afp' ),
            'edit_item'                  => __( 'Edit ' . $labelSettings[1], 'afp' ),
            'update_item'                => __( 'Update ' . $labelSettings[1], 'afp' ),
            'view_item'                  => __( 'View ' . $labelSettings[1], 'afp' ),
            'separate_items_with_commas' => __( 'Separate ' . $labelSettings[0] . ' with commas', 'afp' ),
            'add_or_remove_items'        => __( 'Add or remove ' . $labelSettings[1], 'afp' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'afp' ),
            'popular_items'              => __( 'Popular ' . $labelSettings[1], 'afp' ),
            'search_items'               => __( 'Search ' . $labelSettings[1], 'afp' ),
            'not_found'                  => __( 'Not Found', 'afp' ),
            'no_terms'                   => __( 'No ' . $labelSettings[1], 'afp' ),
            'items_list'                 => __( $labelSettings[0] . ' list', 'afp' ),
            'items_list_navigation'      => __( $labelSettings[0] . ' list navigation', 'afp' ),
        );
        $args = wp_parse_args( $args, array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
        ));
        register_taxonomy( $labelSettings[2], array( $labelSettings[3] ), $args );

    }
}
