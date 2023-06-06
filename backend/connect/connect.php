<?php
// $conn = mysqli_connect("localhost:3306", "mojoesan_projectnews", "1~u2ce5H0", "mojoesan_news") or die("Error server");
$conn = mysqli_connect("localhost", "root", "", "project_news") or die("Error server");
class connectDB
{
    public $conn;

    // private $hostName = "localhost";
    // private $userName = "mojoesan_projectnews";
    // private $password = "1~u2ce5H0";
    // private $dbName = "mojoesan_news";
    private $hostName = "localhost:3306";
    private $userName = "root";
    private $password = "";
    private $dbName = "project_news";

    function __construct()
    {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        $this->conn->set_charset("utf8");
        if (!$this->conn) {
            die("Connection failed" . mysqli_connect_error());
        }
    }
}
