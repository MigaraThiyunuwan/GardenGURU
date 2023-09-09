<?php

require_once './DbConnector.php';
require_once './persons.php';

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {

    header("Location: ./managerlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['UserID'])){
        $UserID = $_POST['UserID'];
            // call deleteUser function un Manager class
        if($manager->deleteUser($UserID)){
            header("Location: ../Manager.php?success=1");
        } else {
            header("Location: ../Manager.php?error=1");
        }
    }



}

?>