<?php
require './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();


require './classes/persons.php';
session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./login.php?error=2");
    exit();
}

if (isset($_POST['submit'])) {
    // Get form data
    // $name = $_POST['name'];
    // $email = $_POST['email'];

    // Text description
    //$text_description = $_POST["text_description"];

    // Save text description in a text file
    //$text_file_path = "../txtfiles/Advertistment/Advertistment" . uniqid() . ".txt";
    //file_put_contents($text_file_path, $text_description);

    // Check if image files were uploaded without errors
    if (
        isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK //&&
        //isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK 
      
    ) {
        // Get the temporary filenames of the uploaded image files
        $tmp_name1 = $_FILES['profile_picture']['tmp_name'];
        //$tmp_name2 = $_FILES['image2']['tmp_name'];
      
 
        // Get the original names of the uploaded image files
        $filename1 = $_FILES['profile_picture']['name'];
        //$filename2 = $_FILES['image2']['name'];
      

        // Move the temporary files to the desired location on the server
        // For example, you can store them in a folder called "uploads"
        $destination1 = '../images/profile_pictures/' . $filename1;
        //$destination2 = '../images/Adevertistment/' . $filename2;
       

        if (move_uploaded_file($tmp_name1, $destination1)) { //&& move_uploaded_file($tmp_name2, $destination2) ) {
            // File uploads were successful, now save the form data and image filenames in the database

            // Replace these values with your actual database credentials
            // $db_host = 'localhost';
            // $db_user = 'root';
            // $db_pass = '';
            // $db_name = 'gardenguru';

            // // Connect to the database
            // $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            // // Check connection
            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // }


            // Insert form data and image filenames into the database

            $conn = $dbcon->getConnection();
            $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?;";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $destination1);
            $pstmt->bindValue(2, $user->getUserId());
           
            

            if ($pstmt->execute()) {
                $success_message = "Form data and images uploaded and saved in the database successfully.";
                $user->setPropic($destination1);
                $_SESSION["user"] = $user;
            } else {
                echo "Error executing the query: " . $pstmt->errorInfo()[2];
            }


        } else {
            $error_message = "Error moving the uploaded files to the destination.";
        }
    } else {
        $error_message = "Error uploading the image files.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Status</title>
</head>

<body>
    <!-- Display success message in a pop-up box -->
   
        <?php if (isset($success_message)): 
            header("Location: ./user.php?success=6");
         endif; ?>

        <?php if (isset($error_message)): 
            header("Location: ./user.php?error=1");
           
        endif; ?>
    
</body>

</html>