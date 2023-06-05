<!------- date --------------->
<?php
include './functions/date-thai.php';
?>
<?php
include("./connection.php");
$sql1 = "UPDATE articles SET  view=view+1   WHERE url_articles_seo='$_GET[url_articles_seo]'";
$query1 = mysqli_query($conn, $sql1);
?>

<!------------------end date ------------------>
<?php
include("./connection.php");
$url_articles_seo = $_GET["url_articles_seo"];
// รับข้อมูลจากตาราง 
if (isset($url_articles_seo)) {

    $sql_query = "SELECT * FROM articles 
	WHERE url_articles_seo='$url_articles_seo'";
    $result_set = mysqli_query($conn, $sql_query) or die('ข้อผิดพลาด');
    $result = mysqli_fetch_array($result_set);
    $id = $result["id"];
    $category_id  =  $result["category_id"];
    $user_id  =  $result["user_id"];
    $topic_name  =  $result["topic_name"];
    $descripion  =  $result["descripion"];
    $image_banner  =  $result["image_banner"];
    $create_at  =  $result["create_at"];
    $update_at  =  $result["update_at"];
    $view  =  $result["view"];
    $keyword_seo  =  $result["keyword_seo"];
    $descripion_seo  =  $result["descripion_seo"];
    $url_articles_seo  =  stripslashes($result["url_articles_seo"]);
    $encode = urlencode($url_articles_seo);


    $sql_author = "SELECT * FROM articles LEFT join user on articles.user_id = user.id WHERE user.id ='$user_id' ";
    $query_article = mysqli_query($conn, $sql_author) or die("Error in query: $sql_author " . mysqli_error($conn));
    $author = mysqli_fetch_array($query_article);
    $authorName = $author["firstname"];
    $lastname   = $author["lastname"];
}

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <title><?php echo $topic_name  ?></title>
    <meta name="title" content="<?php echo $topic_name  ?>" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="th" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $descripion_seo  ?>">
    <meta name="robots" content="index,follow" />
    <meta name="Author" content="<?php echo $authorName ?>">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $topic_name  ?>" />
    <meta property="og:description" content="<?php echo $descripion_seo  ?>" />
    <meta property="og:image" content="../backend/uploads/article-img/<?php echo $image_banner ?>" />
    <meta property="og:url" content="#/view/<?php echo $encode ?>" />
    <meta property="og:site_name" content="หวยหุ้นจีน" />

    <meta property="twitter:url" content="#/view/<?php echo $encode ?>">
    <meta property="twitter:image" content="../backend/uploads/article-img/<?php echo $image_banner ?>">
    <meta name="twitter:title" content="<?php echo $topic_name ?>" />
    <meta name="twitter:description" content="<?php echo $descripion_seo ?>" />
    <meta name="twitter:site" content="หวยหุ้นจีน" />
    <meta name="twitter:creator" content="หวยหุ้นจีน" />
    <meta name="twitter:card" content="summary_large_image" />

    <link rel="alternate" href="#/view/<?php echo $encode ?>" hreflang="th-TH" />
    <link rel="canonical" href="#/view/<?php echo $encode ?>" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />

    <?php include('./import-css.php'); ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "#/view/<?php echo $encode ?>"
            },
            "headline": "<?php echo $topic_name  ?>",
            "image": [
                "#/backend/uploads/article-img/<?php echo $image_banner  ?>"
            ],
            "datePublished": "<?php echo $create_at ?>",
            "dateModified": "<?php echo $update_at ?>",
            "author": {
                "@type": "Person",
                "name": "หวยหุ้นจีน",
                "url": "#/view/<?php echo $encode ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "หวยหุ้นจีน",
                "logo": {
                    "@type": "ImageObject",
                    "url": "#/view/<?php echo $encode ?>"
                }
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "หน้าแรก",
                    "item": "#/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "บทความทั้งหมด",
                    "item": "#/all-articles/"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo $topic_name ?>"
                }
            ]
        }
    </script>
    <style>
        img {
            max-width: 100%;
            height: auto;
        }

        ol,
        li,
        ul {
            color: #737373;
        }

        .c-txt {
            width: 65% !important;
        }

        .card_img_right {
            width: 35% !important;
            height: 120px !important;
        }
    </style>

