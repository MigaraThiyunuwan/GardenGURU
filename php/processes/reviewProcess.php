<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require_once '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: ../login.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["rating"]) && isset($_POST["text_description"])) {
        $rate = Security::SanitizeInput($_POST["rating"]);
        $description = Security::SanitizeInput($_POST["text_description"]);
            // call putBlog function in user class
            if ($user->writeReview($rate, $description)) {
                header("Location: ../AboutUs.php?success=1");
            } else {
                header("Location: ../AboutUs.php?error=1");
            }
        
    }else {
        header("Location: ../AboutUs.php?error=2");
    }
}else {
    header("Location: ../AboutUs.php?error=3");
}
