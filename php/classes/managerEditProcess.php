<?php
require './DbConnector.php';
require './persons.php';

use classes\DbConnector;
$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./managerlogin.php?error=2");
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

    $firstName = SanitizeInput($_POST["firstname"]);
    $lastName = SanitizeInput($_POST["lastname"]);
    $email = SanitizeInput($_POST["email"]);
    $phone = SanitizeInput($_POST["phone"]);
    $NIC = SanitizeInput($_POST["NIC"]);
    $managerID = $manager->getManagerid();
        // call EditManagerDetails function
    if($manager->EditManagerDetails($firstName, $lastName, $email, $NIC, $phone, $managerID)){
        header("Location: ../Manager.php");
        exit;
    } else {
        header("Location: ../Manager.php?error=1");
        exit;
    }

}
