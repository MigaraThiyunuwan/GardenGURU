<!-- upload.php -->
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

    // Text description & Text title
    $text_description = $_POST["text_description"];
    $text_title = $_POST["text_title"];

    // Save text description in a text file
    //$text_file_path = "../txtfiles/Advertistment/Advertistment" . uniqid() . ".txt";
    //file_put_contents($text_file_path, $text_description);

    // Check if image files were uploaded without errors
    if (
        isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK //&&
        //isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK 
      
    ) {
        // Get the temporary filenames of the uploaded image files
        $tmp_name1 = $_FILES['image1']['tmp_name'];
        //$tmp_name2 = $_FILES['image2']['tmp_name'];
      

        // Get the original names of the uploaded image files
        $filename1 = $_FILES['image1']['name'];
        //$filename2 = $_FILES['image2']['name'];
      

        $destination1 = '../images/Adevertistment/' . $filename1;
        //$destination2 = '../images/Adevertistment/' . $filename2;
       

        if (move_uploaded_file($tmp_name1, $destination1)) { //&& move_uploaded_file($tmp_name2, $destination2) ) {


            $conn = $dbcon->getConnection();
            $sql = "INSERT INTO advertisements ( user_FirstName, user_LastName, user_Email, image1_filename, title, description) VALUES ( ? ,?, ?, ?, ?, ?)";

            $pstmt = $conn->prepare($sql);
            $pstmt->bindValue(1, $user->getFirstName());
            $pstmt->bindValue(2, $user->getLastName());
            $pstmt->bindValue(3, $user->getEmail());
            $pstmt->bindValue(4, $destination1);
           // $pstmt->bindValue(5, $destination2);
            $pstmt->bindValue(5, $text_title);
            $pstmt->bindValue(6, $text_description);

            if ($pstmt->execute()) {
                header("Location: ./user.php?success=3"); 
            } else {
                echo "Error executing the query: " . $pstmt->errorInfo()[2];
            }

            // Close the database connection

        } else {
            header("Location: ./user.php?success=4"); 
        }
    } else {
        header("Location: ./user.php?success=4"); 
    }
}
?>



