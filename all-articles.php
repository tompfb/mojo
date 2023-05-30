<?php
include 'script-login.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <title>บทความทั้งหมด หวยหุ้นจีน</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all" />
    <meta name="Author" content="หวยหุ้นจีน">

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />

    <?php include('./link.php'); ?>
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/all-articles/" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/all-articles/" hreflang="th-TH" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "หน้าแรก",
                "item": "https://www.xn--82c8azatt7d.net/"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "บทความทั้งหมด"
            }]
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
                    <li class="breadcrumb-item active" aria-current="page" aria-disabled="page">บทความทั้งหมด</li>
                </ol>
            </nav>
        </div>
    </section>
    <article class="article-container-card">
        <div class="container ">
            <h1 class="bg-heading">บทความทั้งหมด</h1>
        </div>
        <div class="container">
            <div>

                <div id="loadtable">
                    <?php
                    $lastid = '';
                    include('./conn/connect.php');
                    $query = mysqli_query($conn, "SELECT * FROM articles order by id asc limit 9"); ?>
                    <div class="row">
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
                        } ?>
                    </div>
                    <div id="remove">
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
    <?php include('./custom.php'); ?>
</body>

</html>