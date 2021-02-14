        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/storemealplan') : base_url('admin/edit_storemealplan') ;
  // $pd_img = empty($list->sellers_permit)?'':base_url().$list->sellers_permit;
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
                                            <li class="breadcrumb-item active"><?=$display;?> a Meal Plan</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display;?> a Meal Plan</h4>
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
                                                <label for="product-name">Meal Plan Initials<span class="text-danger">*</span></label>
                                                <a href="<?php echo base_url()?>admin/mealplanlist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Meal Plan List</button></a>
                                                <input type="text" id="initials"  name="initials" class="form-control" placeholder="e.g : AvTa" required>
                                                <input type="hidden" id="id"  name="id">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Meal Plan Details<span class="text-danger">*</span></label>
                                                <input type="text" id="details"  name="details" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/mealplanlist" class="btn w-sm btn-light waves-effect">Cancel</a>
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
        document.getElementById("initials").value = "<?=$list->initials?>";
        document.getElementById("details").value = "<?=$list->details?>";
    }
</script>