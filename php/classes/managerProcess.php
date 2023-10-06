<?php

require_once './DbConnector.php';
require_once './persons.php';

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    header("Location: ../manager/managerlogin.php?error=2");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['UserID'])){
        $UserID = $_POST['UserID'];
            // call deleteUser function in Manager class
        if($manager->deleteUser($UserID)){
            header("Location: ../manager/manageUsers.php?success=1");
        } else {
            header("Location: ../manager/manageUsers.php?error=1");
        }
    }

    if(isset($_POST['newsID'])){
        $newsID = $_POST['newsID'];
            // call deleteNews function in Manager class
        if($manager->deleteNews($newsID)){
            header("Location: ../manager/manageNewsFeed.php?success=2");
        } else {
            header("Location: ../manager/manageNewsFeed.php?error=2");
        }
    }

    if(isset($_POST['addID'])){
        $addID = $_POST['addID'];
            // call deleteAdd function in Manager class
        if($manager->deleteAdd($addID)){
            header("Location: ../manager/manageAdvertiesments.php?success=3");
        } else {
            header("Location: ../manager/manageAdvertiesments.php?error=3");
        }
    }

    if(isset($_POST['blogID'])){
        $blogID = $_POST['blogID'];
            // call deleteBlog function in Manager class
        if($manager->deleteBlog($blogID)){
            header("Location: ../manager/manageBlogs.php?success=4");
        } else {
            header("Location: ../manager/manageBlogs.php?error=4");
        }
    }
}

?>