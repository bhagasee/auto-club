<?php
include('connection.php');
session_start();
$_SESSION['history'] = "../listings.php";

if(isset($_POST['item']) || isset($_POST['body']) || isset($_POST['maker'])){
    $word = "WHERE";
    $query = "SELECT * FROM cars ";
    if (isset($_POST['maker'])){
        $maker = $_POST['maker'];
        if ($maker != 'All'){
            if(strpos($query, $word) !== false){   
                $query .= " AND car_maker = '$maker'";
            } else{
                $query .= " WHERE car_maker = '$maker'";
            }
        }
    }
    if (isset($_POST['body'])){
        $body = $_POST['body'];
        if ($body != 'All'){
            if(strpos($query, $word) !== false){            
                $query .= " AND car_bodytype = '$body'";
            } else{
                $query .= " WHERE car_bodytype = '$body'";
            }    
        }
        
    }
    if (isset($_POST['status'])){
        $status = $_POST['status'];
        if ($status != 'All'){
            if(strpos($query, $word) !== false){            
                $query .= " AND car_status = '$status'";
            } else{
                $query .= " WHERE car_status = '$status'";
            }    
        }
        
    }
    if (isset($_POST['fuel'])){
        $fuel = $_POST['fuel'];
        if ($fuel != 'All'){
            if(strpos($query, $word) !== false){            
                $query .= " AND car_fuel = '$fuel'";
            } else{
                $query .= " WHERE car_fuel = '$fuel'";
            }    
        }
        
    }
    if(isset($_POST['item'])){
        $limit = $_POST['item'];
        $query .= " LIMIT '$limit'";
    }
} else {
    $query = "SELECT * FROM cars WHERE car_status_shop = 'AVAILABLE' LIMIT 5";
    # Main data
}
$result = mysqli_query($conn, $query);

$queryA = "SELECT DISTINCT car_maker FROM cars ORDER BY car_maker";
$filterMaker= mysqli_query($conn, $queryA);
$queryB = "SELECT DISTINCT car_bodytype FROM cars ";
$filterBody= mysqli_query($conn, $queryB);

