    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2><?php echo $rooms2; ?> Room</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>
    <!-- ROOM DETAIL -->
    <section class="section-product-detail">
        <div class="container">
            <!-- DETAIL -->
            <div class="product-detail margin">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- LAGER IMGAE -->
                        <div class="wrapper curve">
                            <div class="gallery3 curve">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators curve">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner curve">
                                        <div class="item active curve">
                                            <img src="<?php echo base_url() . 'assets/admin/uploads/rooms/' . $list['r_img1'] ?>"
                                                alt="Los Angeles" class="curve">
                                        </div>

                                        <div class="item curve">
                                            <img src="<?php echo base_url() . 'assets/admin/uploads/rooms/' . $list['r_img2'] ?>"
                                                alt="Chicago" class="curve">
                                        </div>

                                        <div class="item curve">
                                            <img src="<?php echo base_url() . 'assets/admin/uploads/rooms/' . $list['r_img3'] ?>"
                                                alt="New York">
                                        </div>
                                        <div class="item curve curve">
                                            <img src="<?php echo base_url() . 'assets/admin/uploads/rooms/' . $list['r_img4'] ?>"
                                                alt="New York" class="curve">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END / LAGER IMGAE -->
                    </div>
                    <div class="col-lg-3">
                        <!-- FORM BOOK -->
                        <div class="product-detail_book curve">
                            <div class="product-detail_total">
                                <img src="<?php echo base_url(); ?>assets/front/images/Product/icon.png" alt="#"
                                    class="icon-logo">
                                <h6>STARTING ROOM FROM</h6>
                                <p class="price">
                                    <span class="amout">₹ <s><?php
$price = explode(',', $list['actual_price']);
$offprice = explode(',', $list['offer_price']);
echo $price[0];
$data['price'] = $price[0];
$data['offer_price'] = $offprice[0];
$this->session->set_userdata($data);
?></span></s> / Night
                                </p>
                                <p class="price">
                                    <span class="amout">₹ <s><?php
$offprice = explode(',', $list['offer_price']);
$data['price'] = $price[0];
$data['offer_price'] = $offprice[0];
$this->session->set_userdata($data);
?></s></span>&nbsp;<span class="amout" style="color: red"><?php echo $offprice[0] ?></span> / Night
                                </p>
                            </div>
                            <form id="queikform" method="post">
                                <div class="product-detail_form">
                                    <div class="sidebar">
                                        <!-- WIDGET CHECK AVAILABILITY -->
                                        <div class="widget widget_check_availability">
                                            <div class="check_availability">
                                                <div class="check_availability-field">
                                                    <label>Arrive</label>
                                                    <div class="input-group date" data-date-format="dd-mm-yyyy"
                                                        id="datepicker1">
                                                        <input onchange="check_arrive_date();"
                                                            class="form-control wrap-box" type="text" name="arrive_date"
                                                            placeholder="Arrival Date" required="">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"
                                                                aria-hidden="true"></i></span>
                                                        <span id="div_span"></span>
                                                    </div>
                                                </div>
                                                <div class="check_availability-field">
                                                    <label>Checkout</label>
                                                    <div id="datepicker2" class="input-group date"
                                                        data-date-format="dd-mm-yyyy">
                                                        <input class="form-control wrap-box" type="text"
                                                            onchange="check_checkout_date();" name="checkout_date"
                                                            placeholder="Checkout Date" required="">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"
                                                                aria-hidden="true"></i></span>
                                                        <span id="div_span1"></span>
                                                    </div>
                                                </div>
                                                <div class="check_availability-field">
                                                    <label>Adult</label>
                                                    <select class="awe-select" name="adult" onchange="check_adult();">
                                                        <!-- <option value="">0</option> -->
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    <span id="div_span3"></span>
                                                </div>
                                                <div class="check_availability-field">
                                                    <label>Child</label>
                                                    <select class="awe-select" name="child" onchange="check_child();">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    <br>
                                                    <span id="div_span2"></span>

                                                </div>
                                                <!-- <div id="div_span4"></div> -->
                                                <div id="div_span4" class="check_availability-field"
                                                    style="display: none;">
                                                    <label>Extra Room</label>
                                                    <select style="width: 100%;" class="awe-select" name="room">
                                                        <option value="1" style="display: none;">Select</option>
                                                        <?php
