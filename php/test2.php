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


// Load the image
$image = imagecreatefromjpeg('input.jpg');

// Set the text color and font
$textColor = imagecolorallocate($image, 255, 255, 255); // White color
$font = 'arial.ttf'; // You can specify a TrueType font file

// Define the text to be added
$text = 'Hello, World!';

// Define the position where the text will be added
$x = 10; // X-coordinate
$y = 30; // Y-coordinate

// Add the text to the image
imagettftext($image, 20, 0, $x, $y, $textColor, $font, $text);

// Output the image with the text
header('Content-Type: image/jpeg');
imagejpeg($image);

// Free up memory by destroying the image resource
imagedestroy($image);

 // Load the image
$image = imagecreatefromjpeg('input.jpg');

// Set the text color
$textColor = imagecolorallocate($image, 255, 255, 255); // White color

// Define the text to be added
$text = 'Hello, World!';

// Define the font size
$fontSize = 20;

// Define the position where the text will be added
$x = 10; // X-coordinate
$y = 30; // Y-coordinate

// Add the text to the image
imagestring($image, 5, $x, $y, $text, $textColor);

// Output the image with the text
header('Content-Type: image/jpeg');
imagejpeg($image);

// Free up memory by destroying the image resource
imagedestroy($image); 

// PHP program to check given string is  
// all characters -Uppercase characters 
  
$string1 = 'GEEKSFORGEEKS'; 
  
   if (ctype_upper($string1)) { 
         
        // if true then return Yes 
        echo "Yes\n"; 
    } else { 
          
        // if False then return No 
        echo "No\n"; 
    } 

    // PHP program to check given string is  
// all characters -Uppercase characters 
  
$strings = array('GEEKSFORGEEKS', 'First',  
'PROGRAMAT2018', 'ARTICLE'); 

// Checking above given four strings  
//by used of ctype_upper() function . 

foreach ($strings as $test) { 

if (ctype_upper($test)) { 
// if true then return Yes 
echo "Yes\n"; 
} else { 
// if False then return No 
echo "No\n"; 
} 
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["note"])) {
        $uploadDir = "uploads/"; // Directory where notes will be saved
        $uploadedFile = $uploadDir . basename($_FILES["note"]["name"]);

        // Check if the file is a valid note (you can add more checks as needed)
        $fileType = pathinfo($uploadedFile, PATHINFO_EXTENSION);

        // Allow only specific file types (e.g., PDF, DOCX)
        $allowedExtensions = array("pdf", "doc", "docx");
        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES["note"]["tmp_name"], $uploadedFile)) {
                echo "Note uploaded successfully!";
            } else {
                echo "Error uploading the note.";
            }
        } else {
            echo "Invalid file format. Allowed formats: PDF, DOC, DOCX.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $targetDir = "uploads/"; // Directory where you want to store the uploaded documents
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a document
    if ($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



























































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
