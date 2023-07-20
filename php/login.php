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
    <link href="../css/login.css" rel="stylesheet">


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
                <a href="AboutUs.php" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="project.html" class="nav-item nav-link">Projects</a>
                <a href="../php/blog.php" class="nav-item nav-link">Blog</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>

        </div>
    </nav>
    <!-- Navbar End -->


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../images/web.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Sign in to your account by entering username and password.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="form-group first">
                                    <!-- <label for="username">Username</label> -->
                                    <input type="text" placeholder="Username" class="form-control" id="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <!-- <label for="password">Password</label> -->
                                    <input type="password" placeholder="password" class="form-control" id="password">
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto" style="padding-left: 120px;"><a href="#" class="forgot-pass">Forgot Password?</a></span>
                                </div>

                                <!-- <input type="submit" value="Login" class="btn btn-primary my-3 w-100"> -->

                               
                                    <button class="btn btn-primary my-3 w-100">
                                        login
                                    </button>
                               

                                <div class="mb-4" style="margin-top: 15px;">
                                    <p class="mb-4">Don't have an account yet? <a href="./register.php" style="color: #38761d;">Cick Here</a> to create one.</p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>



</html>