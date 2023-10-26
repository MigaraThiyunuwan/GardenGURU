<?php
require_once '../classes/DbConnector.php';
require '../classes/persons.php';
require '../classes/Security.php';

use classes\DbConnector;

$dbcon = new DbConnector();

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    if (isset($_POST["currentPassword1"]) && !empty($_POST["currentPassword1"]) && isset($_POST["currentPassword2"]) && !empty($_POST["currentPassword2"]) && isset($_POST["newPassword"]) && !empty($_POST["newPassword"])) {

        if ($_POST["currentPassword1"] == $_POST["currentPassword2"]) {
            if (Security::validate_password($_POST["newPassword"])) {

                $password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

                if ($user->changePassword($password)) {
                    header("Location: ../editUser.php?success=1");
                    exit;
                } else {
                    header("Location: ../editUser.php?error=4");
                    exit;
                }
            } else {
                header("Location: ../editUser.php?error=3");
                exit;
            }
        } else {
            header("Location: ../editUser.php?error=2");
            exit;
        }
    } else {
        header("Location: ../editUser.php?error=1");
        exit;
    }
} else if (isset($_SESSION["manager"])) {

    $manager = $_SESSION["manager"];
    if (isset($_POST["currentPassword1"]) && !empty($_POST["currentPassword1"]) && isset($_POST["currentPassword2"]) && !empty($_POST["currentPassword2"]) && isset($_POST["newPassword"]) && !empty($_POST["newPassword"])) {

        if ($_POST["currentPassword1"] == $_POST["currentPassword2"]) {
            if (Security::validate_password($_POST["newPassword"])) {

                $password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

                if ($manager->changePassword($password)) {
                    header("Location: ../manager/managerEdit.php?success=1");
                    exit;
                } else {
                    header("Location: ../manager/managerEdit.php?error=4");
                    exit;
                }
            } else {
                header("Location: ../manager/managerEdit.php?error=3");
                exit;
            }
        } else {
            header("Location: ../manager/managerEdit.php?error=2");
            exit;
        }
    } else {
        header("Location: ../manager/managerEdit.php?error=1");
        exit;
    }
} else {

    header("Location: ../manager/managerEdit.php?error=2");
    exit();
}
