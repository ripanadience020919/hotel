        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/storeroom') : base_url('admin/edit_storeroom') ;
  $pd_img = empty($list->r_img1)?'':base_url('assets/admin/uploads/rooms/').$list->r_img1;
  $pd_img2 = empty($list->r_img2)?'':base_url('assets/admin/uploads/rooms/').$list->r_img2;
  $pd_img3 = empty($list->r_img3)?'':base_url('assets/admin/uploads/rooms/').$list->r_img3;
  $pd_img4 = empty($list->r_img4)?'':base_url('assets/admin/uploads/rooms/').$list->r_img4;
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
                                            <li class="breadcrumb-item active"><?=$display?> a Room</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Room</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form id="queikform" action="<?=$submit_url?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Location<span class="text-danger">*</span></label>
                                                <a href="<?php echo base_url()?>Admin/roommlist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Room List</button></a>
                                                <select class="form-control" name="location" id="example-select" required onchange="gethotel();">
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
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Hotel Name<span class="text-danger">*</span></label>
                                                <select class="form-control" name="hotel_name" id="example-select1" required>
                                                  <option value="">Select Hotel</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Room Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="room_type" id="example-select" required>
                                                        <option value="">Select Room Type</option>
                                                        <?php
                                                        if ($user_id == 'ADD') 
                                                        {
                                                            if (!empty($roomtype)) 
                                                            {
                                                                foreach ($roomtype as $value)
                                                                {
                                                        ?>
                                                        <option value="<?php echo $value['id']?>"><?php echo $value['r_type']?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        else
                                                      {
                                                          if (!empty($roomtype)) 
                                                          {
                                                              foreach ($roomtype as $value) 
                                                              {
                                                                  if ($value['id'] == $list->room_type)
                                                                  {
                                                                      $c = "selected";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                  <option value="<?php echo $value['id'];?>"<?php echo $c; ?>><?php echo $value['r_type'];?></option> 
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
                                                <label for="product-name">Meal Plan<span class="text-danger">*</span></label>
                                                <select class="form-control" name="meal_plan" id="example-select" required>
                                                        <option value="">Select Meal Plan</option>
                                                        <?php
                                                        if ($user_id == 'ADD') 
                                                        {
                                                            if (!empty($mealplan)) 
                                                            {
                                                                foreach ($mealplan as $value)
                                                                {
                                                        ?>
                                                        <option value="<?php echo $value['id']?>"><?php echo $value['initials']?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                    else
                                                      {
                                                          if (!empty($mealplan)) 
                                                          {
                                                              foreach ($mealplan as $value) 
                                                              {
                                                                  if ($value['id'] == $list->meal_plan)
                                                                  {
                                                                      $c = "selected";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                  <option value="<?php echo $value['id'];?>"<?php echo $c; ?>><?php echo $value['initials'];?></option> 
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Occupancy<span class="text-danger">*</span></label>
                                                <input type="text" id="occupancy"  name="occupancy" class="form-control" placeholder="e.g : 2" required>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">No of Adult<span class="text-danger">*</span></label>
                                                <input type="text" id="occupancy_adult"  name="occupancy_adult" class="form-control" placeholder="e.g : 2" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">No of Child [under 6 year]<span class="text-danger">*</span></label>
                                                <input type="text" id="occupancy_child"  name="occupancy_child" class="form-control" placeholder="e.g : 2" required>
                                            </div>
                                          </div>
                                        </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Amenity</label>
                                                <div class="custom-control custom-checkbox">
                                                    <?php
                                                    if ($user_id == 'ADD') 
                                                    {
                                                        if (!empty($amenity)) 
                                                        {
                                                            foreach ($amenity as $value) 
                                                            {
                                                    ?>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                        name="amenity[]" value="<?php echo $value['id']?>" id="customCheck<?php echo $value['id']?>">
                                                        <label class="custom-control-label" for="customCheck<?php echo $value['id']?>"><?php echo $value['a_name']?></label>
                                                    </div>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    else
                                                      {
                                                        $amenites = explode(',', $list->amenity);
                                                        // echo "<pre>";print_r($zips);die;
                                            
                                                          if (!empty($amenity)) 
                                                          {
                                                              foreach ($amenity as $value) 
                                                              {
                                                                  if (in_array($value['id'], $amenites))
                                                                  {
                                                                      $c = "checked";
                                                                  }
                                                                  else
                                                                  {
                                                                      $c = '';
                                                                  }
                                                                  ?>
                                                                  <div class="custom-control custom-checkbox">
                                                                  <input type="checkbox" class="custom-control-input" name="amenity[]" value="<?php echo $value['id']?>" id="customCheck<?php echo $value['id']?>" <?php echo $c; ?>>
                                                                  <label class="custom-control-label" for="customCheck<?php echo $value['id']?>"><?php echo $value['a_name']?></label>
                                                              </div>
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-3">
                                                    <?php
                                                    if ($user_id == 'ADD') 
                                                    {
                                                        ?>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="refundable_status" value="0" class="custom-control-input" id="customRadio1">
                                                        <label class="custom-control-label" for="customRadio1">Refundable</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="refundable_status" value="1" class="custom-control-input" id="customRadio2">
                                                        <label class="custom-control-label" for="customRadio2">Non-Refundable</label>
                                                    </div>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" name="refundable_status" value="0" class="custom-control-input" id="customRadio1" <?php if($list->refundable_status == 0){?>checked="checked"<?php }?>>
                                                            <label class="custom-control-label" for="customRadio1">Refundable</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" value="1" name="refundable_status" <?php if($list->refundable_status == 1){?>checked="checked"<?php }?> class="custom-control-input" id="customRadio2">
                                                            <label class="custom-control-label" for="customRadio2">Non-Refundable</label>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                                </div>
                                                <?php
                                                    if ($user_id == 'ADD') 
                                                    {
                                                        ?>
                                                <div class="mt-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                        name="extra_bed" value="1" id="customCheck9999">
                                                        <label class="custom-control-label" for="customCheck9999">Extra Bed ?</label>
                                                    </div><br>
                                                        <label for="product-name">Extra Bed Charge (₹)<span class="text-danger">*</span></label>
                                                        <input type="text" id="extra_bed_charge" name="extra_bed_charge" class="form-control" placeholder="e.g : 100">
                                                </div>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="mt-3">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                name="extra_bed" <?php if($list->extra_bed == 1){?>checked="checked"<?php }?> value="1" id="customCheck9999">
                                                                <label class="custom-control-label" for="customCheck9999">Extra Bed ?</label>
                                                            </div><br>
                                                                <label for="product-name">Extra Bed Charge (₹)<span class="text-danger">*</span></label>
                                                                <input type="text" id="extra_bed_charge" name="extra_bed_charge" class="form-control" placeholder="e.g : 100">
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 fields">
                                        <div class="mt-3">
                                        <div class="row">
                                            <?php
                                            if($user_id == 'ADD')
                                            {
                                                ?>
                                                <div class="col-md-2">
                                                    <label for="product-name">Start Date<span class="text-danger">*</span></label>
                                                    <input type="date" id="s_date"  name="s_date[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="product-name">End Date<span class="text-danger">*</span></label>
                                                    <input type="date" id="e_date"  name="e_date[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="product-name">Actual Price<span class="text-danger">*</span></label>
                                                    <input type="text" id="a_price"  name="a_price[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="product-name">Offer Price<span class="text-danger">*</span></label>
                                                    <input type="text" id="o_price"  name="o_price[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="product-name">No Of Rooms<span class="text-danger">*</span></label>
                                                    <input type="text" id="n_rooms"  name="n_rooms[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                </div>
                                                <?php
                                            }
                                            else
                                            {
                                                $start_date = explode(',', $list->s_date);
                                                
                                                if (!empty($start_date)) 
                                                {
                                                  $count = 0;
                                                foreach ($start_date as $zip) 
                                                { 
                                                  $count ++;
                                                }
                                                $start = explode(',',$list->s_date);
                                                $end = explode(',', $list->e_date);
                                                $actual = explode(',', $list->actual_price);
                                                $offer = explode(',', $list->offer_price);
                                                $n_rooms = explode(',', $list->n_rooms);  
                                                for ($i=0; $i < $count; $i++) {
                                                    ?>
                                                    <table>
                                                      <tbody>
                                                        <tr>
                                                          <td>
                                                          <div class="">
                                                              <label for="product-name">Start Date<span class="text-danger">*</span></label>
                                                              <input type="date" id="s_date" value="<?php echo $start[$i]; ?>"  name="s_date[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                          </div>
                                                          </td>
                                                          <td>
                                                          <div class="">
                                                              <label for="product-name">End Date<span class="text-danger">*</span></label>
                                                              <input type="date" id="e_date" value="<?php echo $end[$i]; ?>" name="e_date[]" class="form-control" placeholder="e.g : AvTa" required="required">
                                                          </div>
                                                          </td>
                                                          <td>
                                                          <div class="">
                                                              <label for="product-name">Actual Price<span class="text-danger">*</span></label>
                                                              <input type="text" id="a_price"  name="a_price[]" value="<?php echo $actual[$i]; ?>" class="form-control" placeholder="e.g : AvTa" required="required">
                                                          </div>
                                                          </td>
                                                          <td>
                                                          <div class="">
                                                              <label for="product-name">Offer Price<span class="text-danger">*</span></label>
                                                              <input type="text" id="o_price"  name="o_price[]" value="<?php echo $offer[$i]; ?>" class="form-control" placeholder="e.g : AvTa" required="required">
                                                          </div>
                                                          </td>
                                                          <td>
                                                          <div class="">
                                                              <label for="product-name">No Of Rooms<span class="text-danger">*</span></label>
                                                              <input type="text" id="n_rooms"  name="n_rooms[]" value="<?php echo $n_rooms[$i]; ?>" class="form-control" placeholder="e.g : AvTa" required="required">
                                                          </div>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                    
                                                    <br>
                                                    <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                    
                                            
                                            <!--<div class="col-md-2 mt-4">
                                                <button type="button" style="text-align: center;" class="btn btn-primary btn-sm waves-effect waves-light" id="add">Add More</button>
                                            </div>-->
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Room Image 1(Image Size 400x400)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img;?>" data-plugins="dropify" name="r_img1" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Room Image 2(Image Size 400x400)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img2;?>" data-plugins="dropify" name="r_img2" data-height="300" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Room Image 3(Image Size 400x400)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img3;?>" data-plugins="dropify" name="r_img3" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Room Image 3(Image Size 400x400)</label>
                                                <input type="file" data-default-file="<?php echo $pd_img4;?>" data-plugins="dropify" name="r_img4" data-height="300" />
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/roommlist" class="btn w-sm btn-light waves-effect">Cancel</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- // <script type="text/javascript">
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
// </script> -->
<script type="text/javascript">
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("occupancy").value = "<?=$list->occupancy?>";
        document.getElementById("occupancy_adult").value = "<?=$list->occupancy_adult?>";
        document.getElementById("occupancy_child").value = "<?=$list->occupancy_child?>";
        document.getElementById("extra_bed_charge").value = "<?=$list->extra_bed_charge?>";
        setTimeout(function()
        {
          gethotel_edit();
        }, 1000);
    }
    function gethotel_edit(e)
    { 
      // event.preventDefault();
      //attvalue
      var form1 = $('#queikform')[0];
      // alert(form1);
      var data = new FormData(form1);
      var url2="<?php echo base_url(); ?>admin/gethotel";
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: url2,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
          // alert(data);
          $('#example-select1').html(data);
          //ajaxindicatorstop();
        },
        error: function (e) {
          alert("ERROR : ", e);
          //ajaxindicatorstop();
        }
      }); 
    }
</script>

<script type="text/javascript">
  function gethotel(e)
  { 
    event.preventDefault();
    //attvalue
    var form1 = $('#queikform')[0];
    // alert(form1);
    var data = new FormData(form1);
    var url2="<?php echo base_url(); ?>admin/gethotel";
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: url2,
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      success: function (data) {
        // alert(data);
        $('#example-select1').html(data);
        //ajaxindicatorstop();
      },
      error: function (e) {
        alert("ERROR : ", e);
        //ajaxindicatorstop();
      }
    }); 
  }
</script>