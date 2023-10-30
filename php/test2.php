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


$posts = array(
    array(
        'title' => 'First Blog Post',
        'content' => 'This is the content of the first blog post.',
        'author' => 'John Doe',
        'date' => 'October 29, 2023'
    ),
    array(
        'title' => 'Second Blog Post',
        'content' => 'This is the content of the second blog post.',
        'author' => 'Jane Smith',
        'date' => 'October 30, 2023'
    )
);


$uploadDir = 'uploads/';

// Check if the 'images' array is set in the POST request
if (isset($_FILES['images'])) {
    $errors = [];

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $imageFile = $_FILES['images']['name'][$key];
        $imageFileType = strtolower(pathinfo($imageFile, PATHINFO_EXTENSION));
        $targetFile = $uploadDir . $imageFile;

        // Check if the file is an image and not empty
        if (!getimagesize($tmp_name)) {
            $errors[] = "File '$imageFile' is not an image.";
        } elseif (file_exists($targetFile)) {
            $errors[] = "File '$imageFile' already exists.";
        } elseif ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } elseif (!move_uploaded_file($tmp_name, $targetFile)) {
            $errors[] = "Error uploading file '$imageFile'.";
        }
    }

    if (empty($errors)) {
        echo "Images uploaded successfully.";
    } else {
        foreach ($errors as $error) {
            echo "Error: $error<br>";
        }
    }
}

// Display the uploaded images
$uploadedImages = scandir($uploadDir);
$uploadedImages = array_diff($uploadedImages, ['.', '..']);

if (!empty($uploadedImages)) {
    echo "<h2>Uploaded Images</h2>";
    echo "<ul>";
    foreach ($uploadedImages as $image) {
        echo "<li><img src='$uploadDir$image' alt='$image' width='200'></li>";
    }
    echo "</ul>";
}


// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Sample PDF');
$pdf->SetSubject('Sample PDF Document');
$pdf->SetKeywords('TCPDF, PDF, example, test');

// Set the page header and footer
$pdf->SetHeaderData('', 0, 'Sample PDF', 'Header Text');
$pdf->setHeaderFont(Array('helvetica', '', 12));
$pdf->setFooterFont(Array('helvetica', '', 8));

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add content to the PDF
$pdf->Cell(0, 10, 'Hello, World!', 0, 1, 'C');

// Output the PDF to the browser or save it to a file
$pdf->Output('sample.pdf', 'I');

   
































































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
