<?php
require './DbConnector.php';
require './persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();
?>
<?php

session_start();
if (isset($_SESSION["manager"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["manager"];
} else {
    // Redirect the user to login.php if not logged in
    header("Location: ./managerlogin.php?error=2");
    exit();
}
?>
<?php

$managerID = $manager->getManagerid();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $NIC = $_POST["NIC"];


    try {
        $con = $dbcon->getConnection();
        $query = "UPDATE manager SET mFirstName = ?, mLastName = ?, mEmail = ?, mNIC = ?, mPhone = ? WHERE managerID = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $firstName);
        $pstmt->bindValue(2, $lastName);
        $pstmt->bindValue(3, $email);
        $pstmt->bindValue(4, $NIC);
        $pstmt->bindValue(5, $phone);
        $pstmt->bindValue(6, $managerID);

        $pstmt->execute();


        if ($pstmt->execute()) {
            // Unset all session variables
            $_SESSION = array();

            // Destroy the session
            session_destroy();




            try {
                $con = $dbcon->getConnection();
                $query = "SELECT * FROM manager WHERE managerID = ? ";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $managerID);
        
                $pstmt->execute();
        
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        
                foreach($rs as $row){
                    $dbpassword = $row->mPassword;
                    $dbFirstName = $row->mFirstName;
                    $dbLastName = $row->mLastName;
                    $dbEmail = $row->mEmail;
                    $dbPhoneNo = $row->mPhone;
                    $dbid = $row->$managerID;
                    $dbNIC = $row->mNIC;
                }
               
                
        
                    $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbpassword,$dbNIC, $dbid, $dbPhoneNo);
                    session_start();
                    $_SESSION["manager"] = $manager;
                    header("Location: ../Manager.php");
                    exit;
                
        
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }


        } else {
            header("Location: ../Manager.php?error=1");
            exit;
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }



}

?>