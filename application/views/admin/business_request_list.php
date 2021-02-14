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
                                            <li class="breadcrumb-item active"><?=$title?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?=$title?></h4>
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
                                        <!-- <a href="<?php  echo base_url();?>admin/addroom"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a> -->
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                              <tr>
                                                <th>Sl No.</th>
                                                <th>User Name</th>
                                                <th>Hotel Name</th>
                                                <th>Location</th>
                                                <th>Category</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($list3)){
                                                       foreach($list3 as $key => $val){
                                                ?>
                                                <tr>

                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('users','first_name'," and `id`='".$val['user_id']."'")."&nbsp". get_perticular_field_value('users','last_name'," and `id`='".$val['user_id']."'");?>
                                                    </td>
                                                    <td><?php echo $val['name'];?></td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('locations','l_name'," and `id`='".$val['location']."'");?>
                                                    </td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('hotel_category','h_category'," and `id`='".$val['category']."'");?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['p_mobile'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $val['address'];?>
                                                    </td>
                                                    <td>
                                                        <?php if($val['block'] == 0) { echo '<b style=color:green;>'.'Approved'.'</b>'; } if($val['block'] == 1) { echo '<b style=color:red;>'.'Denied'.'</b>'; } if($val['block'] == 2) { echo '<b style=color:orange;>'.'Pending'.'</b>'; } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        /*if ($val['block'] == 0) 
                                                        {*/
                                                            ?>

                                                            <a class="btn btn-info waves-effect waves-light" href="<?php echo base_url()?>admin/business_details/<?php echo $val['id'];?>"><i class="mdi mdi-square-plus-outline" style="font-size: 20px;color: green"></i>View</a>

                                                            <?php
                                                            if (($this->session->userdata('role') == 1)) { 
                                                                ?>
                                                            <a class="btn <?php if ($val['block'] == 0) { echo "disabled"; } else{} ?> btn-success waves-effect waves-light" href="<?php echo base_url()?>admin/approve_business/0/<?php echo $val['id'];?>"><i class="mdi mdi-square-plus-outline" style="font-size: 20px;color: green"></i>Approve</a>
                                                            <?php
                                                        //}
                                                        /*if ($val['block'] != 0) 
                                                        {*/  
                                                            ?>
                                                            
                                                            <a class="btn <?php if ($val['block'] == 1) { echo "disabled"; } else{} ?> btn-danger waves-effect waves-light" href="<?php echo base_url()?>admin/deny_business/1/<?php echo $val['id'];?>"><i class="mdi mdi-square-trash-outline" style="font-size: 20px;color: green"></i>Deny</a>
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