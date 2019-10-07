<?php
/**
 * Template Name: Registration Page Template
 */
get_header();
?>

 <!-- Intro Section -->
        <!-- ============================================= -->
        <section class="section-intro breadcrumbs-right bg-img servicesBg stellar" data-stellar-background-ratio="0.4">
            <div class="intro-with-floating-menu-topbar"></div>
            <div class="bg-overlay gradient-1"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <h1 class="intro-title text-left mb0">registration</h1>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="page-breadcrumbs">
                            <a href="#">home</a> <span class="separator"> / </span> <a href="#" class="active">services</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        
        
        <!-- ============================================= -->
        
                <section class="regBg ">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3">
                                <h4 class="intro-title mb20 text-left"><i class="icon icon_pencil-edit icon-5"></i>  VoIP համարի ձեռքբերման հայտ</h4>
                                <div class="br-bottom"></div>
                                <div class="mb50"></div>
                            </div>
                        </div>
                        <div class="row col-p30">
                            <div class="col-sm-12 col-md-6 sm-box3 col-md-offset-3">
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
                                        <label class="mb10">
                                            <input type="text" name="val_fname" id="val_fname" class="form-control" placeholder=" <?php _e( 'First Name', 'voip-text' ); ?>">
                                        </label>                                        
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="text" name="val_lname" id="val_lname" class="form-control" placeholder=" Last Name">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="text" name="val_lname" id="val_pname" class="form-control" placeholder=" Patronymic">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <select class="form-control">
                                                <option>Organization</option>
                                                <option>organization 1</option>
                                                <option>organization 2</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="text" name="val_lname" id="val_pname" class="form-control" placeholder=" Date of Birth">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="text" name="val_lname" id="val_position" class="form-control" placeholder=" Position">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="email" name="val_email" id="val_email" required class="form-control" placeholder=" Email Address* (only From ASNET)">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <input type="text" name="val_mobile" id="val_email" required class="form-control" placeholder=" Mobile Number">
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                            <select class="form-control">
                                                <option>City</option>
                                                <option>type 1</option>
                                                <option>type 2</option>
                                            </select>
                                            
                                        </label>
                                    </div>
                                    <div class="row col-p10">
                                        <label class="mb10">
                                             <select class="form-control">
                                                <option>Type of number</option>
                                                <option>Dinamic</option>
                                                <option>Stationery</option>
                                            </select>
                                            
                                        </label>
                                    </div>
                                    
                                    <div class="mb40"></div>
                                    <div class="clearfix">

                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-icon btn-e"><i class="icon icon_pencil-edit"></i> <?php _e( 'Registration', 'voip-text' ); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>

                    </div>
                </section>

       
    

<?php get_footer(); ?>