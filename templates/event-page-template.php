<?php
/**
 * Template Name: Events Page Template
 */
get_header();
?>

<div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Event</h1>
                  <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Event</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

<!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section">
          <div class="container">
            <div class="row">
             
              <div class="col-md-9">
                
               
                
                <div class="as-events as-grid-view">
                  <ul class="row">
                    
                      <?php                
            
                        $language = ICL_LANGUAGE_CODE;
                        $the_query = new WP_Query( 'post_type=events&language=' . $language );
                                      // The Loop
                        if ( $the_query->have_posts() ) {

                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();

                            $follow = get_post_meta( get_the_ID(), "_events_fb", true); 
                            $address = get_post_meta( get_the_ID(), "_events_address", true); 
                            $status = get_post_meta( get_the_ID(), "_events_status", true); 
                            
                            $statusTxt = "";
                            if ( $status == "as-free" ){
                                $statusTxt = 'Free';
                            }elseif ( $status == "as-cnl" ) {
                                $statusTxt = 'Cancelled';
                            }else{
                                $statusTxt = 'Upcoming';
                            }
                            
                            $pos = strpos(get_the_excerpt(), ' ', 100);
                            $pos = substr(get_the_excerpt(),0,$pos ); 
                        ?>
                    
                        <li class="col-md-4">
                          <div class="event-wrap">
                            <figure>
                                <?php the_post_thumbnail('events'); ?>
                                <a href="<?php the_permalink(); ?>" class="event-hover"><i class="fa fa-angle-double-right"></i></a>
                            </figure>
                            <div class="as-event-info">
                              <div class="as-info-wrap">
                                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  <p><?php echo $pos . '...'; ?></p>
                                <ul>
                                  <li><i class="fa fa-map-marker"></i> <?php echo $address; ?></li>
                                  <li><i class="fa fa-facebook-official"></i> Follow us on Facebook</li>
                                </ul>
                              </div>
                              <a href="<?php the_permalink(); ?>" class="as-event-btn <?php echo $status; ?>"> <?php echo $statusTxt; ?></a>
                            </div>
                          </div>
                        </li>
                    
                     <?php  }

                        } else {
                                // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    ?> 
                    
                  </ul>
                </div>

               

              </div>
             
                <?php get_sidebar( 'right' ); ?>

            </div>
          </div>
        </div>
        <!--// MainSection //-->

      </div>

 </div>
    <!--// Main Wrapper //-->

    

<?php get_footer(); ?>