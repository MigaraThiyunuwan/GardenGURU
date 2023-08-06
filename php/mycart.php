<!DOCTYPE html>
<html lang="en">
<?php 
     session_start();
    
      ?>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>GardenGURU</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/Selling.css" rel="stylesheet">

    <style>

.page-header { 
    background: linear-gradient(rgba(15, 66, 41, .6), rgba(15, 66, 41, .6)), url(../images/Selling/wall3.jpeg) center center no-repeat !important;
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
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" >
    
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Best Selling</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">Plants make people happy!</li>
                </ol>
        </div>
    </div>
    <!-- Page Header End -->
<!---
    <div class="container">
        <div class="row2">

            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>
                   MY CART
                </h1>

            </div>

            <div class="col-lg-8">
                <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">

    <?php
        if(isset($_SESSION['cart'])){
     foreach($_SESSION['cart'] as $key => $value){
        print_r($value);
        echo "<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

            ";
     }

    } 
    ?>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
    
  </tbody>
</table>
            </div>

        </div>
    </div>
---->

<div class="container">
    <div class="row2">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>MY CART</h1>
        </div>

        <div class="col-lg-9">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>

                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php
                       //$total=0;
                    if (isset($_SESSION['cart'])) {
                        $serialNo = 1;
                        foreach ($_SESSION['cart'] as $key => $value) {
                        $total=$total+$value['Price'];
                            echo "<tr>
                                    <td>{$serialNo}</td>
                                    <td>{$value['Item_Name']}</td>
                                    <td>{$value['Price']}<input type='hidden' class='iprice' value='{$value['Price']}'></td>

                                    <td><input class='text-center iquantity' name ='Mod_Quantity' onchange='this.form.submit()' type='number' value='$value[Quantity]' min='1' max='10'>
                                    </td>
                                     <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>
                                    <td class='itotal'></td>

                                    <td>
                                        <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>
                                    </td>
                                </tr>";
                            $serialNo++;
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="col-lg-3">
            <div class="border bg-light rounded p-4">
            <h4>Grand Total:</h4>
            <h5 class="text-right" id="gtotal"><?php echo $total ?></h5>
            <br>
            <?php 
             
             if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){

            



            ?>




            <form action="purchase.php" method="POST">

  <div class="form-group">
    <label>Full Name</label>
    <input type="full_name" name ="full_name" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="number"  name="phone_no" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="number" name="address" class="form-control" required >
  </div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Cash On Delivery
  </label>
</div>
<br>
                <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
            </form>

            <?php

             }
            ?>

        </div>

        </div>
    </div>
</div>






<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal'); // Use getElementById to select the grand total element

    function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
            gt = gt + (iprice[i].value) * (iquantity[i].value);
        }
        gtotal.innerText = gt; // Update the grand total element
    }

    for (i = 0; i < iquantity.length; i++) {
        iquantity[i].addEventListener('change', subTotal); // Add an event listener to update the total when the quantity changes
    }

    subTotal(); // Call the function once initially
</script>






















</body>

</html>