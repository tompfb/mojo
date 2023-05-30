<?php include('./script-login.php') ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR PAGE 400</title>
    <style>
        <?php
        include('bootstrap/bootstrap.css');
        include('css/style.css');
        ?>
    </style> 
</head>


<body>
    <?php include('./component/header.php'); ?>
    <article class="err-404 ">
        <section class="error container">
            <strong>ERROR 404</strong>
            <p class="white mb-0">page not found !!!!</p>
        </section>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>