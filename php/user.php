<!DOCTYPE html>
<html lang="en">

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

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <title>Gardener - Gardening Website Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/popup.css" rel="stylesheet">
  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <?php

  ?>
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

    </div>
  </nav>
  <!-- Navbar End -->



  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>Hello! <?php echo $user->getFirstName() ?></h4><br>

                <a class="btn btn-outline-primary " target="" href="./classes/logout.php">Log Out</a>
                <a class="btn btn-outline-primary " target="" href="./editUser.php">Edit</a>
                <a class="btn btn-outline-danger " target="" href="#">Change Password</a>
                <!-- <button class="btn btn-danger">Change Password</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">


              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getFirstName() . " " . $user->getLastName(); ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getEmail() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getPhoneNo() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">District</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getDistrict() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getAddress() ?>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>

    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == 1) {
        echo "<b><p style='color: red;'> Cannot Update Your Details !</p></b>";
      }
    } ?>

    <div class="row mb-5">
      <div class="col-md-8 col-xl-6 text-center mx-auto">
        <h2 class="display-6 fw-bold mb-4">Check out <span class="underline">amazing plans</span> for your profile</h2>
        <p class="text-muted">Now you can publish advertiesments , post Questions ,buy plants through our website</p>
      </div>
    </div>
    
    
   
  



  <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <!-- <i class="fa fa-leaf" aria-hidden="true"></i> -->
                                <i class="fa fa-newspaper-o fa-2xl" style="color: #256a4f;"></i>
                                <!-- <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon"> -->
                            </div>
                            <h4 class="mb-3">Advertiesments</h4>
                            <p class="mb-4">Now you can put advertiesments to our website.</p>
                            <a class="btn btn-sm" id="popbutton" href="#"><i class="fa fa-plus text-primary me-2"></i>Click here</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-question-circle fa-2xl" style="color: #256a4f;"></i>
                            </div>
                            <h4 class="mb-3">Ask Question</h4>
                            <p class="mb-4">Click the button to get answer from our agriculture consultants.</p>
                            <a class="btn btn-sm" href="comForum.php"><i class="fa fa-plus text-primary me-2"></i>Click here</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="../images/web.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <i class="fa-solid fa-shopping-cart fa-2xl" style="color: #256a4f;"></i>
                            </div>
                            <h4 class="mb-3">Buy Plants</h4>
                            <p class="mb-4">Click the button for buy plants and gardening supplies.</p>
                            <a class="btn btn-sm" href="Selling.php"><i class="fa fa-plus text-primary me-2"></i>Click here</a>
                        </div>
                    </div>
                </div>
  </div>
  </div>


   <!-- popupr Start -->


<!-- Modal Section -->

<div class="bg-modal">
	<div class="modal-contents">

		<div class="close">+</div>
	

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" values="$name">
        <input type="email" name="email" placeholder="E-Mail" values="$email">
        <label for="image1">Select Image for Advertisement:</label>
        <input type="file" name="image1" id="image1" values="$filename1">
        <label for="image2">Select Image for Advertisement Description:</label>
        <input type="file" name="image2" id="image2">
        <input type="submit" name="submit" value="Submit" values="$filename2">
    </form>

  

	</div>
</div>





 <!-- popupr Stop -->




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
    <script src="../js/popup.js"></script>
</body>