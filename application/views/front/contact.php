<head>
      <meta charset="UTF-8">
      <meta name="title" content="<?php echo $contact['metatitle']?>">
      <meta name="keywords" content="<?php echo $contact['keywords']?>">
      <meta name="description" content="<?php echo $contact['metadescription']?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Contact us</h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
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
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="text">
                            <h2>Contact</h2>
                            <p><?php echo $contact['description']?></p>
                            <ul>
                                <li><i class=" fa ion-ios-location-outline"></i> <?php echo $contact['address']?></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contact['phone']?></li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $contact['email']?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form action="<?php echo base_url().'home/customer_query'?>" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="message" class="field-textarea" placeholder="Write what do you want" required></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-room">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->

    <!-- MAP -->
    <div class="section-map curve">
       <iframe src="<?php echo $contact['map']?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- END / MAP -->