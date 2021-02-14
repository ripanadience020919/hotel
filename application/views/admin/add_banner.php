        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $id = isset($list->id) ? $list->id : 'ADD';
  $submit_url = ($id=='ADD') ? base_url('admin/storebanner') : base_url('admin/updatebanner') ;
  $display = ($id=='ADD') ? 'Add' : 'Edit' ;
  $pd_imgs=empty($list->images)?'':base_url('assets/admin/uploads/banner/').$list->images;
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
                                                <a href="<?php echo base_url()?>admin/banner"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Banner List</button></a>
                                                <!-- <input type="text" id="tag_name"  name="tag_name" class="form-control" placeholder="e.g : AvTa" required> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-image">Title<span class="text-danger">*</span></label>
                                                <input type="text" id="title"  name="title" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-image">Sub Title<span class="text-danger">*</span></label>
                                                <input type="text" id="sub_title"  name="sub_title" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-image">Image<span class="text-danger">*</span></label>
                                                <input type="file" data-default-file="<?php echo $pd_imgs;?>" data-plugins="dropify" name="images" data-height="300" />
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url()?>admin/banner" class="btn w-sm btn-light waves-effect">Cancel</a>
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
                    $("#title").val('<?=$list->title?>');
                    $("#sub_title").val('<?=$list->sub_title?>');
                  }
                </script>