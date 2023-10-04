<?php
require_once './DbConnector.php';
require_once './persons.php';
require_once './Security.php';
use classes\DbConnector;

$dbcon = new DbConnector();

if (isset($_COOKIE['remember_user'])) {

    if(user::validateToken($_COOKIE['remember_user'])){
        header("Location: ../../index.php");
        exit;
    }else{
        setcookie("remember_user", "", (time()-(30*24*60*60)), '/');
        header("Location: ../login.php");
        exit;
    }

}else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = Security::SanitizeInput(($_POST["email"]));

    $password = Security::SanitizeInput(($_POST["password"]));
    $user = user::UserLogin($email,$password);
    if($user != null){
        if(isset($_POST['rememberuser'])){
           
            $token = bin2hex(random_bytes(32));
            $exp = time() + (30*24*60*60);
            if($user->updateToken($token, $exp)){
                setcookie("remember_user", $token, $exp,'/');
            }
            
        }
       
        header("Location: ../../index.php");
        exit;
    }else{
        header("Location: ../login.php?error=1");
        exit;
    }
    
}

?>