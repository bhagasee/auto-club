        <div class="b-info">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                        <article class="b-info__aside-article">
                            <h3>OPENING HOURS</h3>
                            <div class="b-info__aside-article-item">
                                <h6>Test Drive</h6>
                                <p>Mon-Sat : 9:00 - 14:30<br />
                                    Saturday and Sunday is closed</p>
                            </div>
                            <div class="b-info__aside-article-item">
                                <h6>Sales Department</h6>
                                <p>Mon-Sat : 8:00am - 17:00<br />
                                    Sunday is closed</p>
                            </div>
                            <div class="b-info__aside-article-item">
                                <h6>Service Department</h6>
                                <p>Mon-Sat : 8:00am - 17:00<br />
                                    Sunday is closed</p>
                            </div>
                        </article>
                    </aside>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="b-info__latest">
                        <h3>LATEST AUTOS</h3>
                        <?php if (mysqli_num_rows($footers) > 0) {
                          while($latest = mysqli_fetch_assoc($footers)) {
                         ?>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo"> 
                            <img src="<?php echo $latest['car_thumbnail']; ?>" style="width:95px;height:70px;"/></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="detail.php?id= <?php echo $latest['car_id']; ?>">
                                        <?php 
                                        echo $latest['car_maker']; 
                                        echo ' ';
                                        echo $latest['car_model'];
                                        echo ' ';
                                        echo $latest['car_year'];
                                        ?> </a></h6>
                                <p><span class="fa fa-tachometer"></span> <?php echo $latest['car_kilomatres']; ?> KM</p>
                            </div>
                        </div>
                    <?php }} ?>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <div class="b-info__twitter">
                        <h3>About Us</h3>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-content">                                
                            <p>Vestibulum varius od lio eget conseq
                                uat blandit, lorem auglue comm lodo
                                nisl non ultricies lectus nibh mas lsa
                                Duis scelerisque aliquet. Ante donec
                                libero pede porttitor dacu msan esct
                                venenatis quis.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                        <p>contact us</p>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-map-marker"></span>
                            <em>Jl Surapati 163, Bandung, Jawa Barat</em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-phone"></span>
                            <em>Phone: 021-8010-281 </em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-fax"></span>
                            <em>FAX: 021-8010-281 </em>
                        </div>
                        <div class="b-info__contacts-item">
                            <span class="fa fa-envelope"></span>
                            <em>Email: autoclub_car@bussiness.com</em>
                        </div>
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
                        <p>&copy; 2015 Designed by Templines &amp; Powered by 000Webhost.</p>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                        <div class="b-footer__content-social">
                            <a href="404.php"><span class="fa fa-facebook-square"></span></a>
                            <a href="404.php"><span class="fa fa-twitter-square"></span></a>
                            <a href="404.php"><span class="fa fa-google-plus-square"></span></a>
                            <a href="404.php"><span class="fa fa-instagram"></span></a>
                            <a href="404.php"><span class="fa fa-youtube-square"></span></a>
                            <a href="404.php"><span class="fa fa-skype"></span></a>
                        </div>
                        <nav class="b-footer__content-nav">
                            <ul>                                
                                <li><a href="index.php">Home</a></li>
                                <li><a href="listings.php">Shop</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contacts.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--b-footer-->