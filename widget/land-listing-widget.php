<?php

//* Land listing widget for home page

class LandListingWidget extends WP_Widget
{
  function LandListingWidget()
  {
    $widget_ops = array('classname' => 'LandListingWidget', 'description' => 'Display Land listing on home page.' );
    parent::__construct('LandListingWidget', 'Land Listing Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo '<div class="widget-title">' . $instance['title'] . '</div>';
 
    // WIDGET CODE STARTS HERE

  global $post;
        $args = array(
            'post_type'    => 'property-listings',
            'categories' => 'land',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'orderby' => 'rand',
            'order' => 'DSC',
            'no_found_rows' => true,
                );

    global $wp_query;
        $wp_query = new WP_Query( $args );


    if ( ! genesis_html5() ) {
        genesis_legacy_loop();
        return;
    }

    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) :  $wp_query->the_post();
            //*Begin post meta variables
            $property_price = get_post_meta( $post->ID, '_md_property_price', true );
            $property_main_image = get_post_meta( $post->ID, '_md_property_main_image', true );
            $property_type = get_post_meta( $post->ID, '_md_property_type', true );
            $property_bedrooms = get_post_meta( $post->ID, '_md_property_bedrooms', true );
            $property_bathrooms = get_post_meta( $post->ID, '_md_property_bathrooms', true );
            $property_garages = get_post_meta( $post->ID, '_md_property_garages', true );
            $property_sf = get_post_meta( $post->ID, '_md_property_sf', true );
            $property_address = get_post_meta( $post->ID, '_md_property_address', true );
            $property_contact = get_post_meta( $post->ID, '_md_property_contact', true );
            $property_flyer = get_post_meta( $post->ID, '_md_property_flyer', true );
            //*End post meta variables

  
		        //*Loop Code Goes Here
            echo '<div class="pl-loc-widget-top">';
            echo '<div class="pl-loc-widget-title">' . get_the_title() . '</div>';
            echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_main_image_id', 1 ), 'property-image-archive' );
            if(!empty($property_price)) {
            echo '<div class="pl-loc-widget-price pl-price">' . $property_price . '</div>';
            }
            echo '</div>'; //end pl-loc-widget-top
            echo '<div class="pl-loc-widget-btm">';
            //echo wpautop( get_post_meta( get_the_ID(), '_md_property_description', true ) );
            echo '<div class="pl-loc-widget-visit"><a class="button" title="' . get_the_title() . '"href="' . get_the_permalink() . '"><span>View This Listing</span></a></div>';
            echo '<a class="pl-loc-widget-listings-link" href="/categories/land/">See All Land Listings</a>';
            echo '</div>'; //end pl-loc-widget-btm
           
        endwhile; //* end of one post
        do_action( 'genesis_after_endwhile' );

    else : //* if no posts exist
        do_action( 'genesis_loop_else' );
            
    endif; //* end loop

    wp_reset_query();
    
    // WIDGET CODE ENDS HERE

     echo $after_widget;

  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("LandListingWidget");') );