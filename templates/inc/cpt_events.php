<?php

add_post_type_support( 'events', 'comments' );

// function: post_type BEGIN
function events_post_type(){
    
    $labels = array(
                    'name' => __( 'Events'), 
                    'singular_name' => __('Events'),
                    'rewrite' => array(
                            'slug' => __( 'adp_events' ) 
                    ),
                    'add_new' => _x('Add Item', 'events'), 
                    'edit_item' => __('Edit Events Item'),
                    'new_item' => __('New Events Item'), 
                    'view_item' => __('View Events'),
                    'search_items' => __('Search Events'), 
                    'not_found' =>  __('No Events Items Found'),
                    'not_found_in_trash' => __('No Events Items Found In Trash'),
                    'parent_item_colon' => ''
                );
    $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true,
                    'query_var' => true,
                    'capability_type' => 'post',
                    'hierarchical' => false,
                    'menu_position' => null,
                    'rewrite' => array('slug' => 'events'),
                    'has_archive' => true,
                    'menu_icon' => get_template_directory_uri('template_directory').'/images/admin_icon_events.png',
                    'supports' => array(
                            'comments',
                            'title',
                            'editor',
                            'thumbnail',
                            'excerpt',
                            'custom-fields',
                            'page-attributes'
                    ),
                  //'taxonomies' => array('post_tag', 'events_category'),
                  //'suppress_filters' => true
             ); 
    
    register_post_type(__( 'events' ), $args);        
} 

// function: events_messages BEGIN
function events_messages($messages)
{
    $messages[__( 'events' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Events Updated. <a href="%s">View events</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Events Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Events Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Events Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Events Saved.'),
                    8 => sprintf(__('Events Submitted. <a target="_blank" href="%s">Preview Events</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Events Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Events</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Events Draft Updated. <a target="_blank" href="%s">Preview Events</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: events_messages END

// function: events_category BEGIN
function events_category()
{
    register_taxonomy(
            __( "events_category" ),
            array(__( "events" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'events_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: events_category END

add_action( 'init', 'events_post_type' );
add_action( 'init', 'events_category', 0 );
add_filter( 'post_updated_messages', 'events_messages' );


//Mete Boxes
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function events_add_meta_box() {

	$screens = array( 'events' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'events_sectionid',
			__( 'Event Details', 'haragast' ),
			'events_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'events_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function events_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'slider_meta_box', 'slider_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$fbFollow     = get_post_meta( $post->ID, '_events_fb', true );
        $timing       = get_post_meta( $post->ID, '_events_timing', true );
	$voice        = get_post_meta( $post->ID, '_events_voice', true );
	$email        = get_post_meta( $post->ID, '_events_email', true );
	$address      = get_post_meta( $post->ID, '_events_address', true );
	$status      = get_post_meta( $post->ID, '_events_status', true );
        ?>
            <style type="text/css">
                .cptItem label{font-weight:bold;width:18%;display: inline-block;}
                .cptItem input{width: 80%;}
                .cptItem select{width: 25%;}
                .denger{ color: #D11; font-weight: bold;}
            </style>
        <?php
        
        
	echo '<p class="cptItem"><label for="follow_field">';
	_e( 'Follow Link', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="follow_field" name="follow_field" value="' . esc_attr( $fbFollow ) . '" size="25" /></p>';
        
	echo '<p class="cptItem"><label for="timing_field">';
	_e( 'Timing', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="timing_field" name="timing_field" value="' . esc_attr( $timing ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="voice_field">';
	_e( 'Voice', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="voice_field" name="voice_field" value="' . esc_attr( $voice ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="email_field">';
	_e( 'Email', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="email_field" name="email_field" value="' . esc_attr( $email ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="address_field">';
	_e( 'Address', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="address_field" name="address_field" value="' . esc_attr( $address ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="status_field">';
	_e( 'Event Status', 'haragast' );
	echo '</label> ';
        
        echo '<select name="status_field">';
            echo '<option value="upcoming" >Upcoming</option>';
            echo '<option value="as-cnl" >Cancelled</option>';
            echo '<option value="as-free" >Free</option>';
        echo '</select>';
        
       
        
	echo '</p>';
	
       
        
}
 
/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function events_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['slider_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['slider_meta_box_nonce'], 'slider_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	

	// Sanitize user input.
	$follow   = isset( $_POST['follow_field'] ) ? sanitize_text_field( $_POST['follow_field'] ) : "";
	$timing   = isset( $_POST['timing_field'] ) ? sanitize_text_field( $_POST['timing_field'] ) : "";
	$voice    = isset($_POST['voice_field']) ? sanitize_text_field( $_POST['voice_field'] ) : "";
	$email    = isset($_POST['email_field']) ? sanitize_text_field( $_POST['email_field'] ) : "";
	$address  = isset($_POST['address_field']) ? sanitize_text_field( $_POST['address_field'] ) : "";
	$status  = isset($_POST['status_field']) ? sanitize_text_field( $_POST['status_field'] ) : "";

	// Update the meta field in the database.
	update_post_meta( $post_id, '_events_fb', $follow );
	update_post_meta( $post_id, '_events_timing', $timing );
	update_post_meta( $post_id, '_events_voice', $voice );
	update_post_meta( $post_id, '_events_email', $email );
	update_post_meta( $post_id, '_events_address', $address );
	update_post_meta( $post_id, '_events_status', $status );
}
add_action( 'save_post', 'events_save_meta_box_data' );