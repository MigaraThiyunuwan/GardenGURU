<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gardener - Gardening Website Template</title>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Plant Suggestions</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
        <span><b> <p style="color:Tomato;"> Note:-</p><p style="color:MediumSeaGreen;"> Here we suggest you plants for home gardening purpose only. (මෙහිදී අපි ඔබට පැල යෝජනා කරන්නේ ගෙවතු වගාව සඳහා පමණි )</p></b></span>
            <div class="container">
                <form action="#" method ="POST">
                    <div class="row">

                        <!-- Select Box 1 -->
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-location-dot fa-fade" style="color: #0b8952; font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #5b5b5b; font-weight: bold;">Select Location</a>
                            <select id="job" name="jobtitle" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">Badulla</option>
                                <option value="">Kahataruppa</option>
                                <option value="">Rambukpotha</option>
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
                            <select id="option1" name="option1" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">High</option>
                                <option value="">Medium</option>
                                <option value="">Low</option>
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
                            <select id="option2" name="option2" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">Reddish Brown Earths</option>
                                <option value="">Red Yellow Podzolic</option>
                                <!-- <option value="">Low Humic Gley</option> -->
                                <!-- <option value="">Mountain regosols</option> -->
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
                            <select id="job" name="jobtitle" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">Easy to found</option>
                                <option value="">Medium</option>
                                <option value="">Rare</option>
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
                            <select id="option1" name="option1" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">Limited</option>
                                <option value="">Average</option>
                                <option value="">Large</option>

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
                            <select id="option2" name="option2" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="">
                                < 2 months</option>
                                <option value="">2 to 6 months</option>
                                <option value="">6 to 12 months</option>
                                <option value="">> 12 months</option>
                            </select>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="input-group col">
                        <input type="submit" value="Find Plants" class="btn btn-primary my-3 w-100">
                    </div>
                </form>
                <span><b> <p style="color:MediumSeaGreen;">Reddish Brown Earths - </p>වැලි ලෝම සිට සැහැල්ලු මැටි ලෝම දක්වා මතුපිට පස් ඇති අතර එය මැටි යටි පසකට ඉහළින් පිහිටා ඇත.
                     මතුපිට පස් සෙන්ටිමීටර 10 ත් 40 ත් අතර ඝනකමකින් යුක්ත වන අතර රතු සිට අළු දුඹුරු දක්වා වෙනස් වේ. යටි පස කහ සිට රතු සිට අළු දක්වා වෙනස් වේ. <br><br>
                     <p style="color:MediumSeaGreen;">Red Yellow Podzolic -  </p>රතු සහ කහ පැහැති පාට සඳහා ප්රසිද්ධය. පාංශු මතුපිට සමහර ප්‍රදේශවල රතු හෝ තැඹිලි පාටින් ද තවත් ප්‍රදේශවල කහ පැහැයෙන්ද දිස් විය හැක.
                    </b></span>
            </div>




        </div>
    </div>


    <div class="container mt-2">

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="card card-block">

                    <img src="../images/suggesstions/carrot.jpg" alt="Photo of sunset">
                    <h5 class="card-title mt-3 mb-3" style="margin-left: 10px;">carrot</h5>
                    <p class="card-text" style="margin-left: 10px;">This plant is best suited for planting according to your situation.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-block">

                    <img src="../images/suggesstions/beans.jpg" alt="Photo of sunset">
                    <h5 class="card-title  mt-3 mb-3" style="margin-left: 10px;">Beans</h5>
                    <p class="card-text" style="margin-left: 10px;">This plant is best suited for planting according to your situation.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-block">

                    <img src="../images/suggesstions/tomato.jpeg" alt="Photo of sunset">
                    <h5 class="card-title  mt-3 mb-3" style="margin-left: 10px;">Tomato</h5>
                    <p class="card-text" style="margin-left: 10px;">This plant is best suited for planting according to your situation.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-block">

                    <img src="../images/suggesstions/mango.jpg" alt="Photo of sunset">
                    <h5 class="card-title  mt-3 mb-3" style="margin-left: 10px;">Mango</h5>
                    <p class="card-text" style="margin-left: 10px;">This plant is best suited for planting according to your situation.</p>
                </div>
            </div>
            
        </div>

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

    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>

</body>



</html>