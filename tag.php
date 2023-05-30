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
<!------------------end date ------------------>
<?php
include './conn/connect.php';
$name = $_GET["tag_url"];
$tagUrl = $_GET["tag_url"];
// รับข้อมูลจากตาราง 
if (isset($name)) {

    $chack_tag_log = "SELECT * FROM tag
	where tag_url = '$name'";
    $chack_query = mysqli_query($conn, $chack_tag_log) or die("error in query:$chack_tag_log" . mysqli_error($conn));

    $chack_query_tag = mysqli_fetch_array($chack_query);
    $t_id = $chack_query_tag["id"];
    $t_name = $chack_query_tag["name"];
    $encode = urlencode($t_name);
}

$sqlAllArticle = "SELECT * FROM articles LEFT join tag_log on articles.id = tag_log.articles_id WHERE tag_log.tag_id ='$t_id' ORDER BY articles.id DESC";
$allArticle = mysqli_query($conn, $sqlAllArticle) or die("Error in query: $sqlAllArticle " . mysqli_error($conn));
$resultrow = mysqli_fetch_array($allArticle);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $name  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $resultrow['descripion_seo'];  ?>">
    <meta name="robots" content="all" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/tag/<?php echo $tagUrl ?>" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/tag/<?php echo $tagUrl ?>" hreflang="th-TH" />
    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />

    <?php include('./link.php'); ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "หน้าแรก",
                    "item": https: //www.xn--82c8azatt7d.net/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "บทความทั้งหมด",
                    "item": https: //www.xn--82c8azatt7d.net/all-articles/"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "แท็ก <?php echo $t_name;  ?>"
                }
            ]
        }
    </script>

</head>

<body>
    <?php include('./component/header.php'); ?>
    <section id="bread-crumbs">
        <div class="container px-0">
            <nav aria-label="breadcrumb " class="nav-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../">หน้าแรก</a></li>
                    <li class="breadcrumb-item"><a href="../all-articles/">บทความทั้งหมด</a></li>
                    <li class="breadcrumb-item active" aria-current="page" aria-disabled="page">แท็ก <?php echo $t_name;  ?></li>
                </ol>
            </nav>
        </div>
    </section>
    <article class="article-container-card">
        <section class="container">
            <div class="heading-bg-secon">
                <h1 class="bg-heading">
                    แท็ก : <?php echo $name; ?>
                </h1>
            </div>
            <div id="loadtable">
                <?php
                $lastid = '';
                include('./conn/connect.php');
                $query = mysqli_query($conn, "SELECT *,articles.id as id FROM articles LEFT join tag_log on articles.id = tag_log.articles_id WHERE tag_log.tag_id ='$t_id' ORDER BY articles.id  asc limit 9"); ?>
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        // $article_id = $row['id'];
                    ?>

                        <div class="col-lg-4 col-md-6  col-sm-12">
                            <div class="bg_articles my-2">
                                <a href="../view/<?php echo $row['url_articles_seo']; ?>">
                                    <figure class="news-articles-img">
                                        <div class="bg-img">
                                            <img class="lazy img-fluid" data-src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?>" width="100%" height="100%">
                                        </div>
                                    </figure>
                                    <div class="px-2">
                                        <strong class="news-articles-h4"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?></strong>
                                        <div class="view_date">
                                            <span>
                                                โพสเมื่อ : <?php echo date("Y-m-d", strtotime($row['create_at'])); ?>
                                            </span>
                                            <span>
                                                ผู้เข้าชม : <?php echo $row['view']; ?>
                                            </span>
                                        </div>

                                        <p class="news-articles-p "><?php echo trim(strip_tags(mb_substr($row['descripion_seo'], 0, 120, 'utf-8'))); ?></p>

                                    </div>
                                </a>

                            </div>
                        </div>

                    <?php
                        $lastid = $row['id'];
                        $tags =  $t_id;
                    } ?>
                </div>
                <div id="remove">
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-tags="<?php echo $tags; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
    <?php include('./component/footer.php'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#loadmore', function() {
                var lastid = $(this).data('id');
                var tags_id = $(this).data("tags");
                $('#loadmore').html('กำลังโหลด...');
                $.ajax({
                    url: "../load_tag.php",
                    method: "POST",
                    data: {
                        tags_id: tags_id,
                        lastid: lastid,

                    },
                    dataType: "text",
                    success: function(data) {
                        if (data != '') {
                            $('#remove').remove();
                            $('#loadtable').append(data);
                        } else {
                            $('#loadmore').html('ไม่มีข้อมูลเพิ่มเติม');
                        }
                    }
                });
            });
        });
    </script>
    <?php include('./import-js.php'); ?>
</body>

</html>