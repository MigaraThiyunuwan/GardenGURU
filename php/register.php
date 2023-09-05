<?php
require './classes/DbConnector.php';
require_once './classes/persons.php';

use classes\DbConnector;

$dbcon = new DbConnector();

$emailerror = null;
$phoneerror = null;
$missMatchError = null;
$validPasswordError = null;
function validateAndSanitizeInput($input)
{
    // Remove leading and trailing whitespace
    $input = trim($input);

    // Remove backslashes
    $input = stripslashes($input);

    // Remove HTML tags
    $input = strip_tags($input);

    // Convert special characters to HTML entities (prevent XSS)
    $input = htmlspecialchars($input);

    return $input;
}

function validate_password($password) {
    // Check if the password length is at least 6 characters
    if (strlen($password) < 6) {
        return false;
    }

    // Check if the password contains at least one number
    if (!preg_match('/\d/', $password)) {
        return false;
    }

    // Check if the password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Check if the password contains at least one special character
    if (!preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\\-]/', $password)) {
        return false;
    }

    // If all conditions are met, the password is valid
    return true;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['gender']) && !empty($_POST['gender']) && isset($_POST['district']) && !empty($_POST['district']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirmation']) && !empty($_POST['passwordConfirmation'])) {
        $tempPass1 = $_POST["password"];
        $tempPass2 = $_POST["passwordConfirmation"];

        if (validate_password($tempPass1)){

            if ($tempPass1 == $tempPass2) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $gender = $_POST["gender"];
                $district = $_POST["district"];
                $address = $_POST["address"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $picture = "../images/profile_pictures/Default.png";
    
                $firstname = validateAndSanitizeInput($firstname);
                $lastname = validateAndSanitizeInput($lastname);
                $email = validateAndSanitizeInput($email);
                $phone = validateAndSanitizeInput($phone);
                $gender = validateAndSanitizeInput($gender);
                $district = validateAndSanitizeInput($district);
                $address = validateAndSanitizeInput($address);
    
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
                        if(is_numeric($phone)){
    
                            try {
                                $con = $dbcon->getConnection();
                                $query = "INSERT INTO users(user_FirstName, user_LastName, user_Email, user_PhoneNo, user_address, user_Password, user_District, user_Gender, profile_picture) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                $pstmt = $con->prepare($query);
                                $pstmt->bindValue(1, $firstname);
                                $pstmt->bindValue(2, $lastname);
                                $pstmt->bindValue(3, $email);
                                $pstmt->bindValue(4, $phone);
                                $pstmt->bindValue(5, $address);
                                $pstmt->bindValue(6, $password);
                                $pstmt->bindValue(7, $district);
                                $pstmt->bindValue(8, $gender);
                                $pstmt->bindValue(9, $picture);
                                $pstmt->execute();
                                if (($pstmt->rowCount()) > 0) {
            
                                    header("Location: ./login.php?success=1");
                                } else {
                                    echo "Error, try again.";
                                }
                            } catch (PDOException $exc) {
                                echo $exc->getMessage();
                            }
    
                        }else{
                            $phoneerror = "<b><div class='alert alert-danger py-2' role='alert'>
                            Please Enter Valied Phone Number!
                            </div></b>";
                        }   
                } else {
                    $emailerror = "<b><div class='alert alert-danger py-2' role='alert'>
                    Please Enter Valied Email!
                    </div></b>";
                }
            } else {
                $missMatchError = "<b><div class='alert alert-danger py-2' role='alert'>
                Password Missmatch!
                </div></b>";
                
            }
        } else{
            $validPasswordError = "<b><div class='alert alert-danger py-2' role='alert'>
            Password Must Contain, <br></b>
            <ul>
                <li>More than 6 characters</li>
                <li>At least one number</li>
                <li>At least one Upper Case character</li>
                <li>At least one Special Character</li>
            </ul>
            <b></div></b>";
        }

        


    } else {
        echo '<p style="color:red;" > <b>Please Fill all Fields.</b> </p>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GardenGURU | Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">


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
                <a href="./login.php" class="btn btn-success" style="height: 40px; margin-top: 20px; margin-right: 15px; border-radius: 10px;">Sign In</a>
                
            </div>

        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0" style="margin-right: 100px;">
                <img src="../images/web.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="row">

                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-at text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>

                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                        </div>
                        <!-- Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-envelope text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>

                            <input id="address" type="text" name="address" placeholder="Address" class="form-control bg-white border-md border-left-0 pl-3">
                        </div>.

                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa-solid fa-mars-and-venus text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #ccc; font-weight: bold;">Select Your Gender </a>
                            <select id="gender" name="gender" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>

                        <!-- distict-->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fas fa-map-marker-alt text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <a class="form-control bg-white border-left-0 border-md" style="color: #ccc; font-weight: bold;">Select Your District </a>
                            <select id="district" name="district" class="input-group-text bg-white px-4 border-md border-right-0">
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>

                            </select>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted" style="font-size: 25px;"></i>
                                </span>
                            </div>
                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <?php
                        if($emailerror !==  null){
                            echo $emailerror;
                        }
                        if($phoneerror !==  null){
                            echo $phoneerror;
                        }
                        if($missMatchError !==  null){
                            echo $missMatchError;
                        }
                        if($validPasswordError !== null){
                            echo $validPasswordError;
                        }
                        ?>

                        <!-- Submit Button -->
                        <input type="submit" value="Create New Account" class="btn btn-primary my-3 w-100">

                        <!-- Already Registered -->
                        <div class="text-center w-100" style="margin-top: 20px;">
                            <p class="text-muted font-weight-bold">Already Registered? <a href="./login.php" class="text-primary ml-2" style="color: chartreuse;"><b>Login</b></a></p>
                        </div>

                    </div>
                </form>





            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="../GardenGURU/code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>



</html>