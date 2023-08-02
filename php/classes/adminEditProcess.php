<?php
require './DbConnector.php';
require './persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();
?>
<?php

session_start();
if (isset($_SESSION["admin"])) {
    // User is logged in, retrieve the user object
    $admin = $_SESSION["admin"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./adminlogin.php?error=2");
    exit();
}
?>
<?php

$adminID = $admin->getAdminid();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $NIC = $_POST["NIC"];


    try {
        $con = $dbcon->getConnection();
        $query = "UPDATE admin SET aFirstName = ?, aLastName = ?, aEmail = ?, aNIC = ?, aPhone = ? WHERE adminID = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $firstName);
        $pstmt->bindValue(2, $lastName);
        $pstmt->bindValue(3, $email);
        $pstmt->bindValue(4, $NIC);
        $pstmt->bindValue(5, $phone);
        $pstmt->bindValue(6, $adminID);

        $pstmt->execute();


        if ($pstmt->execute()) {
            // Unset all session variables
            $_SESSION = array();

            // Destroy the session
            session_destroy();




            try {
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM admin WHERE adminID = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $adminID);
        
                $pstmt->execute();
        
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        
                foreach($rs as $row){
                    $dbpassword = $row->aPassword;
                    $dbFirstName = $row->aFirstName;
                    $dbLastName = $row->aLastName;
                    $dbEmail = $row->aEmail;
                    $dbPhoneNo = $row->aPhone;
                    $dbid = $row->$adminID;
                    $dbNIC = $row->aNIC;
                }
               
                
        
                    $admin = new admin($dbFirstName, $dbLastName, $dbEmail, $dbpassword,$dbNIC, $dbid, $dbPhoneNo);
                    session_start();
                    $_SESSION["admin"] = $admin;
                    header("Location: ../Admin.php");
                    exit;
                
        
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }


        } else {
            header("Location: ../Admin.php?error=1");
            exit;
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }



}

?>