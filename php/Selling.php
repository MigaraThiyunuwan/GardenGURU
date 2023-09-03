<?php

require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

require_once './classes/persons.php';
session_start();
$user = null;
$manager = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    $manager = $_SESSION["manager"];
}
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/Selling1/download.jpeg) center center no-repeat !important;
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
                <?php
                if ($user != null) {
                ?>
                    <a href="./user.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else if ($manager != null) {
                ?>
                    <a href="./Manager.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
                <?php
                } else {
                ?>
                    <a href="./login.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Sign In</a>
                <?php
                }
                ?>
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
                <li class="breadcrumb-item">Welcome to our Plant Shop, where you'll find a world of green wonders waiting to transform your space.</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->




    <div class="top-right-container">
        <?php
        $count = 0;
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
        }
        ?>

        <a href="mycart.php" class="btn btn-success">My Cart (<?php echo $count; ?>)</a>
    </div>

    <!-- <div class="plant-container">


        <div class="plant">


            <img src="../images/Selling1/veg1.jpeg" alt="Plant 1">
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
            <img src="../images/Selling1/flower12.jpeg" alt="Plant 2">
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
            <img src="../images/Selling1/grapes.jpeg" alt="Plant 3">
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

    </div> -->



    <div class="container">
        <div class="row">




            <?php
            try {
                $con = $dbcon->getConnection();

                // Pagination logic
                $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                $rows_per_page = 10;

                $query = "SELECT * FROM shop LIMIT $start, $rows_per_page";
                $pstmt = $con->prepare($query);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $item) {
                    // Display user details as before
            ?>




                    <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
                        <!-- product -->
                        <div class="product-content product-wrap clearfix">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="product-image">
                                        <img src="<?php echo $item->ItemImage;  ?>" alt="194x228" class="img-responsive" style="max-height: 228px;">
                                        <!-- <span class="tag2 hot">
                                    HOT
                                </span> -->
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="product-deatil">
                                        <h5 class="name">
                                            <a>
                                                <h4><?php echo $item->ItemName;  ?></h4>
                                            </a>
                                        </h5>
                                        <p class="price-container">
                                            <span> <?php echo "Rs." . $item->ItemPrice . ".00" ?> </span>
                                        </p>
                                        <span class="tag1"></span>
                                    </div>
                                    <div class="description">
                                        <p>Proin in ullamcorper lorem. Maecenas eu ipsum </p>
                                    </div>
                                    <div class="product-info smart-form">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <form action="manage_cart.php" method="POST">
                                                    <!-- <a href="javascript:void(0);" class="btn btn-success">Add to cart</a> -->
                                                    <input type="hidden" name="Item_Name" value="<?php echo $item->ItemName; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $item->ItemPrice; ?>">

                                                    <?php  
                                                        if($item->ItemQuantity <1){
                                                            ?>
                                                    <button type="submit" class="btn btn-success" name="Add_To_Cart" disabled>Add to Cart</button>
                                                            <?php
                                                        }else{
                                                            ?>
                                                    <button type="submit" class="btn btn-success" name="Add_To_Cart">Add to Cart</button>
                                                            <?php
                                                        }
                                                    ?>



                                                    
                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">

                                                <?php if ($item->ItemQuantity < 1) {
                                                ?>

                                                    <b>
                                                        <div style="color: red;" role='alert'>
                                                            Out of Stock!
                                                        </div>
                                                    </b>

                                                <?php
                                                }
                                                ?>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end product -->
                    </div>


























            <?php
                }
                // Calculate the total number of rows in the 'users' table (if not already calculated)
                if (!isset($total_rows)) {
                    $total_rows_query = "SELECT COUNT(*) as total FROM shop";
                    $total_rows_stmt = $con->prepare($total_rows_query);
                    $total_rows_stmt->execute();
                    $total_rows_result = $total_rows_stmt->fetch(PDO::FETCH_ASSOC);
                    $total_rows = $total_rows_result['total'];
                }

                // Calculate the total number of pages
                $pages = ceil($total_rows / $rows_per_page);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
            ?>






















            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                        Showing <?php echo min($total_rows, $start + 1) . ' to ' . min($total_rows, $start + $rows_per_page); ?> of <?php echo $total_rows; ?>
                    </p>
                </div>

                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <?php
                            if ($start > 0) {
                                echo '<li class="page-item"><a class="page-link" href="?start=' . ($start - $rows_per_page) . '">Previous</a></li>';
                            } else {
                                echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                            }

                            for ($i = 1; $i <= $pages; $i++) {
                                echo '<li class="page-item' . (($start / $rows_per_page + 1) == $i ? ' active' : '') . '"><a class="page-link" href="?start=' . (($i - 1) * $rows_per_page) . '">' . $i . '</a></li>';
                            }

                            if ($start < ($pages - 1) * $rows_per_page) {
                                echo '<li class="page-item"><a class="page-link" href="?start=' . ($start + $rows_per_page) . '">Next</a></li>';
                            } else {
                                echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
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




</body>



</html>