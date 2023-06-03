<?php
include "./connection.php";
include './functions/date-thai.php';
$page = 2; ?>
<!DOCTYPE html>
<html>

<head> 
    <title>สัมภาษณ์</title>
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

    <style>
        @media (max-width:675px) {
            .row-fix .col-sm-6 {
                width: 50% !important;
            }
        }
    </style>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <section class="main_text_heading">
            <div class="bg-text-heading" style="background-image: url(../img/bg-interview.webp);">
                <h1>สัมภาษณ์</h1>
            </div>
        </section>
        <section class="content-news">
            <?php
            $cate_one = "SELECT * from category where page_id = $page ORDER BY id DESC LIMIT 1";
            $query_c = mysqli_query($conn, $cate_one) or die("Error in query: $cate_one " . mysqli_error($conn));
            $Cate_fetch = mysqli_fetch_array($query_c);
            $id =  $Cate_fetch['id'];
            ?>
            <div class="container pt-3 pb-4">
                <div class="card-tab">
                    <h2 class="txt-heading "><?php echo  $Cate_fetch['name']; ?></h2>
                    <a href="../category/news/<?php echo $Cate_fetch['cate_url']; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                </div>
                <div class="row">
                    <div class="col-lg-6 my-1">
                        <?php
                        $query = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.status = 0 and articles.category_id =  $id ORDER BY articles.create_at DESC LIMIT 1");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <div class="post-cate" style="overflow-x: hidden;">
                            <a href="../view/<?php echo $row['url_articles_seo']; ?>/" class="post_link" rel="ugc">
                                <figure class="card_img_interview">
                                    <img class="lazy img-fluid " data-src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
                                </figure>
                                <div class="px-2">
                                    <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 80, 'utf-8'))); ?>...</h4>
                                    <div class="card-flex-new">
                                        <span>
                                            <img data-src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                            <?php echo $row["firstname"] . "  " . $row['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $str_Date = $row['create_at'];;
                                            echo ": " . DateThai($str_Date);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 my-1">
                        <div class="row">
                            <?php
                            $query_two = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.status = 0 and articles.category_id =  $id ORDER BY articles.create_at DESC LIMIT 1,2");
                            while ($row_result = mysqli_fetch_array($query_two)) {
                            ?>
                                <div class="col-lg-12 my-1">
                                    <div class="card-width">
                                        <a href="../view/<?php echo $row_result['url_articles_seo']; ?>/" class="post_link" rel="ugc">
                                            <div class="c-txt">
                                                <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 90, 'utf-8'))); ?>...</h4>
                                                <div class="card-flex-new">
                                                    <span>
                                                        <img data-src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                        <?php echo $row["firstname"] . "  " . $row['lastname']; ?>
                                                    </span>
                                                    <span class="date">
                                                        <i class="fas fa-clock"></i>
                                                        <?php
                                                        $str_Date = $row['create_at'];;
                                                        echo ": " . DateThai($str_Date);
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <figure class="card_img_right">
                                                <img class="lazy img-fluid " data-src="../backend/uploads/article-img/<?php echo $row_result['image_banner']; ?>" alt="<?php echo $row_result['topic_name']; ?>" width="100%" height="100%">
                                            </figure>
                                        </a>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-3">
                <?php
                $cate_two = "SELECT * from category where page_id = $page and id < $id ORDER BY id DESC";
                $query_co = mysqli_query($conn, $cate_two) or die("Error in query: $cate_two " . mysqli_error($conn));
                while ($Cate_ = mysqli_fetch_array($query_co)) {
                    $id_ = $Cate_['id'];
                ?>

                    <div class="card-tab">
                        <h2 class="txt-heading "><?php echo  $Cate_['name']; ?></h2>
                        <a href="../category/news/<?php echo $Cate_['cate_url']; ?>" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
                    </div>
                    <div class="row row-fix mb-5">
                        <?php
                        $query_three = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.status = 0 and articles.category_id = $id_ ORDER BY articles.create_at DESC LIMIT 4");
                        while ($three_result = mysqli_fetch_array($query_three)) { ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 my-2">
                                <div class="box-post">
                                    <a href="../view/<?php echo $three_result['url_articles_seo']; ?>/" class="post_link" rel="ugc">
                                        <figure class="news-articles-img">
                                            <img class="lazy img-fluid " data-src="../backend/uploads/article-img/<?php echo $three_result['image_banner']; ?>" alt="<?php echo $three_result['topic_name']; ?>" width="100%" height="100%">
                                        </figure>
                                        <div class="px-2">
                                            <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($three_result['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                            <div class="card-flex-new">
                                                <span>
                                                    <img data-src="../backend/uploads/user-img/<?php echo $three_result['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                    <?php echo $three_result["firstname"] . "  " . $three_result['lastname']; ?>
                                                </span>
                                                <span class="date">
                                                    <i class="fas fa-clock"></i>
                                                    <?php
                                                    $date = $three_result['create_at'];;
                                                    echo ": " . DateThai($date);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php   }
                ?>
            </div>
        </section>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>