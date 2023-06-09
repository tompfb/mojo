<?php
include "./connection.php";
include './functions/date-thai.php';
$page = 2; ?>
<!DOCTYPE html>
<html>

<head>

    <title>สัมภาษณ์ - mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน </title>
    <meta name="title" content="สัมภาษณ์ - mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta name="description" content="ข่าวงาน สัมภาษณ์ มากมาย จาก ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน และชุมชนอีกมากมาย" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="all" />
    <meta name="Author" content="mojo esan">
    <meta name="googlebots" content="all">
    <meta name="audience" content="all">
    <meta name="Rating" content="General">
    <meta name="distribution" content="Global">
    <meta name="allow-search" content="yes">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="สัมภาษณ์ - mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta property="og:description" content="ข่าวงาน สัมภาษณ์ มากมาย จาก ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน และชุมชนอีกมากมาย" />
    <meta property="og:url" content="https://www.mojoesan.com/interview/" />
    <meta property="og:site_name" content="สัมภาษณ์" />
    <meta property="og:image" content="../img/Logo-mojoesan.png" />

    <meta property="twitter:url" content="https://www.mojoesan.com/interview/">
    <meta property="twitter:image" content="../img/Logo-mojoesan.png">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="สัมภาษณ์ - mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta name="twitter:description" content="ข่าวงาน สัมภาษณ์ มากมาย จาก ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน และชุมชนอีกมากมาย" />
    <meta name="twitter:site" content="mojo esan">
    <meta name="twitter:creator" content="mojo esan">
    <link rel="canonical" href="https://www.mojoesan.com/interview/" />
    <link rel="alternate" href="https://www.mojoesan.com/interview/" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
    <?php include('./import-css.php'); ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "หน้าแรก",
                "item": "https://www.mojoesan.com/"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "สัมภาษณ์"
            }]
        }
    </script>

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
                        $url_articles_seo = $row['url_articles_seo'];
                        ?>
                        <?php
                        if ($row) { ?>
                            <div class="post-cate" style="overflow-x: hidden;">
                                <a href="../view/<?php echo $url_articles_seo; ?>" class="post_link" rel="ugc">
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
                        <?php        }
                        ?>
                    </div>
                    <div class="col-lg-6 my-1">
                        <div class="row">
                            <?php
                            $query_two = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.status = 0 and articles.category_id =  $id ORDER BY articles.create_at DESC LIMIT 1,2");
                            while ($row_result = mysqli_fetch_array($query_two)) {
                            ?>
                                <div class="col-lg-12 my-1">
                                    <div class="card-width">
                                        <a href="../view/<?php echo $row_result['url_articles_seo']; ?>" class="post_link" rel="ugc">
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
                                    <a href="../view/<?php echo $three_result['url_articles_seo']; ?>" class="post_link" rel="ugc">
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