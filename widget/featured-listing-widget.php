<?php

//* Featured listing widget for home page

class FeaturedListingWidget extends WP_Widget
{
  function FeaturedListingWidget()
  {
    $widget_ops = array('classname' => 'FeaturedListingWidget', 'description' => 'Display featured listing on home page.' );
    parent::__construct('FeaturedListingWidget', 'Featured Listing Widget', $widget_ops);
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

    echo '<div class="home-property-carousel"><ul id="lightSlider">';

  global $post;
        $args = array(
            'post_type'    => 'property-listings',
            'categories' => 'featured',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'orderby' => 'date',
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
            echo '<li data-thumb="' . $property_main_image . '">';
            echo '<div class="pl-widget-left">';
            echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_main_image_id', 1 ), 'property-image-home' );
            if(!empty($property_price)) {
            echo '<div class="pl-widget-price pl-price">' . $property_price . '</div>';
            }
            echo '<div class="pl-widget-visit"><a class="button" title="' . get_the_title() . '"href="' . get_the_permalink() . '"><span>View This Listing</span></a></div>';
            echo '</div>'; //end pl-widget-left
            echo '<div class="pl-widget-right">';
            echo '<div class="pl-widget-title">' . get_the_title() . '</div>';
            //OLD//echo wpautop( get_post_meta( get_the_ID(), '_md_property_description', true ) );
            echo wpautop(substr(strip_tags(( get_post_meta( get_the_ID(), '_md_property_description', true ) )), 0,200) . '...');
            echo '</div>'; //end pl-widget-right
            echo '</li>';
           
        endwhile; //* end of one post
        do_action( 'genesis_after_endwhile' );

    else : //* if no posts exist
        do_action( 'genesis_loop_else' );
            
    endif; //* end loop

    echo '</ul></div>';

    wp_reset_query();
    
    // WIDGET CODE ENDS HERE

     echo $after_widget;

  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("FeaturedListingWidget");') );