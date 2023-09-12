<?php

include('connection.php');
session_start();

#if(isset($_POST['updateSet'])){
#    exit();
#}

$email = $_SESSION['email'];
$query = "SELECT * FROM custumer WHERE cus_email = '$email'";
$cus = mysqli_query($conn, $query);
$custumers = mysqli_fetch_array($cus);

$userId = $custumers['cus_id'];
$query2 = "SELECT schedule.sch_id ,schedule.sch_time ,schedule.sch_cus, schedule.sch_status ,timeschedule.tmsch_time, cars.car_id, cars.car_maker, cars.car_model, cars.car_year FROM schedule INNER JOIN timeschedule ON schedule.sch_time = timeschedule.tmsch_id INNER JOIN cars ON schedule.sch_car = cars.car_id WHERE sch_cus = '$userId' ";
$schedules = mysqli_query($conn, $query2);

$query3 = "SELECT shopping.shop_id, shopping.shop_car, shopping.shop_cus, cars.car_id, cars.car_maker, cars.car_model, cars.car_year,cars.car_thumbnail FROM shopping INNER JOIN cars ON shopping.shop_car = cars.car_id WHERE shop_cus = '$userId' ";
$shopping = mysqli_query($conn, $query3);

$query4 = "SELECT car_id,  car_year, car_maker, car_model, car_kilomatres, car_date, car_thumbnail FROM cars ORDER BY car_id DESC LIMIT 3";
$footers= mysqli_query($conn, $query4);
# Latest update

