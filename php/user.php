<!DOCTYPE html>
<html lang="en">

<?php
require_once './classes/persons.php';
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
  <title>GardenGURU | Profile</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/0008de2df6.js" crossorigin="anonymous"></script>
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/popup.css" rel="stylesheet">


  <style>
    /* Style for the blog popup modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 60%;
    }

    /* Style for the close button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
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
        <a href="./classes/logout.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Log Out</a>

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
              <img src="<?php echo $user->getPropic() ?>" alt="Admin" class="rounded-circle" width="150" height="150">
              <div class="mt-3">
                <h4>Hello! <?php echo $user->getFirstName() ?></h4><br>

                <a class="btn btn-outline-primary " target="" href="./classes/logout.php">Log Out</a>
                <a class="btn btn-outline-primary " target="" href="./editUser.php">Edit</a>
                <a class="btn btn-outline-danger " target="" href="#">Change Password </a>
                <?php
                if (isset($_GET['success'])) {
                  if ($_GET['success'] == 1) {

                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    Blog Uploaded Successfully!
                    </div></b>";
                  }
                  if ($_GET['success'] == 0) {

                    echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Blog Posting Failed!
                    </div></b>";
                  }
                  if ($_GET['success'] == 2) {

                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    User details updated suceessfully!
                    </div></b>";
                  }
                  if ($_GET['success'] == 3) {

                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    Advertiesement Posted Successfully!
                    </div></b>";
                  }
                  if ($_GET['success'] == 4) {

                    echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Advertiesement Posting Failed!
                    </div></b>";
                  }
                  if ($_GET['success'] == 6) {

                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    Picture Upoload Successfully!
                    </div></b>";
                  }
                }
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == 1) {
                    echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Update User Details Failed!
                    </div></b>";
                  }
                  if ($_GET['error'] == 2) {
                    echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                    Please fill all fields!
                    </div></b>";
                  }
                }
                ?>

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
                  <h6 class="mb-0"><b>Full Name</b></h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getFirstName() . " " . $user->getLastName(); ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0"><b>Email</b></h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getEmail() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0"><b>Phone</b></h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getPhoneNo() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0"><b>District</b></h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getDistrict() ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0"><b>Address</b></h6>
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
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item rounded d-flex h-100">
          <div class="service-img rounded">
            <img class="img-fluid" src="../images/web.png" alt="">
          </div>
          <div class="service-text rounded p-5">
            <div class="btn-square rounded-circle mx-auto mb-3">
              <i class="fa-solid fa-shopping-cart fa-2xl" style="color: #256a4f;"></i>
            </div>
            <h4 class="mb-3">Add Blog</h4>
            <p class="mb-4">Click the button for Add your post to blog page.</p>
            <a class="btn btn-sm" id="addBlogButton" href="#"><i class="fa fa-plus text-primary me-2"></i>Click here</a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- The modal -->
  <div id="addBlogModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="./add_blog.php" method="post" enctype="multipart/form-data">
        <label for="blog_title"><b>Blog Title:</b></label>
        <input type="text" class="form-control" id="blog_title" name="blog_title" required>
        <br>
        <!-- <label for="blog_details">Blog Details:</label>
            <textarea id="blog_details" name="blog_details" required></textarea> -->
       
          <!-- <span class="input-group-text"><b>Blog Details:</b></span> -->
          <label for="blog_title"><b>Blog Details:</b></label>
          <textarea class="form-control" name="blog_details" aria-label="With textarea" required></textarea>
       
        <br>
        <label for="blog_image"><b>Blog Image:</b></label>
        <input type="file" class="form-control" id="blog_image" name="blog_image" accept="image/*" required>
        <input type="hidden" id="ufname" name="ufname" value="<?php echo $user->getFirstName() ?>">
        <input type="hidden" id="ulname" name="ulname" value="<?php echo $user->getLastName() ?>">
        <br>
        <div style="display: flex; flex-direction: column; align-items: center;">
        <button class="btn btn-success" type="submit">Add Blog</button>

        </div>
        
      </form>
    </div>
  </div>


  <script src="your_js_script.js"></script>
  <!-- popupr Start -->


  <script>
    // Get the modal
    var modal = document.getElementById("addBlogModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addBlogButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

  <!-- Modal Section -->

  <div class="bg-modal">
    <div class="modal-contents ">

    <div class="close" id="close-button">+</div>


      <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- <input type="text" name="name" placeholder="Name" values="$name">
        <input type="email" name="email" placeholder="E-Mail" values="$email"> -->
        <label for="image1"><b>Select Image for Advertisement:</b></label>
        <input type="file" class="form-control" name="image1" id="image1" values="$filename1">
        <label for="text_title"><br><b>Add title for the Advertisement:</b></label>
        <input type="text" class="form-control"  name="text_title" id="text_title">
        <!-- <label for="image2">Select Image for Advertisement Description:</label>
        <input type="file" name="image2" id="image2">-->
        <label for="text_description"><br><b>Enter Your Description:</b></label>
        <textarea name="text_description" class="form-control" id="text_description" rows="5" cols="40"></textarea>
        <input type="hidden" name="submit" value="Put Advertisement" values="$filename2">
        <button type="submit" style="margin-top: 15px;" class="btn btn-success">Put Advertisement</button>
      </form>



    </div>
  </div>

  <script>
  // JavaScript to handle the close button functionality
  const closeButton = document.getElementById('close-button');
  const modalContents = document.querySelector('.modal-contents');
  const bgModal = document.querySelector('.bg-modal');

  closeButton.addEventListener('click', () => {
    modalContents.style.display = 'none';
    bgModal.style.display = 'none';
  });
</script>





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