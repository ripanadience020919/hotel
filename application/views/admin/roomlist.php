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
                                            <li class="breadcrumb-item active">All Rooms</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Rooms</h4>
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
                                        <a href="<?php  echo base_url();?>admin/addroom"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;"><i class="fe-plus mr-1"></i> ADD</button></a>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Room Type</th>
                                                    <th>Hotel Name</th>
                                                    <th>Location</th>
                                                    <th>Occupancy</th>
                                                    <th>Meal Plan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     if(!empty($rooms)){
                                                       foreach($rooms as $key => $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('rooms','r_type'," and `id`='".$val['room_type']."'");?>
                                                    </td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('hotels','name'," and `id`='".$val['hotel_name']."'");?>
                                                    </td>

                                                    <td>
                                                        <?php echo get_perticular_field_value('locations','l_name'," and `id`='".$val['location']."'");?>
                                                    </td>

                                                    <td>
                                                        <?php echo $val['occupancy'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo get_perticular_field_value('meal_plans','initials'," and `id`='".$val['meal_plan']."'");?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url()?>admin/editroom/<?php echo $val['id'];?>"><i class="mdi mdi-square-edit-outline" style="font-size: 20px;color: green"></i></a>

                                                        <?php
                                                            if (($this->session->userdata('role') == 1)) { 
                                                                ?>
                                                        <a href="<?php echo base_url()?>admin/deleteroom/<?php echo $val['id'];?>"><i class="mdi mdi-delete" style="font-size: 20px;color: red"></i></a>
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