<?php
/**
 * Template Name: copy Front Page Template
 */
get_header();
?>
<!--// MainBanner //-->
<div class="as-mainbanner">
    <div class="flexslider">
        <ul class="slides">
            
            <?php                
            
            $language = ICL_LANGUAGE_CODE;
            $the_query = new WP_Query( 'post_type=top_slider&language=' . $language );
                          // The Loop
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    
                    $btn_text = get_post_meta( get_the_ID(), "btn_text", true); 
                    $btn_text = $btn_text ? $btn_text : 'Donate Now';
                    ?>
                        <li>
                        <?php the_post_thumbnail('full'); ?>
                            <div class="as-caption">
                                <div class="container">
                                    <h1><span><?php the_title(); ?></span></h1>
                                    <div class="clearfix"></div>
                                    <div class="as-captiontitle"> <?php the_content(); ?> </div>
                                    <div class="clearfix"></div>
                                    <a href="#"><?php echo $btn_text; ?></a>
                                </div>
                            </div>
                        </li>
                    <?php
                }

            } else {
                    // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?> 
            
        </ul>
    </div>
</div>
<!--// MainBanner //-->

<!--// Main Content //-->
<div class="as-main-content">

    <!--// MainSection //-->
    <div class="as-main-section as-ticker" style=" padding: 25px 0px 15px 0px; margin-top: -50px; ">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="as-newsticker">
                        <h2 class="as-color">Lates News</h2>
                        <span class="annouce-icon"><i class="fa fa-caret-right"></i></span>
                        <ul id="as-news">
                            <?php                

                            $language = ICL_LANGUAGE_CODE;
                            $the_query = new WP_Query( 'post_type=news&language=' . $language );
                            // The Loop
                            if ( $the_query->have_posts() ) {

                                while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>
                                    
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                            <?php    }

                            } else {
                            // no posts found
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                            ?> 
                    
                            
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--// MainSection //-->

    <!--// MainSection //-->
    <div class="as-main-section" style=" padding: 47px 0px 0px 0px; ">
        <div class="container">
            <div class="row">
                <?php $catName = get_category_by_slug( 'how-you-can-help' ); ?>

                <div class="col-md-12">
                    <div class="as-fancytitle"> <h2><?php echo $catName->name ;?>?</h2> </div>
                    <div class="as-fancy-divider-wrap">
                        <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                    </div>
                    <div class="as-title-text"><p><?php echo $catName->category_description ;?></p></div>
                </div>

                <div class="col-md-12 minus-element-margin">
                    <div class="as-services as-small-view">
                        <ul class="row">
                            
                            <?php                
                                           
                                $args = array ( 'category_name' => 'how-you-can-help', 'orderby' => 'id', 'order' => 'DESC' , 'suppress_filters' => false);
                                
                                $the_query = new WP_Query( $args );
                                
                                // The Loop
                                if ( $the_query->have_posts() ) {

                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post();
                                        $iconClass = get_post_meta( get_the_ID(), 'icon_class', true );
                                        ?>
                                        <li class="col-md-4">
                                            <div class="as-service-wrap">
                                                <span class="as-icon"> <i class="flaticon-almsgiving <?php echo $iconClass; ?>"></i> </span>
                                                <div class="as-infowrap">
                                                    <h2><?php the_title(); ?></h2>
                                                    <p><?php the_excerpt(); ?></p>
                                                    <a href="<?php the_permalink(); ?>">More <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php

                                    }
                                } else {
                                        // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata();
                                ?> 
                            
                            
                            

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--// MainSection //-->



    <!--// MainSection //-->
    <div class="as-main-section" style="">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="as-fancytitle"> <h2>OUR CAUSES</h2> </div>
                    <div class="as-fancy-divider-wrap">
                        <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                    </div>
                </div>           

            </div>
        </div>
    </div>
    <!--// MainSection //-->

    <!--// MainSection //-->
    <div class="as-main-section as-bgcolor" style=" padding: 40px 0px 40px 0px; ">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="as-action-style">
                        <h2><i class="fa fa-hand-o-right"></i> Act now and join our cause. Stay up to date with us & our activites.</h2>
                        <div class="as-action-button">
                            <a href="#">View Profile</a>
                            <a href="donation.html">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--// MainSection //-->

</div>

<?php get_footer(); ?>