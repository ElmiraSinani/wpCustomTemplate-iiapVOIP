<?php

add_post_type_support( 'our_staff', 'comments' );

// function: post_type BEGIN
function our_staff_post_type(){
    
    $labels = array(
                    'name' => __( 'Our Staff'), 
                    'singular_name' => __('Our Staff'),
                    'rewrite' => array(
                            'slug' => __( 'adp_our_staff' ) 
                    ),
                    'add_new' => _x('Add Item', 'our_staff'), 
                    'edit_item' => __('Edit Our Staff Item'),
                    'new_item' => __('New Our Staff Item'), 
                    'view_item' => __('View Our Staff'),
                    'search_items' => __('Search Our Staff'), 
                    'not_found' =>  __('No Our Staff Items Found'),
                    'not_found_in_trash' => __('No Our Staff Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'our_staff'),
                    'has_archive' => true,
                    'menu_icon' => get_template_directory_uri('template_directory').'/images/admin_icon_our_staff.png',
                    'supports' => array(
                            'comments',
                            'title',
                            'editor',
                            'thumbnail',
                            'excerpt',
                            'custom-fields',
                            'page-attributes'
                    ),
                  //'taxonomies' => array('post_tag', 'our_staff_category'),
                  //'suppress_filters' => true
             ); 
    
    register_post_type(__( 'our_staff' ), $args);        
} 

// function: our_staff_messages BEGIN
function our_staff_messages($messages)
{
    $messages[__( 'our_staff' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Our Staff Updated. <a href="%s">View our_staff</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Our Staff Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Our Staff Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Our Staff Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Our Staff Saved.'),
                    8 => sprintf(__('Our Staff Submitted. <a target="_blank" href="%s">Preview Our Staff</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Our Staff Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Our Staff</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Our Staff Draft Updated. <a target="_blank" href="%s">Preview Our Staff</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: our_staff_messages END

// function: our_staff_category BEGIN
function our_staff_category()
{
    register_taxonomy(
            __( "our_staff_category" ),
            array(__( "our_staff" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'our_staff_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: our_staff_category END

add_action( 'init', 'our_staff_post_type' );
//add_action( 'init', 'our_staff_category', 0 );
add_filter( 'post_updated_messages', 'our_staff_messages' );


//Mete Boxes
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function staff_add_meta_box() {

	$screens = array( 'our_staff' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'slider_sectionid',
			__( 'Personal Info', 'haragast' ),
			'staff_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'staff_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function staff_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'slider_meta_box', 'slider_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$position = get_post_meta( $post->ID, '_staff_position', true );
        $fb       = get_post_meta( $post->ID, '_staff_fb', true );
	$tw       = get_post_meta( $post->ID, '_staff_tw', true );
	$in       = get_post_meta( $post->ID, '_staff_in', true );
        ?>
            <style type="text/css">
                .cptItem label{font-weight:bold;width:18%;display: inline-block;}
                .cptItem input{width: 80%;}
                .cptItem select{width: 25%;}
                .denger{ color: #D11; font-weight: bold;}
            </style>
        <?php
	echo '<p class="cptItem"><label for="position_field">';
	_e( 'Position', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="position_field" name="position_field" value="' . esc_attr( $position ) . '" size="25" /></p>';
        echo "<hr/>";
        
        echo '<p class="cptItem"><label for="fb_field">';
	_e( 'Facebook', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="fb_field" name="fb_field" value="' . esc_attr( $fb ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="tw_field">';
	_e( 'Twitter', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="tw_field" name="tw_field" value="' . esc_attr( $tw ) . '" size="25" /></p>';
        
        echo '<p class="cptItem"><label for="in_field">';
	_e( 'LinkedIn', 'haragast' );
	echo '</label> ';
	echo '<input type="text" id="in_field" name="in_field" value="' . esc_attr( $in ) . '" size="25" /></p>';
	
       
        
}
 
/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function staff_save_meta_box_data( $post_id ) {

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
	$position   = isset( $_POST['position_field'] ) ? sanitize_text_field( $_POST['position_field'] ) : "";
	$fb         = isset( $_POST['fb_field'] ) ? sanitize_text_field( $_POST['fb_field'] ) : "";
	$tw         = isset($_POST['tw_field']) ? sanitize_text_field( $_POST['tw_field'] ) : "";
	$in         = isset($_POST['in_field']) ? sanitize_text_field( $_POST['in_field'] ) : "";

	// Update the meta field in the database.
	update_post_meta( $post_id, '_staff_position',  $position );
	update_post_meta( $post_id, '_staff_fb',        $fb );
	update_post_meta( $post_id, '_staff_tw',        $tw );
	update_post_meta( $post_id, '_staff_in',        $in );
}
add_action( 'save_post', 'staff_save_meta_box_data' );