if(isset($_POST['btnFull'])){
    $_SESSION['updateSet'] = "profile";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Auto Club</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <link href="css/master.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color2.css" title="color2" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color3.css" title="color3" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color4.css" title="color4" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color5.css" title="color5" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color6.css" title="color6" media="all" />

    <!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
        <style type="text/css">
            .profile {
                margin-top: 2%;
                margin-left: 29%;
                font-size: 28px;
                padding: 0 10px;
                width: 58%;
            }

            .profile h2 {
                color: #333;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 24px;
                margin-bottom: 10px;
            }

            .profile .card {
                background-color: #fff;
                border-radius: 18px;
                box-shadow: 1px 1px 8px 0 grey;
                height: auto;
                margin-bottom: 20px;
                padding: 20px 0 20px 50px;
            }

            .profile .card table {
                border: none;
                font-size: 16px;
                height: 270px;
                width: 80%;
            }
        </style>

</head>

<body class="m-404" data-scrolling-animations="true">

    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end -->
    <!-- Start Switcher -->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
            <div class="form_holder">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a href="#" data-switchcolor="color1" class="styleswitch" style="background-color:#f76d2b;"> </a>
                                <a href="#" data-switchcolor="color2" class="styleswitch" style="background-color:#de483d;"> </a>
                                <a href="#" data-switchcolor="color3" class="styleswitch" style="background-color:#228dcb;"> </a>
                                <a href="#" data-switchcolor="color4" class="styleswitch" style="background-color:#00bff3;"> </a>
                                <a href="#" data-switchcolor="color5" class="styleswitch" style="background-color:#2dcc70;"> </a>
                                <a href="#" data-switchcolor="color6" class="styleswitch" style="background-color:#6054c2;"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->

    
    <?php include 'navbar.php';?>

    <section class="b-pageHeader">
        <div class="container">
            <h1 class="wow zoomInUp" data-wow-delay="0.7s">Profile</h1>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="profile.php" class="b-breadCumbs__page m-active">Profile</a>
        </div>
    </div>
    <!--b-breadCumbs-->

    <section class="b-contacts s-shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <aside class="b-blog__aside">
                        <div class="b-blog__aside-popular wow zoomInUp" data-wow-delay="0.5s">
                            <header class="s-lineDownLeft">
                                <h2 class="s-titleDet">TEST DRIVE SCHEDULE</h2>
                            </header>
                            <div class="b-blog__aside-popular-posts">
                            <?php if (mysqli_num_rows($schedules) > 0) {
                              while($sch = mysqli_fetch_assoc($schedules)) {
                             ?>
                                <div class="b-blog__aside-popular-posts-one">
                                    <h4><a href="detail.php?id=<?php echo $sch['car_id'];?>"><?php 
                                    echo $sch['car_maker'];
                                    echo " ";
                                    echo $sch['car_model'];
                                    echo " ";
                                    echo $sch['car_year']; ?>
                                    </a></h4>
                                    <div class="b-blog__aside-popular-posts-one-date"><span class="fa fa-calendar-o"></span><?php echo $sch['tmsch_time']; ?><span> <?php echo date("d/m/Y") ?> </span> <span class="fa fa-car"></span><?php echo $sch['sch_status']; ?></div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <div class="b-blog__aside-reviews wow zoomInUp" data-wow-delay="0.5s">
                            <header class="s-lineDownLeft">
                                <h2 class="s-titleDet">CHECK OUTS</h2>
                            </header>
                            <?php if (mysqli_num_rows($shopping) > 0) {
                                while($latest = mysqli_fetch_assoc($shopping)) { ?>
                            <div class="b-blog__aside-reviews-posts">
                                <div class="b-blog__aside-reviews-posts-one">
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-5">
                                            <img src="<?php echo $latest['car_thumbnail']; ?>" style="width:95px;height:70px;"class="img-responsive pull-right" />
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="b-blog__aside-reviews-posts-one-info">
                                                <p><?php 
                                                echo $latest['car_maker']; 
                                                echo ' ';
                                                echo $latest['car_model'];
                                                echo ' ';
                                                echo $latest['car_year'];
                                                ?> </p>
                                                <div class="b-world__item-val">
                                                    <a href="detail.php?id=<?php echo $latest['car_id']; ?>"> <span class="b-world__item-num">More Info</span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }} else { ?>
                            <div class="b-blog__aside-reviews-posts">
                                <div class="b-blog__aside-reviews-posts-one">
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-5">
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="b-blog__aside-reviews-posts-one-info">
                                                <p>Cart is empty</p>
                                                <div class="b-world__item-val">
                                                    <a href="listings.php"> <span class="b-world__item-num">Shop Now</span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xs-6">
                    <div class="b-submit__main">
                        <form action="backend/update_.php" method="post" class='s-submit'>
                            <div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
                                <header class="s-headerSubmit s-lineDownLeft">
                                <?php if ($_SESSION['updateSet']=="phone") { ?>
                                    <h2>Update Phone Number</h2>
                                <?php } else if ($_SESSION['updateSet']=="address"){ ?>
                                    <h2>Update Address</h2>
                                <?php } else if ($_SESSION['updateSet']=="profile"){?>
                                    <h2>Update Profile</h2>
                                <?php } ?>
                                </header>
                            <?php if ($_SESSION['updateSet'] == "phone") { ?>
                                <div class="b-submit__main-element">
                                    <label>Phone Number<span>*</span></label>
                                    <?php if ($custumers['cus_phone'] == '') { ?>  
                                        <input type="text" name="update-phone" required pattern="[0-9]+" />
                                    <?php } else { ?>   
                                        <input type="text" name="update-phone" required pattern="[0-9]+" />
                                    <?php } ?>
                                </div>
                            <?php } else if ($_SESSION['updateSet'] == "address"){ ?>
                                <div class="row">
                                    <div class="col-md-8 col-xs-12">
                                        <div class="b-submit__main-element">
                                            <label>Address<span>*</span></label>
                                            <?php if ($custumers['cus_address'] == '') { ?>  
                                                <input type="text" name="update-address" required />
                                            <?php } else { ?>  
                                                <input type="text" value="<?php echo $custumers['cus_address']; ?>"required name="update-address"/> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="b-submit__main-element">
                                            <label>ZIP Code<span>*</span></label>
                                            <?php if ($custumers['cus_post_code'] == '') { ?>  
                                                    <input type="text" name="update-zip" pattern="[0-9]+"/>
                                            <?php } else { ?>   
                                                    <input type="text" name="update-zip" value="<?php echo $custumers['cus_post_code']; ?>" pattern="[0-9]+"/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if ($_SESSION['updateSet'] == "profile"){ ?>
                                <div class="b-submit__main-element">
                                    <label>Full Name<span>*</span></label>
                                    <input type="text" name="update-name" value="<?php echo $custumers['cus_name']; ?>" required  pattern="[A-Za-zÀ-ž\s]+" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element">
                                            <label>Enter Your Phone Number</label>
                                            <?php if ($custumers['cus_phone'] == '') { ?>  
                                                <input type="text" name="update-phone" pattern="[0-9]+" />
                                            <?php } else { ?>   
                                                <input type="text" name="update-phone" value="<?php echo $custumers['cus_phone']; ?>" pattern="[0-9]+" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element">
                                            <label>Enter Your Email Address <span>*</span></label>
                                            <?php if ($custumers['cus_phone'] == '') { ?>  
                                            <input type="text" name="update-email" required pattern="[^ @]*@[^ @]*" />
                                            <?php } else { ?>   
                                            <input type="text" name="update-email" value="<?php echo $custumers['cus_email']; ?>" required pattern="[^ @]*@[^ @]*" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-submit__main-element">
                                    <?php if ($custumers['cus_address'] == '') { ?>  
                                            <input type="text" name="update-address" />
                                    <?php } else { ?>  
                                        <input type="text" name="update-address" value="<?php echo $custumers['cus_address']; ?>"/> 
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element">
                                            <label>ZIP Code</label>
                                            <?php if ($custumers['cus_post_code'] == '') { ?>  
                                                    <input type="text" name="update-zip" pattern="[0-9]+"/>
                                            <?php } else { ?>   
                                                    <input type="text" name="update-zip" value="<?php echo $custumers['cus_post_code']; ?>" pattern="[0-9]+"/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <button type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Save &amp; Update<span class="fa fa-angle-right"></span></button>
                        </form>
                        <?php if ($_SESSION['updateSet'] !="profile"){ ?>
                        <form method="post" class='s-submit'>
                            <p>If you want update full data click here 
                            <button type="submit" name="btnFull" class="btn s-btn" data-wow-delay="0.3s"><span class="fa fa-angle-right"></span></button></p>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-error-->


    <?php include 'features.php';?>
    <?php include 'footer.php';?>

    <!--Main-->
    <script src="js/jquery-latest.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <script src="assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/classie.js"></script>

    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--Owl Carousel-->
    <script src="assets/owl-carousel/owl.carousel.min.js"></script>
    <!--bxSlider-->
    <script src="assets/bxslider/jquery.bxslider.js"></script>
    <!-- jQuery UI Slider -->
    <script src="assets/slider/jquery.ui-slider.js"></script>

    <!--Theme-->
    <script src="js/jquery.smooth-scroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>
