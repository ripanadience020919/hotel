        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/storetravelpartner') : base_url('admin/edit_storetravelpartner') ;
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
                                            <li class="breadcrumb-item active"><?=$display?> a Travel Partner</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Travel Partner</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            
                    <form  action="<?=$submit_url?>" method="post">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Travel Partner Name<span class="text-danger">*</span></label>
                                                <a href="<?php echo base_url()?>admin/travelpartnerlist"><button type="button" class="btn btn-blue btn-xs waves-effect waves-light" style="float: right;">Travel Partner List</button></a>
                                                <input type="text" id="p_name"  name="p_name" class="form-control" placeholder="e.g : AvTa" required>
                                                <input type="hidden" id="id"  name="id">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Travel Partner Contact<span class="text-danger">*</span></label>
                                                <input type="text" id="p_contact"  name="p_contact" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Travel Partner Email<span class="text-danger">*</span></label>
                                                <input type="text" id="p_email"  name="p_email" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Travel Partner Address<span class="text-danger">*</span></label>
                                                <input type="text" id="p_address"  name="p_address" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/travelpartnerlist" class="btn w-sm btn-light waves-effect">Cancel</a>
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
        document.getElementById("p_name").value = "<?=$list->p_name?>";
        document.getElementById("p_contact").value = "<?=$list->p_contact?>";
        document.getElementById("p_email").value = "<?=$list->p_email?>";
        document.getElementById("p_address").value = "<?=$list->p_address?>";
    }
</script>