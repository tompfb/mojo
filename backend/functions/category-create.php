<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
include "../connect/connect.php";

if (!empty($_POST["name"])) {
    $name = $_POST['name'];
    $url_name = $_POST['name'];
    $page = "1";
    function to_pretty_url($url)
    {
        if ($url !== mb_convert_encoding(mb_convert_encoding($url, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $url  = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url));
        $url  = htmlentities($url, ENT_NOQUOTES, 'UTF-8');
        $url  = preg_replace('`&([ก-เ][a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $url);
        $url  = html_entity_decode($url, ENT_NOQUOTES, 'UTF-8');
        $url  = preg_replace(array('`[^a-z0-9ก-เ]`i', '`[-]+`'), '-', $url);
        $url  = strtolower(trim($url, '-'));
        return $url;
    }

    $url = to_pretty_url( $url_name);

    $strSQL = "INSERT INTO category (name,page_id,cate_url) VALUES ('" . $name . "','".$page."','".$url."')";
    $categoryResult = mysqli_query($conn, $strSQL);
    $category_id = '';
    if ($categoryResult) {
        $category_id = mysqli_insert_id($conn);
    }

    if ($category_id) {
        echo '<script language="javascript">';
        echo 'alert("Create category success")';
        echo '</script>';
        echo "<script>window.location.href='../category.php';</script>";
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("Please fill data")';
    echo '</script>';
    echo "<script>window.location.href='../category.php';</script>";
}
