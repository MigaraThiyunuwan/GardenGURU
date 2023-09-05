<?php
require './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector(); // Create a new instance of DbConnector class
$conn = $dbcon->getConnection(); // Get the database connection object

$latestStoriesQuery = "SELECT * FROM news ORDER BY newsId DESC LIMIT 3";
$latestStoriesResult = $conn->query($latestStoriesQuery);

$otherStoriesQuery = "SELECT * FROM news ORDER BY newsId DESC LIMIT 5 OFFSET 3";
$otherStoriesResult = $conn->query($otherStoriesQuery);

$newsCounter = 0;

?>

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main1.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="../images/logo.png" style="width:220px;height:50px;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="./plantSuggestion.php" class="nav-item nav-link">Plant Suggestions</a>
                <a href="./Selling.php" class="nav-item nav-link">Shop</a>
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
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(../images/newsfeed/head.jpg;)"> 
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Newsfeed</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"> Get the latest news for plant enthusiasts!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->
   
    <main>
        <section class="main-container-left">
            <h2>Latest Stories</h2>
            <?php
            while ($row = $latestStoriesResult->fetch(PDO::FETCH_ASSOC)) {
                // Increment the counter for each news story
                $newsCounter++;
            ?>
                <div style="padding-top: 3rem;">
                    <h2><?php echo $row['title']; ?></h2>
                    <p id="description<?php echo $newsCounter; ?>" class="truncated"><?php echo $row['description']; ?></p>
                    <button id="readMoreButton<?php echo $newsCounter; ?>">Read More</button>
                    <p id="fullDescription<?php echo $newsCounter; ?>" style="display: none;"><?php echo $row['full_content']; ?></p>
                    <button id="readLessButton<?php echo $newsCounter; ?>" style="display: none;">Read Less</button>
                </div>
                <div style="width: 800px; height: 300px; overflow: hidden;">
                    <img src="<?php echo $row['image']; ?>" width="800" height="300">
                </div>
            <?php
            }
            ?>
        </section>

        <section class="main-container-right">
            <h2>Other Stories</h2>
            <?php
            $otherNewsCounter = 0; // Counter for other stories
            while ($row = $otherStoriesResult->fetch(PDO::FETCH_ASSOC)) {
                $otherNewsCounter++;
            ?>
                <div class="other-story">
                    <h3><?php echo $row['title']; ?></h3>

                    <!-- Display the image here -->
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?> Image" width="400" height="200">

                    <p id="otherDescription<?php echo $otherNewsCounter; ?>" class="truncated"><?php echo $row['description']; ?></p>
                    <button id="otherReadMoreButton<?php echo $otherNewsCounter; ?>">Read More</button>
                    <p id="otherFullDescription<?php echo $otherNewsCounter; ?>" style="display: none;"><?php echo $row['full_content']; ?></p>
                    <button id="otherReadLessButton<?php echo $otherNewsCounter; ?>" style="display: none;">Read Less</button>
                </div>
            <?php
            }
            ?>
        </section>

    </main>

    <style>
        /* Style for the Read More button */
        .read-more-button {
            padding: 5px 10px;
            /* Adjust padding to control button size */
            font-size: 14px;
            /* Adjust font size as needed */
        }

        .story-content {
            display: flex;
            align-items: center;
            /* Vertically center the content */
        }

        .truncated {
            flex: 1;
            /* Allow the paragraph to take remaining horizontal space */
            margin-right: 10px;
            /* Add some spacing between the paragraph and image */
        }

        img {
            max-width: 100%;
            /* Ensure the image doesn't exceed its container */
        }
    </style>
    <script>
        <?php
        // Generate JavaScript code for each news story
        for ($i = 1; $i <= $newsCounter; $i++) {
        ?>
            const description<?php echo $i; ?> = document.getElementById("description<?php echo $i; ?>");
            const readMoreButton<?php echo $i; ?> = document.getElementById("readMoreButton<?php echo $i; ?>");
            const fullDescription<?php echo $i; ?> = document.getElementById("fullDescription<?php echo $i; ?>");
            const readLessButton<?php echo $i; ?> = document.getElementById("readLessButton<?php echo $i; ?>");

            readMoreButton<?php echo $i; ?>.addEventListener("click", function() {
                description<?php echo $i; ?>.classList.remove("truncated");
                readMoreButton<?php echo $i; ?>.style.display = "none";
                fullDescription<?php echo $i; ?>.style.display = "block";
                readLessButton<?php echo $i; ?>.style.display = "inline";
            });

            readLessButton<?php echo $i; ?>.addEventListener("click", function() {
                description<?php echo $i; ?>.classList.add("truncated");
                readMoreButton<?php echo $i; ?>.style.display = "inline";
                fullDescription<?php echo $i; ?>.style.display = "none";
                readLessButton<?php echo $i; ?>.style.display = "none";
            });
        <?php
        }
        ?>
    </script>

    <script>
        <?php
        for ($i = 1; $i <= $otherNewsCounter; $i++) {
        ?>
            const otherDescription<?php echo $i; ?> = document.getElementById("otherDescription<?php echo $i; ?>");
            const otherReadMoreButton<?php echo $i; ?> = document.getElementById("otherReadMoreButton<?php echo $i; ?>");
            const otherFullDescription<?php echo $i; ?> = document.getElementById("otherFullDescription<?php echo $i; ?>");
            const otherReadLessButton<?php echo $i; ?> = document.getElementById("otherReadLessButton<?php echo $i; ?>");

            otherReadMoreButton<?php echo $i; ?>.addEventListener("click", function() {
                otherDescription<?php echo $i; ?>.classList.remove("truncated");
                otherReadMoreButton<?php echo $i; ?>.style.display = "none";
                otherFullDescription<?php echo $i; ?>.style.display = "block";
                otherReadLessButton<?php echo $i; ?>.style.display = "inline";
            });

            otherReadLessButton<?php echo $i; ?>.addEventListener("click", function() {
                otherDescription<?php echo $i; ?>.classList.add("truncated");
                otherReadMoreButton<?php echo $i; ?>.style.display = "inline";
                otherFullDescription<?php echo $i; ?>.style.display = "none";
                otherReadLessButton<?php echo $i; ?>.style.display = "none";
            });
        <?php
        }
        ?>
    </script>


    <!-- Footer Start -->
    <!-- Footer content goes here -->
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
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <!-- Copyright content goes here -->
    </div>
    <!-- Copyright End -->

    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>