$query2 = "SELECT car_id,  car_year, car_maker, car_model, car_kilomatres, car_date, car_thumbnail FROM cars WHERE car_status_shop = 'AVAILABLE'  ORDER BY car_id DESC LIMIT 3";
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

    <section class="b-modal">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Video</h4>
                    </div>
                    <div class="modal-body">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/a_ugz7GoHwY" allowfullscreen></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-modal-->

    <?php include 'navbar.php';?>

    <section class="b-pageHeader">
        <div class="container">
            <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Shop</h1>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow">
        <div class="container wow zoomInUp" data-wow-delay="0.5s">
            <a href="home.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listings.php" class="b-breadCumbs__page m-active">Shop</a>
        </div>
    </div>
    <!--b-breadCumbs-->

    <div class="b-infoBar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                        <a href="compare.php?id1=" class="b-infoBar__compare-item"><span class="fa fa-compress"></span>COMPARE VEHICLES</a>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12">
                    <div class="b-infoBar__select">
                        <form method="post" action="">
                            <div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
                                <span class="b-infoBar__select-one-title">SELECT VIEW</span>
                                <a href="listings.php" class="m-list m-active"><span class="fa fa-list"></span></a>
                                <a href="listTable.php" class="m-table"><span class="fa fa-table"></span></a>
                            </div>
                            <div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
                                <span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
                                <select name="select1" class="m-select">
                                    <option value="5" name="item" selected="">5 items</option>
                                    <option value="10" name="item">10 items</option>
                                    <option value="15" name="item">15 items</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
                                <span class="b-infoBar__select-one-title">SORT BY</span>
                                <select name="select2" class="m-select">
                                    <option value="Last" name="sort" selected="">Last Added</option>
                                    <option value="Newest" name="sort">Newst Added</option>
                                    <option value="Cheaper" name="sort" >Cheaper</option>
                                    <option value="Expensive" name="sort">Expensive</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
                                <span class="b-infoBar__select-one-title"><button type="submit" >Go</button></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--b-infoBar-->

    <section class="b-items s-shadow">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-8 col-xs-12">
                    <div class="b-items__cars">
                        <?php if (mysqli_num_rows($result) > 0) {
                          while($cars = mysqli_fetch_assoc($result)) {
                         ?>
                        <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__cars-one-img">
                                <img src="<?php echo $cars['car_thumbnail']; ?>" alt="amg" style="width:270px;height:240px;"/>
                                <a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
                                <?php if ($cars['car_status'] == 'Brand New'){ ?>
                                    <span class="b-items__cars-one-img-type m-premium">
                                        <?php echo $cars['car_status']; ?>
                                    </span> 
                                <?php } elseif ($cars['car_status'] == 'Second') { ?>
                                    <span class="b-items__cars-one-img-type m-listing">
                                        <?php echo $cars['car_status']; ?>
                                    </span> 
                                <?php } elseif ($cars['car_status'] == 'Rental') { ?>
                                    <span class="b-items__cars-one-img-type m-owner">
                                        <?php echo $cars['car_status']; ?>
                                    </span> 
                                <?php } else { ?>                                    
                                    <span class="b-items__cars-one-img-type m-listing">Not Available</span>
                                <?php } ?>                                
                                
                                <form action="/" method="post">
                                    <input type="checkbox" name="check" id='<?php echo $cars['car_id']; ?>' />
                                    <label for="check6" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                                </form>
                            </div>
                            <div class="b-items__cars-one-info">
                                <header class="b-items__cars-one-info-header s-lineDownLeft">
                                    <h2>
                                        <?php 
                                        echo $cars['car_maker']; 
                                        echo ' ';
                                        echo $cars['car_model'];
                                        echo ' ';
                                        echo $cars['car_year'];
                                        ?>                                        
                                    </h2>
                                    <span>Rp <?php 
                                        echo $cars['car_price'];
                                        echo ' '; 
                                        echo $cars['car_pricetext']; ?></span>
                                </header>
                                <?php if ($cars['car_description'] != '') { ?>
                                    <p> <?php echo $cars['car_description']; ?> </p>
                                <?php } else { ?>
                                    <p> Description is not available.</p>
                                <?php } ?>
                                <div class="b-items__cars-one-info-km">
                                    <span class="fa fa-tachometer"></span><?php echo $cars['car_kilomatres']; ?>  KM
                                </div>
                                <div class="b-items__cars-one-info-details">
                                    <div class="b-featured__item-links">
                                        <a href="#">Registered <?php echo $cars['car_year']; ?></a>
                                        <a href="#"><?php echo $cars['car_drivetrain']; ?></a>
                                        <a href="#"><?php echo $cars['car_passangers']; ?> Passangers</a>
                                        <a href="#"><?php echo $cars['car_fuel']; ?></a>
                                    </div>
                                    <a href="detail.php?id=<?php echo $cars['car_id'];?>" class="btn m-btn">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php } } else { ?>
                        <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__cars-one-img">
                                <img src="media/270x230/mersAmg.jpg" alt="amg" />
                            </div>
                            <div class="b-items__cars-one-info">
                                We're sorry, car 
                            </div>
                        </div>
                        <?php } ?>     
                    </div>
                    <div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s">
                        <div class="b-items__pagination-main">
                            <a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
                            <span class="m-active"><a href="#">1</a></span>
                            <span><a href="#">2</a></span>
                            <span><a href="#">3</a></span>
                            <span><a href="#">4</a></span>
                            <a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-xs-12">
                    <aside class="b-items__aside">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
                        <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
                            <form action="listings.php" method="POST">
                                <div class="b-items__aside-main-body">
                                    <div class="b-items__aside-main-body-item">
                                        <label>SELECT A MAKER</label>
                                        <div>                                            
                                            <select name="maker" class="m-select">
                                            <?php if (isset($_POST['maker']) && $_POST['maker'] !='All' && $_POST['maker'] !=''){ ?>
                                                <option value="<?php echo $_POST['maker']; ?>" selected=""><?php echo $_POST['maker']; ?></option>
                                                <option value="All">All</option>
                                            <?php } else { ?>
                                                <option value="All" selected="">All</option>
                                            <?php }
                                            while($show = mysqli_fetch_array($filterMaker)) {?>
                                                <option value="<?php echo $show['car_maker']; ?>"><?php echo $show['car_maker']; ?></option>
                                            <?php } ?>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>SELECT A BODY TYPE</label>
                                        <div>
                                            <select name="body" class="m-select">
                                            <?php if (isset($_POST['body']) && $_POST['body'] !='All' && $_POST['body'] !=''){ ?>
                                                <option value="<?php echo $_POST['body']; ?>" selected=""><?php echo $_POST['body']; ?></option>
                                                <option value="All">All</option>
                                            <?php } else { ?>
                                                <option value="All" selected="">All</option>
                                            <?php }
                                            while($show = mysqli_fetch_array($filterBody)) {?>
                                                <option value="<?php echo $show['car_bodytype']; ?>"><?php echo $show['car_bodytype']; ?></option>
                                            <?php } ?>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>PRICE RANGE</label>
                                        <div class="slider" data-min-val="100" data-max-val="1000"></div>
                                        <input type="hidden" name="min" value="100" class="j-min" />
                                        <input type="hidden" name="max" value="1000" class="j-max" />
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>VEHICLE STATUS</label>
                                        <div>
                                            <select name="status" class="m-select">
                                            <?php if (isset($_POST['status']) && $_POST['status'] !='All' && $_POST['status'] !=''){ ?>
                                                <option value="<?php echo $_POST['status']; ?>" selected=""><?php echo $_POST['status']; ?></option>
                                                <option value="All">All</option>
                                            <?php } else { ?>
                                                <option value="All" selected="">All</option>
                                            <?php } ?>
                                                <option value="Brand New" >Brand New</option>
                                                <option value="Second" >Second</option>
                                                <option value="Rental" >Rental</option>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                    </div>
                                    <div class="b-items__aside-main-body-item">
                                        <label>FUEL TYPE</label>
                                        <div>
                                            <select name="fuel" class="m-select">
                                            <?php if (isset($_POST['fuel']) && $_POST['fuel'] !='All' && $_POST['fuel'] !=''){ ?>
                                                <option value="<?php echo $_POST['fuel']; ?>" selected=""><?php echo $_POST['fuel']; ?></option>
                                            <?php } else { ?>
                                                <option value="All" selected="">All Fuel Types</option>
                                            <?php } ?>
                                                <option value="Gasoline">Gasoline</option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Electric">Electric</option>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                    </div>
                                </div>
                                <footer class="b-items__aside-main-footer">
                                    <button type="submit" class="btn m-btn">FILTER VEHICLES<span class="fa fa-angle-right"></span></button><br />
                                    <a href="listings.php">RESET ALL FILTERS</a>
                                </footer>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--b-items-->
    

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
