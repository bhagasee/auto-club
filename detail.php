<?php
include('connection.php');
session_start();

if (isset($_GET['id']) ){        
    $id = $_GET['id'];
}
else{
    header("Location: 404.php");
    exit();
}
$_SESSION['history'] = "../detail.php?id=$id";


$query = "SELECT * FROM cars WHERE car_id = $id";
$result= mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $car = mysqli_fetch_array($result);
    $carId = $car['car_id'];
    $carBody = $car['car_bodytype'];
    $carMaker = $car['car_maker'];
    $query3 = "SELECT * FROM pictures WHERE pic_car = $carId";
    $pictures= mysqli_query($conn, $query3);

    $query4 = "SELECT * FROM timeSchedule WHERE tmsch_status = 'Available'";
    $timeSchedules= mysqli_query($conn, $query4);

    $query5 = "SELECT * FROM cars WHERE car_bodytype = '$carBody' LIMIT 4";
    $related= mysqli_query($conn, $query5);      
    if (mysqli_num_rows($related) < 4) {
        $query5 = "SELECT * FROM cars WHERE car_maker = '$carMaker' LIMIT 4";
        $related= mysqli_query($conn, $query5);  
    if (mysqli_num_rows($related) < 4) {
        $query5 = "SELECT * FROM cars WHERE car_id != '$carId' LIMIT 4";
        $related= mysqli_query($conn, $query5);  
    }
    }

    $price = intval($car['car_price']);
    switch ($car['car_pricetext']){
        case "Million": $price = $price * 1000000; break;
        case "Billion": $price = $price * 1000000000; break;
    } 

    if(isset($_POST['btnCal'])){
        $calInput = intval($_POST['cal-input']);
        $calMonth = intval($_POST['cal-month']);
        $calResult = ($price-$calInput)/$calMonth;
    } else {
        $calResult = $price/12;
    }
    $query2 = "SELECT car_id,  car_year, car_maker, car_model, car_kilomatres, car_date, car_thumbnail FROM cars ORDER BY car_id DESC LIMIT 3";
    $footers= mysqli_query($conn, $query2);
    # Latest update


}
else {
    header("Location: 404.php");
    exit();
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

    <style type="text/css">
            .button-77 {
      align-items: center;
      appearance: none;
      background-clip: padding-box;
      background-color: initial;
      background-image: none;
      border-style: none;
      box-sizing: border-box;
      color: #fff;
      cursor: pointer;
      display: inline-block;
      flex-direction: row;
      flex-shrink: 0;
      font-family: Eina01,sans-serif;
      font-size: 16px;
      font-weight: 800;
      justify-content: center;
      line-height: 24px;
      margin: 0;
      min-height: 64px;
      outline: none;
      overflow: visible;
      padding: 19px 26px;
      pointer-events: auto;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      vertical-align: middle;
      width: auto;
      word-break: keep-all;
      z-index: 0;
    }

    @media (min-width: 768px) {
      .button-77 {
        padding: 19px 32px;
      }
    }

    .button-77:before,
    .button-77:after {
      border-radius: 80px;
    }

    .button-77:before {
      background-color: rgba(249, 58, 19, .32);
      content: "";
      display: block;
      height: 100%;
      left: 0;
      overflow: hidden;
      position: absolute;
      top: 0;
      width: 100%;
      z-index: -2;
    }

    .button-77:after {
      background-color: initial;
      background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
      bottom: 4px;
      content: "";
      display: block;
      left: 4px;
      overflow: hidden;
      position: absolute;
      right: 4px;
      top: 4px;
      transition: all 100ms ease-out;
      z-index: -1;
    }

    .button-77:hover:not(:disabled):after {
      bottom: 0;
      left: 0;
      right: 0;
      top: 0;
      transition-timing-function: ease-in;
    }

    .button-77:active:not(:disabled) {
      color: #ccc;
    }

    .button-77:active:not(:disabled):after {
      background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
      bottom: 4px;
      left: 4px;
      right: 4px;
      top: 4px;
    }

    .button-77:disabled {
      cursor: default;
      opacity: .24;
    }
    </style>

    <!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body class="m-detail" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

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
    <!--b-nav-->

    <section class="b-pageHeader">
        <div class="container">
            <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Vehicle Details Page</h1>
        </div>
    </section>
    <!--b-pageHeader-->

    <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
        <div class="container">
            <a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listings.php" class="b-breadCumbs__page">Luxury Cars</a><span class="fa fa-angle-right"></span><a href="listings.php?maker=<?php echo $car['car_maker'];?>" class="b-breadCumbs__page"><?php echo $car['car_maker'];?></a><span class="fa fa-angle-right"></span><a href="detail.html" class="b-breadCumbs__page m-active"><?php echo $car['car_maker']; echo ' '; echo  $car['car_model'];?> </a>
        </div>
    </div>
    <!--b-breadCumbs-->

    <div class="b-infoBar">
        <div class="container">
            <div class="row wow zoomInUp" data-wow-delay="0.5s">
                <div class="col-xs-3">
                    <div class="b-infoBar__premium">Premium Listing</div>
                </div>
                <div class="col-xs-9">
                    <div class="b-infoBar__btns">
                        <a href="#" class="btn m-btn m-infoBtn">SHARE THIS VEHICLE<span class="fa fa-angle-right"></span></a>
                        <a href="#" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
                        <a href="#" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>
                        <a href="#" class="btn m-btn m-infoBtn">DOWNLOAD MANUAL<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--b-infoBar-->

    <section class="b-detail s-shadow">
        <div class="container">
            <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-sm-9 col-xs-12">
                        <div class="b-detail__head-title">
                            <h1><?php 
                                echo $car['car_maker']; 
                                echo ' ';
                                echo $car['car_model'];
                                echo ' ';
                                echo $car['car_year'];
                                ?>                </h1>
                            <h3>Fully Redesigned Upscale Midsize Car</h3>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="b-detail__head-price">
                            <div class="b-detail__head-price-num">Rp <?php 
                                echo $car['car_price'];
                                echo ' '; 
                                echo $car['car_pricetext']; ?></div>
                            <p>Included Taxes &amp; Checkup</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="b-detail__main">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="b-detail__main-info">
                            <div class="b-detail__main-info-images" data-wow-delay="0.5s">
                                <section class="gallery">
                                  <div class="gallery__item">
                                    <img src="<?php echo $car['car_thumbnail'] ?>" style="width: 500px;" alt=""/>
                                  </div>
                                </section>                        
                            </div>
                            <div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-car"></span></div>
                                        <p><?php echo $car['car_status'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Status
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-trophy"></span></div>
                                        <p><?php echo $car['car_kilomatres'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Kilomatres
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-at"></span></div>
                                        <p><?php echo $car['car_transmission'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Transmission
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-car"></span></div>
                                        <p><?php echo $car['car_drivetrain'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Drivetrain
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-user"></span></div>
                                        <p><?php echo $car['car_passangers'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Passangers
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-car"></span></div>
                                        <p><?php echo $car['car_bodytype'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        <?php echo $car['car_bodytype'] ?>
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-fire-extinguisher"></span></div>
                                        <p><?php echo $car['car_fuel'] ?></p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Fuel
                                    </div>
                                </div>
                            </div>
                            <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-aside-about-form-links">
                                    <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>DESCRIPTION</a>
                                    <a href="#" class="j-tab" data-to='#info2'>MINUS</a>
                                </div>
                                <div id="info1">
                                    <?php if ($car['car_description']== ''){ ?>
                                        <p>Description is not available</p>
                                    <?php } else { ?>
                                    <p><?php echo $car['car_description'] ?></p>
                                    <?php } ?>
                                </div>
                                <div id="info2">
                                    <?php if ($car['car_minus']== ''){ ?>
                                        <p>Description is not available</p>
                                    <?php } else { ?>
                                    <p><?php echo $car['car_minus'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">EXTRA FEATURES</h2>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span>Security System</li>
                                            <li><span class="fa fa-check"></span>Air Conditioning</li>
                                            <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                            <li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
                                            <li><span class="fa fa-check"></span>Anti-Theft</li>
                                            <li><span class="fa fa-check"></span>Anti-Starter</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span>Dual Airbag</li>
                                            <li><span class="fa fa-check"></span>Intermittent Wipers</li>
                                            <li><span class="fa fa-check"></span>Keyless Entry</li>
                                            <li><span class="fa fa-check"></span>Power Mirrors</li>
                                            <li><span class="fa fa-check"></span>Power Seat</li>
                                            <li><span class="fa fa-check"></span>Power Steering</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span>CD Player</li>
                                            <li><span class="fa fa-check"></span>Driver Side Airbag</li>
                                            <li><span class="fa fa-check"></span>Power Windows</li>
                                            <li><span class="fa fa-check"></span>Remote Start</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <aside class="b-detail__main-aside">
                            <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Description</h2>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Maker</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_maker']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Model</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_model']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Kilometres</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_kilomatres']; ?> km</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Body Type</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_bodytype']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Engine</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_engine']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Drivetrain</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_drivetrain']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Transmission</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_transmission']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Exterior Color</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_exteriorcolor']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Interior color</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_interiorcolor']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Passangers</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_passangers']; ?> Passangers</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Fuel Type</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value"><?php echo $car['car_fuel']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                <div style="padding-left: 100px;">
                                    <form action="checkout1.php" method="POST">
                                        <?php $_SESSION['checkout'] = $car['car_id']; ?>
                                        <div><button type="submit"class="button-77" role="button"> CHECK OUT </button></div>
                                    </form>
                                </div>
                                <h2 class="s-titleDet">HAVE A QUESTION?</h2>
                                <div class="b-detail__main-aside-about-call">
                                    <span class="fa fa-phone"></span>
                                    <div> 021-8010-281</div>
                                    <p>Call the seller and they would help you.</p>
                                </div>
                                <div class="b-detail__main-aside-about-form">
                                    <div class="b-detail__main-aside-about-form-links">
                                        <h4>SCHEDULE TEST DRIVE</h4>
                                    </div>
                                    <form id="form1" action="backend\schedule.php?id=<?php echo $id ?>" method="post">
                                        <?php if (isset($_SESSION['name'])) {?>
                                        <input type="text" placeholder="<?php echo $_SESSION['name']; ?>" value="<?php echo $_SESSION['name']; ?>" required name="book_name" />
                                        <input type="email" placeholder="<?php echo $_SESSION['email']; ?>" value="<?php echo $_SESSION['email']; ?>"  required name="book_email" />
                                            <?php if (isset($_SESSION['phone'])) { ?>
                                            <input type="tel" placeholder="<?php echo $_SESSION['phone']; ?>" value="<?php echo $_SESSION['phone']; ?>" required name="book_phone" />
                                            <?php } else { ?>
                                            <input type="tel" placeholder="PLEASE PROVIDE YOU'R PHONE NUMBER" value="" name="book_phone" />
                                        <input type="hidden" placeholder="<?php echo $car['car_maker']; echo $car['car_year']; ?>" value="<?php echo $car['car_id']; ?>" required name="book-car" /> 
                                            <?php }?>
                                        <?php } else { ?>
                                        <input type="text" placeholder="YOUR NAME" value="" name="book-name" required pattern="[A-Za-z]+"  />
                                        <input type="email" placeholder="EMAIL ADDRESS" value="" name="book-email"  required pattern="[^ @]*@[^ @]*" />
                                        <input type="tel" placeholder="PHONE NUMBER" value="" name="book-phone" required pattern="[0-9]+" /> <!-- required  -->
                                        <input type="hidden" placeholder="<?php echo $car['car_maker']; echo $car['car_year']; ?>" value="<?php echo $car['car_id']; ?>" required name="book-car" /> 
                                        <?php } ?>
                                        <div class="s-relative">
                                            <select name="book-time" class="m-select">
                                                <option value="-" selected="" name="book-time">BOOK A SCHEDULE</option>
                                                <?php while($timeSch = mysqli_fetch_assoc($timeSchedules)) { ?>
                                                <option value="<?php echo $timeSch['tmsch_id'];?>"><?php echo $timeSch['tmsch_time']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                        <button type="submit" class="btn m-btn" name="book-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">CAR PAYMENT CALCULTOR</h2>
                                <div class="b-detail__main-aside-payment-form">
                                    <form method="post">
                                        <?php if (isset($calInput)) { ?>
                                        <input type="text" placeholder="UP FRONT" value="<?php echo $calInput; ?>" name="cal-input" pattern="[0-9]+"/>
                                        <?php } else { ?>
                                        <input type="text" placeholder="UP FRONT" value="0" name="cal-input" pattern="[0-9]+"/>
                                        <?php } ?>
                                        <div class="s-relative">
                                            <?php if (isset($calMonth)) { ?>
                                            <select name="cal-month" class="m-select">
                                                <option value="">LOAN TERM IN MONTHS</option>
                                                <option <?php if ($calMonth == 3) { ?> selected <?php } ?> value="3">3 Months</option>
                                                <option <?php if ($calMonth == 6) { ?> selected <?php } ?> value="6">6 Months</option>
                                                <option <?php if ($calMonth == 12) { ?> selected <?php } ?> value="12">12 Months</option>
                                                <option <?php if ($calMonth == 15) { ?> selected <?php } ?> value="15">15 Months</option>
                                                <option <?php if ($calMonth == 18) { ?> selected <?php } ?> value="18">18 Months</option>
                                            </select> 
                                            <?php } else { ?>
                                            <select name="cal-month" class="m-select">
                                                <option value="">LOAN TERM IN MONTHS</option>
                                                <option selected value="3">3 Months</option>
                                                <option value="6">6 Months</option>
                                                <option value="12">12 Months</option>
                                                <option value="15">15 Months</option>
                                                <option value="18">18 Months</option>
                                            </select>
                                            <?php } ?>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                        <button type="submit" name="btnCal" class="btn m-btn">ESTIMATE PAYMENT<span class="fa fa-angle-right"></span></button>
                                    </form>
                                </div>
                                <div class="b-detail__main-aside-about-call">
                                    <span class="fa fa-calculator"></span>
                                    <div>RP <?php echo number_format($calResult); ?><p> /MONTH</p>
                                    </div>
                                    <?php if (isset($calMonth)) { ?>
                                    <p>Total Number of Payments: <span><?php echo $calMonth;?></span></p>
                                    <?php } else { ?>
                                    <p>Total Number of Payments: <span>3</span></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-detail-->

    <section class="b-related m-home">
        <div class="container">
            <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED VEHICLES ON SALE</h2>
            <div class="row">
                <?php
                while($cars = mysqli_fetch_assoc($related)) { ?>
                <div class="col-md-3 col-xs-6">
                    <div class="b-auto__main-item wow zoomInRight" data-wow-delay="0.5s">
                        <img class="img-responsive center-block" src="<?php echo $cars['car_thumbnail']; ?>"style="width:270px;height:240px;" alt="<?php echo $cars['car_maker']; echo ' '; echo $cars['car_model']; echo ' '; echo $cars['car_year']; ?> " />
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                        </div>
                        <h2><a href="detail.php?id=<?php echo $cars['car_id']; ?>">
                                        <?php 
                                        echo $cars['car_maker']; 
                                        echo ' ';
                                        echo $cars['car_model'];
                                        echo ' ';
                                        echo $cars['car_year'];
                                        ?>   </a></h2>
                        <div class="b-auto__main-item-info s-lineDownLeft">
                            <span class="m-price">
                                Rp <?php 
                                echo $cars['car_price'];
                                echo ' '; 
                                echo $cars['car_pricetext']; ?>
                            </span>
                            <span class="m-number">
                            <?php if ($cars['car_kilomatres'] != '0') { ?>
                                <span class="fa fa-tachometer"></span><?php echo $cars['car_kilomatres']; ?> KM
                            <?php } ?>
                            </span>
                        </div>
                        <div class="b-featured__item-links m-auto">
                            <a href="#">Registered <?php echo $cars['car_year']; ?></a>
                            <a href="#"><?php echo $cars['car_drivetrain']; ?></a>
                            <a href="#"><?php echo $cars['car_passangers']; ?> Passangers</a>
                            <a href="#"><?php echo $cars['car_fuel']; ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!--"b-related-->

    <section class="b-brands s-shadow">
        <div class="container">
            <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">BRANDS WE OFFER</h2>
            <div class="">
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/bmwLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/ferrariLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/volvo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/mercLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/audiLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/honda.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/peugeot.png" alt="brand" />
                </div>
            </div>
        </div>
    </section>
    <!--b-brands-->    

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
