<?php 
/////////////////////////////////////////////// Malki ///////////////////////////////////////////////////////////////////
































































































/////////////////////////////////////////////// Lashan ///////////////////////////////////////////////////////////////////


if (isset($_POST["submit"])) {
    $uploadDirectory = "uploads/"; // The directory where you want to store uploaded files
    $targetFile = $uploadDirectory . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust the size limit as needed)
    if ($_FILES["file"]["size"] > 5000000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file formats (e.g., you can change this to allow other file types)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "File was not uploaded.";
    } else {
        // If everything is fine, attempt to move the file to the specified directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        } else {
            echo "There was an error uploading your file.";
        }
    }
}


$text = "Hello, ";
$text .= "World!"; // Adding text to the variable
echo $text; // Output the text


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPost = array(
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'author' => $_POST['author'],
        'date' => date('F j, Y')
    );

    $posts[] = $newPost;
}



































































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
