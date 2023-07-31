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
        $query = "SELECT * FROM manager WHERE mEmail = ? ";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $email);
       
        $pstmt->execute();

        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

        foreach($rs as $row){
            $dbpassword = $row->mPassword;
            $dbFirstName = $row->mFirstName;
            $dbLastName = $row->mLastName;
            $dbEmail = $row->mEmail;
            $dbPhoneNo = $row->mPhone;
            $dbNIC = $row->mNIC;
            $dbmID = $row->managerID;
        }
       ;
        if (password_verify($password, $dbpassword)) {
           
            $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbNIC, $dbmID, $dbPhoneNo);
            session_start();
            $_SESSION["manager"] = $manager;
            header("Location: ../Manager.php");
        exit;
        }else{
            
            header("Location: ../managerlogin.php?error=1");
            exit;
        }

    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

}

?>