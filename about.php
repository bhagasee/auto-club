<?php
include('connection.php');
session_start();
$_SESSION['history'] = "../about.php";

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

<body class="m-about" data-scrolling-animations="true">

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
    <!--b-nav-->

    <section class="b-pageHeader">
        <div class="container">
            <h1 class="wow zoomInLeft" data-wow-delay="0.7s">About Us</h1>
            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                <h3>The Largest Auto Dealer Online</h3>
            </div>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="about.php" class="b-breadCumbs__page m-active">About Us</a>
        </div>
    </div>
    <!--b-breadCumbs-->

    <section class="b-best">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s">The Best &amp; the Largest Auto Dealer</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s">Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p>
                        <a href="article.html" class="btn m-btn m-readMore wow zoomInUp" data-wow-delay="0.5s">view listings<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="media/about/best.jpg" />
                </div>
            </div>
        </div>
    </section>
    <!--b-best-->

    <section class="b-what s-shadow m-home">
        <div class="container">
            <h3 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">CUSTOMERS ARE IMPORTANT FOR US</h3><br />
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">WHAT WE OFFERS</h2>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInLeft" data-wow-delay="0.5s">
                        <img class="img-responsive" src="media/370x200/wolks.jpg" alt="wolks" />
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">WE OFFER</span>
                        </div>
                        <h2>Low Prices, No Haggling</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
                            sem velde metus imperdiet lacinia.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInUp" data-wow-delay="0.5s">
                        <img class="img-responsive" src="media/370x200/mazda.jpg" alt="mazda" />
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">WE ARE THE</span>
                        </div>
                        <h2>Largest Car Dealership</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
                            sem velde metus imp erdiet lacinia.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInRight" data-wow-delay="0.5s">
                        <img class="img-responsive" src="media/370x200/chevrolet.jpg" alt="chevrolet" />
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">OUR CUSTOMERS GET</span>
                        </div>
                        <h2>Multipoint Safety Check</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
                            sem velde metus imp erdiet lacinia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-what-->

    <section class="b-more">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s">
                        <h2 class="s-title">WHY CHOOSE US</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus etyd nunc. Nunc consequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet sed consectetur adipisicing elit sed do eiusmod.</p>
                        <ul class="s-list">
                            <li><span class="fa fa-check"></span>Donec facilisis velit eu est phasellus consequat quis nostrud</li>
                            <li><span class="fa fa-check"></span>Aenean vitae quam. Vivamus et nunc nunc conseq</li>
                            <li><span class="fa fa-check"></span>Sem vel metus imperdiet lacinia enean </li>
                            <li><span class="fa fa-check"></span>Dapibus aliquam augue fusce eleifend quisque tels</li>
                            <li><span class="fa fa-check"></span>Lorem ipsum dolor sit amet, consectetur </li>
                            <li><span class="fa fa-check"></span>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Magna </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__info wow zoomInRight" data-wow-delay="0.5s">
                        <h2 class="s-title">MORE INFO</h2>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title">Fair Price for Everyone<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title">Large Number of Vehicles<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title">Auto Loan Available<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-more-->
    <section class="b-review">
        <div class="container">
            <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                <div id="carousel-small-rev" class="owl-carousel enable-owl-carousel" data-items="1" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-tablet-small="1">
                    <div class="b-review__main">
                        <div class="b-review__main-person">
                            <div class="b-review__main-person-inside">
                            </div>
                        </div>
                        <h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
                        <p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
                            velde metus imperdiet lacinia. Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
                    </div>
                    <div class="b-review__main">
                        <div class="b-review__main-person">
                            <div class="b-review__main-person-inside">
                            </div>
                        </div>
                        <h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
                        <p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
                            velde metus imperdiet lacinia. Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
                    </div>
                    <div class="b-review__main">
                        <div class="b-review__main-person">
                            <div class="b-review__main-person-inside">
                            </div>
                        </div>
                        <h5><span>DONALD BROOKS</span>, Customer, Ferrari 488 GTB 2 Owner<em>"</em></h5>
                        <p>Donec facilisis velit eust. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequsem
                            velde metus imperdiet lacinia. Nam rutrum congue diam. Vestibulum acda risus eros auctor egestas. Morbids sem magna, viverra quis sollicitudin quis consectetuer quis nec magna.</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="images/backgrounds/reviews.jpg" alt="" class="img-responsive center-block" />
    </section>
    <!--b-review-->

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
</body>

</html>
