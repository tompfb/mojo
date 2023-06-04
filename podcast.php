<?php
include "./connection.php";
include './functions/date-thai.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>พอดคาสต์</title>
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
        <section class="main_text_heading">
            <div class="bg-text-heading" style="background-image: url(../img/bg-Podcast.webp);">
                <h1>พอดคาสต์</h1>
            </div>
        </section>
        <section class="box-podcast">
            <?php
            $one = "1";
            $two = "2";
            $three = "3";
            $four = "4";
            ?>
            <div class="container">
                <div class="card-tab">
                    <h2 class="txt-heading ">นิทานก้อม</h2>
                    <a href="../category/podcast/<?php echo $one; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                </div>
                <div class="row">
                    <?php
                    $fetchpodcasts  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =   $one ORDER BY podcasts.id DESC LIMIT 4");
                    while ($row = mysqli_fetch_array($fetchpodcasts)) {
                    ?>
                        <div class="col-lg-3 col-md-6 my-2">
                            <a href="../view-podcast/<?php echo $row['id'] ?>/" class=" text-decoration-none">
                                <div class="card_podcast">
                                    <figure>
                                        <img src="../backend/uploads/podcast-img/<?php echo $row['image_podcast']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                        <img data-src="../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                    </figure>
                                    <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row['title'], 0, 40, 'utf-8'))); ?></h4>
                                    <div class="card-flex-new">
                                        <span>
                                            <img data-src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                            <?php echo $row["firstname"] . "  " . $row['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $str_po = $row['create_at'];;
                                            echo ": " . DateThai($str_po);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php     } ?>
                </div>
            </div>
            <div class="container">
                <div class="card-tab">
                    <h2 class="txt-heading ">ไทบ้านโสเหล่</h2>
                    <a href="../category/podcast/<?php echo $two; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                </div>
                <div class="row">
                    <?php
                    $pod_two  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =   $two ORDER BY podcasts.id DESC LIMIT 4");
                    while ($row_result = mysqli_fetch_array($pod_two)) {
                    ?>
                        <div class="col-lg-3 col-md-6 my-2">
                            <a href="../view-podcast/<?php echo $row_result['id'] ?>/" class=" text-decoration-none">
                                <div class="card_podcast">
                                    <figure>
                                        <img src="../backend/uploads/podcast-img/<?php echo $row_result['image_podcast']; ?>" alt="<?php echo $row_result['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                        <img data-src="../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                    </figure>
                                    <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row_result['title'], 0, 40, 'utf-8'))); ?></h4>
                                    <div class="card-flex-new">
                                        <span>
                                            <img data-src="../backend/uploads/user-img/<?php echo $row_result['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                            <?php echo $row_result["firstname"] . "  " . $row_result['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $P_date = $row_result['create_at'];;
                                            echo ": " . DateThai($P_date);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php     } ?>
                </div>
            </div>
            <div class="container">
                <div class="card-tab">
                    <h2 class="txt-heading ">ออนซอนอีสาน</h2>
                    <a href="../category/podcast/<?php echo $three; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                </div>
                <div class="row">
                    <?php
                    $pod_two  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =   $three ORDER BY podcasts.id DESC LIMIT 4");
                    while ($row_result = mysqli_fetch_array($pod_two)) {
                    ?>
                        <div class="col-lg-3 col-md-6 my-2">
                            <a href="../view-podcast/<?php echo $row_result['id'] ?>/" class=" text-decoration-none">
                                <div class="card_podcast">
                                    <figure>
                                        <img src="../backend/uploads/podcast-img/<?php echo $row_result['image_podcast']; ?>" alt="<?php echo $row_result['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                        <img data-src="../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                    </figure>
                                    <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row_result['title'], 0, 40, 'utf-8'))); ?></h4>
                                    <div class="card-flex-new">
                                        <span>
                                            <img data-src="../backend/uploads/user-img/<?php echo $row_result['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                            <?php echo $row_result["firstname"] . "  " . $row_result['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $P_date = $row_result['create_at'];;
                                            echo ": " . DateThai($P_date);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php     } ?>
                </div>
            </div>
            <div class="container">
                <div class="card-tab">
                    <h2 class="txt-heading ">หมอลำพาม่วน</h2>
                    <a href="../category/podcast/<?php echo $four; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                </div>
                <div class="row">
                    <?php
                    $pod_two  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =   $four ORDER BY podcasts.id DESC LIMIT 4");
                    while ($row_result = mysqli_fetch_array($pod_two)) {
                    ?>
                        <div class="col-lg-3 col-md-6 my-2">
                            <a href="../view-podcast/<?php echo $row_result['id'] ?>/" class=" text-decoration-none">
                                <div class="card_podcast">
                                    <figure>
                                        <img src="../backend/uploads/podcast-img/<?php echo $row_result['image_podcast']; ?>" alt="<?php echo $row_result['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                        <img data-src="../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                    </figure>
                                    <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row_result['title'], 0, 40, 'utf-8'))); ?></h4>
                                    <div class="card-flex-new">
                                        <span>
                                            <img data-src="../backend/uploads/user-img/<?php echo $row_result['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                            <?php echo $row_result["firstname"] . "  " . $row_result['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $P_date = $row_result['create_at'];;
                                            echo ": " . DateThai($P_date);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php     } ?>
                </div>
            </div>
        </section>
    </article>

    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>