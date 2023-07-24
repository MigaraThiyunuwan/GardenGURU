<?php
require './DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
   // $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $password = $_POST["password"];


 echo "email is $email ";
 echo "pw is $password ";
    try {
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM users WHERE user_Email = ? ";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $email);
       
        $pstmt->execute();

        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

        foreach($rs as $row){
            $dbpassword = $row->user_Password;
        }
        echo "db paw is $dbpassword ";
        if (password_verify($password, $dbpassword)) {
            // Password is correct. Proceed with login logic.
            echo "inside if ";
            header("Location: ../../index.php");
        exit;
        }else{
            echo "inside else ";
            header("Location: ../login.php?error=1");
            exit;
        }

    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

}

?>