<?php get_header(); ?>


 <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Team Detail</h1>
                  <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Team Detail</a></li>
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
                
                <?php
                    if (have_posts()) : while (have_posts()) : the_post();
                
                    $position = get_post_meta( get_the_ID(), "_staff_position", true); 
                    $fb = get_post_meta( get_the_ID(), "_staff_fb", true); 
                    $in = get_post_meta( get_the_ID(), "_staff_in", true); 
                    $tw= get_post_meta( get_the_ID(), "_staff_tw", true); 
                
                ?>		
                
                    <figure class="as-team-thumb">
                        <a href="#"><?php the_post_thumbnail('staff'); ?></a>
                    </figure>
                    <div class="as-team-detail">
                      <h2><?php the_title(); ?></h2>
                      <p><?php the_content(); ?></p>
                      <ul class="as-team-network">
                        <li><a href="<?php echo $fb; ?>" class="as-bgcolorhover fa fa-facebook"></a></li>
                        <li><a href="<?php echo $tw; ?>" class="as-bgcolorhover fa fa-twitter"></a></li>
                        <li><a href="<?php echo $in; ?>" class="as-bgcolorhover fa fa-linkedin"></a></li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>

                <?php endwhile; endif; ?>
                
              </div>

             <?php get_sidebar( 'right' ); ?>

            </div>
          </div>
        </div>
        <!--// MainSection //-->

      </div>
<?php get_footer(); ?>