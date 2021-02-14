    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <section class="banner-tems text-center">
        <div class="container">
            <div class="banner-content">
                <h2>Hotels in <?php echo $location;?></h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
            </div>
        </div>
    </section>

    <section class="section-reservation-page">
        <div class="container">
            <div class="reservation-page">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="reservation_content">
                            <!-- RESERVATION ROOM -->
                            <div class="reservation-room">
                                <!-- ITEM -->
                                <?php
                                        if (!empty($list)){
                                            foreach ($list as $value){             
                                ?>
                                <div class="reservation-room_item">
                                    <h2 class="reservation-room_name"><a href="#"><?php echo $value['name']?></a></h2>
                                    <div class="reservation-room_img">
                                        <a href="#"><img src="<?php echo base_url().'assets/admin/uploads/hotels/'.$value['h_img1']?>" alt="#" class="img-responsive curve" height="370px" width="250px"></a>
                                    </div>
                                    <div class="reservation-room_text">
                                        <div class="reservation-room_desc">
                                            <h4><?php echo $value['address'];?></h4>
                                            <h4><?php echo get_perticular_field_value('hotel_category','h_category'," and `id`='".$value['category']."'");?></h4>
                                            <p><?php echo $value['description'];?></p>
                                            <ul>
                                                <?php
                                                $facility = explode(',', $value['facility']);
                                                    foreach ($facility as $val){      
                                                ?>
                                                <li>
                                                    <?php echo get_perticular_field_value('facilities','f_name'," and `id`='".$val."'");?>
                                                </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div><br>
                                        <!-- <a href="#" class="reservation-room_view-more">View More Infomation</a>
                                        <div class="clear"></div>
                                        <p class="reservation-room_price">
                                            <span class="reservation-room_amout">$330</span> / days
                                        </p> -->
                                        <a href="<?php echo base_url().'home/hotel_rooms/'.$value['id']?>" class="btn btn-room" style="text-align: right;">BOOK ROOM</a>
                                    </div>
                                </div>
                                <?php
                                        }
                                    }
                                    else{
                                ?>
                                <div class="reservation-room_item">
                                    <h2>Sorry,No Hotels Available In This Location.<a href="<?php echo base_url();?>"><span>Browse Location</span></a></h2>
                                </div>
                                <?php
                                        }
                                ?>
                                <!-- END / ITEM -->
                            </div>
                            <!-- END / RESERVATION ROOM -->
                        </div>
                    </div>
                    <!-- END / CONTENT -->
                </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
            function check_arrive_date1(e)
          { 
            event.preventDefault();
            //attvalue
            var form1 = $('#queikform')[0];
            // event.preventDefault();
            // alert(form1);
            var data = new FormData(form1);
            var url2="<?php echo base_url(); ?>home/check_arrive_date";
            $.ajax({
              type: "POST",
              enctype: 'multipart/form-data',
              url: url2,
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              success: function (data) {
                // alert(data);
                $('#div_span').html(data);
                //ajaxindicatorstop();
              },
              error: function (e) {
                alert("ERROR : ", e);
                //ajaxindicatorstop();
              }
            }); 
          }

          function check_checkout_date1(e)
          { 
            event.preventDefault();
            //attvalue
            var form1 = $('#queikform')[0];
            // alert(form1);
            var data = new FormData(form1);
            var url2="<?php echo base_url(); ?>home/check_checkout_date";
            $.ajax({
              type: "POST",
              enctype: 'multipart/form-data',
              url: url2,
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              success: function (data) {
                // alert(data);
                $('#div_span1').html(data);
                //ajaxindicatorstop();
              },
              error: function (e) {
                alert("ERROR : ", e);
                //ajaxindicatorstop();
              }
            }); 
          }

          function booking_db(e)
          { 
            event.preventDefault();
            //attvalue
            var form1 = $('#queikform')[0];
            // alert(form1);
            var data = new FormData(form1);
            var url2="<?php echo base_url(); ?>home/hotel_booking";
            $.ajax({
              type: "POST",
              enctype: 'multipart/form-data',
              url: url2,
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              success: function (data) {
                // alert(data);
                $('#div_span2').html(data);
                //ajaxindicatorstop();
              },
              error: function (e) {
                alert("ERROR : ", e);
                //ajaxindicatorstop();
              }
            }); 
          }

           function check_adult(e)
          { 
            event.preventDefault();
            //attvalue
            var form1 = $('#queikform')[0];
            // event.preventDefault();
            // alert(form1);
            var data = new FormData(form1);
            var url2="<?php echo base_url(); ?>home/check_adult_db";
            $.ajax({
              type: "POST",
              enctype: 'multipart/form-data',
              url: url2,
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              success: function (data) {
                if(!data)
                {
                     $('#div_span4').css('display','none');
                }
                else
                {
                     $('#div_span4').css('display','block');
                }
                // $("p").css("background-color", "yellow");
                //ajaxindicatorstop();
              },
              error: function (e) {
                alert("ERROR : ", e);
                //ajaxindicatorstop();
              }
            }); 
          }

          function check_child(e)
          { 
            event.preventDefault();
            //attvalue
            var form1 = $('#queikform')[0];
            // event.preventDefault();
            // alert(form1);
            var data = new FormData(form1);
            var url2="<?php echo base_url(); ?>home/check_child_db";
            $.ajax({
              type: "POST",
              enctype: 'multipart/form-data',
              url: url2,
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              success: function (data) {
                // alert(data);
                // $('#div_span4').html(data);
                if(!data)
                {
                     $('#div_span4').css('display','none');
                }
                else
                {
                     $('#div_span4').css('display','block');
                }
                //ajaxindicatorstop();
              },
              error: function (e) {
                alert("ERROR : ", e);
                //ajaxindicatorstop();
              }
            }); 
          }



        </script>

        <script type="text/javascript">

            $(document).ready(function(){
                $('form#queikform').submit(function(e) {
                var form = $(this);
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('home/check_form_data'); ?>",
                    data: form.serialize(), // <--- THIS IS THE CHANGE
                    dataType: "html",
                    success: function(data){
                      alert(data);
                      // $("#saved").html('<div class="alert alert-success" ><b>'+data+'</b></div>');
                      // location.reload();
                    },
                    error: function() { alert("Error posting feed."); }
               });

            });
        });
        </script>