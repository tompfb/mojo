<?php
include 'script-login.php';
include './conn/connect.php';
$name = $_GET["firstname"];
$Fname = $_GET["firstname"];
$showName = str_replace('-', ' ', $name);
if (isset($Fname)) {
    $chack_Fname = "SELECT * FROM user where firstname = '$Fname'";
    $chack_query = mysqli_query($conn, $chack_Fname) or die("error in query:$chack_Fname" . mysqli_error($conn));
    $chack_query_author = mysqli_fetch_array($chack_query);
    $a_id = $chack_query_author["id"];
    $a_name = $chack_query_author["firstname"];
    $encode = urlencode($name);
}



?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $a_name ?>, Author at หวยหุ้นจีน</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/author/<?php echo $a_name ?>" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/author/<?php echo $a_name ?>" hreflang="th-TH" />
    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="author" />
    <meta property="og:title" content="<?php echo $a_name ?>, Author at หวยหุ้นจีน" />
    <meta property="og:url" content="https://www.xn--82c8azatt7d.net/author/<?php echo $a_name ?>" />
    <meta property="og:site_name" content="หวยหุ้นจีน" />
    <meta property="og:image" content="../img/logo-lotto-chinese.webp" />
    <meta name="twitter:card" content="summary_large_image" />

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
                    "name": "<?php echo $a_name;  ?>"
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
                    <li class="breadcrumb-item active" aria-current="page" aria-disabled="page"> <?php echo $a_name;  ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <article class="viewcontainer">
        <div class="container boxcontainer" style="min-height: 60vh;">
            <div class="heading-bg-secon">
                <h1 class="bg-heading">
                    AUTHOR ARCHIVES : <?php echo $a_name; ?>
                </h1>
            </div>
            <div id="loadtable">
                <?php
                $lastid = '';
                include('./conn/connect.php');
                $query = mysqli_query($conn, "SELECT *,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE user.firstname ='$name' ORDER BY articles.id   asc limit 9"); ?>
                <div class="row align-items-end">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $article_id = $row['id'];
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
                                <div class="usertag">
                                    <div class="tag__info">
                                        <?php
                                        $sql_tag = "SELECT tag.tag_url as tag_url,tag.name as name FROM (tag
                                    left join tag_log on tag.id = tag_log.tag_id)
                                    where articles_id = $article_id ";
                                        $query_tag = mysqli_query($conn, $sql_tag) or die("Error in query: $sql " . mysqli_error($conn));
                                        while ($result_tag = $query_tag->fetch_assoc()) {
                                        ?>
                                            <a href="../tag/<?php echo $result_tag['tag_url']; ?>" style="text-decoration: none;">
                                                <span class="tag tag-red"><?php echo $result_tag['name'] ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        $lastid = $row['id'];
                        $aaname =  $name;
                    } ?>
                </div>
                <div id="remove">
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-aaname="<?php echo $aaname; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </article>
    <?php include('./component/footer.php'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#loadmore', function() {
                var lastid = $(this).data('id');
                var aaname = $(this).data("aaname");
                $('#loadmore').html('กำลังโหลด...');
                $.ajax({
                    url: "../load_author.php",
                    method: "POST",
                    data: {
                        aaname: aaname,
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