<?php
require_once './DbConnector.php';
require_once './persons.php';

use classes\DbConnector;

$dbcon = new DbConnector();
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

    $email = SanitizeInput($_POST["email"]);
 
    $password = SanitizeInput($_POST["password"]);

    if(Manager::LoginManager($email,$password)){
        header("Location: ../manager/managerProfile.php");
        exit;
    } else {
        header("Location: ../manager/managerlogin.php?error=1");
        exit;
    }
    
}

?>