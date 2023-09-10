

<?php


require_once './classes/DbConnector.php';

use classes\DbConnector;

$dbcon = new DbConnector();

require_once './classes/persons.php';
session_start();
$user = null;
if (isset($_SESSION["user"])) {
    // User is logged in, retrieve the user object
    $user = $_SESSION["user"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Add_To_Cart"])) {

        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems)) {
                header("Location: ./selling.php?error=1");

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);


                try {
                    $qty = 1;
                    $con = $dbcon->getConnection();
                    $query = "INSERT INTO cart(user_id, Item_Name, Price, Quantity) VALUES(?, ?, ?, ?)";
                    $pstmt = $con->prepare($query);
                    $pstmt->bindValue(1, $user->getUserId());
                    $pstmt->bindValue(2, $_POST['Item_Name']);
                    $pstmt->bindValue(3, $_POST['price']);
                    $pstmt->bindValue(4, $qty);
               
                    
                    $pstmt->execute();
                    if (($pstmt->rowCount()) > 0) {

                        header("Location: ./selling.php?success=1");
                    } else {
                        echo "Error, try again.";
                    }
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }




            }
        } else {

            if (isset($_SESSION['cartTemp'])) {

                $myitems = array_column($_SESSION['cartTemp'], 'Item_Name');
                if (in_array($_POST['Item_Name'], $myitems)) {
                    header("Location: ./selling.php?error=1");
                } else {
                    $count = count($_SESSION['cartTemp']);
                    $_SESSION['cartTemp'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);

                    header("Location: ./selling.php?success=1");
                }
            } else {
                $_SESSION['cartTemp'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);
                header("Location: ./selling.php?success=1");
            }
        }
    }

    if (isset($_POST['Remove_Item'])) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['Item_Name'] == $_POST['Item_Name']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);

                    try {
                        $qty = 1;
                        $con = $dbcon->getConnection();
                        $query = "DELETE FROM cart WHERE user_id = ? AND Item_Name = ?";
                        $pstmt = $con->prepare($query);
                        $pstmt->bindValue(1, $user->getUserId());
                        $pstmt->bindValue(2, $_POST['Item_Name']);
 
                        $pstmt->execute();
                        if (($pstmt->rowCount()) > 0) {
    
                            header("Location: ./mycart.php?success=1");
                        } else {
                            header("Location: ./mycart.php?error=1");
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
    
                }
            }
        }

        if (isset($_SESSION['cartTemp'])) {
            foreach ($_SESSION['cartTemp'] as $key => $value) {
                if ($value['Item_Name'] == $_POST['Item_Name']) {
                    unset($_SESSION['cartTemp'][$key]);
                    $_SESSION['cartTemp'] = array_values($_SESSION['cartTemp']);
                    header("Location: ./mycart.php?success=1");
                }
            }
        }
    }
    if (isset($_POST['Mod_Quantity'])) {

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['Item_Name'] == $_POST['Item_Name']) {
                    $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                    print_r($_SESSION['cart']);

                }
            }
        }

        if (isset($_SESSION['cartTemp'])) {
            foreach ($_SESSION['cartTemp'] as $key => $value) {
                if ($value['Item_Name'] == $_POST['Item_Name']) {
                    $_SESSION['cartTemp'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                    print_r($_SESSION['cartTemp']);

                }
            }
        }
    }
}

/*
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Add_To_Cart"])) {

        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems)) {
                echo "<script>
                alert('Item already added');
                window.location.href = 'Selling.php';
                </script>";

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);
                print_r($_SESSION['cart']);
                echo "<script>
                alert('Item added');
                window.location.href = 'Selling.php';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['price'], 'Quantity' => 1);
             echo "<script>
                alert('Item added');
                window.location.href = 'Selling.php';
                </script>";
        }
    }
    if(isset($_POST['Remove_Item'])){

    	foreach($_SESSION['cart'] as $key => $value){
    		if($value['Item_Name'] == $_POST['Item_Name'])
    		{
    		unset($_SESSION['cart'][$key]);
    		$_SESSION['cart'] =array_values($_SESSION['cart']);
    		echo "
              <script>

              alert('Item Removed');
              window.location.href="mycart.php";

              </script>
    		";
            }
    	}
    }
}



session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["Add_To_Cart"])) {
        $itemName = $_POST['Item_Name'];
        $price = $_POST['price'];

        if (isset($_SESSION['cart'])) {
            // Check if the item is already in the cart
            $itemIndex = -1;
            foreach ($_SESSION['cart'] as $index => $item) {
                if ($item['Item_Name'] === $itemName) {
                    $itemIndex = $index;
                    break;
                }
            }

            if ($itemIndex !== -1) {
                // If the item is already in the cart, update the quantity
                $_SESSION['cart'][$itemIndex]['Quantity'] += 1;
            } else {
                // If the item is not in the cart, add it as a new item
                $_SESSION['cart'][] = array('Item_Name' => $itemName, 'Price' => $price, 'Quantity' => 1);

            }
        } else {
            // Initialize the cart and add the first item
            $_SESSION['cart'][] = array('Item_Name' => $itemName, 'Price' => $price, 'Quantity' => 1);
            print_r($_SESSION['cart']);
        }

        // Redirect back to the selling page or any other desired page after adding the item to the cart
        header("Location: mycart.php");
        exit();
    }
}
*/
?>



