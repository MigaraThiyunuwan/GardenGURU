<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
$user = null;
if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["ask_question"])) {
        $date = $_POST["date"];
        $question = Security::SanitizeInput($_POST["question"]);
        //call askQuestion function in user class
        if ($user->askQuestion($question)) {
            header("Location: ../comForum.php?success=1");
        } else {
            header("Location: ../comForum.php?error=1");
        }
    }
}
