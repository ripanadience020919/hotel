        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/storehotel') : base_url('admin/edit_storehotel') ;
  $pd_img = empty($list->h_thumb)?'':base_url('assets/admin/uploads/hotels/').$list->h_thumb;
  $pd_img2 = empty($list->h_banner)?'':base_url('assets/admin/uploads/hotels/').$list->h_banner;
  $pd_img3 = empty($list->h_img1)?'':base_url('assets/admin/uploads/hotels/').$list->h_img1;
  $pd_img4 = empty($list->h_img2)?'':base_url('assets/admin/uploads/hotels/').$list->h_img2;
  $pd_img5 = empty($list->h_img3)?'':base_url('assets/admin/uploads/hotels/').$list->h_img3;
  $pd_img6 = empty($list->h_img4)?'':base_url('assets/admin/uploads/hotels/').$list->h_img4;
?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li>
                                            <li class="breadcrumb-item active"><?=$display?> a Hotel</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Hotel</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form  action="<?=$submit_url?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Name<span class="text-danger">*</span></label>
                                                <a href="<?php echo base_url()?>Admin/Hotellist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Hotel List</button></a>
                                                <input type="text" id="h_name" name="h_name" class="form-control" placeholder="e.g : AvTa" required>
                                                <input type="hidden" id="id" name="id">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Location<span class="text-danger">*</span></label>
                                                <select class="form-control" name="h_location" id="example-select" required>
                                                        <option value="">Select Location</option>
                                                        <?php
                                                        if ($user_id == 'ADD') 
                                                        {
                                                            if (!empty($locations)) 
                                                            {
                                                                foreach ($locations as $value) 
                                                                {
                                                        ?>
                                                        <option value="<?php echo $value['id']?>"><?php echo $value['l_name']?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        else
                                                      {
                                                          if (!empty($locations)) 
                                                          {
                                                              foreach ($locations as $value) 
                                                              {
                                                                  if ($value['id'] == $list->location)
                                                                  {
                                                                      $c = "selected";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                  <option value="<?php echo $value['id'];?>"<?php echo $c; ?>><?php echo $value['l_name'];?></option> 
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                        ?>
                                                    </select>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Category<span class="text-danger">*</span></label>
                                                <select class="form-control" name="h_category" id="example-select" required>
                                                        <option value="">Select Category</option>
                                                        <?php
                                                        if ($user_id == 'ADD') 
                                                        {
                                                            if (!empty($hcat)) {
                                                                foreach ($hcat as $value) {
                                                        ?>
                                                        <option value="<?php echo $value['id']?>"><?php echo $value['h_category']?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                         else
                                                      {
                                                          if (!empty($hcat)) 
                                                          {
                                                              foreach ($hcat as $value) 
                                                              {
                                                                  if ($value['id'] == $list->category)
                                                                  {
                                                                      $c = "selected";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                  <option value="<?php echo $value['id'];?>"<?php echo $c; ?>><?php echo $value['h_category'];?></option> 
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Website URL</label>
                                                <input type="text" id="url"  name="url" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Check-in Time<span class="text-danger">*</span></label>
                                                <input type="time" id="c_in"  name="c_in" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Check-out Time<span class="text-danger">*</span></label>
                                                <input type="time" id="c_out"  name="c_out" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary Mobile<span class="text-danger">*</span></label>
                                                <input type="text" id="p_mobile"  name="p_mobile" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary Mobile</label>
                                                <input type="text" id="s_mobile"  name="s_mobile" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary Landline<span class="text-danger">*</span></label>
                                                <input type="text" id="p_landline"  name="p_landline" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary Landline</label>
                                                <input type="text" id="s_landline"  name="s_landline" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Primary E-mail<span class="text-danger">*</span></label>
                                                <input type="text" id="p_email"  name="p_email" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Secondary E-mail</label>
                                                <input type="text" id="s_email"  name="s_email" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Address<span class="text-danger">*</span></label>
                                                <input type="text" id="address"  name="address" class="form-control" placeholder="e.g : AvTa" required="required">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="hotel_type" id="hotel_type" required>
                                                        <option value="">Select Type</option>
                                                        <?php
                                                        /*if ($user_id == 'ADD') 
                                                        {*/
                                                        ?>
                                                        <option value="hotel">Hotel</option>
                                                        <option value="residency">Residency</option>
                                                        <option value="resort">Resort</option>
                                                        <?php
                                                        //}
                                                        
                                                        ?>
                                                    </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description</label>
                                                <textarea class="form-control" id="description" name="description" required rows="5"><?php if ($user_id != 'ADD') { echo $list->description;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Terms And Conditions</label>
                                                <textarea class="form-control" id="T&C" required name="T&C" rows="5"><?php if ($user_id != 'ADD') { echo $list->T_C;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Cancellation Policy</label>
                                                <textarea class="form-control" id="CP" name="CP" required rows="5"><?php if ($user_id != 'ADD') { echo $list->CP;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="product-image">Facility</label>
                                                <?php
                                                if($user_id == "ADD")
                                                {
                                                    if (!empty($facilities)) {
                                                        foreach ($facilities as $value) {
                                                
                                                ?>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="facility[]" value="<?php echo $value['id']?>" id="customCheck<?php echo $value['id']?>">
                                                <label class="custom-control-label" for="customCheck<?php echo $value['id']?>"><?php echo $value['f_name']?></label>
                                            </div>
                                                <?php
                                                        }
                                                    }
                                                }
                                                else
                                                      {
                                                        $facl = explode(',', $list->facility);
                                                        // echo "<pre>";print_r($zips);die;
                                            
                                                          if (!empty($facilities)) 
                                                          {
                                                              foreach ($facilities as $value) 
                                                              {
                                                                  if (in_array($value['id'], $facl))
                                                                  {
                                                                      $c = "checked";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="facility[]" value="<?php echo $value['id']?>" id="customCheck<?php echo $value['id'];?>" <?php echo $c; ?>>
                                                                    <label class="custom-control-label" for="customCheck<?php echo $value['id'];?>"><?php echo $value['f_name']?></label>
                                                                </div>
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Thumb(Image Size 400x400)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img;?>" data-plugins="dropify" name="h_thumb" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Banner(Image Size 1920x600)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img2;?>" data-plugins="dropify" name="h_banner" data-height="300" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Image 1(Image Size 800x500)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img3;?>" data-plugins="dropify" name="h_img1" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Image 2(Image Size 800x500)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img4;?>" data-plugins="dropify" name="h_img2" data-height="300" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Image 3(Image Size 800x500)</label>
                                                <input type="file" data-plugins="dropify" name="h_img3" data-default-file="<?php echo $pd_img5;?>" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Hotel Image 4(Image Size 800x500)</label>
                                                <input type="file" data-plugins="dropify" name="h_img4" data-default-file="<?php echo $pd_img6;?>" data-height="300" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/hotellist" class="btn w-sm btn-light waves-effect">Cancel</a>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
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

<script type="text/javascript">
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("url").value = "<?=$list->web_url?>";
        document.getElementById("h_name").value = "<?=$list->name?>";
        document.getElementById("c_in").value = "<?=$list->check_in?>";
        document.getElementById("c_out").value = "<?=$list->check_out?>";
        document.getElementById("p_mobile").value = "<?=$list->p_mobile?>";
        document.getElementById("p_email").value = "<?=$list->p_email?>";
        document.getElementById("p_landline").value = "<?=$list->p_landline?>";
        document.getElementById("s_mobile").value = "<?=$list->s_mobile?>";
        document.getElementById("s_landline").value = "<?=$list->s_landline?>";
        document.getElementById("s_email").value = "<?=$list->s_email?>";
        document.getElementById("address").value = "<?=$list->address?>";
        document.getElementById("hotel_type").value = "<?=$list->hotel_type?>";
    }
</script>