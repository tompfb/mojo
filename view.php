<!------- date --------------->
<?php
include 'script-login.php';
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "Jan.", "Feb.", "Mar.", "Apr.", "May.", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}
?>
<?php
include './conn/connect.php';
$sql1 = "UPDATE articles SET  view=view+1   WHERE url_articles_seo='$_GET[url_articles_seo]'";
$query1 = mysqli_query($conn, $sql1);
?>

<!------------------end date ------------------>
<?php
include './conn/connect.php';
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
    <meta property="og:url" content="https://www.xn--82c8azatt7d.net/view/<?php echo $encode ?>" />
    <meta property="og:site_name" content="หวยหุ้นจีน" />

    <meta property="twitter:url" content="https://www.xn--82c8azatt7d.net/view/<?php echo $encode ?>">
    <meta property="twitter:image" content="../backend/uploads/article-img/<?php echo $image_banner ?>">
    <meta name="twitter:title" content="<?php echo $topic_name ?>" />
    <meta name="twitter:description" content="<?php echo $descripion_seo ?>" />
    <meta name="twitter:site" content="หวยหุ้นจีน" />
    <meta name="twitter:creator" content="หวยหุ้นจีน" />
    <meta name="twitter:card" content="summary_large_image" />

    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/<?php echo $encode ?>" hreflang="th-TH" />
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/<?php echo $encode ?>" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KJD33H7ZXZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KJD33H7ZXZ');
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://www.xn--82c8azatt7d.net/view/<?php echo $encode ?>"
            },
            "headline": "<?php echo $topic_name  ?>",
            "image": [
                "https://www.xn--82c8azatt7d.net/backend/uploads/article-img/<?php echo $image_banner  ?>"
            ],
            "datePublished": "<?php echo $create_at ?>",
            "dateModified": "<?php echo $update_at ?>",
            "author": {
                "@type": "Person",
                "name": "หวยหุ้นจีน",
                "url": "https://www.xn--82c8azatt7d.net/view/<?php echo $encode ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "หวยหุ้นจีน",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://www.xn--82c8azatt7d.net/view/<?php echo $encode ?>"
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
                    "item": "https://www.xn--82c8azatt7d.net/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "บทความทั้งหมด",
                    "item": "https://www.xn--82c8azatt7d.net/all-articles/"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo $topic_name ?>"
                }
            ]
        }
    </script>

    <?php include('./link.php'); ?>
    <style>
        ol,
        ul,
        li {
            color: #3d3d3d;
            font-size: 18px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .news-text {
            padding: 20px !important;
        }

        .view-show-blog p {
            color: #3d3d3d;
        }
    </style>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="view-content " style="overflow-x: hidden;">
        <section id="bread-crumbs">
            <div class="container px-0">
                <nav aria-label="breadcrumb " class="nav-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="../all-articles/">บทความทั้งหมด</a></li>
                        <li class="breadcrumb-item active" aria-current="page" aria-disabled="page"><?php echo $topic_name  ?></li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="view-show-blog">
            <div class="container">
                <div class="heading-bg-secon">
                    <h1 class="bg-heading">
                        <?php echo $topic_name  ?>
                    </h1>
                </div>
                <div class="text-center">
                    <img data-src="../backend/uploads/article-img/<?php echo $image_banner; ?>" class="lazy img-fluid">
                </div>
                <aside class="site">
                    <div class="potsnew">
                        <span class="date-news">
                            <?php
                            $strDate = $create_at;
                            echo "โพสเมื่อ : " . DateThai($strDate);
                            ?>
                        </span>
                        <span class="news-views">
                            <i class="fa fa-eye"></i> <?php echo $view  ?>
                        </span>
                        <span class="order_by">
                            BY : <a class="link_a" href="../author/<?php echo $authorName ?>"> <?php echo $authorName ?></a>
                        </span>
                        <div class="buttons">
                            <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=https://www.xn--82c8azatt7d.net/<?php echo $url_articles_seo ?>" title="Join us on Facebook" onclick="window.open(this.href, 'facebook-share','width=500,height=300');return false;"><i class="fab fa-facebook" aria-hidden="true"></i>facebook</a>
                            <a class="tw" href="https://twitter.com/share?text=title &url=https://www.xn--82c8azatt7d.net/<?php echo $url_articles_seo ?>" title="Join us on Twitter" target="_blank" onclick="window.open(this.href, 'twitter-share', 'width=500,height=300');return false;"><i class="fab fa-twitter" aria-hidden="true"></i>twitter</a>
                            <a class="i-line" href="https://social-plugins.line.me/lineit/share?url=https://www.xn--82c8azatt7d.net/<?php echo $url_articles_seo ?>" title="Join us on line" onclick="window.open(this.href, 'facebook-share','width=500,height=500');return false;"><i class="fab fa-line" aria-hidden="true"></i>line</a>
                        </div>
                    </div>
                </aside>
                <p class="news-text">
                    <?php echo $descripion  ?>
                </p>
                <div class="box-name-category">
                    <?php
                    $sql_category = "SELECT * FROM category WHERE id = $category_id";
                    $query_cate = mysqli_query($conn, $sql_category) or die("Error in query: $sql_category " . mysqli_error($conn));
                    $result_cate = mysqli_fetch_array($query_cate);

                    ?>
                    <p>Category :</p>
                    <a href="../category/<?php echo $result_cate['name']; ?>" rel="ugc"><?php echo $result_cate['name']; ?></a>
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
            </div>
        </section>
    </article>
    <?php include('./component/main-article.php'); ?>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>