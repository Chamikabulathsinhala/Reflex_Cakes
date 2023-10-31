<?php
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Reflex Cakes</title>
    
    
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
    <!-- <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description"> -->
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css.css/style.css" rel="stylesheet">
    <link href="stylecss.css" rel="stylesheet">

   
    
    <link rel="stylesheet" href="semantic.css" />
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="csss/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="csss/animate.css" />
    <link rel="stylesheet" href="csss/etlinefont.css">
    <link href="csss/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css.css/style.scss">

    <link rel="icon" href="img/LOGO.png" />
</head>

<body >
    <div class="container-fluid" style="background-image: url(img/b1.jpg);">
        <div class="row col-12">

            <?php include "header.php"; ?>

            <hr />
            <div class="menu-heading">
            <h3>Reflex Cakes</h3>
            <!-- <div class="specialoffer"><img src="images/specialoffers.png" alt=""></div> -->
            <!-- <p> <a href="home.php">home</a> / checkout </p> -->
        </div>





            

            <div class="col-12 justify-content-center">
                <div class="row mb-3">

                    <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>

                    <div class="col-12 col-lg-6">

                        

                    </div>

                    <!-- <div class="col-12 col-lg-2 d-grid">
                        <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);">Search</button>
                    </div> -->

                    <!-- <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href=".." class="link-secondary text-decoration-none fw-bold">Advanced</a>
                    </div> -->

                </div>
            </div>

            <hr />


             <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5 " >
        <div id="header-carousel" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators " >
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner ">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100 " src="img/caro1.png" style="min-height: 300px; object-fit: cover;"   >
                    <div class=" d-flex align-items-center justify-content-center">

                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/wedcaro.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class=" d-flex align-items-center justify-content-center">

                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/caro3.jpeg" style="min-height: 300px; object-fit: cover;">
                    <div class=" d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


            <div class="col-12" id="basicSearchResult">
                <div class="row">





                    <!-- carousel -->

                    <!-- <div class="col-12 d-none d-lg-block mb-3">
                        <div class="row">

                            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide carousel-fade" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/slider images/posterimg.jpg" class="d-block poster-img-1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption">
                                            <h5 class="poster-title">Welcome to eShop</h5>
                                            <p class="poster-txt">The World's Best Online Store By One Click.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg2.jpg" class="d-block poster-img-1" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slider images/posterimg3.jpg" class="d-block poster-img-1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                                            <h5 class="poster-title">Be Free...</h5>
                                            <p class="poster-txt">Experience the Lowest Delivery Costs With Us.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div> -->

                    <!-- carousel -->

                    <!-- Carousel Start
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-1.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">

                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-2.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">

                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/carousel-3.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="ui link cards">
                <div class="card">
                    <div class="image" onclick="goMenu();">
                        <img src="img/birthday2.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Birthday Cakes</div>

                    </div>

                </div>
                <div class="card">
                    <div class="image" onclick="goMenu();">
                        <img src="img/wed2.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Wedding Cakes</div>

                    </div>

                </div>
                <div class="card">
                    <div class="image" onclick="goMenu();">
                        <img src="img/cup.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Cup Cakes</div>

                    </div>

                </div>
                <div class="card">
                    <div class="image" onclick="goMenu();">
                        <img src="img/geo.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Geo Cakes</div>

                    </div>

                </div>
                <div class="card">
                    <div class="image" onclick="goMenu();">
                        <img src="img/cookies.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Cookies</div>

                    </div>

                </div>
            </div>

    </div>


    <!-- special card section starts  -->

    <section id="special" class="container-fluid">

        <div class="heading text-center">
            <h1>our <span>Bestselling items</span></h1>
            <p>12 sets of cupcakes, Pineapple gateau, Geo hearts, Marble cakes, Cookies.....</p>
        </div>


        <div class="card-container mg-vh-100">

            <div class="card">
                <img src="img/cup12.jpg" alt="">
                <p>You can get 15% off by ordering this.</p>
                <a href="#"><button>read more</button></a>
            </div>

            <div class="card">
                <img src="img/pinef.jpg" alt="">
                <p>You can get 15% off by ordering this.</p>
                <a href="#"><button>read more</button></a>
            </div>

            <div class="card">
                <img src="img/geof.jpg" alt="">
                <p>You can get 15% off by ordering this.</p>
                <a href="#"><button>read more</button></a>
            </div>

        </div>

    </section>

    <!-- special card section ends  -->

    <!-- about section starts  -->

    <section id="about" class="container-fluid" style="background-image:url( img/LOGO.png;)">
     
            <div class="heading text-center">
                <h1><span>about</span> us</h1>
            </div>

            <div class="row min-vh-95 ">

                <div class="col-md-6 text-center text-md-left align-self-center content">
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi recusandae iusto, perferendis earum laboriosam rerum et quisquam iste vel commodi corporis praesentium porro impedit ullam!</p> -->
                    <p>We supply cakes designed specially for you..Make your own customized cake design on your special day.</p>
                    <a href="#"><button>learn more</button></a>
                </div>

                <div class="col-md-6  image">
                    <center><img src="img/LOGO.png" alt=""></center>
                </div>

            </div>
       
    </section>

    <!-- about section ends  -->


    <!-- dish section starts  -->

    <section id="dish" class="container-fluid">

        <div class="heading text-center">
            <h1>our <span></span>Special items for special DAYS..</h1>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="img/ny.jpg" alt="">
                <div class="info">
                    <h3>New Year</h3>
                    <p>We provide special offers and discounts. And eye-pleasing cakes from Us.</p>
                    <a href="#"><button onclick="goMenu();">view</button></a>
                </div>
            </div>

            <div class="box">
                <img src="img/valen.jpg" alt="">
                <div class="info">
                    <h3>Valetine day</h3>
                    <p>We provide special offers and discounts. And eye-pleasing cakes from Us.</p>
                    <a href="#"><button onclick="goMenu();">view</button></a>
                </div>
            </div>

            <div class="box">
                <img src="img/halloween.jpg" alt="">
                <div class="info">
                    <h3>Halloween day</h3>
                    <p>We provide special offers and discounts. And eye-pleasing cakes from Us.</p>
                    <a href="#"><button onclick="goMenu();">view</button></a>
                </div>
            </div>
           
        </div>
       
    </section>

    <!-- dish section ends  -->
    <!-- Carousel End -->

                    



                </div>
            </div>

            <?php include "footer.php"; ?>
            

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
     <!-- Back to Top -->
     <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/jquery.easypiechart.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script src="scriptpage.js"></script>
        
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    
</body>

</html>
