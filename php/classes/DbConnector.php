<?php

// session_start();

// require_once 'path/to/DbConnector.php'; // Replace 'path/to' with the actual path to the DbConnector.php file

// $dbConnector = new \classes\DbConnector();
// $con = $dbConnector->getConnection();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['purchase'])) {
//         $full_name = $_POST['full_name'];
//         $phone_no = $_POST['phone_no'];
//         $address = $_POST['address'];
//         $pay_mode = $_POST['pay_mode'];

//         $query = "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES (?, ?, ?, ?)";
//         $stmt = $con->prepare($query);

//         if ($stmt->execute([$full_name, $phone_no, $address, $pay_mode])) {
//             echo "done";
//         } else {
//             echo "
//                 <script>
//                     alert('SQL error');
//                     window.location.href = 'mycart.php';
//                 </script>";
//             exit();
//         }
//     }
// }





namespace classes;
use PDOException;
use PDO;

class DbConnector {

    private $host = "localhost";
    private $dbname = "gardenguru";
    private $dbuser = "root";
    private $dbpw = "";

    public function getConnection() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        try {
            $con = new PDO($dsn, $this->dbuser, $this->dbpw);
            return $con;
        } catch (PDOException $exc) {
            die("ERROR: ".$exc->getMessage());
        }
    }

}



?>