<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
<!-- <?php 
  $user_id = isset($list->id) ? $list->id : 'ADD';
  $display = ($user_id=='ADD') ? 'Add' : 'Edit' ;
  $submit_url = ($user_id=='ADD') ? base_url('admin/storeamenity') : base_url('admin/edit_storeamenity') ;
  
  $pd3=explode(',', empty($list['images'])?'':$list['images']);
  $pd_img3=$pd3[0];
  $pd_imgs4=empty($pd_img3)?'':base_url('assets/admin/uploads/gallery/').$pd_img3;
?> -->
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">CMS</a></li>
                                            <li class="breadcrumb-item active">Add About Details</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add About Details</h4>
                                </div>
                            </div>
                        </div> 
                        <h4 class="header-title">
                                            <?php
                                                $success = $this->session->userdata('success');
                                                if ($success != "") { 
                                            ?>
                                                    <div class="alert alert-success"><b><?php echo $success ?></b></div>
                                                <?php }else{ ?>
                                                <?php
                                                    $failure = $this->session->userdata('failure');
                                                if ($failure != "") { ?>
                                                    <div class="alert alert-danger"><b><?php echo $failure ?></b></div>
                                            <?php 
                                                } 
                                            }
                                            ?>
                                        </h4>    
                        <!-- end page title --> 
                    <?php
                        if (!empty($list)) {
                            // foreach ($list as $value) {
                    ?>
                    <form  action="<?php echo base_url().'admin/addaboutdetails'?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Title 1<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title1" name="title1" required="" value="<?php echo $list['title1']?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description 1<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="about_us" name="about_us" required="" rows="5"><?php echo $list['about_us']?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Title 2<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title2" name="title2" required="" value="<?php echo $list['title2'];?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description 2<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="why" name="why" required="" rows="5"><?php echo $list['why']?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Meta Title</label>
                                                <input type="text" id="metatitle"  name="metatitle" class="form-control" value="<?php echo $list['metatitle']?>" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Meta Keywords</label>
                                                <input type="text" id="keywords"  name="keywords" class="form-control" value="<?php echo $list['keywords']?>" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Meta Description</label>
                                                <textarea class="form-control" id="metadescription" name="metadescription" required="" rows="5"><?php echo $list['metadescription']?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-image">Image<span class="text-danger">*</span></label>
                                                <input type="file" multiple data-default-file="<?php echo $pd_imgs4;?>" data-plugins="dropify" name="images[]" data-height="300" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                    <?php
                            // }

                        }else{
                    ?>
                    <form  action="<?php echo base_url().'admin/addaboutdetails'?>" method="post" enctype="multipart/form-data">                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Title 1<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title1" name="title1" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description 1<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="about_us" name="about_us" required="" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Title 2<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title2" name="title2" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Description 2<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="why" name="why" required="" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="product-name">Meta Title</label>
                                                <input type="text" id="metatitle"  name="metatitle" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product-name">Meta Keywords</label>
                                                <input type="text" id="keywords"  name="keywords" class="form-control" placeholder="e.g : AvTa" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product-name">Meta Description</label>
                                                <textarea class="form-control" id="metadescription" name="metadescription" required="" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                    <input type="submit" value="Save" class="btn w-sm btn-success">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                    <?php
                    }
                    ?>

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
        document.getElementById("a_name").value = "<?=$list->a_name?>";
    }
</script>