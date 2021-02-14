<!-- BODY-LOGIN -->
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">LOGIN ACCOUNT</h2>
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

                <form method="post" action="<?php echo base_url().'home/userlogin'?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="" placeholder="User Email">
                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-field"></span>
                    </div>
                    <button type="submit" class="btn btn-default">LOGIN</button>
                </form>
                <p><a href="<?php echo base_url().'home/register'?>" style="color: #ffff">I don’t have an account</a> &nbsp;- &nbsp; <a href="<?php echo base_url().'home/show_forgotpassword_form'?>" style="color: #ffff">Forgot Password</a></p>

            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->