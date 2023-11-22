<!DOCTYPE <html>
<html lang="en">

<?php
require_once './classes/DbConnector.php';
require_once './classes/persons.php';
require_once './classes/cart.php';
require_once './classes/order.php';
require_once './classes/Security.php';
require_once './classes/shop.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
$user = null;
$manager = null;
$orderID = null;
$order = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
}

if (isset($_SESSION["order"])) {
    // User is logged in, retrieve the user object
    //$order = unserialize($_SESSION["order"]);

    // Retrieve the serialized object from the session
    $serializedObject = $_SESSION['order'];

    // Unserialize the object
    $order = unserialize($serializedObject);
}
if (isset($_SESSION["orderID"])) {
    // User is logged in, retrieve the user object
    $orderID = $_SESSION["orderID"];
}
?>


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Payment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Payement.css" rel="stylesheet">

    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #00b50b;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }

        body {

            /* background-image: url('../images/web.png') ; */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;

        }
    </style>
</head>

<body onload="myFunction()" style="margin:0;" class="bg-white">

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

                <a href="./user.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Profile</a>

                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="./user.php" class="dropdown-item">Profile</a>
                        <a href="./processes/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div> -->
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->
    <div id="loader" style="margin-top: 100px;">

    </div>

    <div style="margin-top: 200px; margin-left: 38%;" id="process">
        <h1>Payment Processing!</h1>
    </div>

    <div class="container" style="margin-top: 100px;">
        <div class="intro">

        </div>
    </div>
    </div>

    <?php

    if ($orderID != null) {
        $order->setOrderID($orderID);
        if ($order->transactionConfirm($orderID)) {
            $cart = new Cart();
            $shop = new Shop(null, null, null);
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['ItemId'] != null) {
                    $order->setOrderItem($value['ItemId'], $value['Quantity']);
                    $shop->reduceQuantity($value['ItemId'], $value['Quantity']);
                }
            }

            if ($cart->resetCart($user->getUserId())) {
                $_SESSION['cart'] = null;
                $_SESSION['cart'][0] = array('ItemId' => null, 'Item_Name' => null, 'Price' => null, 'Quantity' => null);
            }
        }
    }


    ?>

    <div style="display:none; " id="myDiv" class="animate-bottom" style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/van.png" style="width: 700px; height: 600px; margin-left: 50px;">
            </div>
            <div class="col-md-6" style="margin-top: 100px;">
                <h1 >Payment success!</h1>
                <h2 style="margin-top: 20px;">Thank you for palced your order with us.</h2>
                <h3 style="margin-top: 20px;"> Your Order currently in waiting status and <br>check your profile for more information.</h3>
                <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Back to Home</a>
                <a href="./mybill.php" target="_blank" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Download Bill</a>
            </div>



            
    
        <!-- <h1>Payment success!</h1>
        <h2>Thank you for palced your order with us.</h2>
        <a href="../index.php" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Back to Home</a>
        <a href="./mybill.php" target="_blank" class="btn btn-primary py-sm-3 px-sm-4" style="margin-top: 100px;">Download Bill</a> -->
    </div>

            <script>
                var myVar;

                function myFunction() {
                    myVar = setTimeout(showPage, 5000);
                }

                function showPage() {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById("process").style.display = "none";
                    document.getElementById("myDiv").style.display = "block";
                }
            </script>






</body>

</html>