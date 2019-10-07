<?php

add_post_type_support( 'news', 'comments' );

// function: post_type BEGIN
function news_post_type(){
    
    $labels = array(
                    'name' => __( 'News'), 
                    'singular_name' => __('News'),
                    'rewrite' => array(
                            'slug' => __( 'adp_news' ) 
                    ),
                    'add_new' => _x('Add Item', 'news'), 
                    'edit_item' => __('Edit News Item'),
                    'new_item' => __('New News Item'), 
                    'view_item' => __('View News'),
                    'search_items' => __('Search News'), 
                    'not_found' =>  __('No News Items Found'),
                    'not_found_in_trash' => __('No News Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'news'),
                    'has_archive' => true,
                    'menu_icon' => get_template_directory_uri('template_directory').'/images/admin_icon_news.png',
                    'supports' => array(
                            //'comments',
                            'title',
                            'editor',
                            'thumbnail',
                            //'excerpt',
                           // 'custom-fields',
                            //'page-attributes'
                    ),
                  //'taxonomies' => array('post_tag', 'news_category'),
                  //'suppress_filters' => true
             ); 
    
    register_post_type(__( 'news' ), $args);        
} 

// function: news_messages BEGIN
function news_messages($messages)
{
    $messages[__( 'news' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('News Updated. <a href="%s">View news</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('News Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('News Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('News Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('News Saved.'),
                    8 => sprintf(__('News Submitted. <a target="_blank" href="%s">Preview News</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('News Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview News</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('News Draft Updated. <a target="_blank" href="%s">Preview News</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: news_messages END

// function: news_category BEGIN
function news_category()
{
    register_taxonomy(
            __( "news_category" ),
            array(__( "news" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'news_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: news_category END

add_action( 'init', 'news_post_type' );
add_action( 'init', 'news_category', 0 );
add_filter( 'post_updated_messages', 'news_messages' );


