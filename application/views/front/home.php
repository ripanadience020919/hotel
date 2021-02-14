<style type="text/css">
        .testimonials {
            background: url(<?php echo base_url();?>assets/front/images/Home-1/testimonials-img.jpg);
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            text-align: center;
            position: relative;
            width: 100%;
        }
    </style>


    <section class="section-slider height-v">
        <div id="index12" class="owl-carousel  owl-theme">
            <?php
            if (!empty($banner))
            {
                foreach ($banner as $key => $value)
                {
                    $pd_imgs=empty($value['images'])?base_url('static/default.jpg'):base_url('assets/admin/uploads/banner/').$value['images'];
                    ?>
                    <div class="item">
                        <img alt="Third slide" src="<?php echo $pd_imgs;?>" class="img-responsive" style="height:700px;">
                        <div class="carousel-caption">
                            <h1><?php echo $value['title']; ?></h1>
                            <p><span class="line-t"></span><?php echo $value['sub_title']; ?><span class="line-b"></span></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>

        <div class="check-avail">
            <div class="container">
                <div class="adults date-title curve" style="width: 20%;">
                    <label>Location</label>
                    <form>
                        <div class=" carousel-search">
                            <div class="btn-group">

                                <select id="location" class="input-group-addon" style="background: transparent;margin-top: 25px;width: 151%;  margin-left: -22px;border: 1px solid #8E7037;">
                                    <option>Select</option>
                                    <?php
                                    if (!empty($list1))
                                    {
                                        foreach ($list1 as $key => $value)
                                        {
                                    ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['l_name'];?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="arrival date-title curve">
                    <label>Arrival Date </label>
                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control" id="arrival" type="text">
                        <span class="input-group-addon"><img src="<?php echo base_url();?>assets/front/images/Home-1/date-icon.png" alt=""></span>
                    </div>
                </div>
                <div class="departure date-title curve">
                    <label>Departure Date </label>
                    <div id="datepickeri" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control" id="departure" type="text">
                        <span class="input-group-addon"><img src="<?php echo base_url();?>assets/front/images/Home-1/date-icon.png" alt=""></span>
                    </div>
                </div>
                <div class="adults date-title curve">
                    <label>Guest</label>
                    <form>
                        <div class=" carousel-search">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle " data-toggle="dropdown" href="#" id="guest">2</a>
                                <ul class="dropdown-menu">
                                    <li><a>1</a></li>
                                    <li><a>2</a></li>
                                    <li><a>3</a></li>
                                    <li><a>4</a></li>
                                    <li><a>5</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="find_btn date-title curve">
                    <div class="text-find">
                        Check
                        <br>Availability
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- OUR-ROOMS-->
    <section class="rooms">
        <div class="container">
            <h2 class="title-room">Find Hotels Around Northeast</h2>
            <div class="outline"></div>
            <p class="rooms-p">We have a category of different locations and the best stay options for you to choose</p>
            <div class="wrap-rooms">
                <div class="row">
                    <div id="rooms" class="owl-carousel owl-theme">
                        <div class="item ">
                            <?php
                                    if (!empty($list1)) {
                                        foreach ($list1 as $key => $value) {
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 " style="margin-top: 60px;opacity: 0.9;" onMouseOver="this.style.opacity='1'" onMouseOut="this.style.opacity='0.9'">
                                <a href="<?php echo base_url();?>home/hotel_details/<?php echo $value['id']; ?>">
                                    <div class="div-relative-c find-hotel" style="position: relative;text-align: center;font-size: 1rem;font-weight: 400;line-height: 1.5;">
                                        <img class="owl-lazy rounded-circle img-responsive" src="<?php echo base_url().'assets/admin/uploads/locations/'.$value['image']?>" alt="Private Vacation Homes in Alibaug" style="opacity: 1;border-radius: 50%;">
                                        <div class="overlay-center-txt" style="position: absolute;width: 100%;bottom: 43%;text-align: center;"><span class="loc-name" style="font-weight: bold;font-size: 18px;color: #8e7037;    background: white;" ><?php echo $value['l_name'];?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <!-- <a href="<?php echo base_url();?>home/hotel_details/<?php echo $value['id']; ?>">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?php echo base_url().'assets/admin/uploads/locations/'.$value['image']?>" class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                    </div>
                                    <div class="rooms-content">
                                        <h4 class="sky-h4"><?php echo $value['l_name'];?></h4>
                                    </div>
                                </div>
                            </div>
                        </a> -->
                            <?php
                                    }
                                }
                            ?>

                        </div>

                        <!-- <div class="item ">
                            <?php
                                    if (!empty($list2)) {
                                        foreach ($list2 as $key => $value1) {
                            ?>
                        <a href="<?php echo base_url();?>home/room_details/<?php echo $value1['id']; ?>">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?php echo base_url().'assets/admin/uploads/locations/'.$value1['image']?>" class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                    </div>
                                    <div class="rooms-content">
                                        <h4 class="sky-h4"><?php echo $value['l_name'];?></h4>
                                        <p class="price">₹ <?php
                                                $price = explode(',', $value1['actual_price']);
                                                echo $price[0];
                                                ?> / Per Night</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                            <?php
                                    }
                                }
                            ?>
                        </div> -->
                        <!-- <div class="item ">
                            <?php
                                    if (!empty($list3)) {
                                        foreach ($list3 as $key => $value2) {
                            ?>
                        <a href="<?php echo base_url();?>home/room_details/<?php echo $value2['id']; ?>">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?php echo base_url().'assets/admin/uploads/locations/'.$value2['image']?>" class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                    </div>
                                    <div class="rooms-content">
                                        <h4 class="sky-h4"><?php echo $value['l_name'];?></h4>
                                        <p class="price">₹ <?php
                                                $price = explode(',', $value2['actual_price']);
                                                echo $price[0];
                                                ?> / Night</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                            <?php
                                    }
                                }
                            ?>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /container -->
    </section>
    <!-- END / ROOMS -->

    <!-- ABOUT-US-->
    <!-- <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="about-centent">
                        <h2 class="about-title">About Us</h2>
                        <div class="line"></div>
                        <p class="about-p">Contrary to popular belief, Lorem isn’t simply random text. It has roots in a of classical Latin literature from 45 BC, making it over 2000 years old. Avalon’s leading hotels with gracious island hospitality, thoughtful amenities and distinctive</p>
                        <p class="about-p1">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage ...</p>
                        <a href="#" class="read-more">READ MORE </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ">
                    <div class="about-img">
                        <div class="img-1">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-3.jpg" class="img-responsive" alt="Image">
                            <div class="img-2">
                                <img src="<?php echo base_url();?>assets/front/images/Home-1/about-1.jpg" class="img-responsive" alt="Image">
                            </div>
                            <div class="img-3">
                                <img src="<?php echo base_url();?>assets/front/images/Home-1/about-2.jpg" class="img-responsive" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                    <div class="about-centent curve">
                        <h2 class="about-title">About Us</h2>
                        <div class="line"></div>
                        <p class="about-p"><?php echo $about_us['about_us'];?></p>
                        <a href="<?php echo base_url().'home/about'?>" class="read-more">READ MORE </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ">
                    <div class="about-img">
                        <?php
                        $pd3=explode(',', $about_us['images']);
                        $pd_imgs1=empty($pd3[0])?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd3[0];
                        $pd_imgs2=empty($pd3[1])?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd3[1];
                        $pd_imgs3=empty($pd3[2])?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd3[2];
                        ?>
                        <div class="img-1 curve" style="width: 100%;">
                            <img src="<?php echo $pd_imgs1;?>" class="img-responsive curve" alt="Image">
                            <div class="img-2 curve" style="position: absolute;top: 45%;margin: 0px 0px 0px -55px;left: 0%;width: 65%;box-shadow: -4px 4px 20px 0px #f0f0f0;">
                                <img src="<?php echo $pd_imgs2;?>" class="img-responsive curve" alt="Image">
                            </div>
                            <div class="img-3 curve" style="position: absolute;top: 85%;margin: 0px 0px 0px -55px;width: 65%;box-shadow: -4px 4px 20px 0px #f0f0f0;">
                                <img src="<?php echo $pd_imgs3;?>" class="img-responsive curve" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END/ ABOUT-US-->

    <!-- BEST -->
    <section class="best">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-1.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Master Bedrooms</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-2.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Sea View Balcony</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-3.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Pool & Spa</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-4.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">Wifi Coverage</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-5.png" class="img-responsive" alt="Image">
                        </div>
                        <h6 class="sky-h6">AwESOME pACKAGES</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-6.png" class="img-responsive curve" alt="Image">
                        </div>
                        <h6 class="sky-h6">cLEANING eVERDAY</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-7.png" class="img-responsive curve" alt="Image">
                        </div>
                        <h6 class="sky-h6">bUTFFET Breakfast</h6>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="wrap-best curve">
                        <div class="icon-best">
                            <img src="<?php echo base_url();?>assets/front/images/Home-1/about-icon-8.png" class="img-responsive curve" alt="Image">
                        </div>
                        <h6 class="sky-h6">Airport Taxi</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / BEST -->

    <!-- TESTIMONOALS -->
    <section class="testimonials">
        <div class="testimonials-h">
            <div class="testimonials-content">
                <div class="container">
                    <div id="testimonials" class="owl-carousel owl-theme">
                        <?php
                        if(!empty($testi))
                        {
                            foreach($testi as $testi1)
                            {
                                $pd_imgs=empty($testi1['images'])?base_url('static/default.jpg'):base_url('assets/admin/uploads/hotels/').$testi1['images'];
                                ?>
                                 <div class="item ">
                                    <div class="img-testimonials"><img src="<?php echo $pd_imgs;?>" alt="#"></div>
                                    <p class="testimonials-p"><span>“</span> <?php echo $testi1['messege']; ?> <span>”</span></p>
                                    <h5 class="sky-h5"><?php echo $testi1['name']; ?></h5>
                                    <p class="testimonials-p1"><?php echo $testi1['address']; ?></p>
                                </div>
                                <?php
                                
                            }
                        }
                        ?>
                       
                        <!--<div class="item">-->
                        <!--    <div class="img-testimonials"><img src="<?php echo base_url();?>assets/front/images/Home-1/about-testimonials-img.png" alt="#"></div>-->
                        <!--    <p class="testimonials-p"><span>“</span> Thisis the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing onthe cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your <span>”</span> ocean view window and then to top it all off...</p>-->
                        <!--    <h5 class="sky-h5">JULIA ROSE</h5>-->
                        <!--    <p class="testimonials-p1">From Los Angeles, California</p>-->
                        <!--</div>-->
                        <!--<div class="item">-->
                        <!--    <div class="img-testimonials"><img src="<?php echo base_url();?>assets/front/images/Home-1/about-testimonials-img.png" alt="#"></div>-->
                        <!--    <p class="testimonials-p"><span>“</span> This is the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your <span>”</span> ocean view window and then to top it all off...</p>-->
                        <!--    <h5 class="sky-h5">JULIA ROSE</h5>-->
                        <!--    <p class="testimonials-p1">From Los Angeles, California</p>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / TESTIMONOALS -->

    <!--OUR-EVENTS-->
    <!-- <section class="events">
        <div class="container">
            <h2 class="events-title">Our Events</h2>
            <div class="line"></div>
            <div id="events-v2" class="owl-carousel owl-theme">
                <div class="item ">
                    <div class="events-item">
                        <div class="events-img"><img src="<?php echo base_url();?>assets/front/images/Home-1/Our-Events-1.jpg" class="img-responsive" alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3">Wedding Day</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="events-item">
                        <div class="events-img"><img src="<?php echo base_url();?>assets/front/images/Home-1/Our-Events-2.jpg" class="img-responsive" alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3">Golf Cup 2017</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="events-item">
                        <div class="events-img"><img src="<?php echo base_url();?>assets/front/images/Home-1/Our-Events-3.jpg" class="img-responsive" alt="Image"></div>
                        <div class="events-content">
                            <a href="#" title="">
                                <p class="sky-p">EVENTS</p>
                                <h3 class="sky-h3"> Beach Sports</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- END / OUR EVENTS -->

    <!--OUR-NEWS-->
    <!-- <section class="news">
        <div class="container">
            <h2 class="new-title">News</h2>
            <div class="line"></div>
            <div class="row">
                <div class="news-content">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="substance">
                            <div class="date">
                                <div class="day">25</div>
                                <div class="year"> AUGUST
                                    <br>2017</div>
                            </div>
                            <div class="text">
                                <a href="#">Update menu food in Skyline Hotel</a>
                            </div>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="substance">
                            <div class="date">
                                <div class="day">22</div>
                                <div class="year"> AUGUST
                                    <br>2017</div>
                            </div>
                            <div class="text">
                                <a href="#">Las Maquinas on Tragamonedas</a>
                            </div>
                            <a href="#" class="read-more">Read More </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="substance">
                            <div class="date">
                                <div class="day">06</div>
                                <div class="year"> AUGUST
                                    <br>2017</div>
                            </div>
                            <div class="text">
                                <a href="#">Mother Earth Hosts Our Travels</a>
                            </div>
                            <a href="#" class="read-more">Read More </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- END / OUR NEWS -->

    <!-- OUR-GALLERY-->
    <section class="gallery-our">
        <div class="container-fluid">
            <div class="gallery">
                <h2 class="title-gallery">Our Gallery</h2>
                <div class="outline"></div>
                <ul class="nav nav-tabs text-uppercase">
                    <?php
                   /* if (!empty($list3))
                    {
                         foreach ($list3 as $value)
                         {
                             ?>
                             <li class=""><a data-toggle="tab" href="#Hotel<?php echo $value['id'] ?>"><?php echo $value['tag_name']; ?></a></li>
                             <?php
                         }
                    } */
                    ?>
                    <?php
                                if (!empty($list3))
                                {
                                     foreach ($list3 as $value)
                                     {
                                         ?>
                                         
                    <li class="active"><a data-toggle="tab" href="#Hotel"><?php echo $value['cat1'];?></a></li>
                    <li><a data-toggle="tab" href="#menu1"><?php echo $value['cat2'];?> </a></li>
                    <li><a data-toggle="tab" href="#menu2"><?php echo $value['cat3'];?></a></li>
                    <li><a data-toggle="tab" href="#menu3"><?php echo $value['cat4'];?></a></li>
                    <?php
                                     }
                                }
                                     ?>
                    
                    
                </ul>
                <br/>
                <div class="tab-content">
                    <div id="Hotel" class="tab-pane fade in active">
                        <div class="product ">
                            <div class="row">
                                <?php
                                if (!empty($list3))
                                {
                                     foreach ($list3 as $value)
                                     {
                                        $pd=explode(',', $value['h_image']);
                                        foreach ($pd as $pd_img)
                                        {
                                            $pd_img1=empty($pd_img)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img;
                                           ?>
                                           <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                                <div class="wrap-box">
                                                    <div class="box-img">
                                                        <img src="<?php echo $pd_img1;?>" class="img-responsive curve" alt="Product" title="images products">
                                                    </div>
                                                    <div class="gallery-box-main " title>
                                                        <div class="gallery-icon">
                                                            <a class="lightbox " href="<?php echo $pd_img1;?>" data-littlelightbox-group="gallery" title=""><i class="ion-ios-plus-empty" aria-hidden="true" ></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <?php
                                        }
                                        //
                                         ?>

                                            <?php
                                        }
                                    }
                                    ?>


                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <?php
                                if (!empty($list3))
                                {
                                     foreach ($list3 as $value)
                                     {
                                        $pd1=explode(',', $value['r_image']);
                                        foreach ($pd1 as $pd_img1)
                                        {
                                            $pd_imgs2=empty($pd_img1)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img1;
                                           ?>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="<?php echo $pd_imgs2;?>" class="img-responsive curve" alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="<?php echo $pd_imgs2;?>" data-littlelightbox-group="gallery" title=""><i class="ion-ios-plus-empty" aria-hidden="true" ></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <?php
                                if (!empty($list3))
                                {
                                     foreach ($list3 as $value)
                                     {
                                        $pd2=explode(',', $value['b_image']);
                                        foreach ($pd2 as $pd_img2)
                                        {
                                            $pd_imgs3=empty($pd_img2)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img2;
                                           ?>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="<?php echo $pd_imgs3;?>" class="img-responsive curve" alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="<?php echo $pd_imgs3;?>" data-littlelightbox-group="gallery" title=""><i class="ion-ios-plus-empty" aria-hidden="true" ></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div class="product ">
                            <div class="row">
                                <?php
                                if (!empty($list3))
                                {
                                     foreach ($list3 as $value)
                                     {
                                        $pd3=explode(',', $value['d_image']);
                                        foreach ($pd3 as $pd_img3)
                                        {
                                            $pd_imgs4=empty($pd_img3)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img3;
                                           ?>
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="<?php echo $pd_imgs4;?>" class="img-responsive curve" alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="<?php echo $pd_imgs4;?>" data-littlelightbox-group="gallery" title=""><i class="ion-ios-plus-empty" aria-hidden="true" ></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            }
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end-tab-content -->
                <!--<div class="text-center">-->
                <!--    <button type="button" class="btn btn-default btn-our">VIEW MORE</button>-->
                <!--</div>-->
            </div>
            <!-- /gallery -->
        </div>
        <!-- /container -->
    </section>
    <!-- END / OUR GALLERY -->


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.find_btn').click(function(){
                var arrival = $('#arrival').val();
                var departure = $('#departure').val();
                // alert(departure);
                var adults = $('#adults').text();
                var children = $('#children').text();
                alert(children);
            });
        });
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.find_btn').click(function(){
                event.preventDefault();
                var arrival = $('#arrival').val();
                var departure = $('#departure').val();
                var guest = $('#guest').text();
                var location = $('#location').val();
                    // alert(location);
                // var adults = $('#adults').text();
                // var children = $('#children').text();
                var url2="<?php echo base_url(); ?>home/check_room_by_date";
                $.ajax({
                  type: "POST",
                  enctype: 'multipart/form-data',
                  url: url2,
                  data:{arrival:arrival, departure:departure, guest:guest, location:location},
                  success: function (res) {
                    // alert(res);
                    if(res!=''){
                     // $('.wrap-rooms').html(res);
                     window.location.href="<?= base_url();?>home/hotel_detail/"+res+"";
                    }
                    else{
                     window.location.href="<?= base_url();?>home";
                    }
                    // alert(res);
                  },
                  /*error: function (e) {
                    alert("ERROR : ", e);
                  }*/
                });
            });
        });
    </script>