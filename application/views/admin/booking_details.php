        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  // $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  // $submit_url = ($user_id=='ADD') ? base_url('admin/storeroom') : base_url('admin/edit_storeroom') ;
?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                             
                        <!-- end page title --> 
                            
                    <form  action="" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li> -->
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li> -->
                                            <!-- <li class="breadcrumb-item active">Booking Details</li> -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Booking Details</h4>
                                </div>
                            </div>
                        </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Username<span class="text-danger">*</span></label>
                                                <!-- <a href="<?php echo base_url()?>Admin/roommlist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Room List</button></a> -->
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

                                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li> -->
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li> -->
                                            <!-- <li class="breadcrumb-item active">Booking Details</li> -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Billing Details</h4>
                                </div>
                            </div>

                        </div> 

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


                          <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li> -->
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li> -->
                                            <!-- <li class="breadcrumb-item active">Booking Details</li> -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payment Details</h4>
                                </div>
                            </div>

                        </div> 

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

                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/booking_details_print/<?php echo $list->room_booking_id;?>" class="btn w-sm btn-success">Print</a>
                                    <a href="<?php echo base_url();?>admin/booking_request" class="btn w-sm btn-warning">Back</a>
                                    <!-- <input type="submit" value="Save" class="btn w-sm btn-success"> -->
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>

                        <!-- file preview template -->
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
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
// <script type="text/javascript">
//     $(document).ready(function(){
//         var i = 1;
//         $('#add').click(function(){
//             i++;
//             $('.fields').append('<div class="mt-3" id="row'+i+'"><div class="row"><div class="col-md-2"><labelfor="product-name">Start Date<span class="text-danger">*</span></label><input type="date" id="product-name"  name="s_date[]" class="form-control" placeholder="e.g : AvTa" required="required"></div><div class="col-md-2"><label for="product-name">End Date<span class="text-danger">*</span></label><input type="date" id="product-name"  name="e_date[]" class="form-control" placeholder="e.g : AvTa" required="required"></div><div class="col-md-2"><label for="product-name">Actual Price<span class="text-danger">*</span></label><input type="text" id="product-name"  name="a_price[]" class="form-control" placeholder="e.g : AvTa" required="required"></div><div class="col-md-2"><label for="product-name">Offer Price<span class="text-danger">*</span></label><input type="text" id="product-name"  name="o_price[]" class="form-control" placeholder="e.g : AvTa" required="required"></div><div class="col-md-2"><label for="product-name">No Of Rooms<span class="text-danger">*</span></label><input type="text" id="product-name"  name="n_rooms[]" class="form-control" placeholder="e.g : AvTa" required="required"></div><div class="col-md-2 mt-4"><button type="button" style="text-align: center;" class="btn btn-danger btn_remove btn-sm waves-effect waves-light" id="'+i+'">Remove</button></div></div></div>');
//         });
//         $(document).on('click','.btn_remove',function(){
//             var btn_id = $(this).attr("id");
//             $("#row"+btn_id+"").remove();
//         });
//     });
// </script>
<script type="text/javascript">
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("occupancy").value = "<?=$list->occupancy?>";
        document.getElementById("occupancy_adult").value = "<?=$list->occupancy_adult?>";
        document.getElementById("occupancy_child").value = "<?=$list->occupancy_child?>";
        document.getElementById("extra_bed_charge").value = "<?=$list->extra_bed_charge?>";
    }
</script>