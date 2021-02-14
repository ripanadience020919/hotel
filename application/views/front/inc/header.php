<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();?>static/LOGO-PNG-1.png" type="image/x-icon">
    <title><?php echo $title;?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if(!empty($list2->meta_description)) { echo $list2->meta_description; } ?>">
    <meta name="keywords" content="<?php if(!empty($list2->meta_keywords)) { echo $list2->meta_keywords; } ?>">
    <meta name="author" content="<?php if(!empty($list2->meta_title)) { echo $list2->meta_title; } ?>">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/gallery.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/vit-gallery.css">
    <link rel="shortcut icon" type="text/css" href="<?php echo base_url();?>static/LOGO-PNG-1.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/styles.css">
    <style type="text/css">
        .curve{
            border-radius: 10px;
        }

        nav a.navbar-brand img{width: 80px;}
        .header-sky .navbar .navbar-header .navbar-brand{
          padding-top: 6px;
        }

        .footer-logo img{width: 30% !important;}

        .gallery-our{
          background: transparent;
          background-color: #ececec;
        }

        .gallery-our .gallery .title-gallery {
    color: #232323;
}
.gallery-our .gallery .nav-tabs li a{
  color: #232323;
}

.footer-sky .footer-top{
    background: #bd8110;
}

.header-sky.header-top-sky .navbar{
  background-color: rgba(8, 3, 3, 0.9);
  opacity: 1;
}

.header-sky{border-bottom: 1px solid #fff;}

.find-hotel img.rounded-circle{height: 250px;width: 250px;}

.gallery-our .gallery .gallery_product{padding: 0 5px;}

        @media (max-width: 767px){
.header-sky .navbar .navbar-header .navbar-brand img{width: 16%;margin: 2px 0 0 15px;}
.navbar-brand{float:none;padding: 0;}

.check-avail .adults{width: 100% !important;}
.navbar-header{margin-top: 3px;}
.find-hotel img.rounded-circle {
    height: auto;
    width: auto;
}

.box-img{margin-bottom: 15px;}

        }
    </style>

</head>

<body>

    <!-- HEADER -->
    <header class="header-sky">
        <div class="container">
            <!--HEADER-TOP-->
            <div class="header-top">
                <!-- <div class="header-top-left">
                    <span><i class="ion-android-cloud-outline"></i>18 �C</span>
                    <span><i class="ion-ios-location-outline"></i> 121 King Str, Melbourne Victoria</span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> 1-548-854-8898</span>
                </div> -->
                <div class="header-top-right">
                    <?php
                            if ($this->session->userdata('name') == '') {
                    ?>
                    <ul>
                        <li class="dropdown"><a href="<?php echo base_url().'home/login'?>" title="LOGIN" class="dropdown-toggle">LOGIN</a></li>
                        <li class="dropdown"><a href="<?php echo base_url().'home/register'?>" title="REGISTER" class="dropdown-toggle">REGISTER</a></li>
                    </ul>
                    <?php
                            }else{
                    ?>
                    <ul>
                        <li class="dropdown"><a href="#" title="" class="dropdown-toggle">Welcome, <?php echo $this->session->userdata('name');?></a></li>
                        <!--<li class="dropdown"><a href="#" title="" class="dropdown-toggle"></a></li>-->
                        <li class="dropdown"><a href="#!" title="" class="dropdown-toggle">My Account</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url().'home/my_profile'?>"><i class="fa fa-user" aria-hidden="true" ></i>
                                <strong>Profile</strong></a></li>
                             <li><a href="<?php echo base_url().'home/logout'?>"><i class="fa fa-sign-out" aria-hidden="true"></i><strong>Logout</strong></a></li>

                    </ul>
                    <style>
                    .header-sky .header-top .header-top-right .dropdown-menu {
                        border-radius: 0px;
                    }
                        .dropdown-menu li a i{
                            padding-right:7px;
                        }


                        .dropdown-menu li a{
                            color:#000;
                        }
                        .header-sky .header-top .header-top-right ul .dropdown .dropdown-toggle {
                            display: inline;
                            padding: 11px 14.5px;
                        }



                    </style>

                        </li>
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
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                            <span class="icon-bar "></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url().'home'?>" title=""><img src="<?php echo base_url();?>static/LOGO-PNG-1.png" alt="#"></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown ">
                                <a href="<?php echo base_url().'home'?>" title="Home">Home</a>
                            </li>

                            <li><a href="<?php echo base_url().'home/about'?>" title="About">About</a></li>
                            <li class="dropdown ">
                                <a href="<?php echo base_url().'home/rate'?>" title="Room & Rate">Room & Rate</a>
                            </li>
                            <li><a href="<?php echo base_url().'home/contact'?>" title="Contact">Contact</a></li>
                            <?php
                             // if (!empty($this->session->userdata('name'))) {
                            ?>
                            <li><a href="<?php echo base_url().'partner-with-us'?>" title="Partner">Partner</a></li>
                            <?php
                            //}
                            ?>
                            <li class="dropdown ">
                                <a href="#" title="Location" class="dropdown-toggle" data-toggle="dropdown">Location<b class="caret"></b></a>
                                <ul class="dropdown-menu icon-fa-caret-up submenu-hover">
                                    <?php
                                        $loc = $this->home_model->locationsSrc();
                                            if (!empty($loc)) {
                                                foreach ($loc as $key => $value) {
                                    ?>
                                    <li><a href="<?php echo base_url();?>home/hotel_details/<?php echo $value['id']; ?>" title=""><?php echo $value['l_name'];?></a></li>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <li><a href="#" title="">Not Found</a></li>
                                            <?php
                                        }
                                    ?>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- END / MENU-HEADER -->
    </header>
    <!-- END-HEADER -->