<?php
require_once './DbConnector.php';
require './persons.php';


use classes\DbConnector;

$dbcon = new DbConnector();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
 
    $password = $_POST["password"];



    try {
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM admin WHERE aEmail = ? ";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $email);
       
        $pstmt->execute();

        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

        foreach($rs as $row){
            $dbpassword = $row->aPassword;
            $dbFirstName = $row->aFirstName;
            $dbLastName = $row->aLastName;
            $dbEmail = $row->aEmail;
            $dbPhoneNo = $row->aPhone;
            $dbNIC = $row->aNIC;
            $dbmID = $row->adminID;
        }
       ;
        if (password_verify($password, $dbpassword)) {
           
            $admin = new Admin($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbNIC, $dbmID, $dbPhoneNo);
            session_start();
            $_SESSION["admin"] = $admin;
            header("Location: ../Admin.php");
        exit;
        }else{
            
            header("Location: ../adminlogin.php?error=1");
            exit;
        }

    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

}

?>