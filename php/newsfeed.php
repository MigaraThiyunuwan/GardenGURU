<!DOCTYPE html>
<html class="no-js">
<?php
require_once './classes/persons.php';
session_start();
$user = null;
$manager = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} 
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} 
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GrdenGURU | Newsfeed</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main1.css">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>



</head>

<body>
<?php 

?>
<!-- navo -->
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

    

    <main>
        <section class="main-container-left">
            <h2>Top Stories</h2>
            <div class="container-top-left">
                <article>
                    <img src="../images/newsfeed/GettyImages-1318237749.webp">

                    <div>
                        <h3>AI-Powered Farming Tools Enhancing Productivity</h3>

                        <p>Artificial Intelligence (AI) continues to revolutionize the agricultural landscape with the introduction of AI-powered farming tools. From automated crop monitoring systems to drones equipped with AI algorithms for precision agriculture, these technologies are streamlining farming processes, optimizing resource usage, and maximizing yields.</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>
            </div>

            <div class="container-bottom-left">
                <article>
                    <img src="../images/newsfeed/csm_NRP_1551_d35b1af732.webp">
                    <div>
                        <h3>Global Seed Vault Celebrates Milestone</h3>
                        <p>The Svalbard Global Seed Vault, often referred to as the "Doomsday Vault," recently reached a remarkable milestone by storing its one-millionth seed sample. Located in the Arctic permafrost, the vault serves as a vital resource for preserving plant genetic diversity and safeguarding against potential food crises, climate-related disasters, and other threats to global agriculture.</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>

                <article>
                    <img src="../images/newsfeed/12-urban-ag.png">
                    <div>
                        <h3>Bioengineered Superplants Show Promising Results</h3>
                        <p>Scientists working on bioengineering projects have made significant strides in developing "superplants" that exhibit enhanced resilience to diseases, pests, and adverse environmental conditions. By incorporating desirable traits from various plant species, these bioengineered crops have demonstrated the potential to increase food security and sustainability, though they also raise ethical and ecological concerns.</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>
            </div>
        </section>

        <section class="main-container-right">
            <h2>Latest Stories</h2>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Vertical Farming Takes Off in Urban Centers</h2>

                    <p>Vertical farming, an innovative method of growing crops in stacked layers, is gaining momentum in urban centers worldwide. WithLimitedarable land in cities, vertical farms offer a solution to produce fresh, pesticide-free vegetables and herbs locally.</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="../images/newsfeed/vertical-farming-cities-dassault-systemes.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>New Legislation Promotes Pollinator-Friendly Farming Practices</h2>

                    <p>In response to the declining populations of bees and other pollinators, several countries have introduced legislation to promote pollinator-friendly farming practices. These measures encourage the use of native wildflowers as cover crops, reduced pesticide application, and the establishment of pollinator-friendly habitats on farmland.</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="../images/newsfeed/221017-bee-better-pollinator-certifications-farms-sustainability-pesticides-7-Doug-Crabtree-in-sunflower-crop_by-Jennifer-Hopwood-Xerces-Society.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Rise of AI-Powered Plant Identification Apps</h2>

                    <p>Plant identification apps powered by AI are becoming increasingly popular among gardening enthusiasts and nature lovers. These apps utilize machine learning algorithms to identify plant species from images taken with smartphones.</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="../images/newsfeed/PictureThis-identification.webp">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Organic Farming Receives Government Support</h2>

                    <p>Governments worldwide are providing increased support and incentives for organic farming practices. Recognizing the importance of sustainable agriculture, subsidies, grants, and educational programs are being introduced to encourage farmers to transition to organic methods.</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="../images/newsfeed/selecting-best-maize-variety.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Hybrid Varieties Show Promise in Climate-Resilient Farming</h2>

                    <p>With climate change posing challenges to traditional crop varieties, farmers are turning to hybrid plant breeds that exhibit greater resilience to extreme weather conditions. These climate-resilient hybrids have demonstrated improved tolerance to heat, drought, and flooding, offering hope for ensuring food security amidst changing climatic patterns.</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="../images/newsfeed/rice_plant.webp">
            </article>
        </section>
    </main>

    <!-- <footer>
             -->
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
    <script src="../js/script1.js" async defer></script>
</body>

</html>