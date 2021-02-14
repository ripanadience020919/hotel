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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Location</a></li>
                                            <li class="breadcrumb-item active">All Hotel Category</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Hotel Category</h4>
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
                                        <a href="<?php  echo base_url();?>admin/addhotelcategory"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Hotel Category</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($hcat)){
                                                       foreach($hcat as $key => $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo $val['h_category'];?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url()?>admin/edithotelcategory/<?php echo $val['id'];?>"><i class="mdi mdi-square-edit-outline" style="font-size: 20px;color: green"></i></a>

                                                        <?php
                                                            if (($this->session->userdata('role') == 1)) { 
                                                                ?>
                                                        <a href="<?php echo base_url()?>admin/deletehotelcategory/<?php echo $val['id'];?>"><i class="mdi mdi-delete" style="font-size: 20px;color: red"></i></a>
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