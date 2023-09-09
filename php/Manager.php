<?php
require_once './classes/DbConnector.php';
require_once './classes/persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {

    header("Location: ./managerlogin.php?error=2");
    exit();
}
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
                            <img src="../images/manager.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>Hello <?php echo $manager->getFirstName() . " " . $manager->getLastName(); ?> !</h4><br>
                                <a class="btn btn-outline-primary " target="" href="./classes/logout.php">Log Out</a>
                                <a class="btn btn-outline-primary " target="" href="./editManager.php">Edit</a>
                                <button class="btn btn-outline-danger">Change Password</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Manager Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getFirstName() . " " . $manager->getLastName(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">E-mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getEmail(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getManagerPhoneNo(); ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NIC</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?Php echo $manager->getManagerNIC(); ?>
                                </div>
                            </div>
                            <?php

                            if (isset($_GET['success'])) {
                                echo "<hr>";
                                if ($_GET['success'] == 1) {

                                    echo "<b><div class='alert alert-success py-2' style='margin-top: 10px;' role='alert'>
                                                User Deleted Successfully!
                                                </div></b>";
                                }
                            }

                            if (isset($_GET['error'])) {
                                echo "<hr>";
                                if ($_GET['error'] == 1) {

                                    echo "<b><div class='alert alert-danger py-2' style='margin-top: 10px;' role='alert'>
                                                User Deleting Failed!
                                                </div></b>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="container-fluid"><br>
                <br>
                <h3 class="text-dark mb-4">User Details</h3>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th> First Name</th>
                                        <th> Last Name</th>
                                        <th> E-mail</th>
                                        <th> Phone Number</th>
                                        <th> Action</th>
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
                                                    <button type="button" class="btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodel<?php echo $users->user_id ?>">Delete </button>
                                                    <!-- <button class="btn btn-success" type="submit" name="action" value="view">View</button> -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewmodal<?php echo $users->user_id ?>">View</button>
                                                </td>
                                            </tr>

                                            <div class="modal fade shadow my-5" id="deletemodel<?php echo $users->user_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content" style="background-color: white;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to Delete User
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="d-flex justify-content-between p-2">

                                                                <div class="d-flex">
                                                                    <p class="fw-bold me-2">
                                                                        Are you sure to delete user "<?php echo $users->user_FirstName . " " . $users->user_LastName ?>" from the system?
                                                                    </p>

                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="row w-100">
                                                                    <div class="col-md-6">
                                                                        <form action='./classes/managerProcess.php' method='POST'>
                                                                            <input type='hidden' name='UserID' value='<?php echo $users->user_id ?>'>

                                                                            <button class="btn btn-danger w-100 " type="submit" data-bs-dismiss="modal" aria-label="Close">Confirm</button>

                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <button class="btn btn-success w-100" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade shadow my-5" id="viewmodal<?php echo $users->user_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content" style="background-color: white;">

                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">You are viewing <?php echo $users->user_FirstName ?>'s details</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-4">

                                                                    <div class=" d-flex flex-column align-items-center justify-content-cente ">

                                                                        <dvi class="p-3 ">
                                                                            <img src="<?php echo $users->profile_picture ?>" alt="avatar" class="rounded-circle me-2 " style="width: 150px; height: 150px; object-fit: cover" />
                                                                        </dvi>
                                                                        <!--name-->
                                                                        <h3 class="text-center m-0">
                                                                            <?php echo $users->user_FirstName ?>
                                                                        </h3>
                                                                        <!--conatact details-->
                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                            <i class="fa fa-envelope fs-7 me-1 mb-3 "></i>
                                                                            <p class="">
                                                                                <?php echo $users->user_Email ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="px-2">

                                                                        <div class="d-flex justify-content-between">
                                                                            <p class="fw-bold m-0">District</p>
                                                                            <p class="ms-3 m-0">
                                                                                <?php echo $users->user_District ?>
                                                                            </p>
                                                                        </div>

                                                                        <div class="d-flex justify-content-between">
                                                                            <p class="fw-bold m-0">Gender</p>
                                                                            <p class="ms-3 m-0">
                                                                                <?php echo $users->user_Gender ?>
                                                                            </p>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <div class="col-8">


                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Full Name</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $users->user_FirstName . " " . $users->user_LastName ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Email</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $users->user_Email ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Phone</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $users->user_PhoneNo ?>
                                                                        </p>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="d-flex flex-column ">
                                                                        <h5>Address</h5>
                                                                        <p class="m-0">
                                                                            <?php echo $users->user_address ?>
                                                                        </p>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-evenly">
                                                            <button type="button" class="btn btn-outline-success w-100" data-bs-dismiss="modal" aria-label="Close">Ok</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


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
        <br>
        <h3 class="text-dark mb-4">News Feed</h3>
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>News ID</th>
                                    <th>NewsFeed Name</th>
                                    <th>Posted Date</th>
                                    <th>Posted by</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>N001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>23 May 2023</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>N002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>23 May 2023</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>N003</td>
                                    <td>Plant Exebition</td>
                                    <td>23 May 2023</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>N004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>23 May 2023</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>N005</td>
                                    <td>Vertical Farming</td>
                                    <td>23 May 2023</td>
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
        <br>
        <h3 class="text-dark mb-4">Advertiesments</h3>


        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Advertiesment ID</th>
                                    <th>Advertiesment Name</th>
                                    <th>Posted Date</th>
                                    <th>Posted by</th>
                                    <th>Delete</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ad001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>2023-09-09</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>2023-09-09</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad003</td>
                                    <td>Plant Exebition</td>
                                    <td>2023-09-09</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>2023-09-09</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Ad005</td>
                                    <td>Vertical Farming</td>
                                    <td>2023-09-09</td>
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
        <br>
        <h3 class="text-dark mb-4">Manage Blog</h3>



        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Blog ID</th>
                                    <th>Blog Name</th>
                                    <th>Posted Date</th>
                                    <th>Author</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bl001</td>
                                    <td>Indoor Plant Trends</td>
                                    <td>2023-09-09</td>
                                    <td>Kamal Edirisinghe</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl002</td>
                                    <td>Innovative Soil Regeneration</td>
                                    <td>2023-09-09</td>
                                    <td>D.B.Senevirathne</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl003</td>
                                    <td>Plant Exebition</td>
                                    <td>2023-09-09</td>
                                    <td>Victor Malinda</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>

                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl004</td>
                                    <td>Bio Securuty Measures</td>
                                    <td>2023-09-09</td>
                                    <td>Gamini Perera</td>

                                    <td>
                                        <?php echo '<button class="btn btn-danger" type="submit" name="delete">Delete</button>'; ?>


                                    </td>
                                <tr>
                                <tr>
                                    <td>Bl005</td>
                                    <td>Vertical Farming</td>
                                    <td>2023-09-09</td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>