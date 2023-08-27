<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gardenguru";
    
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $blogTitle = $_POST["blog_title"];
    $blogDetails = $_POST["blog_details"];
    
    // Handle file upload
    $targetDir = "../images/blog/"; // Change this to your desired directory path
    $targetFile = $targetDir . basename($_FILES["blog_image"]["name"]);
    
    if (move_uploaded_file($_FILES["blog_image"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed.";
    }
    
    // Insert data into the database
    $sql = "INSERT INTO blog (blog_title, blog_details, blog_image) VALUES ('$blogTitle', '$blogDetails', '$targetFile')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Blog added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
