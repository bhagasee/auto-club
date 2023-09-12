<?php
include('connection.php');
session_start();

if (!isset($_SESSION['name'])){
    $_SESSION['history'] = "..\checkout.php";
    header("Location: login.php");
}

$carId = $_SESSION['checkout'];
$query = "SELECT * FROM cars WHERE car_id = '$carId'";
$result = mysqli_query($conn, $query);
$car = mysqli_fetch_array($result);
# Main data

$query2 = "SELECT car_id,  car_year, car_maker, car_model, car_kilomatres, car_date, car_thumbnail FROM cars ORDER BY car_id DESC LIMIT 3";
$footers= mysqli_query($conn, $query2);
# Latest update

if(isset($_POST['btnPay'])){
    $userId = $_SESSION['userId'];
    $carPrice = $car['car_price'] . " " . $car['car_pricetext'];
    $query3 = "INSERT INTO shopping (shop_car, shop_cus,shop_status, shop_payment) VALUES ('$carId', '$userId','Waiting', '$carPrice')";
    if (mysqli_query($conn, $query3) == FALSE){
        $statusInput = "Failed";
    } else {
        header("Location: checkout2.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Auto Club</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    
    <link href="css/checkout/style.css" rel="stylesheet">
    <link href="css/checkout/style.min.css" rel="stylesheet"> 
    
    <link rel="stylesheet" type="text/css" href="checkout/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="checkout/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="checkout/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="checkout/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="checkout/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="checkout/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="checkout/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="checkout/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="checkout/js/plugin/nice_select/nice-select.css">
    <link rel="stylesheet" type="text/css" href="checkout/css/style.min.css">
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

<body class="m-listings" data-scrolling-animations="true">

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
            <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Check Out</h1>
        </div>
    </section>

    <div class="b-infoBar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="b-infoBar__progress wow zoomInUp" data-wow-delay="0.3s">
                        <div class="b-infoBar__progress-line clearfix">
                            <div class="b-infoBar__progress-line-step m-active">
                                <div class="b-infoBar__progress-line-step-circle">
                                    <div class="b-infoBar__progress-line-step-circle-inner m-active"></div>
                                </div>
                            </div>
                            <div class="b-infoBar__progress-line-step m-active">
                                <div class="b-infoBar__progress-line-step-circle">
                                    <div class="b-infoBar__progress-line-step-circle-inner"></div>
                                </div>
                            </div>
                            <div class="b-infoBar__progress-line-step m-active">
                                <div class="b-infoBar__progress-line-step-circle">
                                    <div class="b-infoBar__progress-line-step-circle-inner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--b-infoBar-->

    <div class="b-submit">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                    <aside class="b-submit__aside">
                        <div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Step 1</h3>
                            <div class="b-submit__aside-step-inner m-active clearfix">
                                <div class="b-submit__aside-step-inner-icon">
                                    <span class="fa fa-car"></span>
                                </div>
                                <div class="b-submit__aside-step-inner-info">
                                    <h4>Shopping</h4>
                                    <p>Select your vehicle </p>
                                    <div class="b-submit__aside-step-inner-info-triangle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Step 2</h3>
                            <div class="b-submit__aside-step-inner m-active clearfix">
                                <div class="b-submit__aside-step-inner-icon">
                                    <span class="fa fa-list-ul"></span>
                                </div>
                                <div class="b-submit__aside-step-inner-info">
                                    <h4>Payment</h4>
                                    <p>Choose payment method</p>
                                    <div class="b-submit__aside-step-inner-info-triangle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Step 3</h3>
                            <div class="b-submit__aside-step-inner m-active clearfix">
                                <div class="b-submit__aside-step-inner-icon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="b-submit__aside-step-inner-info">
                                    <h4>Finnish</h4>
                                    <p>Order placed</p>
                                    <div class="b-submit__aside-step-inner-info-triangle"></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
                    <div class="b-submit__main">
                        <form method="post" class='s-submit'>
                            <div class="b-submit__main-plan wow zoomInUp" data-wow-delay="0.3s">
                                <header class="s-headerSubmit s-lineDownLeft">
                                    <h2>Your cart</h2>
                                </header>
                                    <!-- <img src="<?php echo $car['car_thumbnail']; ?>" style="width:255px;height:210px;"class="img-responsive pull-right" /> -->
                                <div class="b-submit__main-contacts-price">
                                    <div class="b-submit__main-contacts-price-plan"><?php 
                                        echo $car['car_maker']; 
                                        echo ' ';
                                        echo $car['car_model'];
                                        echo ' ';
                                        echo $car['car_year'];
                                        ?><a href="#">Rp <?php 
                                            echo $car['car_price'];
                                            echo ' '; 
                                            echo $car['car_pricetext']; ?></a></div>
                                </div>
                            </div>
                            <button type="submit" name="btnPay" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Continue<span class="fa fa-angle-right"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--b-submit-->
    

    <?php include 'features.php';?>

    <?php include 'footer.php';?>
    <!--b-footer-->
    
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


    <script type="text/javascript" src="checkout/js/jquery.min.js"></script>
    <script type="text/javascript" src="checkout/js/popper.js"></script>
    <script type="text/javascript" src="checkout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="checkout/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="checkout/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="checkout/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="checkout/js/step.js"></script>
    <script type="text/javascript" src="checkout/js/plugin/nice_select/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="checkout/js/custom.min.js"></script>
</body>

</html>
