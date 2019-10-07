<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>
            <?php if ( is_category() ) {
                    echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
            } elseif ( is_tag() ) {
                    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
            } elseif ( is_archive() ) {
                    wp_title(''); echo ' Archive | '; bloginfo( 'name' );
            } elseif ( is_search() ) {
                    echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
            } elseif ( is_home() || is_front_page() ) {
                    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
            }  elseif ( is_404() ) {
                    echo 'Error 404 Not Found | '; bloginfo( 'name' );
            } elseif (  is_page() ) {
                 bloginfo( 'name' );  echo ' | '; the_title();       
            } elseif ( is_single() ) {
                    wp_title('');
            } else {
                    echo wp_title( ' | ', false, right ); bloginfo( 'name' );
            } ?>
        </title>
	
	 <!-- Css Files -->
        
         <!-- CSS files -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700%7CMontserrat:400,700%7CRaleway:300,400,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/fonts/elegant_font/html_css/style.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/libs/owl-carousel/owl.carousel.css">

        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/main.css">
        <!-- Custom color scheme -->
        <!-- <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/color.css"> -->
        <!-- Custom css code -->
        <!-- <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/custom.css"> -->
    
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
</head>

<body <?php body_class(); ?>>
 
    
    
<!-- Global Wrapper -->
    <!-- ============================================= -->
    <div id="wrapper" class="animsition">



        <!-- Top Bar Offset Wrapper (Optional) -->
        <!-- ============================================= -->
        <div class="top-bar-wrapper">
            <a href="#" id="top-bar-trigger" class="top-bar-trigger"><i class="icon icon_plus"></i></a>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 xs-box">
                        <h3 class="title-a color-inherit mb20"><?php _e( 'About us', 'voip-text' ); ?></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas consequuntur aliquid quisquam architecto.</p>
                        <a href="#" class="read-more"><?php _e( 'read more', 'voip-text' ); ?></a>
                    </div>
                    <div class="col-sm-4 xs-box">
                        <address class="contact-widget">
                            <p><i class="icon icon_pin_alt"></i>  Armenia, Yerevan, 1, P. Sevak str. </p>
                            <p><i class="icon icon_mail_alt"></i>  voip@sci.am</p>
                            <p><i class="icon icon_phone"></i> 010 52 67 42,  060 62 35 05</p>
                        </address>
                    </div>
                    <div class="col-sm-4">
                        <div class="sidebar-tweet footer-tweet clearfix">
                            <a href="#" class="tweet-user">@abusinesstheme</a>
                            <small>22 hours ago</small>
                            <p class="tweet-content">There’s a reason why I advise you to plug in your personal commitments first when filling in your time-blocking schedule.</p>
                            <i class="icon social_twitter"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Vertical Menu Wrapper -->
        <!-- ============================================= -->
        <div class="vertical-menu-wrapper vertical-menu-bg bg04 left">
            <div class="bg-overlay gradient-4"></div>
            <a href="#" id="vertical-menu-close" class="vertical-menu-button vertical-menu-close"><i class="icon icon_close"></i></a>

            <!-- Relative: mandatory class -->
            <div class="relative">

                <div class="br-bottom mt0 mb40"></div>

                <div class="vertical-menu">
                    <div class="panel-group" id="toggle">
                       
                        <div class="panel ">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => 'panel-heading',
                                    'container' => 'div'
                                ));
                            ?>
                        </div>
                    </div>   
                </div>

                <div class="br-bottom mt50 mb50"></div>

                <div class="clearfix">
                    <ul class="social-icon social-light">
                        <li><a href="#"><i class="icon social_twitter"></i></a></li>
                        <li><a href="#"><i class="icon social_facebook"></i></a></li>
                        <li><a href="#"><i class="icon social_googleplus"></i></a></li>
                        <li><a href="#"><i class="icon social_pinterest"></i></a></li>
                        <li><a href="#"><i class="icon social_dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- END relative -->
        </div>




        <!-- Header -->
        <!-- ============================================= -->
        <div class="header-transparent header-transparent-light menu-fixed-dark menu-light-mobiles">
            <header class="header-wrapper">
                <div class="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="menu-wrapper">
                                    
                                    <nav class="navbar-right">
                                        <ul class="menu">
                                            <li class="li-icon li-registration">
                                                <a href="<?php echo home_url('/registration'); ?>"><i class="icon icon_id-2"></i> <?php _e( 'Registration', 'voip-text' ); ?></a>
                                            </li>
                                            <li class="li-icon li-language">
                                                <a href="#">
                                                    <i class="icon icon_globe-2 icon-langs"></i>
                                                    <span class="li-visible-mobile">Language</span>
                                                </a>
                                                <?php $langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str'); ?>
                                                <ul class="submenu menu-languages right">
                                                    <li>
                                                        <a href="<?php echo $langs['hy']['url']; ?>" class="lang_link">
                                                            <img src="<?php echo bloginfo('template_url'); ?>/images/flag_arm.png" alt="Armwnian language" width="16" height="16" class="img-language">
                                                            Arm
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $langs['en']['url']; ?>" class="lang_link">
                                                            <img src="<?php echo bloginfo('template_url'); ?>/images/flag_england.png" alt="English language" width="16" height="16" class="img-language">
                                                            En
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $langs['ru']['url']; ?>" class="lang_link">
                                                            <img src="<?php echo bloginfo('template_url'); ?>/images/flag_ru.png" alt="Russian language" width="16" height="16" class="img-language">
                                                            Ru
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="li-icon">
                                                <a href="#" id="search-trigger">
                                                    <i class="icon icon_search"></i>
                                                    <span class="li-visible-mobile">Search</span>
                                                </a>
                                                <div class="megamenu">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="#" class="menu-search">
                                                                <input type="text" placeholder="type and hit enter">
                                                                <button type="submit"><i class="icon icon_search"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="li-icon li-menu">
                                                <a href="#" id="vertical-menu-trigger"><i class="icon icon_menu"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    
                                    
                                    <nav class="navbar-left">
                                        <?php
                                            wp_nav_menu(array(
                                                'theme_location' => 'main-menu',
                                                'menu_class' => 'menu',
                                                'container' => 'ul'
                                            ));
                                        ?>
                                        
                                    </nav>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Main-Header -->
            </header>
        </div>    
    
    
    
    
    
    
    
    
    
    
    
    