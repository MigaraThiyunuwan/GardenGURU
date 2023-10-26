<?php 
/////////////////////////////////////////////// Malki ///////////////////////////////////////////////////////////////////


namespace classes;

use PDO;
use PDOException;

class User {

    private $id;
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $role;

    function __construct($firstname, $lastname, $username, $password, $role) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }


    public function register($con) {
        try {
            $query = "INSERT INTO user (firstName,lastName,username,password) VALUES (?,?,?,?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->firstname);
            $pstmt->bindValue(2, $this->lastname);
            $pstmt->bindValue(3, $this->username);
            $pstmt->bindValue(4, $this->password);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error" . $exc->getMessage());
        }
    }

    public function authentication($con) {

        try {
            $query = "SELECT * FROM user WHERE username=?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->username);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                $dbpassword = $rs->password;
                if (password_verify($this->password, $dbpassword)) {
                    $this->id = $rs->id;
                    $this->firstname = $rs->firstName;
                    $this->lastname = $rs->lastName;
                    $this->password = null;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            die("Error" . $exc->getMessage());
        }
    }

}







/////////////////////////////////////////////// Lashan ///////////////////////////////////////////////////////////////////



































































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
