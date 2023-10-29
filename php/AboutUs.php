<!DOCTYPE html>
<html lang="en">
<?php
require_once './classes/persons.php';
session_start();
$user = null;
$manager = null;
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    $manager = $_SESSION["manager"];
}
?>


<head>
    <meta charset="utf-8">
    <title>GardenGURU | About</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/aboutUs.css" rel="stylesheet">
    <link href="../css/reviews.css" rel="stylesheet">
    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }

        .team-members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .team-item {
            max-width: 300px;

        }
    </style>
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
                        <a href="./report.php" class="dropdown-item">Reporting</a>
                    </div>
                </div>
                <a href="./AboutUs.php" class="nav-item nav-link">About</a>
                <a href="./ContactUs.php" class="nav-item nav-link">Contact</a>
                <?php
                if ($user != null) {
                ?>
                    <a href="./user.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else if ($manager != null) {
                ?>
                    <a href="./manager/managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else {
                ?>
                    <a href="./login.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Sign In</a>
                <?php
                }
                ?>

            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">About Us</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="../images/AboutUs/about_start.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">15</h1>
                    <p class="text-primary mb-4">Year of Experience</p>
                    <h1 class="display-6 mb-4">Blooming Your Gardening Dreams with Us.</h1>
                    <p class="mb-4" style="font-family: Georgia, 'Times New Roman', Times, serif">Join our community of passionate gardeners, immerse yourself in the art of nurturing plants, and let nature's charm unfold in your own backyard.
                        Get ready to discover the joy of gardening and witness the magic that unfolds when you connect with the earth.
                    </p>
                    <h4>"Nurture Your Green Thumb with Us!"</h4>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <img src="../images/AboutUs/farming.png" alt="Ad 1">
                                <h5 class="mb-3">"Discover Premium Gardening Tools Exclusively at Our Store"</h5>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <img src="../images/AboutUs/diliveryy.png" alt="Ad 1">
                                <h5 class="mb-3">"Home Delivery: Bring Your Favorite Plants Right to Your Doorstep!"</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Vision and Mission Grid Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-md-8 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="display-4 mb-4">Our Vision</h2>
                    <p class="lead" style="font-family: Georgia, 'Times New Roman', Times, serif">To create a greener and more sustainable world by inspiring and empowering individuals to connect with nature through gardening.</p>
                </div>
                <div class="col-lg-6 col-md-8 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="display-4 mb-4">Our Mission</h2>
                    <p class="lead" style="font-family: Georgia, 'Times New Roman', Times, serif">To provide gardening enthusiasts with the knowledge, tools, and resources they need to cultivate beautiful and thriving gardens, while promoting environmental conservation and awareness.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision and Mission Grid End -->


    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 course-details-content">

                <div class="course-content">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <p class="fs-5 fw-bold text-primary">User Reviews</p>
                        <h1 class="display-5 mb-5">What our customers say about us</h1>
                    </div>
                    
                    <div class="row row--30">
                        <div class="col-lg-4">
                            <div class="rating-box">
                                <div class="rating-number">5.0</div>
                                <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                                <span>(25 Review)</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="review-wrapper">
                                <div class="single-progress-bar">
                                    <div class="rating-text"> 5 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value">23</span>
                                </div>
                                <div class="single-progress-bar">
                                    <div class="rating-text"> 4 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value">3</span>
                                </div>
                                <div class="single-progress-bar">
                                    <div class="rating-text"> 3 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value">2</span>
                                </div>
                                <div class="single-progress-bar">
                                    <div class="rating-text"> 2 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value">3</span>
                                </div>
                                <div class="single-progress-bar">
                                    <div class="rating-text"> 1 <i class="fa fa-star" aria-hidden="true"></i> </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="0" aria-valuemin="80" aria-valuemax="100"></div>
                                    </div>
                                    <span class="rating-value">2</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-wrapper pt--40">
                        
                        <!--  Comment Box start--->
                        <div class="edu-comment">
                            <div class="thumbnail"> <img style="width: 100%; height: 100%;" src="../images/profile_pictures//22.jpg" alt="Comment Images"> </div>
                            <div class="comment-content">
                                <div class="comment-top">
                                    <h6 class="title">CSS Tutorials</h6>
                                    <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                                </div>
                                <span class="subtitle">“ Outstanding Review Design ”</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                        <!-- Comment Box end--->
                        <!--  Comment Box start--->
                        <div class="edu-comment">
                            <div class="thumbnail"> <img style="width: 100%; height: 100%;" src="../images/profile_pictures//2.jpg" alt="Comment Images"> </div>
                            <div class="comment-content">
                                <div class="comment-top">
                                    <h6 class="title">HTML CSS Tutorials</h6>
                                    <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </div>
                                </div>
                                <span class="subtitle">“ Nice Review Design ”</span>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                            </div>
                        </div>
                        <!--  Comment Box end--->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated & Experienced Team Members</h1>
            </div>
            <div class="responsive-container-block">



                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/Migaranew.jpg">
                        </div>
                        <p class="text-blk name">
                            Migara Thiyunuwan
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/Malki.jpg">
                        </div>
                        <p class="text-blk name">
                            Malki Madhubhashini
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/navonew.jpg">
                        </div>
                        <p class="text-blk name">
                            Nipuni Navodya
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/lashan.jpg">
                        </div>
                        <p class="text-blk name">
                            Lashan Sachintha
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 card-container">
                    <div class="card">
                        <div class="team-image-wrapper">
                            <img class="team-member-image" src="../images/AboutUs/dharani.jpg">
                        </div>
                        <p class="text-blk name">
                            Dharani Gunasekara
                        </p>
                        <p class="text-blk position">
                            Full Stack Dev
                        </p>
                        <p class="text-blk feature-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="fa-brands fa-twitter" style="color: #08b43c;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fa-brands fa-facebook" style="color: #08b43c;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p style="color: white;" class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No. 58, Passara Road, Badulla</p>
                    <p style="color: white;" class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9455 34 67279</p>
                    <p style="color: white;" class="mb-2"><i class="fa fa-envelope me-3"></i>info@gardenguru.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="./plantSuggestion.php">Plant Suggestion</a>
                    <a class="btn btn-link" href="./Advertistment.php">Advertiesment</a>
                    <a class="btn btn-link" href="./Selling.php">Shop</a>
                    <a class="btn btn-link" href="./blog.php">Blog</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="./AboutUs.php">About Us</a>
                    <a class="btn btn-link" href="./ContactUs.php">Contact Us</a>
                    <a class="btn btn-link" href="./newsfeed.php">News Feed</a>
                    <a class="btn btn-link" href="./login.php">Log Out</a>
                    <a class="btn btn-link" href="./termsAndCondition.php">Terms & Condition</a>
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