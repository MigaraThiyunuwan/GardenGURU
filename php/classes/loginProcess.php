<?php
require_once './DbConnector.php';
require_once './persons.php';

use classes\DbConnector;

$dbcon = new DbConnector();

function validateAndSanitizeInput($input)
{
    // Remove leading and trailing whitespace
    $input = trim($input);

    // Remove backslashes
    $input = stripslashes($input);

    // Remove HTML tags
    $input = strip_tags($input);

    // Convert special characters to HTML entities (prevent XSS)
    $input = htmlspecialchars($input);

    return $input;
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = validateAndSanitizeInput($_POST["email"]);

    $password = validateAndSanitizeInput($_POST["password"]);



    try {
        $con = $dbcon->getConnection();
        $query = "SELECT * FROM users WHERE user_Email = ? ";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $email);

        $pstmt->execute();

        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($rs as $row) {
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

        if (password_verify($password, $dbpassword)) {

            $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword,$dbaddress, $dbid, $dbDistrict, $dbPhoneNo,$dbpicture);
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION['cart'][0] = array('Item_Name' => null, 'Price' => null, 'Quantity' => null);
            if(isset($_SESSION['cartTemp'])){
                $_SESSION['cartTemp'] = null;
            }






            try {
                $con = $dbcon->getConnection();
                $query1 = "SELECT * FROM cart WHERE user_id = ? ";
                $pstmt1 = $con->prepare($query1);
                $pstmt1->bindValue(1, $user->getUserId());

                $pstmt1->execute();

                if ($pstmt1->rowCount() > 0) {

                    $rs = $pstmt1->fetchAll(PDO::FETCH_OBJ);

                    $count = $pstmt1->rowCount();
                    foreach ($rs as $row) {
                        $Item_Name = $row->Item_Name;
                        $Price = $row->Price;
                        $Quantity = $row->Quantity;
                        // session_start();
                        $_SESSION['cart'][] = array('Item_Name' => $Item_Name, 'Price' => $Price, 'Quantity' => $Quantity);
                    }



                    header("Location: ../../index.php");
              






                    // if (password_verify($password, $dbpassword)) {

                    //     $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture);
                    //     session_start();
                    //     $_SESSION["user"] = $user;
                    //     $_SESSION['cart'][] = array('Item_Name' => null, 'Price' => null, 'Quantity' => null);
                    //     header("Location: ../../index.php");
                    //     exit;
                    // } else {

                    //     header("Location: ../login.php?error=1");
                    //     exit;
                    // }
                } else {
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }





            header("Location: ../../index.php");
            exit;
        } else {

            header("Location: ../login.php?error=1");
            exit;
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

?>