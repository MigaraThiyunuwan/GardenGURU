<?php
require './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gardener - Gardening Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">


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
                        <a href="./login.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
            <!-- <a href="#" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0" style="margin-right: 100px;">
                <img src="../images/web.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row">

                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa-solid fa-at text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>

                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                        </div>
                        <!-- NIC -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa-solid fa-envelope text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>

                            <input id="NIC" type="tel" name="NIC" placeholder="NIC" class="form-control bg-white border-md border-left-0 pl-3">
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <input type="submit" value="Add new Manager." class="btn btn-primary my-3 w-100">
                        <!-- <div class="form-group col-lg-12 mx-auto mb-0">
                            <a href="#" class="btn btn-primary btn-block py-2">
                                <span class="font-weight-bold">Create your account</span>
                            </a>
                        </div> -->

                    </div>
                </form>


                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirmation']) && !empty($_POST['passwordConfirmation']) && isset($_POST['NIC']) && !empty($_POST['NIC'])) {
                        $tempPass1 = $_POST["password"];
                        $tempPass2 = $_POST["passwordConfirmation"];

                        if ($tempPass1 == $tempPass2) {
                            $firstname = $_POST["firstname"];
                            $lastname = $_POST["lastname"];
                            $email = $_POST["email"];
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            $NIC = $_POST["NIC"];
                            $phone = $_POST["phone"];
                            

                            try {
                                $con = $dbcon->getConnection();
                                $query = "INSERT INTO manager(mFirstName, mLastName, mEmail, mPassword, mNIC, mPhone) VALUES(?, ?, ?, ?, ?, ?)";
                                $pstmt = $con->prepare($query);
                                $pstmt->bindValue(1, $firstname);
                                $pstmt->bindValue(2, $lastname);
                                $pstmt->bindValue(3, $email);
                                $pstmt->bindValue(4, $password);
                                $pstmt->bindValue(5, $NIC);
                                $pstmt->bindValue(6, $phone);
                                
                                $pstmt->execute();
                                if (($pstmt->rowCount()) > 0) {
                ?>
                                    <!-- <button onclick="window.location.href='./Login.php';" class="btn btn-primary my-3 w-100">
                                        You have Successfully registered. Click Here to Login Your Account.
                                    </button> -->
                <?php
                                    echo "<b>You Have Successfully Added. <a href='./Admin.php'>Click here.</a></b>";
                                } else {
                                    echo "Error, try again.";
                                }
                            } catch (PDOException $exc) {
                                echo $exc->getMessage();
                            }
                        } else {
                            echo '<p style="color:red;" > <b>Password Missmatch.</b> </p>';
                           
                        }
                    }else{
                        echo '<p style="color:red;" > <b>Please Fill all Fields.</b> </p>';
                    }
                }

                ?>


            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>



</html>