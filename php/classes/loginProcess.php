<?php
require_once './DbConnector.php';
require_once './persons.php';

use classes\DbConnector;

$dbcon = new DbConnector();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
 
    $password = $_POST["password"];



    try {
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM users WHERE user_Email = ? ";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $email);
       
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
            $dbpicture = $row->profile_picture;
        }
       ;
        if (password_verify($password, $dbpassword)) {
           
            $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword,$dbaddress, $dbid, $dbDistrict, $dbPhoneNo,$dbpicture);
            session_start();
            $_SESSION["user"] = $user;
            header("Location: ../../index.php");
        exit;
        }else{
            
            header("Location: ../login.php?error=1");
            exit;
        }

    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

}

?>