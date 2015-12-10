<?php
/*
 Template file for single property listing posts
 */


/** Replace the standard loop with our custom loop */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'md_property_loop' );

function md_property_loop() {

	global $post;

    // Bail if post type isn't a locations post
    $post_type = get_post_type('property-listings');

	// Get custom meta box data
	$property_price = get_post_meta( $post->ID, '_md_property_price', true );
	$property_main_image = get_post_meta( $post->ID, '_md_property_main_image', true );
	$property_alt_1_image = get_post_meta( $post->ID, '_md_property_alt_1_image', true );
	$property_alt_2_image = get_post_meta( $post->ID, '_md_property_alt_2_image', true );
	$property_alt_3_image = get_post_meta( $post->ID, '_md_property_alt_3_image', true );
	$property_alt_4_image = get_post_meta( $post->ID, '_md_property_alt_4_image', true );
	$property_alt_5_image = get_post_meta( $post->ID, '_md_property_alt_5_image', true );
	$property_alt_6_image = get_post_meta( $post->ID, '_md_property_alt_6_image', true );
	$property_alt_7_image = get_post_meta( $post->ID, '_md_property_alt_7_image', true );
	$property_alt_8_image = get_post_meta( $post->ID, '_md_property_alt_8_image', true );
	$property_alt_9_image = get_post_meta( $post->ID, '_md_property_alt_9_image', true );
	$property_alt_10_image = get_post_meta( $post->ID, '_md_property_alt_10_image', true );
	$property_type = get_post_meta( $post->ID, '_md_property_type', true );
	$property_bedrooms = get_post_meta( $post->ID, '_md_property_bedrooms', true );
	$property_bathrooms = get_post_meta( $post->ID, '_md_property_bathrooms', true );
	$property_garages = get_post_meta( $post->ID, '_md_property_garages', true );
	$property_sf = get_post_meta( $post->ID, '_md_property_sf', true );
	$property_address = get_post_meta( $post->ID, '_md_property_address', true );
	$property_contact = get_post_meta( $post->ID, '_md_property_contact', true );
	$property_flyer = get_post_meta( $post->ID, '_md_property_flyer', true );
	$property_vt = get_post_meta( $post->ID, '_md_property_vt', true );
	$property_bb = get_post_meta( $post->ID, '_md_property_bb', true );
	$mapGPS = get_post_meta( get_the_ID(), '_md_property_address_map', true );

	echo '<article class="entry">';
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';

	?>
	<div class="property-carousel">
		<ul id="lightSlider">
			<?php if(!empty($property_main_image)) { ?> 
	        <li data-thumb="<?php echo $property_main_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_main_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_1_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_1_image; ?>">
	        	<?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_1_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_2_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_2_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_2_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_3_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_3_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_3_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_4_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_4_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_4_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_5_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_5_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_5_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_6_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_6_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_6_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_7_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_7_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_7_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_8_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_8_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_8_image_id', 1 ), 'property-image' ); ?>
	        </li> 
	        <?php } ?>
	        <?php if(!empty($property_alt_9_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_9_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_9_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	        <?php if(!empty($property_alt_10_image)) { ?> 
	        <li data-thumb="<?php echo $property_alt_10_image; ?>">
	            <?php echo $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_md_property_alt_10_image_id', 1 ), 'property-image' ); ?>
	        </li>
	        <?php } ?>
	    </ul>
	</div>
    <?php
    echo '<div class="pl-top-content-wrap">';
    if(!empty($property_price)) {
	echo '<div class="pl-content-item pl-price">' . $property_price . '</div>';
	}
	if(!empty($property_type)) {
	echo '<div class="pl-content-item pl-type">' . $property_type . '</div>';
	}
	if(!empty($property_bedrooms)) {
	echo '<div class="pl-content-item pl-bedrooms">' . $property_bedrooms . ' - Bedrooms</div>';
	}
	if(!empty($property_bathrooms)) {
	echo '<div class="pl-content-item pl-bathrooms">' . $property_bathrooms . ' - Bathrooms</div>';
	}
	if(!empty($property_garages)) {
	echo '<div class="pl-content-item pl-garages">' . $property_garages . ' - Garages</div>';
	}
	if(!empty($property_sf)) {
	echo '<div class="pl-content-item pl-sf">' . $property_sf . ' - Square Feet</div>';
	}
	if(!empty($property_contact)) {
	echo '<div class="pl-content-item"><a class="button alt" target="_blank" href="' . $property_contact . '"><span class="pl-contact">Contact Agent</span></a></div>';
	}
	if(!empty($property_flyer)) {
	echo '<div class="pl-content-item"><a class="button" target="_blank" href="' . $property_flyer . '"><span class="pl-flyer">Property Flyer</span></a></div>';
	}
	if(!empty($property_vt)) {
	echo '<div class="pl-content-item"><a class="button" target="_blank" href="' . $property_vt . '"><span class="pl-vt">Virtual Tour</span></a></div>';
	}
	if(!empty($property_bb)) {
	echo '<div class="pl-content-item"><a class="button" target="_blank" href="' . $property_bb . '"><span class="pl-bb">Bid Now</span></a></div>';
	}
	echo '</div>'; // end pl-top-content-wrap
	echo '<div class="pl-btm-content-wrap">' . wpautop( get_post_meta( get_the_ID(), '_md_property_description', true ) ) . '</div>';
	if(!empty($property_address)) {
	?>
	<div class="pl-map-wrapper">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<div id="gmap_canvas" style="height:500px;width:auto;"></div>
		<script type="text/javascript">
		    function init_map(){
		        // Options
		        var myOptions = {
		            zoom:14,
		            center:new google.maps.LatLng(<?php echo $mapGPS[latitude]; ?>,<?php echo $mapGPS[longitude]; ?>)
		        };
		        // Setting map using options
		        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
		        // Setting marker to our GPS coordinates
		        marker = new google.maps.Marker({map: map,clickable: true,position: new google.maps.LatLng(<?php echo $mapGPS[latitude]; ?>,<?php echo $mapGPS[longitude]; ?>)});
		    	
		    	infowindow = new google.maps.InfoWindow();
				//OLD//infowindow.setContent('<?php echo '<h4>' . $property_address . '</h4>';echo '<a target="_blank" href="https://www.google.com/maps/dir/Current+Location/' . $mapGPS[latitude] . ',' . $mapGPS[longitude] . '">' . $property_address . '</a>';?>');
				//OLD2//infowindow.setContent('<?php echo '<h4>' . $property_address . '</h4>';echo '<a target="_blank" href="https://www.google.com/maps?saddr=My+Location&daddr=' . $mapGPS[latitude] . ',' . $mapGPS[longitude] . '">' . $property_address . '</a>';?>');
				infowindow.setContent('<?php echo '<h4>' . $property_address . '</h4>';echo '<a target="_blank" href="https://www.google.com/maps?q=' . $property_address . '">' . $property_address . '</a>';?>');
				

				

				infowindow.open(map, marker);

		    }
		    // Initializes google map
		    google.maps.event.addDomListener(window, 'load', init_map);
		</script>
	</div>
	<?php
}
	echo '</article>';
}
//* Run the Genesis loop
genesis();
