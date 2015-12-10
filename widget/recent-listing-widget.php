<?php

//* Recent listing widget for home page

class RecentListingWidget extends WP_Widget
{
  function RecentListingWidget()
  {
    $widget_ops = array('classname' => 'RecentListingWidget', 'description' => 'Display Recent listing on home page.' );
    parent::__construct('RecentListingWidget', 'Recent Listing Widget', $widget_ops);
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
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DSC',
            'no_found_rows' => true,
                );
    echo '<ul>';
    global $wp_query;
        $wp_query = new WP_Query( $args );


    if ( ! genesis_html5() ) {
        genesis_legacy_loop();
        return;
    }

    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) :  $wp_query->the_post();
            //*Begin post meta variables

            //*End post meta variables

  
		        //*Loop Code Goes Here
            echo '<li>';
            echo '<a title="' . get_the_title() . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
            echo '</li>';
            
           
        endwhile; //* end of one post
        do_action( 'genesis_after_endwhile' );

    else : //* if no posts exist
        do_action( 'genesis_loop_else' );
            
    endif; //* end loop

    wp_reset_query();
    echo '</ul>';
    
    // WIDGET CODE ENDS HERE

     echo $after_widget;

  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RecentListingWidget");') );