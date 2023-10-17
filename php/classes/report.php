<?php

use classes\DbConnector;

class Report
{

    public static function getBill($orderID)
    {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT o.receiver, o.orderDate, o.TotalPrice, o.deliveryAddress, o.CoNum, o.city, o.OrderStatus, oi.itemQuantity, s.ItemName, s.ItemPrice
            FROM orders o
            JOIN orderitem oi ON o.orderID = oi.orderID
            JOIN shop s ON oi.ItemId = s.ItemId
            WHERE o.orderID = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $orderID);

            $pstmt->execute();

           // $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

            $myarray = array(); // Initialize an empty array

            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                $myarray[] = array(
                    $row['receiver'],
                    $row['orderDate'],
                    $row['TotalPrice'],
                    $row['deliveryAddress'],
                    $row['itemQuantity'],
                    $row['ItemName'],
                    $row['ItemPrice'],
                    $row['CoNum'],
                    $row['city'],
                    $row['OrderStatus']
                );
            }
            return $myarray;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
