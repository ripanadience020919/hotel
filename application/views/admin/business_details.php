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
                                    <h4 class="page-title">Business Details</h4>
                                </div>
                            </div>
                        </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">User Name<span class="text-danger">*</span></label>
                                                <!-- <a href="<?php echo base_url()?>Admin/Hotellist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Hotel List</button></a> -->
                                                <input type="text" value="<?php echo get_perticular_field_value('users','name'," and `id`='".$list->user_id."'");?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Name<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->name;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product-name">Location<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo get_perticular_field_value('locations','l_name'," and `id`='".$list->location."'");?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">Hotel Category<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo get_perticular_field_value('hotel_category','h_category'," and `id`='".$list->category."'");?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-name">Website URL</label>
                                                 <input type="text" value="<?php echo $list->web_url;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Check-in Time<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->check_in;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Check-out Time<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->check_out;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary Mobile<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->p_mobile;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary Mobile</label>
                                                <input type="text" value="<?php echo $list->s_mobile;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary Landline<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->p_landline;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary Landline</label>
                                                <input type="text" value="<?php echo $list->s_landline;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary E-mail<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->p_email;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary E-mail</label>
                                                <input type="text" value="<?php echo $list->s_email;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Address<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->address;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Type<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $list->hotel_type;?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description</label>
                                                <textarea class="form-control" id="description" name="description" required rows="5" disabled=""><?php echo $list->description;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Terms And Conditions</label>
                                                <textarea class="form-control" id="T&C" required name="T&C" rows="5" disabled=""><?php echo $list->T_C;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Cancellation Policy</label>
                                                <textarea class="form-control" id="CP" name="CP" required rows="5" disabled=""><?php echo $list->CP;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="product-image">Facility</label>
                                                <input type="text" value="<?php echo get_perticular_field_value('facilities','f_name'," and `id`='".$list->facility."'");?>" class="form-control" placeholder="e.g : AvTa" disabled>
                                    </div>
                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <!-- <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button> -->
                                    <a href="<?php echo base_url();?>admin/partner_business_request" class="btn w-sm btn-warning">Back</a>
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
