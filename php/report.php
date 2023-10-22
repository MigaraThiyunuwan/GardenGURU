<!DOCTYPE html>
<html lang="en">
<?php
require_once './classes/persons.php';
require_once './classes/report.php';
require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    <title>GardenGURU | Reports</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/report.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>
        .page-header {
            background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/AboutUs/header_img.jpg) center center no-repeat !important;
            background-size: cover !important;
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

        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">

        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Reports</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">Nurture Your Green Thumb with Us!</li>
            </ol>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
        <div class="Reportrow">
            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-user" style="font-size:50px;"></i></p>
                    <h3><?php echo Report::RegisteredUsers() ?>+</h3>
                    <p>Registered Users</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-check" style="font-size:50px;"></i></p>
                    <h3><?php echo Report::totalOrders() ?>+</h3>
                    <p>Orders</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-smile-beam" style="font-size:50px;"></i></p>
                    <h3><?php echo Report::happyCustomers() ?>+</h3>
                    <p>Happy Customers</p>
                </div>
            </div>

            <div class="Reportcolumn">
                <div class="Reportcard">
                    <p><i class="fa fa-shopping-bag" style="font-size:50px;"></i></p>
                    <h3><?php echo Report::availableItems() ?>+</h3>
                    <p>Available Items</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <p style="margin-top: 50px;"><b>Gender Diversity: A Visual Snapshot of Our Registered Users</b></p>
                <div id="myChart1" style="width:100%; max-width:600px; height:500px;">
                </div>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                            ['Gender', 'Count'],
                            ['Male', <?php echo Report::maleUserPercentage() ?>],
                            ['Female', <?php echo Report::femaleUserPercentage() ?>],

                        ]);

                        const options = {
                            title: '',
                            colors: ['#378a13', '#78d278'] 
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('myChart1'));
                        chart.draw(data, options);
                    }
                </script>

                <!-- <div id="bar-example-4" style=" margin-left: 0px;">
                    <table class="charts-css bar show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <th scope="row">Male <br><?php echo Report::maleUserPercentage() ?>% </th>
                                <?php
                                $maleValue = ((1.2 * Report::maleUserPercentage()) / 100)
                                ?>
                                <td style="--size: <?php echo $maleValue ?>; --color: #378a13; margin-bottom: 5px"></td>
                            </tr>
                            <tr>
                                <th scope="row">Female <br> <?php echo Report::femaleUserPercentage() ?>%</th>
                                <?php
                                $femaleValue = ((1.2 * Report::femaleUserPercentage()) / 100)
                                ?>
                                <td style="--size: <?php echo $femaleValue ?>; --color: #baffc9;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>

            <div class="col-md-6">
                <p style="margin-top: 50px;"><b>Gender Diversity: A Visual Snapshot of Recieved Orders</b></p>
                <div id="myChart2" style="width:100%; max-width:600px; height:500px;">
                </div>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        const data = google.visualization.arrayToDataTable([
                            ['Gender', 'Count'],
                            ['Male', <?php echo Report::maleOrderPercentage() ?>],
                            ['Female', <?php echo Report::femaleOrderPercentage() ?>],

                        ]);

                        const options = {
                            title: '',
                            colors: ['#378a13', '#78d278'] 
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('myChart2'));
                        chart.draw(data, options);
                    }
                </script>

                <!-- <div id="bar-example-4" style=" margin-right: 0px;">
                    <table class="charts-css bar show-labels reverse data-spacing-10">

                        <tbody>
                            <tr>
                                <th scope="row">Male <br><?php echo Report::maleOrderPercentage() ?>% </th>
                                <?php
                                $maleOrderValue = ((1.2 * Report::maleOrderPercentage()) / 100)
                                ?>
                                <td style="--size: <?php echo $maleOrderValue ?>; margin-bottom: 5px"></td>
                            </tr>
                            <tr>
                                <th scope="row">Female <br><?php echo Report::femaleOrderPercentage() ?>%</th>
                                <?php
                                $femaleOrderValue = ((1.2 * Report::femaleOrderPercentage()) / 100)
                                ?>
                                <td style="--size: <?php echo $femaleOrderValue ?>;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>


        </div>

        <div class="row">
            <div class="row" style="text-align: center;">
                <p style="margin-top: 50px;"><b>District Diversity: A Visual Snapshot of Registered Users</b></p>
            </div>

            <div class="col-md-4">
                <div id="column-example-4">
                    <table class="charts-css column show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Ampara")) / 100)
                                ?>
                                <th scope="row">1</th>
                                <td style="--size: <?php echo $value ?>;"> </td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Anuradhapura")) / 100)
                                ?>
                                <th scope="row">2</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Badulla")) / 100)
                                ?>
                                <th scope="row">3</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Batticaloa")) / 100)
                                ?>
                                <th scope="row">4</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Colombo")) / 100)
                                ?>
                                <th scope="row">5</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div id="column-example-4">
                    <table class="charts-css column show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Galle")) / 100)
                                ?>
                                <th scope="row">6</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Gampaha")) / 100)
                                ?>
                                <th scope="row">7</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Hambantota")) / 100)
                                ?>
                                <th scope="row">8</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Jaffna")) / 100)
                                ?>
                                <th scope="row">9</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Kalutara")) / 100)
                                ?>
                                <th scope="row">10</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div id="column-example-4">
                    <table class="charts-css column show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Kandy")) / 100)
                                ?>
                                <th scope="row">11</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Galle")) / 100)
                                ?>
                                <th scope="row">12</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Kilinochchi")) / 100)
                                ?>
                                <th scope="row">13</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Kurunegala")) / 100)
                                ?>
                                <th scope="row">14</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Mannar")) / 100)
                                ?>
                                <th scope="row">15</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4">
                <div id="column-example-4">
                    <table class="charts-css column show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Matale")) / 100)
                                ?>
                                <th scope="row">16</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Matara")) / 100)
                                ?>
                                <th scope="row">17</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Monaragala")) / 100)
                                ?>
                                <th scope="row">18</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Mullaitivu")) / 100)
                                ?>
                                <th scope="row">19</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Nuwara Eliya")) / 100)
                                ?>
                                <th scope="row">20</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div id="column-example-4">
                    <table class="charts-css column show-labels data-spacing-10">

                        <tbody>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Polonnaruwa")) / 100)
                                ?>
                                <th scope="row">21</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Puttalam")) / 100)
                                ?>
                                <th scope="row">22</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Ratnapura")) / 100)
                                ?>
                                <th scope="row">23</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Trincomalee")) / 100)
                                ?>
                                <th scope="row">24</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>
                            <tr>
                                <?php
                                $value = ((1 * Report::districtUserPercentage("Vavuniya")) / 100)
                                ?>
                                <th scope="row">25</th>
                                <td style="--size: <?php echo $value ?>;"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 10px;">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <p>
                                <b>
                                    <ol style="font-size: 14px;">
                                        <li>Ampara</li>
                                        <li>A'pura</li>
                                        <li>Badulla</li>
                                        <li>Batticaloa</li>
                                        <li>Colombo</li>
                                        <li>Galle</li>
                                        <li>Gampaha</li>
                                        <li>Ham'tota</li>
                                    </ol>
                                </b>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <p>
                                <b>
                                    <ol start="9" style="font-size: 14px;">

                                        <li>Jaffna</li>
                                        <li>Kalutara</li>
                                        <li>Kandy</li>
                                        <li>Kegalle</li>
                                        <li>K'nochchi</li>
                                        <li>Ku'gala</li>
                                        <li>Mannar</li>
                                        <li>Matale</li>
                                    </ol>
                                </b>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <p>
                                <b>
                                    <ol start="17" style="font-size: 14px;">

                                        <li>Matara</li>
                                        <li>Mo'gala</li>
                                        <li>Mullaitivu</li>
                                        <li>N' Eliya</li>
                                        <li>P'naruwa</li>
                                        <li>Puttalam</li>
                                        <li>Ratnapura</li>
                                        <li>Trincomalee</li>
                                        <li>Vavuniya</li>
                                    </ol>
                                </b>
                            </p>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <!-- ///////////////////////////////////////////////////////////////////////////////////// -->
        <div class="row" style="margin-top: 50px;">

            <?php
            try {
                $con = $dbcon->getConnection();

                // Pagination logic
                $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
                $rows_per_page = 10;

                $query = "SELECT * FROM shop LIMIT $start, $rows_per_page";
                $pstmt = $con->prepare($query);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($rs as $item) {

            ?>

                    <div class="col-xs-12 col-md-4 bootstrap snippets bootdeys">

                        <!-- product -->
                        <div class="product-content product-wrap clearfix">
                            <div class="row">
                                <!-- <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="product-image">
                                        <img src="<?php echo $item->ItemImage;  ?>" class="img-responsive" style="height: 250px; ">
                                    </div>
                                </div> -->
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="product-deatil" style="margin-left: 10px;">
                                        <h5 class="name">
                                            <a>
                                                <h4><?php echo $item->ItemName;  ?></h4>
                                            </a>
                                        </h5>
                                        <p class="price-container">
                                            <span> <?php echo "Rs." . $item->ItemPrice . ".00" ?> </span>
                                        </p>
                                        <span class="tag1"></span>
                                    </div>
                                    <div class="description" style="margin-left: 10px;">
                                        <?php if ($item->ItemQuantity > 0) {
                                        ?>
                                            <p><b><?php echo $item->ItemQuantity; ?> Items Availabe.</b></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="color: red;"><b>No Items Availabe.</b></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="product-info smart-form">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">

                                                <a href="./mycart.php">
                                                    <div class="icon-container">

                                                        <i class="fa fa-shopping-cart cart-icon" style="position: absolute; top: 10px; right: 10px; font-size: 24px; margin: 10px;"></i> <!-- Font Awesome icon -->
                                                    </div>
                                                </a>


                                                <form action="./processes/manageCart.php" method="POST">

                                                    <!-- <a href="javascript:void(0);" class="btn btn-success">Add to cart</a> -->
                                                    <input type="hidden" name="Item_Name" value="<?php echo $item->ItemName; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $item->ItemPrice; ?>">
                                                    <input type="hidden" name="ItemId" value="<?php echo $item->ItemId; ?>">

                                                    <?php
                                                    if ($item->ItemQuantity < 1) {
                                                    ?>
                                                        <button type="submit" class="btn btn-success" name="Add_To_Cart" disabled>Add to Cart</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button type="submit" class="btn btn-success" name="Add_To_Cart">Add to Cart</button>
                                                    <?php
                                                    }
                                                    ?>

                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">

                                                <?php if ($item->ItemQuantity < 1) {
                                                ?>

                                                    <b>
                                                        <div style="color: red;" role='alert'>
                                                            Out of Stock!
                                                        </div>
                                                    </b>

                                                <?php
                                                }
                                                ?>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end product -->
                    </div>

            <?php
                }

                if (!isset($total_rows)) {
                    $total_rows_query = "SELECT COUNT(*) as total FROM shop";
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
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>



</body>



</html>