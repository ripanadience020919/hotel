<head>
    <meta charset="UTF-8">
    <meta name="title" content="<?php echo $rate['metatitle'] ?>">
    <meta name="keywords" content="<?php echo $rate['keywords'] ?>">
    <meta name="description" content="<?php echo $rate['metadescription'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>Room & Rate</h2>
            <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
        </div>
    </div>
</section>

<section class="body-room-1" id="body-room-12">
    <div class="container">
        <div class="room-wrap-1">
            <div class="row">
                <?php
if (!empty($check)) {
    foreach ($check as $room) {
        $r_id = $room['id'];
        if ($room['r_img1'] == '') {
            $pd_image = 'assets/admin/uploads/rooms/default.jpg';
        } else {
            $pd_image = 'assets/admin/uploads/rooms/' . $room['r_img1'];
        }
        $price = explode(',', $room['actual_price']);
        //echo $price[0];
        ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="room-item-1">
                        <h2><a href="#"><?php echo get_perticular_field_value('rooms', 'r_type', " and `id`='" . $room['room_type'] . "'"); ?>
                                Room</a></h2>
                        <div class="img">
                            <a href="#"><img src="<?php echo base_url($pd_image); ?>" alt="#" class="curve"></a>
                        </div>
                        <div class="content">
                            <p><?php echo get_perticular_field_value('hotels', 'description', " and `id`='" . $room['hotel_name'] . "'"); ?>
                            </p>
                            <ul>
                                <li>Max: <?php echo $room['occupancy']; ?></li>
                                <li>Meal:
                                    <?php echo get_perticular_field_value('meal_plans', 'initials', " and `id`='" . $room['meal_plan'] . "'"); ?>
                                </li>
                                <!-- <li>Size: 35 m2 / 376 ft2</li>
                                                <li>Bed: King-size or twin beds</li> -->
                            </ul>
                        </div>
                        <div class="bottom curve">
                            <!-- <span class="price">Starting <span class="amout">₹ <?=$price[0]?></span> /days</span> -->
                            <span class="price">Starting <span class="amout">₹ <s><?php
$price = explode(',', $room['actual_price']);
        $offprice = explode(',', $room['offer_price']);
        echo $price[0];
        ?></span></s>&nbsp;<span class="amout" style="color: red"><?php echo $offprice[0] ?></span> /Night</span>
                            <a href="<?php echo base_url() ?>home/room_details/<?php echo $r_id; ?>" class="btn">VIEW
                                DETAILS</a>
                        </div>
                    </div>
                </div>
                <?php
}
}
?>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.find_btn').click(function() {
        event.preventDefault();
        var arrival = $('#arrival').val();
        var departure = $('#departure').val();
        var adults = $('#adults').text();
        var children = $('#children').text();
        var url2 = "<?php echo base_url(); ?>home/check_room_by_date";
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: url2,
            data: {
                arrival: arrival,
                departure: departure,
                adults: adults,
                children: children
            },
            success: function(res) {
                // alert(res);
                $('.body-room-1').html(res);
            },
            error: function(e) {
                alert("ERROR : ", e);
            }
        });
    });
});
</script>
<!--  <script type="text/javascript">
        $('#body-room-12').html("<?=$html?>");
    </script> -->