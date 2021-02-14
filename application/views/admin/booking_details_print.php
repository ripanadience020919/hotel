<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title;?> | Hotel Booking Admin</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    </head>
    <body class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

      <div id="wrapper"> 
      <h1 style="text-align: center;">Hotel Invoice</h1>     
        <div class="content-page">
            <div class="content">
                <!-- <div class="container-fluid">
                    <form  action="" method="post" enctype="multipart/form-data">                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card-box">
                            <h4>Booking Details</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="product-name">Username<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo get_perticular_field_value('users','name'," and `id`='".$list->user_id."'");?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product-name">Room Name<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php $room_id= get_perticular_field_value('roomm','room_type'," and `id`='".$list->room_id."'"); echo get_perticular_field_value('rooms','r_type'," and `id`='".$room_id."'");?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product-name">Hotel Name<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo get_perticular_field_value('hotels','name'," and `id`='".$list->hotel_id."'");?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product-name">Arrive Date<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo $list->arrive_date;?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product-name">Checkout Date<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo $list->checkout_date;?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product-name">No of Adult<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo $list->adult;?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="product-name">No of Child [under 6 year]<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo $list->child;?>" class="form-control" placeholder="e.g : 2" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">No of Rooms<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->rooms;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>
                              </div>
                            </div>

                            <h4>Billing Details</h4>
                            <hr>
                            <div class="form-group mb-3">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="product-name">First Name<span class="text-danger">*</span></label>
                                      <input type="text" value="<?php echo $list->first_name;?>" class="form-control" placeholder="e.g : 2" disabled>
                                  </div>

                                  <div class="col-md-6">
                                      <label for="product-name">Last Name<span class="text-danger">*</span></label>
                                      <input type="text" value="<?php echo $list->last_name;?>" class="form-control" placeholder="e.g : 2" disabled>
                                  </div>
                              </div>
                            </div>

                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">Address<span class="text-danger">*</span></label>
                                    <textarea disabled="" class="form-control"><?php echo $list->address;?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="product-name">Address [Optional]<span class="text-danger">*</span></label>
                                    <textarea disabled="" class="form-control"><?php echo $list->address_optional;?></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">City<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->city;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="product-name">Country<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->country;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>
                              </div>
                            </div>

                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">Email<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->email;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="product-name">Phone<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->phone;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>
                              </div>
                            </div>

                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">Other Notes<span class="text-danger">*</span></label>
                                    <textarea disabled="" class="form-control"><?php echo $list->other_notes;?></textarea>
                                </div>
                              </div>
                            </div>
                            <h4>Payment Details</h4>
                            <hr>

                            <div class="form-group mb-3">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label for="product-name">Payment ID<span class="text-danger">*</span></label>
                                      <input type="text" value="<?php echo $list->payment_id;?>" class="form-control" placeholder="e.g : 2" disabled>
                                  </div>

                                  <div class="col-md-6">
                                      <label for="product-name">Order ID<span class="text-danger">*</span></label>
                                      <input type="text" value="<?php echo $list->order_id;?>" class="form-control" placeholder="e.g : 2" disabled>
                                  </div>
                              </div>
                            </div>

                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-md-6">
                                    <label for="product-name">Payment Amount<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $list->payment_amount;?>" class="form-control" placeholder="e.g : 2" disabled>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div> 
                      </div>
                    </form>

                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --> 

                <div class="container-fluid">
                  <div class="row">
                    <table class="table">
                      <tr>
                        <td> <p>Order ID:
                        <strong><?php echo $list->order_id;?></strong></p></td>
                        <td> <p>Invoice Date:
                        <strong><?php echo date('d/m/Y H:i A',strtotime($list->date));?></strong></p></td>
                        <td class="right"  style="text-align:right;">
                          <img style="height:100px;" src="<?php echo base_url();?>static/LOGO-PNG-1.png">
                        </td>
                      </tr>
                      
                    </table>
                  </div>
        
        
                  <div class="row ">
                      <table class="table">
                        <tr>
                          <td>
                            <h6 class="mb-3">From:</h6>
                            <p><strong>Hotel North East</strong><br>
                              Mukunda Das Rd, Milanpally, Saktigarh, Siliguri <br>
                              West Bengal 734005<br>
                              Email: wizroomssiliguri@gmail.com<br>
                              Phone: +91 8777540892</p>
                            
                        </td>

                          <td style="text-align: right;">
                            <h6 class="mb-3">To:</h6>
                              
                              <p><strong><?php echo $list->first_name.'&nbsp'.$list->last_name;?></strong><br>
                              <?php echo $list->address;?><br>
                              <!-- <?php if(!empty($list->address_optional)) { echo $list->address_optional; }?><br> -->
                              <?php echo $list->city;?><br>
                              <?php echo $list->country;?><br>
                              Email: <?php echo $list->email;?><br>
                              Phone: <?php echo $list->phone;?></p>
                          </td>
                        </tr>
                        
                      </table>
                  </div>

                  <div class="table-responsive-sm">

                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Room Name</th>
                                  <th>Hotel Name</th>
                                  <th>Arrive Date</th>
                                  <th>Checkout Date</th>
                                  <th>Adult</th>
                                  <th>Child</th>
                                  <th>No of Room</th>
                                  <th>Pay Amount</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  
                                  <td class="left strong"><?php $room_id= get_perticular_field_value('roomm','room_type'," and `id`='".$list->room_id."'"); echo get_perticular_field_value('rooms','r_type'," and `id`='".$room_id."'");?></td>
                                 
                                  <td class="left strong"><?php echo get_perticular_field_value('hotels','name'," and `id`='".$list->hotel_id."'");?></td>
                                  <td class="left strong"><?php echo $list->arrive_date;?></td>
                                  <td class="left strong"><?php echo $list->checkout_date;?></td>
                                  <td class="left strong"><?php echo $list->adult;?></td>
                                  <td class="left strong"><?php echo $list->child;?></td>
                                  <td class="center"><?php echo $list->rooms;?></td>
                                  <td class="left">₹ <?php echo number_format((float)$list->payment_amount, 2, '.', '');?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="row">
                      <div class="col-lg-4 col-sm-5">

                      </div>

                      <div class="col-lg-4 col-sm-5 ml-auto">
                          <table class="table table-clear">
                              <tbody>
                                  <tr>
                                      <td class="left">
                                          <strong>Total</strong>
                                      </td>
                                      <td class="right">₹ <?php echo number_format((float)$list->payment_amount, 2, '.', '');?></td>
                                  </tr>
                                  
                                  <tr>
                                      <td class="left">
                                          <strong>Paid</strong>
                                      </td>
                                      <td class="right">
                                          <strong>₹ <?php
                                          echo number_format((float)$list->payment_amount, 2, '.', '');?></strong>
                                      </td>
                                  </tr>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
        
                </div>
            </div> 
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <script type="text/javascript">
          $(document).ready(function(){
            setInterval(function(){ window.print(); }, 1000);
              setInterval(function(){ window.history.back(); }, 1000);
          });
      </script>
  </body>
</html>