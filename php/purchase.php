<?php
session_start();

$con=mysqli_connect("localhost","root","","testing");

if(mysqli_connect_error()){
	 echo "
                    <script>
                      alert('cannot connect to database');
                        window.location.href = 'mycart.php';
                    </script>";
                    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {



     if(isset($_POST['purchase'])){

     	$query1 ="INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
     	if(mysqli_query($con,$query1)){
     		echo "done";

     	}
     	else{
     		 echo "
                    <script>
                      alert('SQL error');
                        window.location.href = 'mycart.php';
                    </script>";
                    exit();

     	}

     }


}
