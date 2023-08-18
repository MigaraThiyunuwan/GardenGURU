<?php
require './classes/DbConnector.php';

//use classes\DbConnector;
$dbConnector = new classes\DbConnector();
$dbcon = $dbConnector->getConnection();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/blog.css" rel="stylesheet">


</head>

<body>
<?php 

?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="../images/logo.png" style="width:220px;height:50px;">
            <!-- <h1 class="m-0">Garden<B>GURU</B></h1> -->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="./plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="./Selling.php" class="nav-item nav-link">Shop</a>
                <!-- <a href="../php/blog.php" class="nav-item nav-link">Blog</a> -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./blog.php" class="dropdown-item">Blog</a>
                        <a href="./Advertistment.php" class="dropdown-item">Advertisement</a>
                        <a href="./newsfeed.php" class="dropdown-item">News Feed</a>
                        <a href="./comForum.php" class="dropdown-item">Communication Forum</a>

                    </div>
                </div>
                <a href="./AboutUs.php" class="nav-item nav-link">About</a>
                <a href="./ContactUs.php" class="nav-item nav-link">Contact</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./user.php" class="dropdown-item">Profile</a>
                        <a href="./classes/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Blog</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">ghjgm f jfty f ftjk fukj fuy</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="../images/s1.jpg" alt="">
                      
                    </div>
                    <div class="blog_details">
                        <a class="d-inline-block" href="./readBlog.php">
                            <h2 class="blog-head" style="color: #2d2d2d;">Google inks pact for new 35-storey
                                office</h2>
                        </a>
                        <p>That dominion stars lights dominion divide years for fourth have don't stars is
                            that
                            he earth it first without heaven in place seed it second morning saying.</p>
                        <ul class="blog-info-link">
                            <li><a href="#"><i class="fa fa-user"></i> Migara Thiyunuwan</a></li>

                        </ul>
                    </div>
                </article>

            </div>
            <div class="col-lg-6">

                <article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="../images/s2.jpg" alt="">
                        <!-- <a href="#" class="blog_item_date">
                            <h3>15</h3>
                            <p>Jan</p>
                        </a> -->
                    </div>
                    <div class="blog_details">
                        <a class="d-inline-block" href="./readBlog.php">
                            <h2 class="blog-head" style="color: #2d2d2d;">Google inks pact for new 35-storey
                                office</h2>
                        </a>
                        <p>That dominion stars lights dominion divide years for fourth have don't stars is
                            that
                            he earth it first without heaven in place seed it second morning saying.</p>
                        <ul class="blog-info-link">
                            <li><a href="#"><i class="fa fa-user"></i> Migara Thiyunuwan</a></li>

                        </ul>
                    </div>
                </article>

            </div>

            <div class="col-lg-6">

                <article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="../images/s2.jpg" alt="">
                        <!-- <a href="#" class="blog_item_date">
                            <h3>15</h3>
                            <p>Jan</p>
                        </a> -->
                    </div>
                    <div class="blog_details">
                        <a class="d-inline-block" href="./readBlog.php">
                            <h2 class="blog-head" style="color: #2d2d2d;">Google inks pact for new 35-storey
                                office</h2>
                        </a>
                        <p>That dominion stars lights dominion divide years for fourth have don't stars is
                            that
                            he earth it first without heaven in place seed it second morning saying.</p>
                        <ul class="blog-info-link">
                            <li><a href="#"><i class="fa fa-user"></i> Migara Thiyunuwan</a></li>

                        </ul>
                    </div>
                </article>

            </div>
            <div class="col-lg-6">

                <article class="blog_item">
                    <div class="blog_item_img">
                        <img class="card-img rounded-0" src="../images/s1.jpg" alt="">
                        <!-- <a href="#" class="blog_item_date">
                            <h3>15</h3>
                            <p>Jan</p>
                        </a> -->
                    </div>
                    <div class="blog_details">
                        <a class="d-inline-block" href="./readBlog.php">
                            <h2 class="blog-head" style="color: #2d2d2d;">Google inks pact for new 35-storey
                                office</h2>
                        </a>
                        <p>That dominion stars lights dominion divide years for fourth have don't stars is
                            that
                            he earth it first without heaven in place seed it second morning saying.</p>
                        <ul class="blog-info-link">
                            <li><a href="#"><i class="fa fa-user"></i> Migara Thiyunuwan</a></li>

                        </ul>
                    </div>
                </article>

            </div>

        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No. 58, Passara Road, Badulla</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9455 34 67279</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gardenguru.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="#">Landscaping</a>
                    <a class="btn btn-link" href="#">Pruning plants</a>
                    <a class="btn btn-link" href="#">Urban Gardening</a>
                    <a class="btn btn-link" href="#">Garden Maintenance</a>
                    <a class="btn btn-link" href="#">Green Technology</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
                    <a class="btn btn-link" href="#">Our Services</a>
                    <a class="btn btn-link" href="#">Terms & Condition</a>
                    <a class="btn btn-link" href="#">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="../images/logo.png" style="width:220px;height:50px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>



    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="index.php">GardenGURU</a>, All Right Reserved.
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>

</body>



</html>