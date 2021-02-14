<head>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    </head>
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>RESERVATION</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>

    <!-- RESERVATION -->
    <section class="section-reservation-page ">
        <div class="container">
            <div class="reservation-page">
                <!-- STEP -->
                <div class="reservation_step">
                    <ul>
                       <!--  <li><a href="#"><span>1.</span>  Choose Date</a></li>
                        <li><a href="#"><span>2.</span> Choose Room</a></li>
                        <li><a href="#"><span>3.</span> Make a Reservation</a></li> -->
                        <li class="active"><a style="font-size: 25px;"><span></span> Please Fill The Address</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->

                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">
                        <div class="reservation-sidebar">
                            <!-- RESERVATION DATE -->
                            <div class="reservation-date curve">
                                <!-- HEADING -->
                                <h2 class="reservation-heading">Booking Details</h2>
                                <!-- END / HEADING -->
                                <ul>
                                    <li>
                                        <span>Check-In</span>
                                        <span><?php echo $this->session->userdata('arrive_date'); ?></span>
                                    </li>
                                    <li>
                                        <span>Check-Out</span>
                                        <span><?php echo $this->session->userdata('checkout_date'); ?></span>
                                    </li>
                                    <!-- <li>
                                        <span>Total Nights</span>
                                        <span>2</span>
                                    </li> -->
                                    <li>
                                        <span>Total Rooms</span>
                                        <span><?php echo $this->session->userdata('rooms'); ?></span>
                                    </li>
                                    <li>
                                        <span>Total Guests</span>
                                        <span><?php echo $this->session->userdata('adult')."&nbsp;"."Adults"; echo ","."&nbsp;"; echo $this->session->userdata('child')."&nbsp;"."Childs"; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / RESERVATION DATE -->
                            <!-- ROOM SELECT -->
                            <div class="reservation-room-selected selected-4 ">
                                <div class="reservation-room-seleted_total curve">
                                    <label>TOTAL</label>
                                    <span class="reservation-total">₹ <?php echo number_format($this->session->userdata('offer_price')*$this->session->userdata('rooms'),2);?></span>
                                </div>
                            </div>
                            <!-- END / ROOM SELECT -->

                        </div>

                    </div>
                    <!-- END / SIDEBAR -->

                    <!-- CONTENT -->
                    <form method="post" action="<?php echo base_url();?>home/booking_address">
                        <div class="col-md-8 col-lg-9">
                            <div class="reservation_content">
                                <div class="reservation-billing-detail">
                                    <h4>BILLING DETAILS</h4>
                                    <!-- <label>Country <sup> *</sup></label>
                                    <input type="text" class="input-text" name="country" placeholder="Country"> -->
                                    <!-- <select class="awe-select">
                                        <option>United Kingdom (Uk)</option>
                                        <option>Viet Nam</option>
                                        <option>Thai Lan</option>
                                        <option>China</option>
                                    </select> -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name<sup> *</sup></label>
                                            <input type="text" class="input-text" name="first_name" value="<?php if (!empty($this->session->userdata('id'))) { if(!empty($list->first_name)) { echo $list->first_name; } } ?>" required="" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Last Name<sup> *</sup></label>
                                            <input type="text" class="input-text" name="last_name" value="<?php if (!empty($this->session->userdata('id'))) { if(!empty($list->last_name)) { echo $list->last_name; } } ?>" required="" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <!-- <label>Company Name</label>
                                    <input type="text" class="input-text" name="compa"> -->
                                    <label>Address<sup> *</sup></label>
                                    <input type="text" class="input-text" placeholder="Address" name="address" required="">
                                    <br>
                                    <br>
                                    <input type="text" class="input-text" placeholder="Apartment, suite, unit etc. (Optional)" name="address_optional">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City<sup> *</sup></label>
                                            <input type="text" class="input-text" placeholder="Town / City" name="city" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Country<sup> *</sup></label>
                                            <input type="text" class="input-text" placeholder="Country" name="country" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Email Address<sup> *</sup></label>
                                            <input type="text" class="input-text" placeholder="Email Address" value="<?php if (!empty($this->session->userdata('id'))) { if(!empty($list->email)) { echo $list->email; } } ?>" name="email" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Phone<sup> *</sup></label>
                                            <input type="text" class="input-text" placeholder="Phone" name="phone" value="<?php if (!empty($this->session->userdata('id'))) { if(!empty($list->mobile)) { echo $list->mobile; } } ?>" required="">
                                        </div>
                                    </div>
                                    <label>Order Notes</label>
                                    <textarea name="other_notes" class="input-textarea" placeholder="Notes about your order, eg. special notes for delivery"></textarea>
                                    <!-- <label class="label-radio">
                                        <input type="radio" class="input-radio"> Create an account?
                                    </label> -->
                                    <!-- <p class="reservation-code">
                                        You have a coupon? <a href="#">Click here to enter your code</a>
                                    </p> -->
                                    <!-- <ul class="option-bank">
                                        <li>
                                            <label class="label-radio">
                                                <input type="radio" class="input-radio" name="chose-bank"> Direct Bank Transfer
                                            </label>
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </li>
                                        <li>
                                            <label class="label-radio">
                                                <input type="radio" class="input-radio" name="chose-bank"> Cheque Payment
                                            </label>
                                        </li>
                                        <li>
                                            <label class="label-radio">
                                                <input type="radio" class="input-radio" name="chose-bank"> Credit Card
                                            </label>
                                            <a href="#" title=""><img src="images/Reservation/american.jpg" alt="#"></a>
                                            <a href="#" title=""><img src="images/Reservation/mastercard.jpg" alt="#"> </a>
                                            <a href="#" title=""><img src="images/Reservation/o.jpg" alt="#"></a>
                                            <a href="#" title=""><img src="images/Reservation/paypal.jpg" alt="#"></a>
                                            <a href="#" title=""><img src="images/Reservation/visa.jpg" alt="#"></a>
                                            <a href="#" title=""><img src="images/Reservation/2co.jpg" alt="#"></a>
                                        </li>
                                    </ul> -->
                                    <button type="submit" class="btn btn-room btn4">PLACE BOOKING</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END / CONTENT -->
                </div>
            </div>
        </div>

    </section>