<?php
require_once './DbConnector.php';
require_once './persons.php';
require_once './Security.php';
use classes\DbConnector;

$dbcon = new DbConnector();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = Security::SanitizeInput(($_POST["email"]));

    $password = Security::SanitizeInput(($_POST["password"]));

    if(user::UserLogin($email,$password)){
        header("Location: ../../index.php");
        exit;
    }else{
        header("Location: ../login.php?error=1");
        exit;
    }
    
}

?>