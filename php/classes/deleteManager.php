<?php
require './DbConnector.php';
require './persons.php';
use classes\DbConnector;
$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["admin"])) {
    // User is logged in, retrieve the user object
    $admin = $_SESSION["admin"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./adminlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ManagerID = ($_POST["ManagerID"]);
        // call EditManagerDetails function
    if($admin->deleteManager($ManagerID)){
        header("Location: ../Admin.php?success=2");
        exit;
    } else {
        header("Location: ../Admin.php?error=1");
        exit;
    }

}