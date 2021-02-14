        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/store_sub_admin_data') : base_url('admin/edit_store_sub_admin_data') ;
  
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
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Locations</a></li> -->
                                            <li class="breadcrumb-item active"><?=$display?> a Sub Admin</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$display?> a Sub Admin</h4>
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
                                            
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id">
                                    
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">User Name<span class="text-danger">*</span></label>
                                                <input type="text" id="username"  name="username" class="form-control" placeholder="e.g : 2" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">Phone<span class="text-danger">*</span></label>
                                                <input type="text" id="phone"  name="phone" class="form-control" placeholder="e.g : 2" required>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Email<span class="text-danger">*</span></label>
                                                <input type="text" id="email"  name="email" class="form-control" placeholder="e.g : 2" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="product-name">Password<span class="text-danger">*</span></label>
                                                <input type="text" id="password"  name="password" class="form-control" placeholder="e.g : 2" required>
                                            </div>
                                        </div>
                                    </div>


                                    
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="<?php echo base_url();?>admin/sub_admin" class="btn w-sm btn-warning">Back</a>
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
    if ('<?=$user_id?>'!='ADD') {
        document.getElementById("id").value = "<?=$list->id?>";
        document.getElementById("username").value = "<?=$list->username?>";
        document.getElementById("phone").value = "<?=$list->phone?>";
        document.getElementById("email").value = "<?=$list->email?>";
        document.getElementById("password").value = "<?=$list->opassword?>";
    }
</script>