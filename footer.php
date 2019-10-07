
</div>



  <!-- Footer -->
        <!-- ============================================= -->
        <footer class="footer-wrapper footer-2">
            <div class="container">
                <div class="row col-p30">
                    <div class="col-sm-12 col-md-4">
                        <div class="footer-widget">
                            <h3 class="footer-title"><?php _e( 'About us', 'voip-text' ); ?></h3>
                            <p>So if you have the time, and I assure you that you do, get ready for a journey that is certain to, if not buy you more time to do what you like.</p>
                            <p class="mb0"><a href="#" class="read-more">
                                <?php _e( 'read more', 'voip-text' ); ?>     
                            <i class="icon arrow_carrot-2right"></i></a></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="footer-widget">
                            <h3 class="footer-title"><?php _e( 'Useful Links', 'voip-text' ); ?></h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'useful-links-1',
                                            'before'    => '<a><i class="icon arrow_carrot-right"></i></a>',
                                            'items_wrap'     => '<ul class="footer-links footer-links-2"> %3$s</ul>'
                                        ) );
                                    ?> 
                                </div>
                                <div class="col-sm-6">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'useful-links-2',
                                            'before'    => '<a><i class="icon arrow_carrot-right"></i></a>',
                                            'items_wrap'     => '<ul class="footer-links footer-links-2"> %3$s</ul>'
                                        ) );
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-4">
                        <div class="footer-widget">
                            <h3 class="footer-title"> <?php _e( 'Get in touch', 'voip-text' ); ?></h3>
                            <address class="contact-widget">
                                <p><i class="icon icon_pin_alt"></i> Armenia, Yerevan, 1, P. Sevak str.</p>
                                <p><i class="icon icon_mail_alt"></i> voip@sci.am</p>
                                <p><i class="icon icon_phone"></i> 010 52 67 42, 060 62 35 05</p>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-sm-push-6 col-md-push-6">
                            <div class="clearfix">
                                <div class="pull-right xs-pull-left">                                    
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'footer-menu',
                                            'items_wrap'     => '<ul class="footer-links">%3$s</ul>'
                                        ) );
                                    ?>    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-sm-pull-6 col-md-pull-6">
                            <p class="copyright">©2015 Asnet-Am VoIP service | <?php _e( 'All Rights Reserved', 'voip-text' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    </div>
    <!-- END Global Wrapper -->

    <!-- ============================================= -->
    <!-- Do not remove this -->
    <div class="check-media"></div>


    <!-- Javascript files -->
    <script src="<?php echo bloginfo('template_url'); ?>/libs/jquery-2.1.0.min.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/plugins.min.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/libs/owl-carousel/owl.carousel.min.js"></script>

    <script src="<?php echo bloginfo('template_url'); ?>/js/main.js"></script>
    <!-- Custom javascript code -->
     <script src="<?php echo bloginfo('template_url'); ?>/js/custom.js"></script> 
     
     <!--//for contacts page-->
      <!-- Google captcha code -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Interactive Google maps -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/libs/gmaps.js"></script>
    
    <?php //wp_footer(); ?>	
    <!-- Don't forget analytics -->  
    
  </body>
</html>
