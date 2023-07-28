<!-- upload.php -->
<?php
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if image files were uploaded without errors
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK &&
        isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        // Get the temporary filenames of the uploaded image files
        $tmp_name1 = $_FILES['image1']['tmp_name'];
        $tmp_name2 = $_FILES['image2']['tmp_name'];

        // Get the original names of the uploaded image files
        $filename1 = $_FILES['image1']['name'];
        $filename2 = $_FILES['image2']['name'];

        // Move the temporary files to the desired location on the server
        // For example, you can store them in a folder called "uploads"
        $destination1 = '../images/Adevertistment/' . $filename1;
        $destination2 = '../images/Adevertistment/' . $filename2;

        if (move_uploaded_file($tmp_name1, $destination1) && move_uploaded_file($tmp_name2, $destination2)) {
            // File uploads were successful, now save the form data and image filenames in the database

            // Replace these values with your actual database credentials
            $db_host = 'localhost';
            $db_user = 'root';
            $db_pass = '';
            $db_name = 'gardenguru';

            // Connect to the database
            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    
// Insert form data and image filenames into the database
$sql = "INSERT INTO advertisements (id, name, email, image1_filename, image2_filename) VALUES ('','$name', '$email', '$filename1', '$filename2')";
            if ($conn->query($sql) === TRUE) {
                $success_message = "Form data and images uploaded and saved in the database successfully.";
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
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
    <script>
        <?php if (isset($success_message)): ?>
            alert("<?php echo $success_message; ?>");
            window.location.href = "user.php"; // Redirect to the form page after showing the pop-up
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            alert("<?php echo $error_message; ?>");
            window.history.back(); // Go back to the previous page (the form page) after showing the pop-up
        <?php endif; ?>
    </script>
</body>
</html>


