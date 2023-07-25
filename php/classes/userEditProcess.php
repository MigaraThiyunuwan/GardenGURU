
<?php
require './DbConnector.php';
require './persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();
?>
<?php

session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./login.php?error=2");
    exit();
}
?>
<?php

$userID = $user->getUserId();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];


    try {
        $con = $dbcon->getConnection();
        $query = "UPDATE users SET user_FirstName = ?, user_LastName = ?, user_Email = ?, user_PhoneNo = ?, user_address = ? WHERE user_id = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $firstName);
        $pstmt->bindValue(2, $lastName);
        $pstmt->bindValue(3, $email);
        $pstmt->bindValue(4, $phone);
        $pstmt->bindValue(5, $address);
        $pstmt->bindValue(6, $userID);

        $pstmt->execute();


        if ($pstmt->execute()) {
            // Unset all session variables
            $_SESSION = array();

            // Destroy the session
            session_destroy();




            try {
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM users WHERE user_id = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $userID);
        
                $pstmt->execute();
        
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        
                foreach($rs as $row){
                    $dbpassword = $row->user_Password;
                    $dbFirstName = $row->user_FirstName;
                    $dbLastName = $row->user_LastName;
                    $dbEmail = $row->user_Email;
                    $dbPhoneNo = $row->user_PhoneNo;
                    $dbDistrict = $row->user_District;
                    $dbGender = $row->user_Gender;
                    $dbid = $row->user_id;
                    $dbaddress = $row->user_address;
                }
               
                
        
                    $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword,$dbaddress, $dbid, $dbDistrict, $dbPhoneNo);
                    session_start();
                    $_SESSION["user"] = $user;
                    header("Location: ../user.php");
                    exit;
                
        
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }


        } else {
            header("Location: ../user.php?error=1");
            exit;
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }



}

?>