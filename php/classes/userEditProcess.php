
<?php
require './DbConnector.php';
require './persons.php';

use classes\DbConnector;

$dbcon = new DbConnector();
?>
<?php

session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./login.php?error=2");
    exit();
}
function SanitizeInput($input)
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ((isset($_POST["firstname"]) && !empty($_POST["firstname"])) && (isset($_POST["lastname"]) && !empty($_POST["lastname"])) && (isset($_POST["phone"]) && !empty($_POST["phone"])) && (isset($_POST["address"]) && !empty($_POST["address"]))) {

        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $userID = $user->getUserId();

        $firstName = SanitizeInput($firstName);
        $lastName = SanitizeInput($lastName);
        $email = SanitizeInput($email);
        $phone = SanitizeInput($phone);
        $address = SanitizeInput($address);

        // call EditUserDetails function in user class
        if ($user->EditUserDetails($firstName, $lastName, $email, $phone, $address, $userID)) {
            header("Location: ../user.php?success=2");
            exit;
        } else {
            header("Location: ../user.php?error=1");
            exit;
        }
    } else {
        header("Location: ../user.php?error=2");
        exit;
    }
}

?>