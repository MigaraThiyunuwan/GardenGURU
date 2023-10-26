<?php
/////////////////////////////////////////////// Malki ///////////////////////////////////////////////////////////////////
































































































/////////////////////////////////////////////// Lashan ///////////////////////////////////////////////////////////////////



































































































/////////////////////////////////////////////// dharani ///////////////////////////////////////////////////////////////////




































































































/////////////////////////////////////////////// Navo ///////////////////////////////////////////////////////////////////
namespace classes;

use PDO;
use PDOException;

class DbConnector
{
    private static $host = "localhost";
    private static $dbname = "user";
    private static $db_user = "root";
    private static $db_pw = "";
    public static function getConnection()
    {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $con = new PDO($dsn, self::$db_user, self::$db_pw);
            return $con;
        } catch (PDOException $exc) {
            die("Error in database connection: " . $exc->getMessage());
        }
    }
}
class Book
{
    private $barcode;
    private $name;
    private $author;
    private $price;
    private $quantity;
    public function __construct($barcode, $name, $author, $price, $quantity)
    {
        $this->barcode = $barcode;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getBarcode()
    {
        return $this->barcode;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function increaseQuantity($no)
    {
        $this->quantity = $this->quantity + $no;
    }
    public function decreaseQuantity($no)
    {
        $this->quantity = $this->quantity - $no;
    }
    public static function displayBookDetails($con)
    {
        $books = array();
        try {
            $query = "SELECT * FROM book";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                foreach ($rs as $row) {
                    $book = new Book($row->barcode, $row->name, $row->author, $row->price, $row->quantity);
                    $books[] = $book;
                }
            }
        } catch (PDOException $ex) {
            die("Error in Book Class displayBookDetails method " . $ex->getMessage());
        }
        return $books;
    }
}
