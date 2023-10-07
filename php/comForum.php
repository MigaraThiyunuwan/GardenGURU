<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GardenGURU | Communication Forum</title>
    <!-- <link href="../css/main2.css" rel="stylesheet" > -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/comForum.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
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
                        <a href="./report.php" class="dropdown-item">Reporting</a>
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
                    <a href="./manager/managerProfile.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">My Pofile</a>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Communication forum</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container bootdey">
        <div class="col-md-12 bootstrap snippets">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <div class="panel">
                    <div class="panel-body">
                        <form action="./processes/comForumProcess.php" method="POST">
                            <?php $currentDate = date('Y-m-d'); ?>
                            <textarea class="form-control" name="question" rows="2" placeholder="Ask a Question?"></textarea>
                            <input type="hidden" name="date" value="<?php echo $currentDate ?>">
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-primary pull-right" name="ask_question" type="submit"> <i class="fa fa-pencil fa-fw"></i> Post </button>
                                <!-- <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                                <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                                <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a> -->
                            </div>
                        </form>
                    </div>
                    <?php
                if (isset($_GET['success'])) {
                  if ($_GET['success'] == 1) {

                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                    You asked question Successfully!
                    </div></b>";
                  }
                }
                ?>
                </div>
            <?php
            }
            ?>
            <div class="panel">
                <div class="panel-body">
                    <!-- Newsfeed Content -->
                    <!--===================================================-->
                    <div class="media-block">
                        <a class="media-left " href="#"><img class="rounded-circle me-2 " style="width: 50px; height: 50px; object-fit: cover" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>

                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">Lisa D.</a>
                                <p class="text-muted text-sm"><i class="fa fa-regular fa-clock"></i> 28 May 2023</p>
                            </div>

                            <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <div class="pad-ver">
                                <!-- <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a> -->
                                <button class="btn btn-outline-success"><span class="toggle-comments"><i class="fa fa-reply"></i> reply</span></button>
                            </div>
                            <hr>

                            <!-- Comments -->
                            <div class="comments" style="display: none;">



                                <div class="media-block">
                                    <a class="media-left" href="#"><img class="rounded-circle me-2 " style="width: 50px; height: 50px; object-fit: cover" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
                                            <p class="text-muted text-sm"><i class="fa fa-regular fa-clock"></i> 29 May 2023</p>
                                        </div>
                                        <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                                        <!-- <div class="pad-ver">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i class="fa fa-thumbs-up"></i> You Like it</a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                        </div> -->
                                        <hr>
                                    </div>
                                </div>


                                <?php
                                if (isset($_SESSION["user"])) {
                                ?>
                                    <div class="panel-body">
                                        <textarea class="form-control" rows="2" placeholder="Answer to question"></textarea>
                                        <div class="mar-top clearfix">
                                            <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Reply </button>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>


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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-comments").click(function() {
                $(this).closest(".media-block").find(".comments").toggle();
            });
        });
    </script>
    <script src="../js/script2.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>


</body>

</html>