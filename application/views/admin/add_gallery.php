<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $id = isset($list->id) ? $list->id : 'ADD';
  $submit_url = ($id=='ADD') ? base_url('admin/storegallery') : base_url('admin/updategallery') ;
  $display = ($id=='ADD') ? 'Add' : 'Edit' ;
  $pd=explode(',', empty($list->h_image)?'':$list->h_image);
  $pd1=explode(',', empty($list->r_image)?'':$list->r_image);
  $pd2=explode(',', empty($list->b_image)?'':$list->b_image);
  $pd3=explode(',', empty($list->d_image)?'':$list->d_image);
  $pd_img=$pd[0];
  $pd_img1=$pd1[0];
  $pd_img2=$pd2[0];
  $pd_img3=$pd3[0];
  $pd_imgs1=empty($pd_img)?'':base_url('assets/admin/uploads/gallery/').$pd_img;
  $pd_imgs2=empty($pd_img1)?'':base_url('assets/admin/uploads/gallery/').$pd_img1;
  $pd_imgs3=empty($pd_img2)?'':base_url('assets/admin/uploads/gallery/').$pd_img2;
  $pd_imgs4=empty($pd_img3)?'':base_url('assets/admin/uploads/gallery/').$pd_img3;
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">All Image</a></li>
                                            <li class="breadcrumb-item active"><?=$display?> a Image</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Image</h4>
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
                                                <!-- <label for="product-name">Tag Name<span class="text-danger">*</span></label> -->
                                                <a href="<?php echo base_url()?>admin/gallery"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Gallery List</button></a>
                                                <!-- <input type="text" id="tag_name"  name="tag_name" class="form-control" placeholder="e.g : AvTa" required> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Category 1<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="e.g : AvTa" required name="cat1" value="<?php if ($id!='ADD') { echo $list->cat1; }?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Category Image 1<span class="text-danger">*</span></label>
                                                <input type="file" multiple data-default-file="<?php echo $pd_imgs1;?>" data-plugins="dropify" name="h_images[]" value="<?php if ($id!='ADD') { echo $list->h_image; }?>" data-height="300" />
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Category 2<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="e.g : AvTa" required name="cat2" value="<?php if ($id!='ADD') { echo $list->cat2; }?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Category Image 2<span class="text-danger">*</span></label>
                                                <input type="file" multiple data-default-file="<?php echo $pd_imgs2;?>" data-plugins="dropify" name="r_images[]" value="<?php if ($id!='ADD') { echo $list->r_image; }?>" data-height="300" />
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Category 3<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="e.g : AvTa" required name="cat3" value="<?php if ($id!='ADD') { echo $list->cat3; }?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Category Image 3<span class="text-danger">*</span></label>
                                                <input type="file" multiple data-default-file="<?php echo $pd_imgs3;?>" data-plugins="dropify" name="b_images[]" value="<?php if ($id!='ADD') { echo $list->b_image; }?>" data-height="300" />
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Category 4<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="e.g : AvTa" required name="cat4" value="<?php if ($id!='ADD') { echo $list->cat4; }?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-image">Category Image 4<span class="text-danger">*</span></label>
                                                <input type="file" multiple data-default-file="<?php echo $pd_imgs4;?>" data-plugins="dropify" name="d_images[]" value="<?php if ($id!='ADD') { echo $list->d_image; }?>" data-height="300" />
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url()?>admin/gallery" class="btn w-sm btn-light waves-effect">Cancel</a>
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
                    $("#id").val('<?=$list->id?>');
                  }
                </script>