<?php

add_post_type_support( 'sponsors', 'comments' );

// function: post_type BEGIN
function sponsors_post_type(){
    
    $labels = array(
                    'name' => __( 'Sponsors'), 
                    'singular_name' => __('Sponsors'),
                    'rewrite' => array(
                            'slug' => __( 'sponsors' ) 
                    ),
                    'add_new' => _x('Add Item', 'sponsors'), 
                    'edit_item' => __('Edit Sponsors Item'),
                    'new_item' => __('New Sponsors Item'), 
                    'view_item' => __('View Sponsors'),
                    'search_items' => __('Search Sponsors'), 
                    'not_found' =>  __('No Sponsors Items Found'),
                    'not_found_in_trash' => __('No Sponsors Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'sponsors'),
                    'has_archive' => true,
                    'menu_icon' => get_template_directory_uri('template_directory').'/images/admin_icon_sponsors.png',
                    'supports' => array(                            
                            'title',
                            'editor',
                            'thumbnail',
                            //'comments',
                            //'excerpt',
                            //'custom-fields',
                            //'page-attributes'
                    ),
                  //'taxonomies' => array('post_tag', 'sponsors_category'),
                  //'suppress_filters' => true
             ); 
    
    register_post_type(__( 'sponsors' ), $args);        
} 

// function: sponsors_messages BEGIN
function sponsors_messages($messages)
{
    $messages[__( 'sponsors' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Sponsors Updated. <a href="%s">View sponsors</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Sponsors Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Sponsors Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Sponsors Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Sponsors Saved.'),
                    8 => sprintf(__('Sponsors Submitted. <a target="_blank" href="%s">Preview Sponsors</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Sponsors Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Sponsors</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Sponsors Draft Updated. <a target="_blank" href="%s">Preview Sponsors</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: sponsors_messages END

// function: sponsors_category BEGIN
function sponsors_category()
{
    register_taxonomy(
            __( "sponsors_category" ),
            array(__( "sponsors" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'sponsors_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: sponsors_category END

add_action( 'init', 'sponsors_post_type' );
//add_action( 'init', 'sponsors_category', 0 );
add_filter( 'post_updated_messages', 'sponsors_messages' );
