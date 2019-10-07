<?php
/**
 * Template Name: Contacts Page Template
 */
get_header();
?>


<!-- ============================================= -->
<div class="contact-header"></div>
        <section class="contact-map-overlay page-contact">

            <div id="google-map" class="map-fullscreen"></div>

            <a href="#" id="contact-see-map"><span><i class="icon icon_pin_alt"></i></span></a>

            <div class="bg-overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="intro-title mb20 text-left">Contact us</h1>
                        <div class="br-bottom"></div>
                        <div class="mb50"></div>
                    </div>
                </div>
                <div class="row col-p30">
                    <div class="col-sm-12 col-md-8 sm-box3">
                        <form class="form ajax-contact-form" method="post" action="php/contact.php">
                            <div class="alert alert-success hidden" id="contact-success">
                                <span class="glyphicon glyphicon-ok "></span> &nbsp;
                                <strong>Success!</strong> Thank you for your message.
                            </div>
                            <div class="alert alert-danger hidden" id="contact-error">
                                <span class="glyphicon glyphicon-remove "></span> &nbsp;
                                <strong>Error!</strong> Oops, something went wrong.
                            </div>
                            <div class="row col-p10">
                                <div class="col-sm-6">
                                    <label class="mb10">
                                        <input type="text" name="val_fname" id="val_fname" class="form-control" placeholder=" First Name">
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mb10">
                                        <input type="text" name="val_lname" id="val_lname" class="form-control" placeholder=" Last Name">
                                    </label>
                                </div>
                            </div>
                            <div class="row col-p10">
                                <div class="col-sm-6">
                                    <label class="mb10">
                                        <input type="text" name="val_subject" id="val_subject" required class="form-control" placeholder=" Subject *">
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mb10">
                                        <input type="email" name="val_email" id="val_email" required class="form-control" placeholder=" Email Address *">
                                    </label>
                                </div>
                            </div>
                            <label>
                                <textarea name="val_message" id="val_message" cols="30" rows="10" required class="form-control" placeholder=" Message *"></textarea>
                            </label>
                            <div class="mb40"></div>
                            <div class="clearfix">
                                
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-icon btn-e"><i class="icon icon_mail_alt"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="row">
                            <div class="col-sm-6 col-md-12 mb30">
                                <div class="box-services-6">
                                    <div class="box-services-2">
                                        <div class="box-left"><i class="icon icon-4 icon_pin_alt"></i></div>
                                        <div class="box-right">
                                            <p class="mb0"> Armenia, Yerevan <br> 1, P. Sevak str.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 mb30">
                                <div class="box-services-6">
                                    <div class="box-services-2">
                                        <div class="box-left"><i class="icon icon-4 icon_mobile"></i></div>
                                        <div class="box-right">
                                            <p class="mb0"> 010 52 67 42 <br/> 060 62 35 05</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <div class="box-services-6">
                                    <div class="box-services-2">
                                        <div class="box-left"><i class="icon icon-4 icon_clock_alt"></i></div>
                                        <div class="box-right">
                                            <p class="mb0">Mon - Fri: 9:00 - 18:00 <br> Sat - Sun: Closed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    
	
	

<?php get_footer(); ?>