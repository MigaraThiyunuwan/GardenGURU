<?php

use classes\DbConnector;

?>

<?php
/* =========================================================|| person class (Parent Class) ||====================================================================================== */
class person
{
    private $FirstName;
    private $LastName;
    private $Email;

    private $Password;

    function __construct($FirstName, $LastName, $Email, $Password)
    {
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
        $this->Password = $Password;
    }
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getPassword()
    {
        return $this->Password;
    }
}

/* =========================================================|| user class (Child Class) ||====================================================================================== */
class user extends person
{
    private $userId;
    private $District;
    private $PhoneNo;
    private $Address;
    private $ProPic;
    private $Gender;
    function __construct($FirstName, $LastName, $Email, $Password, $Address, $userId, $District, $PhoneNo, $ProPic, $Gender)
    {
        parent::__construct($FirstName, $LastName, $Email,  $Password);
        $this->userId = $userId;
        $this->District = $District;
        $this->PhoneNo = $PhoneNo;
        $this->Address = $Address;
        $this->ProPic = $ProPic;
        $this->Gender = $Gender;
    }
    public function getPropic()
    {
        return $this->ProPic;
    }

    public function setPropic($picture)
    {
        $this->ProPic = $picture;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getDistrict()
    {
        return $this->District;
    }
    public function getPhoneNo()
    {
        return $this->PhoneNo;
    }
    public function getAddress()
    {
        return $this->Address;
    }

    public static function RegisterUser($firstname, $lastname, $email, $phone, $address, $password, $district, $gender, $picture)
    {
        try {

            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "INSERT INTO users(user_FirstName, user_LastName, user_Email, user_PhoneNo, user_address, user_Password, user_District, user_Gender, profile_picture) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $firstname);
            $pstmt->bindValue(2, $lastname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $phone);
            $pstmt->bindValue(5, $address);
            $pstmt->bindValue(6, $password);
            $pstmt->bindValue(7, $district);
            $pstmt->bindValue(8, $gender);
            $pstmt->bindValue(9, $picture);
            $pstmt->execute();
            if (($pstmt->rowCount()) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function UserLogin($email, $password)
    {
        try {
            $dbcon = new DbConnector();
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

                $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION['cart'][0] = array('Item_Name' => null, 'Price' => null, 'Quantity' => null);
                if (isset($_SESSION['cartTemp'])) {
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

                        foreach ($rs as $row) {
                            $Item_Name = $row->Item_Name;
                            $Price = $row->Price;
                            $Quantity = $row->Quantity;
                            $_SESSION['cart'][] = array('Item_Name' => $Item_Name, 'Price' => $Price, 'Quantity' => $Quantity);
                        }

                        return true;
                    } else {
                    }
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditUserDetails($firstName, $lastName, $email, $phone, $address, $userID)
    {

        try {
            $dbcon = new DbConnector();
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

                $_SESSION["user"] = null;

                try {
                    $con = $dbcon->getConnection();
                    $query = "SELECT * FROM users WHERE user_id = ? ";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $userID);

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

                    $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbpicture, $dbGender);
                    $_SESSION["user"] = $user;
                    return true;
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

/* =========================================================|| Manager class (Child Class) ||====================================================================================== */
class Manager extends person
{
    private $managerId;
    private $NIC;

    private $PhoneNo;

    public function __construct($FirstName, $LastName, $Email, $Password, $NIC, $managerId, $PhoneNo)
    {
        parent::__construct($FirstName, $LastName, $Email,  $Password);
        $this->NIC = $NIC;
        $this->PhoneNo = $PhoneNo;
        $this->managerId = $managerId;
    }

    public function getManagerNIC()
    {
        return $this->NIC;
    }

    public function getManagerPhoneNo()
    {
        return $this->PhoneNo;
    }

    public function getManagerid()
    {
        return $this->managerId;
    }

    public function deleteUser()
    {
        require_once './DbConnector.php';

        $user_id = $_POST['userID'];
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();

            $query = "DELETE FROM users WHERE user_id = :user_id";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $pstmt->execute();
            header("Location: ../Manager.php");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function viewUser()
    {
        require_once 'DbConnector.php';
        $user_id = $_POST['userID'];
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();

            $query = "SELECT * FROM users WHERE user_id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $user_id);

            $pstmt->execute();

            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $row) {
                $dbpassword = $row->user_Password;
                $dbFirstName = $row->user_FirstName;
                $dbLastName = $row->user_LastName;
                $dbEmail = $row->user_Email;
                $dbPhoneNo = $row->user_PhoneNo;
                $dbDistrict = $row->user_District;
                $dbprofile_picture = $row->profile_picture;
                $dbid = $row->user_id;
                $dbGender = $row->user_Gender;
                $dbaddress = $row->user_address;
            };
            $user = new user($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbaddress, $dbid, $dbDistrict, $dbPhoneNo, $dbprofile_picture, $dbGender);
            session_start();
            $_SESSION["user1"] = $user;
            header("Location: ../userView.php");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function LoginManager($email, $password)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM manager WHERE mEmail = ? ";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);

            $pstmt->execute();

            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($rs as $row) {
                $dbpassword = $row->mPassword;
                $dbFirstName = $row->mFirstName;
                $dbLastName = $row->mLastName;
                $dbEmail = $row->mEmail;
                $dbPhoneNo = $row->mPhone;
                $dbNIC = $row->mNIC;
                $dbmID = $row->managerID;
            };
            if (password_verify($password, $dbpassword)) {

                $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbNIC, $dbmID, $dbPhoneNo);
                session_start();
                $_SESSION["manager"] = $manager;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditManagerDetails($firstName, $lastName, $email, $NIC, $phone, $managerID)
    {

        try {
            $dbcon = new DbConnector();
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

                $_SESSION["manager"] = null;

                try {
                    $con = $dbcon->getConnection();
                    $query = "SELECT * FROM manager WHERE managerID = ? ";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $managerID);

                    $pstmt->execute();

                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $row) {
                        $dbFirstName = $row->mFirstName;
                        $dbLastName = $row->mLastName;
                        $dbEmail = $row->mEmail;
                        $dbPhoneNo = $row->mPhone;
                        $dbpassword = $row->mPassword;
                        $dbNIC = $row->mNIC;
                    }

                    $manager = new Manager($dbFirstName, $dbLastName, $dbEmail, $dbpassword, $dbNIC, $managerID, $dbPhoneNo);

                    $_SESSION["manager"] = $manager;
                    return true;
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'processForm1') {

    $manager = new Manager(null, null, null, null, null, null, null,);
    $manager->deleteUser();
}
if (isset($_POST['action']) && $_POST['action'] == 'view') {

    $manager = new Manager(null, null, null, null, null, null, null,);
    $manager->viewUser();
}

/* =========================================================|| Admin class (Child Class) ||====================================================================================== */
class Admin extends person
{

    private $adminId;
    private $NIC;
    private $PhoneNo;

    public function __construct($FirstName, $LastName, $Email, $Password, $NIC, $adminId, $PhoneNo)
    {
        parent::__construct($FirstName, $LastName, $Email,  $Password);
        $this->NIC = $NIC;
        $this->PhoneNo = $PhoneNo;
        $this->adminId = $adminId;
    }

    public function getAdminNIC()
    {
        return $this->NIC;
    }

    public function getAdminPhoneNo()
    {
        return $this->PhoneNo;
    }

    public function getAdminid()
    {
        return $this->adminId;
    }

    public function deleteManager()
    {
        require_once './DbConnector.php';

        $managerID = $_POST['managerID'];
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();

            // Prepare and execute the DELETE query
            $query = "DELETE FROM manager WHERE managerID = :managerID";
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(':managerID', $managerID, PDO::PARAM_INT);
            $pstmt->execute();
            header("Location: ../Admin.php");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            // You can handle the error here or display an error message on the same page
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'processForm') {
    // Call the PHP function when the form is submitted with the action 'processForm'
    $admin = new Admin(null, null, null, null, null, null, null,);
    $admin->deleteManager();
}
