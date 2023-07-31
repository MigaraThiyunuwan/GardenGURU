<?php
require './classes/DbConnector.php';

require './classes/persons.php';

use classes\DbConnector;
use classes\Manager;

$dbcon = new DbConnector();
?>


<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>GardenGURU | Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <?php

    ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index-2.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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



    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../images/manager.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>Hello! Manager</h4><br>
                                <button class="btn btn-primary">LogOut</button>
                                <a class="btn btn-outline-primary " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                <button class="btn btn-danger">Change Password</button>
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
                                    <h6 class="mb-0">Manager Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Subash Ariyadasa
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Manager Id</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Manager_001
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">E-mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Manager01@uwu.ac.lk
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    0716535687
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>


        <div class="container-fluid"><br>
            <h3 class="text-dark mb-4">User Details</h3><br>
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $con = $dbcon->getConnection();

                                    // Pagination logic
                                    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                                    $rows_per_page = 5;

                                    $query = "SELECT * FROM users LIMIT $start, $rows_per_page";
                                    $pstmt = $con->prepare($query);
                                    $pstmt->execute();
                                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                                    foreach ($rs as $users) {
                                        // Display user details as before
                                ?>

                                        <tr>
                                            <td><?php echo "U-" . $users->user_id; ?></td>
                                            <td><?php echo $users->user_FirstName; ?></td>
                                            <td><?php echo $users->user_LastName; ?></td>
                                            <td><?php echo $users->user_Email; ?></td>
                                            <td><?php echo $users->user_PhoneNo; ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>">
                                                    <?php
                                                    
                                                    $user_id = $_POST["user_id"];
                                                    $oobj = new Manager();
                                                    $oobj->deleteUser($user_id);
                                                    
                                                    ?>
                                                    <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                                                    <a class="btn btn-success" href="user.php?user_id=<?php echo $users->user_id; ?>">View</a>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                <?php
                                    }
                                    // Calculate the total number of rows in the 'users' table (if not already calculated)
                                    if (!isset($total_rows)) {
                                        $total_rows_query = "SELECT COUNT(*) as total FROM users";
                                        $total_rows_stmt = $con->prepare($total_rows_query);
                                        $total_rows_stmt->execute();
                                        $total_rows_result = $total_rows_stmt->fetch(PDO::FETCH_ASSOC);
                                        $total_rows = $total_rows_result['total'];
                                    }

                                    // Calculate the total number of pages
                                    $pages = ceil($total_rows / $rows_per_page);
                                } catch (PDOException $exc) {
                                    echo $exc->getMessage();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                Showing <?php echo min($total_rows, $start + 1) . ' to ' . min($total_rows, $start + $rows_per_page); ?> of <?php echo $total_rows; ?>
                            </p>
                        </div>

                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <?php
                                    if ($start > 0) {
                                        echo '<li class="page-item"><a class="page-link" href="?start=' . ($start - $rows_per_page) . '">Previous</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                                    }

                                    for ($i = 1; $i <= $pages; $i++) {
                                        echo '<li class="page-item' . (($start / $rows_per_page + 1) == $i ? ' active' : '') . '"><a class="page-link" href="?start=' . (($i - 1) * $rows_per_page) . '">' . $i . '</a></li>';
                                    }

                                    if ($start < ($pages - 1) * $rows_per_page) {
                                        echo '<li class="page-item"><a class="page-link" href="?start=' . ($start + $rows_per_page) . '">Next</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <br>

    <div class="container"><br>
        <h3 class="text-dark mb-4">News Feed</h3><br>
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>NewsFeed ID</th>
                                    <th>NewsFeed Name</th>
                                    <th>Author</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>N001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>
                                        <?php echo '<button class="btn btn-success" type="submit" name="edit">Edit</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>N002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>
                                        <?php echo '<button class="btn btn-success" type="submit" name="edit">Edit</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>N003</td>
                                    <td>Plant Exebition</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>
                                        <?php echo '<button class="btn btn-success" type="submit" name="edit">Edit</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>N004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>
                                        <?php echo '<button class="btn btn-success" type="submit" name="edit">Edit</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>N005</td>
                                    <td>Vertical Farming</td>
                                    <td>Adithya Jayakodi</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>
                                        <?php echo '<button class="btn btn-success" type="submit" name="edit">Edit</button>'; ?>

                                    </td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 05 of 20</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <br>



    <div class="container"><br>
        <h3 class="text-dark mb-4">Advertiesments</h3><br><br>

        </br>
        </br>


        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Advertiesment ID</th>
                                    <th>Advertiesment Name</th>
                                    <th>Author</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ad001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad003</td>
                                    <td>Plant Exebition</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad005</td>
                                    <td>Vertical Farming</td>
                                    <td>Adithya Jayakodi</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 05 of 20</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <br>






    <div class="container"><br>
        <h3 class="text-dark mb-4">Manage Blog</h3><br><br>

        </br>
        </br>


        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Blog ID</th>
                                    <th>Blog Name</th>
                                    <th>Author</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bl001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl003</td>
                                    <td>Plant Exebition</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl005</td>
                                    <td>Vertical Farming</td>
                                    <td>Adithya Jayakodi</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 05 of 20</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

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