$no_of_rooms = explode(',', $list['n_rooms']);
$rooms_i = $no_of_rooms[0];
for ($i = 2; $i <= $rooms_i; $i++) {
    ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
}
?>
                                                        <!-- <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option> -->
                                                    </select>
                                                </div>
                                                <input type="hidden" name="hotel_id"
                                                    value="<?php echo $list['hotel_name']; ?>">
                                                <input type="hidden" name="room_id" value="<?php echo $list['id']; ?>">

                                            </div>
                                        </div>
                                        <!-- END / WIDGET CHECK AVAILABILITY -->
                                    </div>
                                    <button id="booking_btn_id" onclick="booking_db();"
                                        class="btn btn-room btn-product">Book Now</button>
                                </div>
                            </form>
                        </div>
                        <!-- END / FORM BOOK -->
                    </div>
                </div>
            </div>
            <!-- END / DETAIL -->

            <!-- TAB -->
            <div class="product-detail_tab">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="product-detail_tab-header">
                            <li><a href="#overview" data-toggle="tab">OVERVIEW</a></li>
                            <li class="active"><a href="#amenities" data-toggle="tab">amenities</a></li>
                            <!-- <li><a href="#package" data-toggle="tab">PACKAGE</a></li>
                            <li><a href="#rates" data-toggle="tab">RATES</a></li>
                            <li><a href="#calendar" data-toggle="tab">Calendar</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="product-detail_tab-content tab-content">
                            <!-- OVERVIEW -->
                            <div class="tab-pane fade" id="overview">
                                <div class="product-detail_overview">
                                    <h5 class='text-uppercase'>
                                        <?php echo get_perticular_field_value('locations', 'l_description', " and `id`='" . $list['location'] . "'"); ?>
                                    </h5>
                                    <p><?php echo get_perticular_field_value('hotels', 'description', " and `id`='" . $list['hotel_name'] . "'"); ?>
                                    </p>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <h6>SPECIAL ROOM</h6>
                                            <ul>
                                                <li>Max: <?php echo $list['occupancy']; ?></li>
                                                <li>Meal:
                                                    <?php echo get_perticular_field_value('meal_plans', 'initials', " and `id`='" . $list['meal_plan'] . "'"); ?>
                                                </li>
                                                <!-- <li>View: Ocen</li>
                                                <li>Bed: King-size or twin beds</li> -->
                                            </ul>
                                        </div>
                                        <!-- <div class="col-xs-6 col-md-4">
                                            <h6>SERVICE ROOM</h6>
                                            <ul>
                                                <li>Oversized work desk</li>
                                                <li>Hairdryer</li>
                                                <li>Iron/ironing board upon request</li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- END / OVERVIEW -->

                            <!-- AMENITIES -->
                            <div class="tab-pane fade active in" id="amenities">
                                <div class="product-detail_amenities">
                                    <!-- <p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p> -->
                                    <div class="row">
                                        <?php
