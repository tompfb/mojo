<?php

$db_host = "localhost:3306"; // localhost server
$db_user = "mojoesan_projectnews"; // database username
$db_password = "1~u2ce5H0"; // database password
$db_name = "mojoesan_news"; // database name

try {

    $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (PDOException $e) {
    $e->getMessage();
}
 
// $servername = "localhost:3306";
// $username = "mojoesan_projectnews";
// $password = "1~u2ce5H0";
// $database = "mojoesan_news";
$servername = "localhost";
$username = "root";
$password = "";
$database = "project_news";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
    printf("Errormessage: %s\n", $mysqli->error);
}