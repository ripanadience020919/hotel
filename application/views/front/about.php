<head>
      <meta charset="UTF-8">
      <meta name="title" content="<?php echo $about_us['metatitle']?>">
      <meta name="keywords" content="<?php echo $about_us['keywords']?>">
      <meta name="description" content="<?php echo $about_us['metadescription']?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        .section-statistics {
            padding-top: 55px;
            padding-bottom: 80px;
            background: url(<?php echo base_url();?>assets/front/images/about/about-2.jpg) no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            text-align: center;
            position: relative;
            width: 100%;
        }
      </style>
</head>

<section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>About Us</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>
    <!-- MAP -->

    <!-- ABOUT -->
    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="wrap-about">
                    <!-- ITEM -->
                    <div class="about-item">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-right">
                            <!-- SLIDER -->
                            <div class="section-slider height-v-about">
                                <div id="index12" class="owl-carousel  owl-theme">
                                    <?php
                                    $pd3=explode(',', $about_us['images']);
                                        foreach ($pd3 as $pd_img3)
                                        {
                                            $pd_imgs4=empty($pd_img3)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img3;
                                    ?>
                                    <div class="item curve">
                                        <img alt="Third slide" src="<?php echo $pd_imgs4;?>" class="img-responsive curve">
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                    <!--<div class="item curve">-->
                                    <!--    <img alt="Third slide" src="<?php echo base_url();?>assets/front/images/about/about-1.jpg" class="img-responsive curve">-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <!-- END / SLIDER -->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-left">
                            <div class="text">
                                <h2 class="heading"><?php echo $about_us['title1'];?></h2>
                                <div class="desc">
                                    <?php echo $about_us['about_us'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="about-item about-right">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  no-padding-left col-lg-push-6 col-md-push-6 ">
                            <div class="img curve">
                                <?php
                                    $pd3=explode(',', $about_us['images']);
                                    $pd_imgs4=empty($pd3[1])?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd3[1];
                                ?>
                                <img src="<?php echo $pd_imgs4;?>" alt="#" class="img-responsive curve">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-right col-lg-pull-6 col-md-pull-6">
                            <div class="text">
                                <h2 class="heading"><?php echo $about_us['title2'];?></h2>
                                <div class="desc">
                                    <p><?php echo $about_us['why'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END / ITEM -->
                </div>
            </div>
        </div>
    </section>
    <!-- END / ABOUT -->

    <!-- HOTEL STATISTICS -->
    <section class="section-statistics ">
        <div class="container">
            <div class="statistics">
                <h2 class="heading text-center">Hotel statistics</h2>
                <div class="statistics_content">
                    <?php
                    if(!empty($stats))
                    {
                    ?>
                    <div class="row">
                        <!-- ITEM -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <div class="item">
                                <span class="count"><?php echo $stats['count1'];?></span>
                                <span><?php echo $stats['title1'];?></span>
                            </div>
                        </div>
                        <!-- END ITEM -->

                        <!-- ITEM -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <div class="item">
                                <span class="count"><?php echo $stats['count2'];?></span>
                                <span><?php echo $stats['title2'];?></span>
                            </div>
                        </div>
                        <!-- END ITEM -->

                        <!-- ITEM -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <div class="item">
                                <span class="count"><?php echo $stats['count3'];?></span>
                                <span><?php echo $stats['title3'];?></span>
                            </div>
                        </div>
                        <!-- END ITEM -->

                        <!-- ITEM -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <div class="item no-border">
                                <span class="count"><?php echo $stats['count4'];?></span>
                                <span><?php echo $stats['title4'];?></span>
                            </div>
                        </div>
                        <!-- END ITEM -->
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END / HOTEL STATISTICS -->

    <!-- TEAM -->
    <!--<section class="section-team">-->
    <!--    <div class="container">-->
    <!--        <div class="team">-->
    <!--            <h2 class="heading text-center">Team Member</h2>-->
    <!--            <p class="sub-heading text-center">Lorem Ipsum is simply dummy text of the printing</p>-->
    <!--            <div class="team_content">-->
    <!--                <div class="row">-->
                        
    <!--                    <div class="col-xs-6 col-md-3">-->
    <!--                        <div class="team_item text-center">-->
    <!--                            <div class="img">-->
    <!--                                <a href="#"><img src="<?php echo base_url();?>assets/front/images/about/about-3.png" alt="#"></a>-->
    <!--                            </div>-->
    <!--                            <div class="text">-->
    <!--                                <h2>JESSICA ALBA</h2>-->
    <!--                                <span>Manager lotus Hotel</span>-->
    <!--                                <p>Mea omnium explicari te, eu sit vidit harum fabellas, his no legere feugaitper in laudem malorum epicuri, quod natum evertitur ne per.</p>-->
                                    
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        

    <!--                    <div class="col-xs-6 col-md-3">-->
    <!--                        <div class="team_item text-center">-->
    <!--                            <div class="img">-->
    <!--                                <a href="#"><img src="<?php echo base_url();?>assets/front/images/about/about-4.png" alt="#"></a>-->
    <!--                            </div>-->
    <!--                            <div class="text">-->
    <!--                                <h2>Robet WILIAM</h2>-->
    <!--                                <span>Founder Hotel</span>-->
    <!--                                <p>Mea omnium explicari te, eu sit vidit harum fabellas, his no legere feugaitper in laudem malorum epicuri, quod natum evertitur ne per.</p>-->
                                    
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        

                        
    <!--                    <div class="col-xs-6 col-md-3">-->
    <!--                        <div class="team_item text-center">-->
    <!--                            <div class="img">-->
    <!--                                <a href="#"><img src="<?php echo base_url();?>assets/front/images/about/about-3.png" alt="#"></a>-->
    <!--                            </div>-->
    <!--                            <div class="text">-->
    <!--                                <h2>Adam</h2>-->
    <!--                                <span>Lorem lipsum</span>-->
    <!--                                <p>Mea omnium explicari te, eu sit vidit harum fabellas, his no legere feugaitper in laudem malorum epicuri, quod natum evertitur ne per.</p>-->
                                    
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                        
    <!--                    <div class="col-xs-6 col-md-3">-->
    <!--                        <div class="team_item text-center">-->
    <!--                            <div class="img">-->
    <!--                                <a href="#"><img src="<?php echo base_url();?>assets/front/images/about/about-4.png" alt="#"></a>-->
    <!--                            </div>-->
    <!--                            <div class="text">-->
    <!--                                <h2>David Gari</h2>-->
    <!--                                <span>Lorem lipsum</span>-->
    <!--                                <p>Mea omnium explicari te, eu sit vidit harum fabellas, his no legere feugaitper in laudem malorum epicuri, quod natum evertitur ne per.</p>-->
                                    
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
                       
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- END / TEAM -->