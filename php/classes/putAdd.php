<?php
require './DbConnector.php';
require './persons.php';

use classes\DbConnector;
$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: ../login.php?error=2");
    exit();
}

if (isset($_POST['submit'])) {

    $text_description = $_POST["text_description"];
    $text_title = $_POST["text_title"];
    $realDate = $_POST["realDate"];
    $file = $_FILES['image1'];

    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {

        if($user->putAdvertisement($file,$text_title, $text_description, $realDate)){
            header("Location: ../user.php?success=3");
        }else{
            header("Location: ../user.php?success=4");
        }
    }
 
}
?>