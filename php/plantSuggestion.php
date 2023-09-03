<?php
require './classes/DbConnector.php';

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $location = $_POST["location"];
    $soil = $_POST["soil"];
    $sun = $_POST["sun"];
    $water = $_POST["water"];
    $space = $_POST["space"];
    $time = $_POST["time"];

    try {
        $con = $dbcon->getConnection();
        $sql = "SELECT PlantID FROM suggestion WHERE Location = ? AND SunExposure = ? AND Soil = ? AND Water = ? AND Space = ? AND HarvestTime = ?";

        $pstmt = $con->prepare($sql);
        $pstmt->bindValue(1, $location);
        $pstmt->bindValue(2, $sun);
        $pstmt->bindValue(3, $soil);
        $pstmt->bindValue(4, $water);
        $pstmt->bindValue(5, $space);
        $pstmt->bindValue(6, $time);

        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Plant Suggestion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">
    <link href="../css/plantSuggesion.css" rel="stylesheet">


    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }
    </style>
</head>

<body class="body">
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Plant Suggestions</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Welcome to our Plant Suggestion, your personal botanical matchmaker!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container">



        <div class="row py-5 mt-4 align-items-center">
            <!-- <span><b>
                    <p style="color:Tomato;"> Note:-</p>
                    <p style="color:MediumSeaGreen;"> Here we suggest you plants for home gardening purpose only. (මෙහිදී අපි ඔබට පැල යෝජනා කරන්නේ ගෙවතු වගාව සඳහා පමණි )</p>
                </b></span> -->
            <div class="container">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="row">

                        <!-- Select Box 1 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-location-dot fa-fade" style="color: #0b8952; font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Select Location</a>
                            <select id="location" name="location" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Badulla">Badulla</option>
                                <option value="Soranathota">Soranathota</option>
                                <option value="Meegahakiula">Meegahakiula</option>
                                <option value="Kandaketiya">Kandaketiya</option>
                                <option value="Rideemaliyadda">Rideemaliyadda</option>
                                <option value="Mahiyanganaya">Mahiyanganaya</option>
                                <option value="Passara">Passara</option>
                                <option value="Lunugala">Lunugala</option>
                                <option value="Hali Ela">Hali Ela</option>
                                <option value="Ella">Ella</option>
                                <option value="Bandarawela">Bandarawela</option>
                                <option value="Haputale">Haputale</option>
                                <option value="Haldummulla">Haldummulla</option>
                                <option value="Uva Paranagama">Uva Paranagama</option>
                                <option value="Welimada">Welimada</option>
                            </select>
                        </div>

                        <!-- Select Box 2 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-sun fa-beat-fade" style="color: #0b8952; font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Sun Exposure</a>
                            <select id="sun" name="sun" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>

                        <!-- Select Box 3 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-person-digging fa-shake" style="color: #0b8952; font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Soil </a>
                            <select id="soil" name="soil" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Reddish Brown Earths">Reddish Brown Earths</option>
                                <option value="Red Yellow Podzolic">Red Yellow Podzolic</option>
                                <!-- <option value="Low Humic Gley">Low Humic Gley</option> -->
                                <!-- <option value="Mountain regosols">Mountain regosols</option> -->
                            </select>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 25px;">

                        <!-- Select Box 1 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-droplet fa-bounce" style="color: #0b8952;font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Water</a>
                            <select id="water" name="water" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Easy to Find">Easy to found</option>
                                <option value="Medium">Normally can found</option>
                                <option value="Rare">Rare to found</option>
                            </select>
                        </div>

                        <!-- Select Box 2 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-landmark fa-fade" style="color: #0b8952;font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Space</a>
                            <select id="space" name="space" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Limited">Limited</option>
                                <option value="Average">Average</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>

                        <!-- Select Box 3 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-clock fa-flip" style="color: #0b8952;font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Harvest Time</a>
                            <select id="time" name="time" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="< 2 months">< 2 months</option>
                                <option value="2 to 6 months">2 to 6 months</option>
                                <option value="6 to 12 months">6 to 12 months</option>
                                <option value="> 12 months">> 12 months</option>
                            </select>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="input-group col">
                        <input type="submit" value="Find Plants" class="btn btn-primary my-3 w-100">
                    </div>
                </form>

            </div>




        </div>



    </div>


    <div class="container mt-2">
        <div class="row">

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                <span><b>
                        <p style="color:MediumSeaGreen;">In <?php echo $location ?> area when you have <?php echo $sun ?> sun exposure, <?php echo $soil ?> soil,
                            and <?php echo $water ?> water, you have <?php echo $space ?> space to gardening and when your harvest time <?php echo $time ?>, it's suitable to grow below plants.</p>
                    </b></span>
            <?php  } ?>

            <?php
            if (isset($rs) && !empty($rs)) {
                foreach ($rs as $row) {
                    try {
                        $con = $dbcon->getConnection();
                        $sql = "SELECT * FROM plant WHERE PlantID = ?";

                        $pstmt = $con->prepare($sql);
                        $pstmt->bindValue(1, $row->PlantID);
                        $pstmt->execute();
                        $plants = $pstmt->fetchAll(PDO::FETCH_OBJ);

                        foreach ($plants as $plant) {
                            $plantName = $plant->PlantName;
                            $filePath = $plant->FilePath;
            ?>

                            <div class="col-md-3 col-sm-6">
                                <div class="card card-block">

                                    <img src="<?php echo $filePath ?>" alt="Photo of sunset">
                                    <h5 class="card-title mt-3 mb-3" style="margin-left: 10px;"><?php echo $plantName ?></h5>
                                    <p class="card-text" style="margin-left: 10px;">This plant is best suited for planting according to your situation.</p>
                                </div>
                            </div>

            <?php
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                }
            } else {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "<p>No plants found for the given criteria.</p>";
                }
            }
            ?>
        </div>
        <span><b>
                <br>
                <p style="color:MediumSeaGreen;">Reddish Brown Earths - </p>වැලි ලෝම සිට සැහැල්ලු මැටි ලෝම දක්වා මතුපිට පස් ඇති අතර එය මැටි යටි පසකට ඉහළින් පිහිටා ඇත.
                මතුපිට පස් සෙන්ටිමීටර 10 ත් 40 ත් අතර ඝනකමකින් යුක්ත වන අතර රතු සිට අළු දුඹුරු දක්වා වෙනස් වේ. යටි පස කහ සිට රතු සිට අළු දක්වා වෙනස් වේ. <br><br>
                <p style="color:MediumSeaGreen;">Red Yellow Podzolic - </p>රතු සහ කහ පැහැති පාට සඳහා ප්රසිද්ධය. පාංශු මතුපිට සමහර ප්‍රදේශවල රතු හෝ තැඹිලි පාටින් ද තවත් ප්‍රදේශවල කහ පැහැයෙන්ද දිස් විය හැක.
            </b></span>

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

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>



    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="../index.php">GardenGURU</a>, All Right Reserved.
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