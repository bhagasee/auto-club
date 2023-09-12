
    <header id="this-is-top" class="b-topBar wow slideInDown" data-wow-delay="0.7s">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="b-topBar__addr">
                        <span class="fa fa-map-marker"></span>
                        Jl Surapati 163, Bandung, Jawa Barat
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="b-topBar__tel">
                        <span class="fa fa-phone"></span>
                        021-8010-281 
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <?php if (isset($_SESSION['name'])) {?>
                    <nav class="b-topBar__nav">
                        <ul>
                            <li><a href="backend\logout.php">Logout</a></li>
                            <li><a href="profile.php"><span class="fa fa-user"></span> Profile</a></li>
                        </ul>
                    </nav>
                    <?php } else { ?>
                    <nav class="b-topBar__nav">
                        <ul>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Sign in</a></li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="b-topBar__lang">
                        <div class="dropdown">
                            <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-us"></span>English (US)<span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu h-lang">
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-us"></span>English (US)</a></li>
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-uk"></span>English (UK)</a></li>
                                <li><a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-id"></span>Indonesia </a></li>
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
                        <h3><a href="index.php">Auto<span>Club</span></a></h3>
                        <h2><a href="index.php">BUY SELL RENT CAR</a></h2>
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="listings.php">Shop</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contacts.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--b-nav-->