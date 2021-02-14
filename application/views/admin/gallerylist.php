<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Master Metas</a></li> -->
                                            <li class="breadcrumb-item active">All Gallery Image</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Images</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
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
                                        <?php if(count($list)!=1) {?>
                                        <a href="<?php echo base_url();?>admin/addgallery"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <?php } ?>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <!-- <th>Tags</th> -->
                                                    <th>Hotel Image</th>
                                                    <th>Room Image</th>
                                                    <th>Bathroom Image</th>
                                                    <th>Dining Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($list)){
                                                       foreach($list as $key => $val){
                                                        $pd=explode(',', $val['h_image']);
                                                        $pd1=explode(',', $val['r_image']);
                                                        $pd2=explode(',', $val['b_image']);
                                                        $pd3=explode(',', $val['d_image']);
                                                        $pd_img=$pd[0];
                                                        $pd_img1=$pd1[0];
                                                        $pd_img2=$pd2[0];
                                                        $pd_img3=$pd3[0];
                                                        $pd_imgs1=empty($pd_img)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img;
                                                        $pd_imgs2=empty($pd_img1)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img1;
                                                        $pd_imgs3=empty($pd_img2)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img2;
                                                        $pd_imgs4=empty($pd_img3)?base_url('static/default.jpg'):base_url('assets/admin/uploads/gallery/').$pd_img3;
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <!-- <td><?php echo $val['tag_name'];?></td> -->
                                                    <td><img src="<?php echo $pd_imgs1;?>" height="100px" width="100px"></td>
                                                    <td><img src="<?php echo $pd_imgs2;?>" height="100px" width="100px"></td>
                                                    <td><img src="<?php echo $pd_imgs3;?>" height="100px" width="100px"></td>
                                                    <td><img src="<?php echo $pd_imgs4;?>" height="100px" width="100px"></td>
                                                    <td>
                                                        <a href="<?php echo base_url()?>admin/editgallery/<?php echo $val['id'];?>"><i class="mdi mdi-square-edit-outline" style="font-size: 20px;color: green"></i></a>

                                                        <?php
                                                            if (($this->session->userdata('role') == 1)) { 
                                                                ?>
                                                        <a href="<?php echo base_url()?>admin/deletegallery/<?php echo $val['id'];?>"><i class="mdi mdi-delete" style="font-size: 20px;color: red"></i></a>
                                                        <?php 
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->