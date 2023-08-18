<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/Selling/wall3.jpeg) center center no-repeat !important;
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Best Selling</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Plants make people happy!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <!--Banner Section-->

    <section class="banner">
        <div class="banner-img">
            <img src="../images/Selling/dis1.jpeg">
        </div>
        <div class="banner-img">
            <img src="../images/Selling/img1.jpg">
        </div>
        <div class="banner-img">
            <img src="../images/Selling/sale2.jpeg">
        </div>

    </section>

    <!----new product section -->
    <!------
    <section class="new product">
        <div class="center-text">
          <h1 ="fadeIn">New Arrival Items</h1>
            </div>

                <div class="new-content">
                    <div class="row">
                        <img src="../images/Selling/veg1.jpeg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>


                     <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>



                     <div class="row">
                        <img src="../images/Selling/grapes.jpeg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>

                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>

                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>


                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>


                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>

                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
     </section>

     ------->



    <div class="center-text">
        <h1>New Arrival Items</h1>
    </div>


    
    <div class="top-right-container">
        <?php
        $count = 0;
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
        }
        ?>

        <a href="mycart.php" class="btn btn-outline-success">My Cart (<?php echo $count; ?>)</a>
    </div>






    <div class="plant-container">
        <div class="plant">


            <img src="../images/Selling/veg1.jpeg" alt="Plant 1">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Tomato</h3>
                    <p>Rs.20.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Tomato">
                    <input type="hidden" name="price" value="20.00">

                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/flower12.jpeg" alt="Plant 2">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Impatiens</h3>
                    <p>Rs.25.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Impatiens">
                    <input type="hidden" name="price" value="25.00">
                </div>
            </form>
        </div>

        <div class="plant">
            <img src="../images/Selling/grapes.jpeg" alt="Plant 3">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Grapes</h3>
                    <p>$18.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Grapes">
                    <input type="hidden" name="price" value="18.00">
                </div>
            </form>
        </div>

    </div>
    </div>


    <div class="plant-container">
        <div class="plant">
            <img src="../images/Selling/cab12.jpeg" alt="Plant 1">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Cabbage</h3>
                    <p>$20.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Cabbage">
                    <input type="hidden" name="price" value="20.00">
                </div>
            </form>
        </div>

        <div class="plant">
            <img src="../images/Selling/flower45.jpeg" alt="Plant 2">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Rose</h3>
                    <p>$25.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Rose">
                    <input type="hidden" name="price" value="25.00">
                </div>
            </form>

        </div>

        <div class="plant">
            <img src="../images/Selling/prom.jpeg" alt="Plant 3">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>promegranate</h3>
                    <p>$18.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Promogranate">
                    <input type="hidden" name="price" value="18.00">
                </div>
            </form>
        </div>

    </div>
    </div>

    <div class="plant-container">
        <div class="plant">
            <img src="../images/Selling/redp2.jpeg" alt="Plant 1">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Red Chillie</h3>
                    <p>$20.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Red Chillie">
                    <input type="hidden" name="price" value="20.00">
                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/lily3.jpeg" alt="Plant 2">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Lilly</h3>
                    <p>$25.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Lilly">
                    <input type="hidden" name="price" value="25.00">
                </div>
            </form>

        </div>
        <div class="plant">
            <img src="../images/Selling/mango.jpeg" alt="Plant 3">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Mango</h3>
                    <p>$18.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Mango">
                    <input type="hidden" name="price" value="18.00">
                </div>
            </form>
        </div>

    </div>
    </div>



    <!--Banner2 Section-->

    <section class="banner1">
        <div class="banner1-img">
            <img src="../images/Selling/plant6.jpeg">
        </div>



    </section>

    <!---top products-->
    <div class="center-text">
        <h1>Top Products</h1>
    </div>

    <div class="plant-container">
        <div class="plant">
            <img src="../images/Selling/purple1.jpeg" alt="Plant 1">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Verbina</h3>
                    <p>$20.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Verbina">
                    <input type="hidden" name="price" value="20.00">
                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/rose.jpeg" alt="Plant 2">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Rose</h3>
                    <p>$25.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Rose">
                    <input type="hidden" name="price" value="25.00">
                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/wh2.jpeg" alt="Plant 3">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Sun flower</h3>
                    <p>$18.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Sun Flower">
                    <input type="hidden" name="price" value="18.00">
                </div>
            </form>
        </div>

    </div>
    </div>

    <div class="plant-container">
        <div class="plant">
            <img src="../images/Selling/brin1.jpeg" alt="Plant 1">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Brinjole</h3>
                    <p>$20.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Brinjole">
                    <input type="hidden" name="price" value="20.00">
                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/grapes.jpeg" alt="Plant 2">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Grapes</h3>
                    <p>$25.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Grapes">
                    <input type="hidden" name="price" value="25.00">
                </div>
            </form>
        </div>
        <div class="plant">
            <img src="../images/Selling/corn.jpeg" alt="Plant 3">
            <form action="manage_cart.php" method="POST">
                <div class="plant-info">
                    <h3>Corn</h3>
                    <p>$18.00</p>
                    <button type="submit" name="Add_To_Cart">Add to Cart</button>
                    <input type="hidden" name="Item_Name" value="Corn">
                    <input type="hidden" name="price" value="18.00">
                </div>
            </form>
        </div>

    </div>
    </div>


    <!--new products section-->
    <!----new product section -->
    <!-----
    <section class="new product">
        <div class="center-text">
          <h1>Top Products</h1>
            </div>

                <div class="new-content">
                    <div class="row">
                        <img src="../images/Selling/veg1.jpeg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>


                     <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>



                     <div class="row">
                        <img src="../images/Selling/grapes.jpeg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>

                    <div class="row">
                        <img src="https://images.pexels.com/photos/931162/pexels-photo-931162.jpeg?cs=srgb&dl=pexels-secret-garden-931162.jpg&fm=jpg">
                        <h4>Tomato Plant</h4>
                        <h5>Rs.300</h5>
                        <div class="top">
                            <p>Hot</p>
                        </div>
                        <div class="bbtn">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>

                    ------->

    <!--blog section

        <section class="blog">
            <div class="center-text">
                <h2>Latest News</h2>
                
            </div>

            <div class="blog-content">
                <div class="main-box">
                    <div class="box-img">
                        <img src="../images/Selling/plant11.jpeg">
                        
                    </div>
                    <div class="in-bxx">
                        <div class="in-text">
                            <p>Dec 02,2022</p>
                        </div>
                        <div class="in-icon">
                            <a href="#"><i class='bx bx-message-rounded'></i></a>
                        </div>
                        
                    </div>
                    <h3>the best way to sell plants by online website</h3>
                </div>

                
                <div class="blog-content">
                <div class="main-box">
                    <div class="box-img">
                        <img src="../images/Selling/plant10.jpeg">
                        
                    </div>
                    <div class="in-bxx">
                        <div class="in-text">
                            <p>Dec 02,2022</p>
                        </div>
                        <div class="in-icon">
                            <a href="#"><i class='bx bx-message-rounded'></i></a>
                        </div>
                        
                    </div>
                    <h3>the best way to sell plants by online website</h3>
                </div>


---------->


    </div>



    </section>

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




</body>



</html>