<?php get_header(); ?>


 <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>News Detail</h1>
                  <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">News</a></li>
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
                ?>	
                    <div class="as-team-detail">
                      <h2><?php the_title(); ?></h2>
                      <p><?php the_content(); ?></p>                      
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