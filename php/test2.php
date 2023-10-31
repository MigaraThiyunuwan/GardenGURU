<?php 
/////////////////////////////////////////////// Malki ///////////////////////////////////////////////////////////////////

namespace classes;

use PDO;
class Book{
    private $barcode;
    private $name;
    private $author;
    private $quantity;
    private $price;
    
    function __construct($barcode, $name, $author, $quantity, $price) {
        $this->barcode = $barcode;
        $this->name = $name;
        $this->author = $author;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    
    function getBarcode() {
        return $this->barcode;
    }

    function getName() {
        return $this->name;
    }

    function getAuthor() {
        return $this->author;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getPrice() {
        return $this->price;
    }

    function setBarcode($barcode) {
        $this->barcode = $barcode;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    function setPrice($price) {
        $this->price = $price;
    }
    public function increaseQuantity($amount) { 
    }
    public function decreaseQuantity($amount) {   
    }
    public function UpdateBookDetails() {  
    }
    public static function display($con) {
        $con = DbConnector::getConnection();
        $books = array();
        try {
            $query = "SELECT * FROM book";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $row){
                $book = new Book($row->barcode, $row->name, $row->author, $row->quantity, $row->price);
                $books[] = $book;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $books;
        }
}










/////////////////////////////////////////////// Lashan ///////////////////////////////////////////////////////////////////



































































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
