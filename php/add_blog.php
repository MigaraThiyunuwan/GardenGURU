<?php
require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = $dbcon->getConnection();

    $blogTitle = $_POST["blog_title"];
    $blogDetails = $_POST["blog_details"];
    $ufname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $Date = $_POST["Date"];

    // Handle file upload
    $targetDir = "../images/blog/";
    $targetFile = "../images/blog/" . basename($_FILES["blog_image"]["name"]);

    if (move_uploaded_file($_FILES["blog_image"]["tmp_name"], $targetFile)) {
        $query = "INSERT INTO blog (blog_title, user_fname, user_lname, blog_details, blog_image, blogPostedDate) VALUES (?, ?, ?, ?, ?, ?)";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $blogTitle);
        $pstmt->bindValue(2, $ufname);
        $pstmt->bindValue(3, $ulname);
        $pstmt->bindValue(4, $blogDetails);
        $pstmt->bindValue(5, $targetFile);
        $pstmt->bindValue(6, $Date);
        

        $pstmt->execute();
        if (($pstmt->rowCount()) > 0) {

            header("Location: ./user.php?success=1");
        } else {
            header("Location: ./user.php?success=0");
        }
    } else {
        header("Location: ./user.php?success=0");
    }
}
