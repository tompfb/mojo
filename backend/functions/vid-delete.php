<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}

include "../connect/connect.php";

$vid = $_GET['id'];

$vname = $_GET['name'];

if (@$_GET['name']) {
    $file_to_delete = '../uploads/videos/' . $vname;
    unlink($file_to_delete);

    $sql = "SELECT * FROM videos where id = '" . $vid . "' ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $location = $row['location'];

        $file_to_delete2 = '../uploads/videos/' . $location;
        unlink($file_to_delete2);
        
    }
}

$strSQL = "DELETE FROM videos WHERE id='$vid'";
$tagResult = mysqli_query($conn, $strSQL);
if ($tagResult) {
    echo '<script language="javascript">';
    echo 'alert("Delete tag success")';
    echo '</script>';
    echo "<script>window.location.href='../video.php';</script>";
}
