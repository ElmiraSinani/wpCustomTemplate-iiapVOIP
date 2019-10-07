<?php
/**
 * Template Name: Team Page Template
 */
get_header();
?>


    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">     

      <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Team List</h1>
                  <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Team</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section" style=" padding-bottom: 20px; ">
          <div class="container">
            <div class="row">
             
              <div class="col-md-9">
                
                <div class="as-volunteer as-teamlist-view">
                  <ul class="row">
                    
                    <?php                
            
                    $language = ICL_LANGUAGE_CODE;
                    $the_query = new WP_Query( 'post_type=our_staff&language=' . $language );
                                  // The Loop
                    if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        $position = get_post_meta( get_the_ID(), "_staff_position", true); 
                        $fb = get_post_meta( get_the_ID(), "_staff_fb", true); 
                        $in = get_post_meta( get_the_ID(), "_staff_in", true); 
                        $tw= get_post_meta( get_the_ID(), "_staff_tw", true); 
                        
                    ?>
                      
                    <li class="col-md-12">
                      <div class="as-team-wrap">
                        <figure><a href="#"><?php the_post_thumbnail('staff'); ?></a></figure>
                        <div class="as-team-info">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          <span><?php echo $position; ?></span>
                          <p>
                              <?php the_excerpt(); ?>
                          </p>
                          <ul class="as-team-network">
                            <li><a href="<?php echo $fb; ?>" class="as-bgcolorhover fa fa-facebook"></a></li>
                            <li><a href="<?php echo $tw; ?>" class="as-bgcolorhover fa fa-twitter"></a></li>
                            <li><a href="<?php echo $in; ?>" class="as-bgcolorhover fa fa-linkedin"></a></li>
                          </ul>
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