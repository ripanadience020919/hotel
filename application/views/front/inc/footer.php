<!--FOOTER-->
    <footer class="footer-sky">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                        <!--<div class="icon-email">-->
                        <!--    <a href="#" title="Email"><img src="<?php echo base_url();?>assets/front/images/Home-1/footer-top-icon-l.png" alt="Email" class="img-responsive"></a>-->
                        <!--</div>-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                        <!--<div class="textbox">-->
                        <!--    <form class="form-inline">-->
                        <!--        <div class="form-group">-->
                        <!--            <div class="input-group">-->
                        <!--                <input type="email" class="form-control" placeholder="Your email address" aria-label="Search for...">-->
                        <!--                <button class="btn btn-secondary" type="button">-->
                        <!--                    <i class="ion-android-send"></i>-->
                        <!--                </button>-->

                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 text-right">
                        <div class="footer-icon-l">
                            <a target="_blank" href="<?php echo prep_url($s_links['twitter'])?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a target="_blank" href="<?php echo prep_url($s_links['fb'])?>" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <!--<a href="#" title="Tripadvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>-->
                            <a target="_blank" href="<?=prep_url($s_links['insta'])?>" title="Isnstagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /footer-top -->
        <div class="footer-mid">
            <div class="container">
                <div class="row padding-footer-mid">
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1  ">
                        <div class="list-content">
                            <ul>
                                <li><a href="<?php echo base_url().'terms-conditions'?>" title="">Term & Conditions</a></li>
                                <li><a href="<?php echo base_url().'privacy-policy'?>" title="">Privacy & Policy</a></li>
                                <li><a href="<?php  echo base_url().'cancellation-policy'?>" title="">Cancellation Policy</a></li>
                                <li><a href="<?php echo base_url().'faq'?>" title="">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                     $loc = $this->home_model->locationsSrc();
                            if (!empty($loc)) {
                                foreach ($loc as $key => $value) {
                    ?>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 col-lg-offset-1 col-md-offset-1  ">
                        <div class="list-content">
                            <ul>
                                <li><a href="<?php echo base_url();?>home/hotel_details/<?php echo $value['id']; ?>" title="">Hotels in <?php echo $value['l_name'];?></a></li>
                            </ul>
                        </div>
                    </div>

                    <?php 
                            }
                        }
                ?>

                </div>
                <div class="footer-bottom">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
                        Copyright © 2021 by <a href="#" title="">Wiz.</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
                        <div class="payments text-right">
                            <ul>
                                <li>
                                    <a href="#" title="Paypal"><img src="<?php echo base_url();?>assets/front/images/Home-1/Paypal.png" alt="Paypal"></a>
                                </li>
                                <li>
                                    <a href="#" title="Visa"><img src="<?php echo base_url();?>assets/front/images/Home-1/Visa.png" alt="Visa"></a>
                                </li>
                                <li>
                                    <a href="#" title="Master"><img src="<?php echo base_url();?>assets/front/images/Home-1/Master-card.png" alt="Master"></a>
                                </li>
                                <li>
                                    <a href="#" title="Discover"><img src="<?php echo base_url();?>assets/front/images/Home-1/Discover.png" alt="Discover"></a>
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
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/vit-gallery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.countTo.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.appear.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.littlelightbox.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/sky.js"></script>
   
</body>

</html>