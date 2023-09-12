<?php
include('connection.php');
session_start();
$_SESSION['history'] = "../compare.php";

if (isset($_GET['id1']) && isset($_GET['id2'])){        
    $id1 = $_GET['id1'];
    $id2 = $_GET['id2'];
}
else{
    header("Location: 404.php");
    exit();
}

$query = "SELECT * FROM cars WHERE car_id = $id1";
$car1 = mysqli_query($conn, $query);

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

<body class="m-compare" data-scrolling-animations="true">

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

    <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="b-topBar__addr">
                        <span class="fa fa-map-marker"></span>
                        202 W 7TH ST, LOS ANGELES, CA 90014
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="b-topBar__tel">
                        <span class="fa fa-phone"></span>
                        1-800- 624-5462
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <nav class="b-topBar__nav">
                        <ul>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Sign in</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="b-topBar__lang">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Language</a>
                            <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN<span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu h-lang">
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-es"></span>ES</a></li>
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-de"></span>DE</a></li>
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-fr"></span>FR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--b-topBar-->

    <nav class="b-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-4">
                    <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                        <h3><a href="home.html">Auto<span>Club</span></a></h3>
                        <h2><a href="home.html">AUTO DEALER TEMPLATE</a></h2>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-8">
                    <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                            <ul class="navbar-nav-menu">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle='dropdown' href="home.html">Home <span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-nav">
                                        <li><a href="home.html">Home Page 1</a></li>
                                        <li><a href="home-2.html">Home Page 2</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle='dropdown' href="#">Grid <span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-nav">
                                        <li><a href="listings.html">listing 1</a></li>
                                        <li><a href="listingsTwo.html">listing 2</a></li>
                                        <li><a href="listTable.html">listing 3</a></li>
                                        <li><a href="listTableTwo.html">listing 4</a></li>
                                    </ul>
                                </li>
                                <li><a href="compare.html">compare</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="article.html">Services</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle='dropdown' href="#">Blog <span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-nav">
                                        <li><a href="blog.html">Blog 1</a></li>
                                        <li><a href="blogTwo.html">Blog 2</a></li>
                                        <li><a href="404.html">Page 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="submit1.html">Shop</a></li>
                                <li><a href="contacts.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--b-nav-->

    <section class="b-pageHeader">
        <div class="container">
            <h1 class=" wow zoomInLeft" data-wow-delay="0.3s">Auto Listings</h1>
            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
                <h3>Compare Favourite Cars</h3>
            </div>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container wow zoomInUp" data-wow-delay="0.3s">
            <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="compare.html" class="b-breadCumbs__page m-active">Compare Vehicles</a>
        </div>
    </div>
    <!--b-breadCumbs-->

    <div class="b-infoBar">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12 wow zoomInUp" data-wow-delay="0.3s">
                    <h5>QUESTIONS? CALL US : <span>1-800- 624-5462</span></h5>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="b-infoBar__btns wow zoomInUp" data-wow-delay="0.3s">
                        <a href="#" class="btn m-btn m-infoBtn">SHARE THIS COMPARISON<span class="fa fa-angle-right"></span></a>
                        <a href="#" class="btn m-btn m-infoBtn">ADD A VEHICLE<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--b-infoBar-->

    <section class="b-compare s-shadow">
        <div class="container">
            <div class="b-compare__images">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-3">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Jaguar XJ 2015</h3>
                            <img class="img-responsive center-block" src="media/270x180/jaguarComp.jpg" alt="jaguar" />
                            <div class="b-compare__images-item-price m-right">
                                <div class="b-compare__images-item-price-vs">vs</div>$90,600
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Mercedes E-Class 2015</h3>
                            <img class="img-responsive center-block" src="media/270x180/mercComp.jpg" alt="merc" />
                            <div class="b-compare__images-item-price m-right m-left">
                                <div class="b-compare__images-item-price-vs">vs</div>$52,650
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
                            <h3>Lexus LS 2015</h3>
                            <img class="img-responsive center-block" src="media/270x180/lexusComp.jpg" alt="lexus" />
                            <div class="b-compare__images-item-price m-left">$120,440</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
                <div class="b-compare__block-title s-whiteShadow">
                    <h3 class="s-titleDet">BASIC INFO</h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Make / Year
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Jaugar 2015
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Mercedez-Benz 2015
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Lexus 2015
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Front Head Room
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                39.5 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                38.0 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                37.9 in
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Width / Height / Length
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                74.8 in / 57.3 in / 201.9 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                73.0 in / 57.0 in / 192.5 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                56.4 in / 73.8 in / 205.0 in
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Wheel Base
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                119.0 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                113.5 in
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                121.6 in
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Cargo capacity, all seats in place
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                15.2 cu.ft.
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                12.9 cu.ft.
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                13.0 cu.ft.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
                <div class="b-compare__block-title s-whiteShadow">
                    <h3 class="s-titleDet">MECHANICAL FEATURES</h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Base Engine / Cylinders
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                5.0 L / V8
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                201 L / Inline 4
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                5.0 L / V8
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Fuel Capacity / Type
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                21.7 gal. / Flex-fuel
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                21.1 gal. / Diesel fuel
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                22.2 gal / Premium
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Fuel Economy (city / hwy)
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                15 / 23 mpg
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                28 / 42 mpg
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                19 / 23 mpg
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Horsepower
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                470 hp @ 6000 rpm
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                195 hp @ 3800 rpm
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                438 hp @ 6400 rpm
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Transmission
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                8-speed shiftable automatic
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                7-speed shiftable automatic
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Variable-speed automatic
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
                <div class="b-compare__block-title s-whiteShadow">
                    <h3 class="s-titleDet">WARRANTY FEATURES</h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Fuel Economy (city / hwy)
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                15 / 23 mpg
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                28 / 42 mpg
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                19 / 23 mpg
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Horsepower
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                470 hp @ 6000 rpm
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                195 hp @ 3800 rpm
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                438 hp @ 6400 rpm
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Transmission
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                8-speed shiftable automatic
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                7-speed shiftable automatic
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Variable-speed automatic
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
                <div class="b-compare__block-title s-whiteShadow">
                    <h3 class="s-titleDet">EXTERIOR / INTERIOR FEATURES</h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                All Season Tires
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Optional
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Power Glass Sunroof
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Tire Size
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                275/35R20 102Y tires
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                245/45R17 tires
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                245/45R V tires
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Wheels
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Painted alloy wheels
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Alloy wheels
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Painted alloy wheels
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                A/C With Climate Control
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Built-in Hard Drive
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Optional
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                N / A
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                HD Radio
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Heated / Cooled Seats
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Optional
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value">
                                Standard
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
                <div class="b-compare__block-title s-whiteShadow">
                    <h3 class="s-titleDet">OTHER OPTIONS</h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-title">
                                Misc. Options
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value s-lineDownCenter">
                                <ul>
                                    <li><span class="fa fa-check"></span>Security System</li>
                                    <li><span class="fa fa-check"></span>Air Conditioning</li>
                                    <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                    <li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
                                    <li><span class="fa fa-check"></span>Anti-Theft</li>
                                    <li><span class="fa fa-check"></span>Anti-Starter</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value s-lineDownCenter">
                                <ul>
                                    <li><span class="fa fa-check"></span>Security System</li>
                                    <li><span class="fa fa-check"></span>Air Conditioning</li>
                                    <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                    <li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
                                    <li><span class="fa fa-check"></span>Anti-Theft</li>
                                    <li><span class="fa fa-check"></span>Anti-Starter</li>
                                    <li><span class="fa fa-check"></span>CD Player</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="b-compare__block-inside-value s-lineDownCenter">
                                <ul>
                                    <li><span class="fa fa-check"></span>Security System</li>
                                    <li><span class="fa fa-check"></span>Air Conditioning</li>
                                    <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                    <li><span class="fa fa-check"></span>CD Player</li>
                                    <li><span class="fa fa-check"></span>Driver Side Airbag</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-compare__links wow zoomInUp" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-sm-3 col-xs-12 col-sm-offset-3">
                        <a href="detail.html" class="btn m-btn">VIEW LISTINGS<span class="fa fa-angle-right"></span></a>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <a href="detail.html" class="btn m-btn">VIEW LISTINGS<span class="fa fa-angle-right"></span></a>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <a href="detail.html" class="btn m-btn">VIEW LISTINGS<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-compare-->

    <div class="b-features">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
                    <ul class="b-features__items">
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--b-features-->

    <div class="b-info">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                        <article class="b-info__aside-article">
                            <h3>OPENING HOURS</h3>
                            <div class="b-info__aside-article-item">
                                <h6>Sales Department</h6>
                                <p>Mon-Sat : 8:00am - 5:00pm<br />
                                    Sunday is closed</p>
                            </div>
                            <div class="b-info__aside-article-item">
                                <h6>Service Department</h6>
                                <p>Mon-Sat : 8:00am - 5:00pm<br />
                                    Sunday is closed</p>
                            </div>
                        </article>
                        <article class="b-info__aside-article">
                            <h3>About us</h3>
                            <p>Vestibulum varius od lio eget conseq
                                uat blandit, lorem auglue comm lodo
                                nisl non ultricies lectus nibh mas lsa
                                Duis scelerisque aliquet. Ante donec
                                libero pede porttitor dacu msan esct
                                venenatis quis.</p>
                        </article>
                        <a href="about.html" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
                    </aside>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="b-info__latest">
                        <h3>LATEST AUTOS</h3>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-audi"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="detail.html">MERCEDES-AMG GT S</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-audiSpyder"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="#">AUDI R8 SPYDER V-8</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-aston"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="#">ASTON MARTIN VANTAGE</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="b-info__twitter">
                        <h3>from twitter</h3>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                        <p>contact us</p>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-map-marker"></span>
                            <em>202 W 7th St, Suite 233 Los Angeles,
                                California 90014 USA</em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-phone"></span>
                            <em>Phone: 1-800- 624-5462</em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-fax"></span>
                            <em>FAX: 1-800- 624-5462</em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-envelope"></span>
                            <em>Email: info@domain.com</em>
                        </div>
                    </address>
                    <address class="b-info__map">
                        <a href="contacts.html">Open Location Map</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <!--b-info-->

    <footer class="b-footer">
        <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="b-nav__logo">
                            <h3><a href="home.html">Auto<span>Club</span></a></h3>
                        </div>
                        <p>&copy; 2015 Designed by Templines &amp; Powered by WordPress.</p>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                        <div class="b-footer__content-social">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-google-plus-square"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-youtube-square"></span></a>
                            <a href="#"><span class="fa fa-skype"></span></a>
                        </div>
                        <nav class="b-footer__content-nav">
                            <ul>
                                <li><a href="home.html">Home</a></li>
                                <li><a href="404.html">Pages</a></li>
                                <li><a href="listings.html">Inventory</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="404.html">Services</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="listTable.html">Shop</a></li>
                                <li><a href="contacts.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
</body>

</html>
