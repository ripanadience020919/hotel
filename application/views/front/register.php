<!-- BODY-LOGIN -->
    <section class="body-page page-v1 page-v2">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">REGISTER FORM</h2>
                <h5 class="p-v1">
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
                </h5>
                <form  method="post" action="<?php echo base_url().'home/store_user'?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" value="" placeholder="First Name *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" value="" placeholder="Last Name *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Username *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" value="" placeholder="Mobile *">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" required="required" title="" placeholder="Email *">
                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password" placeholder="Password *">
                        <span data-toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input id="password-field1" type="password" class="form-control" name="cpassword" placeholder="Confirm Password *">
                        <span data-toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <button type="submit" class="btn btn-default">REGISTER</button>
                </form>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->