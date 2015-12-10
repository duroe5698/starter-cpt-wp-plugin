<?php
/*
* Plugin Name: Property Listings
* Description: Adds property listing custom post type functionality.
* Version: 1.0
* Author: New Wave Media Design
* Author URI: http://www.newwavemediadesign.com
* License: GPL2
*/

//* Property Listings Post Type
function md_register_property_listings_post_type() {
$labels = array(
    'name' => 'Property Listings',
    'singular_name' => 'Property Listing',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Property Listing',
    'edit_item' => 'Edit Property Listing',
    'new_item' => 'New Property Listing',
    'view_item' => 'View Property Listing',
    'search_items' => 'Search Property Listings',
    'not_found' =>  'No Property Listings found',
    'not_found_in_trash' => 'No Property Listings found in trash',
    'parent_item_colon' => '',
    'menu_name' => 'Property Listings'
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
    //'rewrite' => array( 'slug' => 'property-listing' ),
    'supports' => array('title'),
    'taxonomies' => array( 'categories')
); 

register_post_type( 'property-listings', $args );
}
add_action( 'init', 'md_register_property_listings_post_type' );

//* Property Listings Taxonomy
function md_create_property_listing_tax() {
register_taxonomy(
        'categories',
        'property-listings',
        array(
        'label' => __( 'Categories' ),
        'rewrite' => array( 'slug' => 'categories' ),
        'hierarchical' => true,
        )
    );
}
add_action( 'init', 'md_create_property_listing_tax' );

//* Property Listings Meta Boxes
/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cmb2_property_listings_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_property_listings_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_md_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'property_info',
        'title'         => __( 'Property Listing Info', 'cmb2' ),
        'object_types'  => array( 'property-listings', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Property Price', 'cmb2' ),
        'desc'       => __( '(ex. 29.99)', 'cmb2' ),
        'id'         => $prefix . 'property_price',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'    => 'Property Description',
        'id'      => $prefix . 'property_description',
        'type'    => 'wysiwyg',
        'options' => array(),
    ) );

    $cmb->add_field( array(
        'name'    => 'Main Property Image',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_main_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #1',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_1_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #2',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_2_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #3',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_3_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #4',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_4_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #5',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_5_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #6',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_6_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #7',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_7_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #8',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_8_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #9',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_9_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Alternative Property Image #10',
        'desc'    => 'Upload an image.',
        'id'      => $prefix . 'property_alt_10_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => 'Property Type',
        'desc'    => '(ex. condo)',
        'id'      => $prefix . 'property_type',
        'type'    => 'text_medium'
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Number of Bedrooms', 'cmb2' ),
        'desc'       => __( '(ex. 1)', 'cmb2' ),
        'id'         => $prefix . 'property_bedrooms',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Number of Bathrooms', 'cmb2' ),
        'desc'       => __( '(ex. 1)', 'cmb2' ),
        'id'         => $prefix . 'property_bathrooms',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Number of Garages', 'cmb2' ),
        'desc'       => __( '(ex. 1)', 'cmb2' ),
        'id'         => $prefix . 'property_garages',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Square Footage', 'cmb2' ),
        'desc'       => __( '(ex. 1000)', 'cmb2' ),
        'id'         => $prefix . 'property_sf',
        'type'       => 'text_small',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Address', 'cmb2' ),
        'desc'       => __( 'Enter property address to display in listing.', 'cmb2' ),
        'id'         => $prefix . 'property_address',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name' => 'Map Location',
        'desc' => 'Enter the property address to set the map location.',
        'id' => $prefix . 'property_address_map',
        'type' => 'pw_map',
        // 'split_values' => true, // Save latitude and longitude as two separate fields
    ) );

    $cmb->add_field( array(
        'name' => __( 'Contact URL', 'cmb2' ),
        'id'   => $prefix . 'property_contact',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $cmb->add_field( array(
        'name' => __( 'Virtual Tour', 'cmb2' ),
        'id'   => $prefix . 'property_vt',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );

    $cmb->add_field( array(
        'name'    => 'Flyer Upload',
        'desc'    => 'Upload a PDF.',
        'id'      => $prefix . 'property_flyer',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name' => __( 'Bid Button', 'cmb2' ),
        'desc'    => 'Enter URL of bid form if applicable.',
        'id'   => $prefix . 'property_bb',
        'type' => 'text_url',
        // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );


}

//* Property Listings Single Template

add_filter( 'single_template', 'md_property_listings_template' );
function md_property_listings_template($single_template) {
     global $post;

     if ($post->post_type == 'property-listings' ) {
          $single_template = dirname( __FILE__ ) . '/single-property-listings.php';
     }
     return $single_template;
}



//* Property Listings Styles

add_action( 'wp_enqueue_scripts', 'md_property_listings_styles' );
function md_property_listings_styles() {

    wp_enqueue_style('main-style', plugins_url('css/style.css', __FILE__ ) );
    wp_enqueue_style('font-awesome', plugins_url('css/font-awesome.css', __FILE__ ) );
    wp_enqueue_style('properticons', plugins_url('css/properticons.css', __FILE__ ) );
    wp_enqueue_style('light-slider-css', plugins_url('lightslider/src/css/lightslider.css', __FILE__ ) );
        
}

//* Property Listings Scripts

add_action( 'wp_enqueue_scripts', 'md_property_listings_scripts' );
function md_property_listings_scripts() {

    wp_enqueue_script( 'light-slider', plugins_url('lightslider/src/js/lightslider.js', __FILE__ ), array( 'jquery' ), '1.0.0' );
    wp_enqueue_script( 'light-slider-init', plugins_url('js/lightslider-init.js', __FILE__ ), array( 'jquery' ), '1.0.0' );
        
}
//* Property Listings Image Sizes

add_image_size( 'property-image', 640, 480);

add_image_size( 'property-image-home', 400, 267);

add_image_size( 'property-image-archive', 300, 200);

//* Widget File Includes

define( 'PLUGIN_DIR', dirname(__FILE__).'/' ); 
include 'widget/featured-listing-widget.php';
include 'widget/colby-listing-widget.php';
include 'widget/goodland-listing-widget.php';
include 'widget/oakley-listing-widget.php';
include 'widget/commercial-listing-widget.php';
include 'widget/land-listing-widget.php';
include 'widget/area-listing-widget.php';
include 'widget/recent-listing-widget.php';


/**
 * Remove the slug from published post permalinks. Only affect our CPT though.
 */

function md_remove_cpt_slug( $post_link, $post, $leavename ) {
 
    if ( 'property-listings' != $post->post_type /*|| 'publish' != $post->post_status*/ ) {
        return $post_link;
    }
 
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
 
    return $post_link;
}
add_filter( 'post_type_link', 'md_remove_cpt_slug', 10, 3 );


/**
 * Have WordPress match postname to any of our public post types (page, post, race)
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * By default, core only accounts for posts and pages where the slug is /post-name/
 */
function md_parse_request_trick( $query ) {
 
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
 
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'property-listings', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'md_parse_request_trick' );

?>