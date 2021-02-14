        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $id = isset($location->id) ? $location->id : 'ADD';
  $submit_url = ($id=='ADD') ? base_url('admin/storelocation') : base_url('admin/updatelocation') ;
  $display = ($id=='ADD') ? 'Add' : 'Edit' ;
  $pd_img = empty($location->image)?'':base_url('assets/admin/uploads/locations/').$location->image;
  $pd_vid = empty($location->l_video)?'':base_url('assets/admin/uploads/locations/videos/').$location->l_video;

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
                                            <li class="breadcrumb-item active"><?=$display?> a Location</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Location</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form  action="<?=$submit_url?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Location Name<span class="text-danger">*</span></label>
                                                <a href="<?php echo base_url()?>admin/locationlist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Location List</button></a>
                                                <input type="text" id="l_name"  name="l_name" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description<span class="text-danger">*</span></label>
                                                <textarea id="l_description"  name="l_description" class="form-control" placeholder="e.g : 01" rows="5" required><?php if ($id!='ADD') { echo $location->l_description; } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Location Image(600*600)<span class="text-danger">*</span></label>
                                                <input type="file" data-default-file="<?php echo $pd_img;?>" data-plugins="dropify" name="photo" data-height="300" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Location Video<span class="text-danger">*</span></label>
                                                <input type="file" data-plugins="dropify" name="l_video" data-height="300" />
                                            <?php
                                            if ($id != 'ADD') 
                                            { 
                                            ?>
                                            <a style="width: 100%;" target="_blank" class="btn w-sm btn-success" href="<?=$pd_vid?>">View</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url()?>admin/locationlist" class="btn w-sm btn-light waves-effect">Cancel</a>
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
                <script type="text/javascript">
                  if ('<?=$id?>'!='ADD') {
                    $("#id").val('<?=$location->id?>');
                    $("#l_name").val('<?=$location->l_name?>');
                  }
                </script>