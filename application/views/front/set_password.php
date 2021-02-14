<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/front/images/favicon.png" type="image/x-icon">
    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/gallery.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/vit-gallery.css">
    <link rel="shortcut icon" type="text/css" href="<?php echo base_url(); ?>assets/front/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/styles.css">
</head>

<body>

    <!-- HEADER -->
    <header class="header-sky">
        <div class="container">
            <!--HEADER-TOP-->
            <div class="header-top">
                <!-- <div class="header-top-left">
                    <span><i class="ion-android-cloud-outline"></i>18 °C</span>
                    <span><i class="ion-ios-location-outline"></i> 121 King Str, Melbourne Victoria</span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> 1-548-854-8898</span>
                </div> -->
                <div class="header-top-right">
                    <?php
if ($this->session->userdata('name') == '') {
    ?>
                    <ul>
                        <li class="dropdown"><a href="<?php echo base_url() . 'home/login' ?>" title="LOGIN"
                                class="dropdown-toggle">LOGIN</a></li>
                        <li class="dropdown"><a href="<?php echo base_url() . 'home/register' ?>" title="REGISTER"
                                class="dropdown-toggle">REGISTER</a></li>
                    </ul>
                    <?php
} else {
    ?>
                    <ul>
                        <li class="dropdown"><a href="#" title="REGISTER" class="dropdown-toggle">Welcome,
                                <?php echo $this->session->userdata('name'); ?></a></li>
                        <li class="dropdown"><a href="#" title="REGISTER" class="dropdown-toggle"></a></li>
                        <li class="dropdown"><a href="<?php echo base_url() . 'home/logout' ?>" title="REGISTER"
                                class="dropdown-toggle">LOGOUT</a></li>
                    </ul>
                    <?php
}
?>
                </div>
            </div>
            <!-- END/HEADER-TOP -->
        </div>
        <!-- MENU-HEADER -->
        <div class="menu-header">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url() . 'home' ?>" title="Skyline"><img
                                src="<?php echo base_url(); ?>assets/front/images/Home-1/logo-icon.png" alt="#"></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown ">
                                <a href="<?php echo base_url() . 'home' ?>" title="Home">Home</a>
                            </li>
                            <li><a href="<?php echo base_url() . 'home/about' ?>" title="About">About</a></li>
                            <li class="dropdown ">
                                <a href="<?php echo base_url() . 'home/rate' ?>" title="Room & Rate">Room & Rate</a>
                            </li>
                            <li><a href="<?php echo base_url() . 'home/contact' ?>" title="Contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- END / MENU-HEADER -->
    </header>
    <!-- END-HEADER -->
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">RESET PASSWORD</h2>
                <h5 class="p-v1">
                    <?php
$success = $this->session->userdata('success');
if ($success != "") {
    ?>
                    <div class="alert alert-success"><b><?php echo $success ?></b></div>
                    <?php } else {?>
                    <?php
$failure = $this->session->userdata('failure');
    if ($failure != "") {?>
                    <div class="alert alert-danger"><b><?php echo $failure ?></b></div>
                    <?php
}
}
?>
                </h5>

                <form method="post" action="<?php echo base_url() . 'home/update_password_mail' ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <input type="Password" class="form-control" name="npassword" value=""
                            placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <input type="Password" class="form-control" name="cpassword" value=""
                            placeholder="Enter Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-default">UPDATE PASSWORD</button>
                </form>
                <p><a href="<?php echo base_url() . 'home/register' ?>" style="color: #ffff">I don’t have an account</a>
                    &nbsp;- &nbsp; <a href="<?php echo base_url() . 'home/show_forgotpassword_form' ?>"
                        style="color: #ffff">Forgot Password</a></p>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->

    <!--FOOTER-->
    <footer class="footer-sky">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                        <div class="icon-email">
                            <a href="#" title="Email"><img
                                    src="<?php echo base_url(); ?>assets/front/images/Home-1/footer-top-icon-l.png"
                                    alt="Email" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                        <div class="textbox">
                            <form class="form-inline">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Your email address"
                                            aria-label="Search for...">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="ion-android-send"></i>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 text-right">
                        <div class="footer-icon-l">
                            <a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="#" title="Tripadvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                            <a href="#" title="Isnstagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-top -->
        <div class="footer-mid">
            <div class="container">
                <div class="row padding-footer-mid">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-logo text-center list-content">
                            <a href="index.html" title="Skyline"><img
                                    src="<?php echo base_url(); ?>assets/front/images/Home-1/sky-logo-footer.png"
                                    alt="Image"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1  ">
                        <div class="list-content">
                            <ul>
                                <li><a href="attractions.html" title="">Site Map</a></li>
                                <li><a href="tems_condition_1.html" title="">Term & Conditions</a></li>
                                <li><a href="#" title="">Privacy Policy</a></li>
                                <li><a href="#" title="">Help</a></li>
                                <li><a href="#" title="">Affiliate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1 ">
                        <div class="list-content ">
                            <ul>
                                <li><a href="#" title="">Our Location</a></li>
                                <li><a href="#" title="">Career</a></li>
                                <li><a href="about.html" title="">About Us</a></li>
                                <li><a href="contact.html" title="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1">
                        <div class="list-content ">
                            <ul>
                                <li><a href="#" title="">FAQS</a></li>
                                <li><a href="#" title="">News</a></li>
                                <li><a href="gallery_1.html" title="">Photo & Video</a></li>
                                <li><a href="restaurant_1.html" title="">Restaurant</a></li>
                                <li><a href="#" title="">Gift Card</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
                        Copyright © 2017 by <a href="#" title="">EngoTheme.</a> SkyLine Hotel Theme crafted with love
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
                        <div class="payments text-right">
                            <ul>
                                <li>
                                    <a href="#" title="Paypal"><img
                                            src="<?php echo base_url(); ?>assets/front/images/Home-1/Paypal.png"
                                            alt="Paypal"></a>
                                </li>
                                <li>
                                    <a href="#" title="Visa"><img
                                            src="<?php echo base_url(); ?>assets/front/images/Home-1/Visa.png"
                                            alt="Visa"></a>
                                </li>
                                <li>
                                    <a href="#" title="Master"><img
                                            src="<?php echo base_url(); ?>assets/front/images/Home-1/Master-card.png"
                                            alt="Master"></a>
                                </li>
                                <li>
                                    <a href="#" title="Discover"><img
                                            src="<?php echo base_url(); ?>assets/front/images/Home-1/Discover.png"
                                            alt="Discover"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END / FOOTER-->

    <!--SCOLL TOP-->
    <a href="#" title="sroll" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <!--END / SROLL TOP-->

    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/vit-gallery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.countTo.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.appear.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.littlelightbox.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/sky.js"></script>

</body>

</html>