$amenity = explode(',', $list['amenity']);
foreach ($amenity as $val) {
    ?>
                                        <div class="col-xs-6 col-lg-4">
                                            <!-- <h6>LIVING ROOM</h6> -->
                                            <ul>
                                                <li><?php echo get_perticular_field_value('amenities', 'a_name', " and `id`='" . $val . "'"); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
}
?>

                                        <!-- <div class="col-xs-6 col-lg-4">
                                            <h6>KITCHEN ROOM</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>balcony</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bedroom</h6>
                                            <ul>
                                                <li>Coffee maker</li>
                                                <li>25 inch or larger TV</li>
                                                <li>Cable/satellite TV channels</li>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bathroom</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>Oversized work desk</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div> -->
                                    </div>

                                </div>

                            </div>
                            <!-- END / AMENITIES -->

                            <!-- PACKAGE -->
                            <!-- <div class="tab-pane fade" id="package">
                                <div class="product-detail_package">
                                    <div class="product-package_item">
                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                            <div class="product-package_price">
                                                <p class="price">
                                                    <span class="amout">$260</span> / Package
                                                </p>
                                                <a href="#" class="btn btn-room">BOOK PACKIT</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-package_item">
                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                            <div class="product-package_price">
                                                <p class="price">
                                                    <span class="amout">$340</span> / Package
                                                </p>
                                                <a href="#" class="btn btn-room">BOOK PACKIT</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-package_item">
                                        <div class="text">
                                            <h4><a href="#">package standar</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                            <div class="product-package_price">
                                                <p class="price">
                                                    <span class="amout">$420</span> / Package
                                                </p>
                                                <a href="#" class="btn btn-room">BBOOK PACKIT</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> -->

                            <!-- <div class="tab-pane fade" id="rates">
                                <div class="product-detail_rates">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Rate Period</th>
                                                <th>Nightly</th>
                                                <th>Weekend Night</th>
                                                <th>Weekly</th>
                                                <th>Monthly</th>
                                                <th>Event</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                                <h6>Spring/Summer Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$320</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$23</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$120</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$100</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$89</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Summer/Fall Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$150</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$130</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$100</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$80</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$85</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Christmas Season</h6>
                                                <ul>
                                                    <li>Jun 1 - Aug 31</li>
                                                    <li>3 night minimum stay</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$225</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$200</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$180</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$160</span></p>
                                            </td>
                                            <td>
                                                <p class="price"><span class="amout">$140</span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div> -->

                            <!-- <div class="tab-pane fade" id="calendar">
                                <div class="product-detail_calendar-wrap row">
                                    <div class="col-sm-6">
                                        <div class="calendar_custom">
                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2017</span>
                                                <a href="#" class="calendar_prev calendar_corner"><i class="ion-ios-arrow-thin-left"></i></a>
                                            </div>
                                            <table class="calendar_tabel">
                                                <thead>
                                                    <tr>
                                                        <th>Su</th>
                                                        <th>Mo</th>
                                                        <th>Tu</th>
                                                        <th>We</th>
                                                        <th>Th</th>
                                                        <th>Fr</th>
                                                        <th>Sa</th>
                                                    </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="calendar_custom">
                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2017</span>

                                                <a href="#" class="calendar_next calendar_corner"><i class="ion-ios-arrow-thin-right"></i></a>
                                            </div>
                                            <table class="calendar_tabel">
                                                <thead>
                                                    <tr>
                                                        <th>Su</th>
                                                        <th>Mo</th>
                                                        <th>Tu</th>
                                                        <th>We</th>
                                                        <th>Th</th>
                                                        <th>Fr</th>
                                                        <th>Sa</th>
                                                    </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="calendar_status text-center col-sm-12">
                                        <span>Available</span>
                                        <span class="not-available">Not Available</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END / TAB -->

            <!-- ANOTHER ACCOMMODATION -->
            <div class="product-detail">
                <h2 class="product-detail_title">Other Rooms in <?=$hotel_name;?> at <?=$hotel_location;?></h2>
                <div class="product-detail_content">
                    <div class="row">
                        <!-- ITEM -->
                        <?php
