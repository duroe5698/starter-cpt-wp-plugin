<?php
/*
* Plugin Name: Starter CPT WP Plugin
* Description: Adds custom post type and custom metabox functionality.
* Version: 1.0
* Author: New Wave Media Design
* Author URI: http://www.newwavemediadesign.com
* License: GPL2
*/

//* Create Custom Post Type
function md_register_custom_post_type() {
$labels = array(
    'name' => 'Custom Post Type',
    'singular_name' => 'Custom Post Type',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Custom Post Type',
    'edit_item' => 'Edit Custom Post Type',
    'new_item' => 'New Custom Post Type',
    'view_item' => 'View Custom Post Type',
    'search_items' => 'Search Custom Post Types',
    'not_found' =>  'No Custom Post Types found',
    'not_found_in_trash' => 'No Custom Post Types found in trash',
    'parent_item_colon' => '',
    'menu_name' => 'Custom Post Type'
);
$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title, editor, thumbnail'),
); 

register_post_type( 'custom-post-type', $args );
}
add_action( 'init', 'md_register_custom_post_type' );

//* Custom Post Type Meta Boxes
/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cmb2_custom_post_type_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_custom_post_type_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_md_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'custom_post_type_info',
        'title'         => __( 'Custom Post Type Info', 'cmb2' ),
        'object_types'  => array( 'custom-post-type', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Text Box', 'cmb2' ),
        'desc'       => __( 'Sample text box.', 'cmb2' ),
        'id'         => $prefix . 'test_text_box',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'    => 'Test WYSIWYG',
        'id'      => $prefix . 'test_wysiwyg',
        'type'    => 'wysiwyg',
        'options' => array(),
    ) );

    $cmb->add_field( array(
        'name'    => 'Test File Upload',
        'desc'    => 'Upload a file.',
        'id'      => $prefix . 'test_file_upload',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

//* For more field types and information about the CMB2 metaboxes please visit https://github.com/WebDevStudios/cmb2/wiki

}

//* Custom Post Type Styles

add_action( 'wp_enqueue_scripts', 'md_custom_post_type_styles' );
function md_custom_post_type_styles() {
    wp_enqueue_style('main-style', plugins_url('css/style.css', __FILE__ ) );   
}

//* Custom Post Type Scripts

add_action( 'wp_enqueue_scripts', 'md_custom_post_type_scripts' );
function md_custom_post_type_scripts() {
    wp_enqueue_script( 'global-js', plugins_url('js/global.js', __FILE__ ), array( 'jquery' ), '1.0.0' );     
}
