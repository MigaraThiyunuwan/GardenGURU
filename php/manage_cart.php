

<?php
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

    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "
                    <script>
                        alert('Item Removed');
                        window.location.href = 'mycart.php';
                    </script>";
            }
        }
    }
    if(isset($_POST['Mod_Quantity'])){
        foreach ($_SESSION['cart'] as $key => $value) {

            if ($value['Item_Name'] == $_POST['Item_Name']) {
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                print_r($_SESSION['cart']);
                
               // echo "
                 //   <script>
                    //    alert('Item Removed');
                        //window.location.href = 'mycart.php';
                   // </script>";
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



