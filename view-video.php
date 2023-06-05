<?php
include "./connection.php";
include './functions/date-thai.php';
@$id =  $_GET["name"];
if ($id) {
    $sql = "SELECT * FROM videos WHERE id = $id";
    $Qsql = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($Qsql);
    $name = $row['v_title'];
    $usId = $row['user_id'];
    $Asql = "SELECT * from user where id = $usId";
    $Q_au = mysqli_query($conn, $Asql);
    $result = mysqli_fetch_array($Q_au);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $name;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/category/" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/category/" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
    <?php include('./import-css.php'); ?>

</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <div class="container py-3 con-vh">
            <div class="row">
                <div class="col-lg-9 my-1">

                </div>
                <div class="col-lg-3 my-1">
                    <h3 class="txt-heading">ที่เกี่ยวข้อง</h3>

                </div>
            </div>
        </div>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>