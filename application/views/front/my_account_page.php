<section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>My Profile</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>



    <div id="exTab1" class="container">	
        <ul  class="nav nav-pills">
			<li class="active">
                <a  href="#1a" data-toggle="tab">Profile Setting</a>
			</li>
			<li>
			    <a href="#2a" data-toggle="tab">Room Info</a>
			</li>
            <?php
            if (!empty($list3))
        {
            ?>
            <li>
                <a href="#3a" data-toggle="tab">My Business</a>
            </li>
            <?php 
        }
        ?>
		</ul>

		<div class="tab-content clearfix">
		  <div class="tab-pane active" id="1a">
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
            
            <form method="post" action="<?php echo base_url();?>home/update_user_db">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php if(!empty($list->first_name)) { echo $list->first_name; } ?>" placeholder="First Name *">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?php if(!empty($list->last_name)) { echo $list->last_name; } ?>" placeholder="Last Name *">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                        <input type="text" class="form-control" name="name" value="<?php if(!empty($list->name)) { echo $list->name; } ?>" placeholder="User Name *">
                        <input type="hidden" name="id" value="<?php if(!empty($list->id)) { echo $list->id; } ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="<?php if(!empty($list->mobile)) { echo $list->mobile; } ?>" placeholder="Mobile *">
                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php if(!empty($list->email)) { echo $list->email; } ?>" required="required" title="" placeholder="Email *">
                        </div>
                    </div>
                    
                    
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-default">Update Profile</button>
                </div>
                
            </form>
        
			</div>
			
			
			
			<div class="tab-pane" id="2a">
			    <div class="">
                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th>Hotel Name</th>
                        <th>Check-in-Date</th>
                        <th>Check-out-Date</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th>No of Rooms</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($list1)) 
                        {
                            foreach ($list1 as $val) 
                            {
                               ?>
                               <tr>
                                <td><?php echo get_perticular_field_value('hotels','name'," and `id`='".$val['hotel_id']."'");?></td>
                                <td><?php echo $val['arrive_date'];?></td>
                                <td><?php echo $val['checkout_date'];?></td>
                                <td><?php echo $val['adult'];?></td>
                                <td><?php echo $val['child'];?></td>
                                <td><?php echo $val['rooms'];?></td>
                                <td>
                                    <?php if($val['block'] == 0) { echo '<b style=color:green;>'.'Success'.'</b>'; } if($val['block'] == 1) { echo '<b style=color:red;>'.'Cancel'.'</b>'; } if($val['block'] == 2) { echo '<b style=color:orange;>'.'Pending'.'</b>'; } ?>
                                </td>
                                <td>
                                    <a class="btn <?php if ($val['block'] == 0) { echo "disabled"; } if ($val['block'] == 1) { echo "disabled"; } else{} ?> btn-danger waves-effect waves-light" href="<?php echo base_url()?>home/cancel_booking/1/<?php echo $val['room_booking_id'];?>"><i class="mdi mdi-square-trash-outline"></i>Cancel</a>
                                </td>
                              </tr>
                               <?php
                            }
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
			</div>

            <div class="tab-pane" id="3a">
                <div class="">
                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
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
                                <?php if($val['block'] == 0) { echo '<b style=color:green;>'.'Success'.'</b>'; } if($val['block'] == 1) { echo '<b style=color:red;>'.'Cancel'.'</b>'; } if($val['block'] == 2) { echo '<b style=color:orange;>'.'Pending'.'</b>'; } ?>
                            </td>
                            <td>
                                <a class="btn <?php if ($val['block'] == 0) { echo "disabled"; } if ($val['block'] == 1) { echo "disabled"; } else{} ?> btn-info waves-effect waves-light" href="<?php echo base_url()?>home/editpartner_business/<?php echo $val['id'];?>"><i class="mdi mdi-square-edit-outline" style="font-size: 20px;color: green"></i>Edit</a>

                                <a class="btn <?php if ($val['block'] == 0) { echo "disabled"; } if ($val['block'] == 1) { echo "disabled"; } else{} ?> btn-danger waves-effect waves-light" href="<?php echo base_url()?>home/deletepartner_business/<?php echo $val['id'];?>"><i class="mdi mdi-delete" style="font-size: 20px;color: red"></i>Delete</a>
                            </td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                    </tbody>
                  </table>
                </div>
            </div>
    
		</div>
  </div>



<style>
    #exTab1{
        padding:40px;
    }
    #exTab1 .tab-content {
  padding : 40px 15px;
}
    #exTab1 .nav-pills > li > a {
  border-radius: 0;
  border: 1px solid #8e7037;
    color: #8e7037;
    background: transparent;
}
.tab-content .form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #000;
    border-radius: 0px;
    
}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #fff !important;
    background-color: #8e7037 !important;
}
.tab-content button{
    color: #fff !important;
    background-color: #8e7037 !important;
} 
.table-dark {
    color: #fff;
    background-color: #343a40;
}

    
    
</style>

  
  