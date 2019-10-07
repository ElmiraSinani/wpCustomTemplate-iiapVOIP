<?php get_header(); ?>


        <div class="as-minheader">
           <span class="full-pattren"></span>
           <div class="as-minheader-wrap">
             <div class="container">
               <div class="row">
                 <div class="col-md-9">
                   <div class="as-page-title">
                     <h1>Event Detail</h1>
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
        <div class="as-main-section" style=" padding-bottom: 20px; ">
          <div class="container">
            <div class="row">
                
                 <?php
                    if (have_posts()) : while (have_posts()) : the_post();
                
                    $fbFollow     = get_post_meta( $post->ID, '_events_fb', true );
                    $timing       = get_post_meta( $post->ID, '_events_timing', true );
                    $voice        = get_post_meta( $post->ID, '_events_voice', true );
                    $email        = get_post_meta( $post->ID, '_events_email', true );
                    $address      = get_post_meta( $post->ID, '_events_address', true );
                    $status       = get_post_meta( $post->ID, '_events_status', true );
                
                ?>	
             
                <div class="col-md-9 event-detail">
                <div class="as-event-contdown">
                  <span class="full-pattren"></span>
                  <?php the_post_thumbnail('sponsors'); ?>
                  <div class="as-event-caption">
                    <h2>upcoming event</h2>
                    <div id="eventCountdown"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="as-event-contact as-bgcolor">
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i>
                          <h2>TIMING</h2>
                          <span><?php echo $timing; ?></span>
                        </li>
                        <li>
                          <i class="fa fa-phone"></i>
                          <h2>VOICE</h2>
                          <span><?php echo $voice; ?></span>
                        </li>
                        <li>
                          <i class="fa fa-envelope-o"></i>
                          <h2>EMAIL</h2>
                          <span><?php echo $email; ?></span>
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>
                          <h2>address</h2>
                          <span><?php echo $address; ?></span>
                        </li>
                      </ul>
                      <!--<div class="as-linkbtn"><a href="#" class="as-download-btn">Download Poster</a></div>-->
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="as-detail-editor">
                        <h2><?php the_title(); ?> </h2>
                          <p><?php the_content(); ?></p>
                    </div>
                  </div>
                </div>
                <!--<blockquote>tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima eniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex.</blockquote>-->
<!--                <div class="as-event-gallery">
                  <h2>event <span class="as-color">gallery</span></h2>
                  <ul class="gallery">
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="extra-images/event-gallery-1.jpg" alt="">
                        <a href="extra-images/event-gallery-1.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="extra-images/event-gallery-2.jpg" alt="">
                        <a href="extra-images/event-gallery-2.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="extra-images/event-gallery-3.jpg" alt="">
                        <a href="extra-images/event-gallery-3.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="extra-images/event-gallery-4.jpg" alt="">
                        <a href="extra-images/event-gallery-4.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                  </ul>
                </div>-->
                <!--// Tags //-->
<!--                <div class="as-tags">
                  <span>Tags:</span>
                  <a href="#">Charity</a>
                  <a href="#">NGO</a>
                  <a href="#">PSD</a>
                </div>-->
                <!--// Tags //-->
                <!--// ShareNav //-->
<!--                <ul class="as-share-nav">
                  <li><span>Share Via:</span></li>
                  <li><a href="#" class="fa fa-facebook"></a></li>
                  <li><a href="#" class="fa fa-twitter"></a></li>
                  <li><a href="#" class="fa fa-linkedin"></a></li>
                  <li><a href="#" class="fa fa-pinterest-p"></a></li>
                  <li><a href="#" class="fa fa-google-plus"></a></li>
                </ul>-->
                <!--// ShareNav //-->

                <!--// NextPrev Post //-->
<!--                <div class="as-nextprev-post">
                  <ul class="row">
                    <li class="col-md-6 as-next">
                      <div class="as-post-wrap">
                        <figure><a href="#"><img src="extra-images/detail-post-1.jpg" alt=""></a></figure>
                        <div class="as-post-info">
                          <i class="fa fa-angle-left"></i>
                          <time datetime="2008-02-14 20:00">27, June 2015</time>
                          <h4><a href="#">Conflict in Democratic</a></h4>
                          <span>By: <a href="#">Jhon Doe</a></span>
                        </div>
                      </div>
                    </li>
                    <li class="col-md-6 as-prev">
                      <div class="as-post-wrap">
                        <figure><a href="#"><img src="extra-images/detail-post-2.jpg" alt=""></a></figure>
                        <div class="as-post-info">
                          <i class="fa fa-angle-right"></i>
                          <time datetime="2008-02-14 20:00">27, June 2015</time>
                          <h4><a href="#">Conflict in Democratic</a></h4>
                          <span>By: <a href="#">Jhon Doe</a></span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>-->
                <!--// NextPrev Post //-->
                
                <?php endwhile; endif; ?>
              </div>
                
             
             <?php get_sidebar( 'right' ); ?>
             

              

            </div>
          </div>
        </div>
        <!--// MainSection //-->

      </div>
<?php get_footer(); ?>