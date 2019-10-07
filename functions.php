<?php

include("templates/inc/cpt_top_slider.php");
include("templates/inc/cpt_our_staff.php");
include("templates/inc/cpt_news.php");
include("templates/inc/cpt_events.php");
include("templates/inc/cpt_sponsors.php");

if ( function_exists("add_theme_support") ) { 
    add_theme_support("post-thumbnails"); 
    
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'mainslider', 1920, 850, true );
    add_image_size( 'events', 270, 181, true );
    add_image_size( 'staff', 270, 270, true );
    add_image_size( 'sponsors', 265, 84, true );
    add_image_size( 'smallthumbs', 50, 50, true );
} 

load_theme_textdomain( 'voip-text', get_template_directory().'/languages' );
	

function load_styles_and_scripts() {

    //load styles       
    wp_enqueue_style('bootstrap-styles', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');   
    if (!is_admin()) {
        wp_deregister_script('jquery');       
        wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery-1.8.3.min.js');
    }   
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');   
    wp_enqueue_script('common-scripts', get_template_directory_uri() . '/js/scripts.js');

}

//add_action('wp_enqueue_scripts', 'load_styles_and_scripts');   
	
    
function register_voip_menus() {
register_nav_menus(
        array(
            'main-menu' => __('Main Menu','voip'),
            'useful-links-1' => __('Useful Links 1','voip'),
            'useful-links-2' => __('Useful Links 2','voip'),
            'footer-menu' => __('Footer Menu','voip')
        )
    );
}
add_action('init', 'register_voip_menus');

function voip_widgets_init() {
    register_sidebar( array (
            'name' => __( 'Right Sidebar', 'voip' ),
            'id' => 'right_sidebar',
            'description' => __( 'We use this sidebar for right widgets', 'kino'),
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="as-strip-title"><h2>',
            'after_title' => '</h2></div>',
    ) );
    register_sidebar( array (
            'name' => __( 'Footer 1', 'voip' ),
            'id' => 'footer_sidebar_1',            
            'description' => __( 'We use this sidebar for footer 1 widgets', 'voip'),
        'before_widget' => '<div class="voip">',
            'after_widget' => '</div>',
            'before_title' => '<div class="as-strip-title"><h2>',
            'after_title' => '</h2></div>',
    ) );
    
    register_sidebar( array (
            'name' => __( 'Footer 2', 'voip' ),
            'id' => 'footer_sidebar_2',            
            'description' => __( 'We use this sidebar for footer 2 widgets', 'voip'),
            'before_widget' => '<ul>',
            'after_widget' => '</ul>',
            'before_title' => '<div class="as-strip-title"> <h3>',
            'after_title' => '</h3></div>',
    ) );
    
    register_sidebar( array (
            'name' => __( 'Footer 3', 'voip' ),
            'id' => 'footer_sidebar_3',            
            'description' => __( 'We use this sidebar for footer 3 widgets', 'voip'),
            'before_widget' => '<ul>',
            'after_widget' => '</ul>',
            'before_title' => '<div class="as-strip-title"> <h3>',
            'after_title' => '</h3></div>',
    ) );
    
     register_sidebar( array (
            'name' => __( 'Contact Us', 'voip' ),
            'id' => 'contact_sidebar_3',            
            'description' => __( 'We use this sidebar for Contact us widgets', 'voip'),
            'before_widget' => '<ul>',
            'after_widget' => '</ul>',
            'before_title' => '<div class="as-strip-title"> <h3>',
            'after_title' => '</h3></div>',
    ) );
}
add_action( 'init', 'voip_widgets_init' );

