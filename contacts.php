<?php

include('connection.php');
session_start();

$query2 = "SELECT car_id,  car_year, car_maker, car_model, car_kilomatres, car_date, car_thumbnail FROM cars ORDER BY car_id DESC LIMIT 3";
$footers= mysqli_query($conn, $query2);
# Latest update

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
            <h1 class="wow zoomInUp" data-wow-delay="0.7s">Register</h1>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="404.html" class="b-breadCumbs__page m-active">Register</a>
        </div>
    </div>
    <!--b-breadCumbs-->


    <section class="b-contacts s-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="b-contacts__form">
                        <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">Contact Form</h2>
                        </header>
                        <div id="success"></div>
                        <form action="backend\contact.php" method="POST" id="contactForm" class="s-form wow zoomInUp" data-wow-delay="0.5s">
                            <div class="s-relative">
                                <select name="contact-topic" id="contact-topic" class="m-select" required>
                                    <option value="1">Question</option>
                                    <option value="2">Sugestion</option>
                                    <option value="3">Complain</option>
                                    <option value="4">Others</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <input type="text" placeholder="FULL NAME" value="" name="contact-name" id="contact-name" required pattern="[A-Za-z\s]+"/>
                            <input type="text" placeholder="EMAIL ADDRESS" value="" name="contact-email" id="contact-email" required pattern="[^ @]*@[^ @]*"/>
                            <input type="text" placeholder="TITTLE" value="" name="contact-ttl" id="contact-ttl"/>
                            <textarea id="contact-msg" name="contact-msg" placeholder=" question/SUGGESTIONS/COMPLAIN" required></textarea>
                            <button type="submit" class="btn m-btn">SEND<span class="fa fa-angle-right"></span></button>                            
                        </form>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="b-contacts__address">
                        <div class="b-contacts__address-hours">
                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">opening hours</h2>
                            <div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <h5>Sales Department</h5>
                                        <p>Mon-Sat : 8:00am - 5:00pm <br />Sunday is closed</p>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <h5>Service Department</h5>
                                        <p>Mon-Sat : 8:00am - 5:00pm </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include 'features.php';?>
    <?php include 'footer.php';?>

    <!--Main-->
    <script src="js/jquery-latest.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

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
