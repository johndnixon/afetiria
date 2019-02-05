<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'post_meta', 'Custom Data' )
    ->where( 'post_type', '=', 'page' )
    ->add_fields( array(
        Field::make( 'text', 'crb_phone_number', __( 'Phone Number' ) )
    ));
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