if (!empty($list3)) {
    $c = '';
    foreach ($list3 as $value) {
        if ($value['location'] == $list['location']) {
            $r_id = $value['id'];
            if ($value['r_img1'] == '') {
                $pd_image = 'assets/admin/uploads/rooms/default.jpg';
            } else {
                $pd_image = 'assets/admin/uploads/rooms/' . $value['r_img1'];
            }
            $price = explode(',', $value['actual_price']);
            //echo $price[0];
            ?>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="product-detail_item">
                                <div class="img">
                                    <a href="#"><img src="<?php echo base_url($pd_image); ?>" alt="#" class="curve"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#"><?php echo get_perticular_field_value('rooms', 'r_type', " and `id`='" . $value['room_type'] . "'"); ?>
                                            Room</a></h2>
                                    <ul>
                                        <li><i class="fa fa-child" aria-hidden="true"></i> Max:
                                            <?php echo $value['occupancy']; ?></li>
                                        <li><i class="fa fa-bed" aria-hidden="true"></i>
                                            <?php echo get_perticular_field_value('meal_plans', 'initials', " and `id`='" . $value['meal_plan'] . "'"); ?>
                                        </li>
                                        <!-- <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li> -->
                                    </ul>
                                    <a href="<?php echo base_url() ?>home/room_details/<?php echo $r_id; ?>"
                                        class="btn">VIEW DETAILS</a>
                                </div>
                            </div>
                        </div>
                        <?php
}

        ?>
                        <?php

    }

} else {
    ?>
                        <h3 style="text-align: center;color: red;">No Record Found !</h3>
                        <?php
}
?>

                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <!-- <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="product-detail_item">
                                <div class="img">
                                    <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/Product/Another-1.jpg" alt="#"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#">Family Room</a></h2>
                                    <ul>
                                        <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                        <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                    </ul>
                                    <a href="#" class="btn btn-room">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <!-- <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="product-detail_item">
                                <div class="img">
                                    <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/Product/Another-3.jpg" alt="#"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#">standard Room</a></h2>
                                    <ul>
                                        <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                        <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                    </ul>
                                    <a href="#" class="btn btn-room">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- END / ITEM -->

                        <!-- ITEM -->
                        <!-- <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="product-detail_item">
                                <div class="img">
                                    <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/Product/Another-4.jpg" alt="#"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="#">couple Room</a></h2>
                                    <ul>
                                        <li><i class="fa fa-child" aria-hidden="true"></i> Max: 2 Person(s)</li>
                                        <li><i class="fa fa-bed" aria-hidden="true"></i> Bed: King-size or twin beds</li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i> View: Ocen</li>
                                    </ul>
                                    <a href="#" class="btn btn-room">VIEW DETAIL</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- END / ITEM -->
                    </div>

                </div>
            </div>
            <!-- END / ANOTHER ACCOMMODATION -->
        </div>
    </section>
    <!-- END / SHOP DETAIL -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
function check_arrive_date1(e) {
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // event.preventDefault();
    // alert(form1);
    var data = new FormData(form1);
    var url2 = "<?php echo base_url(); ?>home/check_arrive_date";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
            // alert(data);
            $('#div_span').html(data);
            //ajaxindicatorstop();
        },
        error: function(e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
        }
    });
}

function check_checkout_date1(e) {
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // alert(form1);
    var data = new FormData(form1);
    var url2 = "<?php echo base_url(); ?>home/check_checkout_date";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
            // alert(data);
            $('#div_span1').html(data);
            //ajaxindicatorstop();
        },
        error: function(e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
        }
    });
}

function booking_db(e) {
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // alert(form1);
    var data = new FormData(form1);
    var url2 = "<?php echo base_url(); ?>home/hotel_booking";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
            // alert(data);
            $('#div_span2').html(data);
            //ajaxindicatorstop();
        },
        error: function(e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
        }
    });
}

function check_adult(e) {
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // event.preventDefault();
    // alert(form1);
    var data = new FormData(form1);
    var url2 = "<?php echo base_url(); ?>home/check_adult_db";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
            if (!data) {
                $('#div_span4').css('display', 'none');
            } else {
                $('#div_span4').css('display', 'block');
            }
            // $("p").css("background-color", "yellow");
            //ajaxindicatorstop();
        },
        error: function(e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
        }
    });
}

function check_child(e) {
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // event.preventDefault();
    // alert(form1);
    var data = new FormData(form1);
    var url2 = "<?php echo base_url(); ?>home/check_child_db";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(data) {
            // alert(data);
            // $('#div_span4').html(data);
            if (!data) {
                $('#div_span4').css('display', 'none');
            } else {
                $('#div_span4').css('display', 'block');
            }
            //ajaxindicatorstop();
        },
        error: function(e) {
            alert("ERROR : ", e);
            //ajaxindicatorstop();
        }
    });
}
    </script>

    <script type="text/javascript">
$(document).ready(function() {
    $('form#queikform').submit(function(e) {
        var form = $(this);
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('home/check_form_data'); ?>",
            data: form.serialize(), // <--- THIS IS THE CHANGE
            dataType: "html",
            success: function(data) {
                alert(data);
                // $("#saved").html('<div class="alert alert-success" ><b>'+data+'</b></div>');
                // location.reload();
            },
            error: function() {
                alert("Error posting feed.");
            }
        });

    });
});
    </script>