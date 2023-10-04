<?php


session_start();
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $manager = $_SESSION["user"];
} else {

    header("Location: ./login.php?error=4");
    exit();
}


require './DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pay'])) {
        if (empty($_POST['nameOnCard']) || empty($_POST['cardNo']) || empty($_POST['expiry']) || empty($_POST['cvv']) || empty($_POST['streetAddress']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['postalCode'])) {
            header("Location: ../payement.php?error=3");
        } else {

            $expiryDate = $_POST['expiry'];

            $expiryDateTime = DateTime::createFromFormat('m/y', $expiryDate);

            $currentDate = new DateTime();

            if ($currentDate > $expiryDateTime) {

                header("Location: ../mycart.php?error=4");
            } else {

                $name = $_POST['nameOnCard'];
                $cardno = $_POST['cardNo'];
                $address = $_POST['streetAddress'];
                $city = $_POST['city'];
                $province = $_POST['state'];
                $postalcode = $_POST['postalCode'];

                try {

                    $con = $dbcon->getConnection();
                    $query = "INSERT INTO payment (UserFirstName,UserLastName,UserAddress,OwnerCity,OwnerProvince,OwnerPostalCode) VALUES (?,?,?,?,?,?)";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $name);
                    $pstmt->bindValue(2, $cardno);
                    $pstmt->bindValue(3, $address);
                    $pstmt->bindValue(4, $city);
                    $pstmt->bindValue(5, $province);
                    $pstmt->bindValue(6, $postalcode);
                    $pstmt->execute();
                    if (($pstmt->rowCount()) > 0) {
                        header("Location: ../payemntThankyou.php");
                    } else {
                        header("Location: ../mycart.php?error=5");
                    }
                } catch (PDOException $e) {

                    echo $e->getMessage();
                }
            }
        }
    } else {
        header("Location: ../Payement.php?error=2");
    }
} else {
    header("Location: ../Payement.php?error=1");
}
