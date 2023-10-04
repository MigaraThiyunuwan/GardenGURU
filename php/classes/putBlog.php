<?php
require_once './DbConnector.php';
require_once './persons.php';
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

    $blogTitle = $_POST["blog_title"];
    $blogDetails = $_POST["blog_details"];
    $ufname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $Date = $_POST["Date"];
    $file = $_FILES['blog_image'];

    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {

        if($user->putBlog($file,$blogTitle,$blogDetails,$Date)){
            header("Location: ../user.php?success=1");
        }else{
            header("Location: ../user.php?success=0");
        }

    }
}