</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content" style="overflow-x: hidden;">
        <section class="view-show-blog">
            <div class="heading-bg-secon pt-3 pb-4 mb-3" style="background-color: #f8ebe2;">
                <div class="container">
                    <h1 class="bg-heading">
                        <?php echo $topic_name  ?>
                    </h1>
                    <div class="site-span">
                        <span class="date-news">
                            <?php
                            $strDate = $create_at;
                            echo "<i class='fas fa-clock'></i> : " . DateThai($strDate);
                            ?>
                        </span>
                        <span class="news-views">
                            <i class="fa fa-eye"></i> : <?php echo $view  ?>
                        </span>
                        <span class="order_by">
                            <i class="fas fa-user"></i> : <a class="link_a" href="../author/<?php echo $authorName ?>"><?php echo $authorName . " " . $lastname  ?> </a>
                        </span>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="my-2 col-md-12 col-lg-8">
                        <div class="text-center">
                            <img data-src="../backend/uploads/article-img/<?php echo $image_banner; ?>" class="lazy img-fluid">
                        </div>
                        <p class="news-text">
                            <?php echo $descripion  ?>
                        </p>
                        <div class="box-name-category">
                            <?php
                            $sql_category = "SELECT * FROM category WHERE id = $category_id";
                            $query_cate = mysqli_query($conn, $sql_category) or die("Error in query: $sql_category " . mysqli_error($conn));
                            $result_cate = mysqli_fetch_array($query_cate);

                            ?>
                            <p>หมวดหมู่ : <a href="../category/news/<?php echo $result_cate['cate_url']; ?>" rel="ugc"><?php echo $result_cate['name']; ?></a>
                            </p>
                        </div>
                        <div class="box-name-tag">
                            <p>Tags : </p>
                            <?php
                            include './conn/connect.php';
                            $chack_tag_log = "SELECT tag.name ,tag.tag_url FROM (tag
				left join tag_log on tag.id = tag_log.tag_id)
				where articles_id = $id ";
                            $chack_query = mysqli_query($conn, $chack_tag_log) or die("error in query:$chack_tag_log" . mysqli_error($conn));
                            while ($r = mysqli_fetch_array($chack_query)) {
                            ?>
                                <a href="../tag/<?php echo $r['tag_url']; ?>" class="link-tag" rel="ugc"><?php echo $r['name']; ?></a>

                            <?php
                            }
                            ?>
                        </div>
                        <aside class="site">
                            <div class="buttons">
                                <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=#/view/<?php echo $url_articles_seo ?>" title="Join us on Facebook" onclick="window.open(this.href, 'facebook-share','width=500,height=300');return false;"><i class="fab fa-facebook" aria-hidden="true"></i>facebook</a>
                                <a class="tw" href="https://twitter.com/share?text=title &url=#/view/<?php echo $url_articles_seo ?>" title="Join us on Twitter" target="_blank" onclick="window.open(this.href, 'twitter-share', 'width=500,height=300');return false;"><i class="fab fa-twitter" aria-hidden="true"></i>twitter</a>
                                <a class="i-line" href="https://social-plugins.line.me/lineit/share?url=#/view/<?php echo $url_articles_seo ?>" title="Join us on line" onclick="window.open(this.href, 'facebook-share','width=500,height=500');return false;"><i class="fab fa-line" aria-hidden="true"></i>line</a>
                            </div>
                        </aside>
                    </div>
                    <div class="my-2 col-md-12 col-lg-4 news-hit">
                        <h3 class="txt-heading">ข่าวยอดฮิต</h3>
                        <div class="row">
                            <?php
                            $query_two = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.status = 0  ORDER BY articles.view DESC LIMIT 4");
                            while ($row_result = mysqli_fetch_array($query_two)) {
                            ?>
                                <div class="col-lg-12 col-md-6 my-1">
                                    <div class="card-width">
                                        <a href="../view/<?php echo $row_result['url_articles_seo']; ?>" class="post_link" rel="ugc">
                                            <div class="c-txt">
                                                <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row_result['topic_name'], 0, 90, 'utf-8'))); ?>...</h4>
                                                <div class="card-flex-new">
                                                    <span>
                                                        <img data-src="../backend/uploads/user-img/<?php echo $row_result['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                        <?php echo $row_result["firstname"] . "  " . $row_result['lastname']; ?>
                                                    </span>
                                                    <span class="date">
                                                        <i class="fas fa-clock"></i>
                                                        <?php
                                                        $str_Date = $row_result['create_at'];;
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
                            <?php     }     ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
    <br><br>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>