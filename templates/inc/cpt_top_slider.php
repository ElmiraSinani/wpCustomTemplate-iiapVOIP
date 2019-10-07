<?php

add_post_type_support( 'top_slider', 'comments' );

// function: post_type BEGIN
function top_slider_post_type(){
    
    $labels = array(
                    'name' => __( 'Front Slider'), 
                    'singular_name' => __('Front Slider'),
                    'rewrite' => array(
                            'slug' => __( 'adp_top_slider' ) 
                    ),
                    'add_new' => _x('Add Item', 'top_slider'), 
                    'edit_item' => __('Edit Front Slider Item'),
                    'new_item' => __('New Front Slider Item'), 
                    'view_item' => __('View Front Slider'),
                    'search_items' => __('Search Front Slider'), 
                    'not_found' =>  __('No Front Slider Items Found'),
                    'not_found_in_trash' => __('No Front Slider Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'top_slider'),
                    'has_archive' => true,
                    'menu_icon' => get_template_directory_uri('template_directory').'/images/admin_icon_top_slider.png',
                    'supports' => array(
                            'comments',
                            'title',
                            'editor',
                            'thumbnail',
                            'excerpt',
                            'custom-fields',
                            'page-attributes'
                    ),
                  //'taxonomies' => array('post_tag', 'top_slider_category'),
                  'suppress_filters' => false
             ); 
    
    register_post_type(__( 'top_slider' ), $args);        
} 

// function: top_slider_messages BEGIN
function top_slider_messages($messages)
{
    $messages[__( 'top_slider' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Front Slider Updated. <a href="%s">View top_slider</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Front Slider Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Front Slider Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Front Slider Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Front Slider Saved.'),
                    8 => sprintf(__('Front Slider Submitted. <a target="_blank" href="%s">Preview Front Slider</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Front Slider Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Front Slider</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Front Slider Draft Updated. <a target="_blank" href="%s">Preview Front Slider</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: top_slider_messages END

// function: top_slider_category BEGIN
function top_slider_category()
{
    register_taxonomy(
            __( "top_slider_category" ),
            array(__( "top_slider" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'top_slider_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: top_slider_category END

add_action( 'init', 'top_slider_post_type' );
//add_action( 'init', 'top_slider_category', 0 );
add_filter( 'post_updated_messages', 'top_slider_messages' );