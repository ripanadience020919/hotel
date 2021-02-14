<?php 
  $user_id = isset($business->id) ? $business->id : 'ADD';
  // $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('home/storehotel_partner') : base_url('home/edit_storehotel_partner') ;
?>
<head>
      <meta charset="UTF-8">
      <meta name="title" content="<?php echo $partner['metatitle']?>">
      <meta name="keywords" content="<?php echo $partner['keywords']?>">
      <meta name="description" content="<?php echo $partner['metadescription']?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Partner With us</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">
                    
                    <div class="col-md-12 col-lg-12 col-lg-offset-0">
                        <div class="contact-form">
                             <form  action="<?=$submit_url?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Name<span class="text-danger">*</span></label>
                                                <!-- <a href="<?php echo base_url()?>Admin/Hotellist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Hotel List</button></a> -->
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
                                                                  if ($value['id'] == $business->location)
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
                                                                  if ($value['id'] == $business->category)
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
                                                <textarea class="form-control" id="description" name="description" required rows="5"><?php if ($user_id!='ADD') { echo $business->description; } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Terms And Conditions</label>
                                                <textarea class="form-control" id="T&C" required name="T&C" rows="5"><?php if ($user_id!='ADD') { echo $business->T_C; } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Cancellation Policy</label>
                                                <textarea class="form-control" id="CP" name="CP" required rows="5"><?php if ($user_id!='ADD') { echo $business->CP; } ?></textarea>
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
                                                        $facl = explode(',', $business->facility);
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
                                    <!-- <div class="form-group mb-3">
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
                                    </div> -->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <!-- <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button> -->
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->

    <!-- MAP -->
    
    <!-- END / MAP -->

    <script type="text/javascript">
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$business->id?>";
        document.getElementById("url").value = "<?=$business->web_url?>";
        document.getElementById("h_name").value = "<?=$business->name?>";
        document.getElementById("c_in").value = "<?=$business->check_in?>";
        document.getElementById("c_out").value = "<?=$business->check_out?>";
        document.getElementById("p_mobile").value = "<?=$business->p_mobile?>";
        document.getElementById("p_email").value = "<?=$business->p_email?>";
        document.getElementById("p_landline").value = "<?=$business->p_landline?>";
        document.getElementById("s_mobile").value = "<?=$business->s_mobile?>";
        document.getElementById("s_landline").value = "<?=$business->s_landline?>";
        document.getElementById("s_email").value = "<?=$business->s_email?>";
        document.getElementById("address").value = "<?=$business->address?>";
        document.getElementById("hotel_type").value = "<?=$business->hotel_type?>";
    }
</script>