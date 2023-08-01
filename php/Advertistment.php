<?php
require './classes/DbConnector.php';

//use classes\DbConnector;
$dbConnector = new classes\DbConnector();
$dbcon = $dbConnector->getConnection();

?>
<?php
require './classes/persons.php';
session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./login.php?error=2");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>Advertiesment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Advertistment.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
        }



        .portfolio-inner {
            position: relative;
        }

        .portfolio-text {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 5px;
        }

        .portfolio-text a {
            color: #fff;
            text-decoration: none;
            margin-right: 5px;
        }

        .portfolio-text a:hover {
            color: #ffcc00;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery img {
            max-width: 400px;
            max-height: 400px;
            object-fit: cover;
        }

        
        

        body {
    font-family: "Oxygen", sans-serif;
    color: #050505;
  }
  
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  
  .main {
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .cards {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  .cards_item {
    display: flex;
    padding: 1rem;
  }
  
  .card_image {
    position: relative;
    max-height: 250px;
  }
  
  .card_image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .card_price {
    position: absolute;
    bottom: 8px;
    right: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 45px;
    height: 45px;
    border-radius: 0.25rem;
    background-color: #008000;
    font-size: 18px;
    font-weight: 700;
  }
  
  .card_price span {
    font-size: 12px;
    margin-top: -2px;
  }
  
  .note {
    position: absolute;
    top: 8px;
    left: 8px;
    padding: 4px 8px;
    border-radius: 0.25rem;
    background-color: #008000;
    font-size: 14px;
    font-weight: 700;
  }
  
  @media (min-width: 40rem) {
    .cards_item {
      width: 50%;
    }
  }
  
  @media (min-width: 56rem) {
    .cards_item {
      width: 33.3333%;
    }
  }
  
  .card {
    background-color: white;
    border-radius: 0.25rem;
    box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }
  
  .card_content {
    position: relative;
    padding: 16px 12px 32px 24px;
    margin: 16px 8px 8px 0;
    max-height: 290px;
    overflow-y: scroll;
  }
  
  .card_content::-webkit-scrollbar {
    width: 8px;
  }
  
  .card_content::-webkit-scrollbar-track {
    box-shadow: 0;
    border-radius: 0;
  }
  
  .card_content::-webkit-scrollbar-thumb {
    background: #008000;
    border-radius: 15px;
  }
  
  .card_title {
    position: relative;
    margin: 0 0 24px;
    padding-bottom: 10px;
    text-align: center;
    font-size: 20px;
    font-weight: 700;
  }
  
  .card_title::after {
    position: absolute;
    display: block;
    width: 50px;
    height: 2px;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #008000;
    content: "";
  }
  
  hr {
    margin: 24px auto;
    width: 50px;
    border-top: 2px solid #008000;
  }
  
  .card_text p {
    margin: 0 0 24px;
    font-size: 14px;
    line-height: 1.5;
  }
  
  .card_text p:last-child {
    margin: 0;
  }
  





    </style>
</head>

<body>


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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Advertisement</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Green&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thumb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; with&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container1">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Discover a World of Possibilities</p>
            <h1 class="display-5 mb-5">Explore Our Exclusive Collection</h1>
        </div>

    
        <!-- newly added advertiesments -->
        <!-- Projects Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4 portfolio-container">
                    <?php

                    // Retrieve all uploaded photos from the database
                    $sql = "SELECT image1_filename ,title,  description FROM advertisements ORDER BY id DESC";
                    try {

                        $stmt = $dbcon->query($sql);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) {
                            $photoCount = 1;
                            foreach ($result as $row) {
                                $photoName = $row["image1_filename"];
                               // $photoPath = "../images/Adevertistment/$photoName";
                                //$descriptionName = $row["image2_filename"];
                              //  $descriptionPath = "../images/Adevertistment/$descriptionName"; // Replace with the correct path to the corresponding description file
                               
                               $description = $row["description"];
                               $title = $row["title"];

                                // Determine the appropriate column class for each photo
                                $columnClass = ($photoCount % 3 == 0) ? 'third' : (($photoCount % 2 == 0) ? 'second' : 'first');

                                // Generate the HTML code for the photo in the appropriate column
                                echo '<li class="cards_item">';
                                echo '<div class="card">';
                                echo '<div class="card_image">';
                                echo '<img src="' . $photoName . '" alt="t" />';
                                //echo '<span class="card_price"><span>$</span>9</span>'; // Assuming you have a price for the advertisement
                                echo '</div>';
                                echo '<div class="card_content">';
                                echo '<h2 class="card_title">' . $title . '</h2>'; // Replace "Advertisement Title" with the actual title for the advertisement
                                echo '<div class="card_text">';
                                echo '<p>' . $description . '</p>'; // Replace with the actual description for the advertisement
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</li>';

                                $photoCount++;
                            }
                        } else {
                            echo "No photos uploaded yet.";
                        }
                    } catch (PDOException $exc) {
                        die("Error executing the query: " . $exc->getMessage());
                    }





                    //  $result = $conn->query($sql);




                    ?>
                </div>
            </div>
        </div>

    </div>


    <style>
.text-card {
  display: none;
  padding: 10px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style for the button */
.btn {
  /* Your button styles here */
}
<style>







    <!-- Projects End -->
    <!-- newly added advertiesments end -->


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