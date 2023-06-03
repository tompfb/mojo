<?php
include './conn/connect.php';
if (isset($_GET["news"])) {
    $category_name = $_GET["news"];
    $url = "news/" . $category_name;
} else if ($podcast_n = $_GET["podcast"]) {
    $num = $_GET["podcast"];
    $url = "podcast/" . $num;
    if ($num == 1) {
        $category_name = "นิทานก้อม";
    } elseif ($num == 2) {
        $category_name = "ไทบ้านโสเหล่";
    } elseif ($num == 3) {
        $category_name = "ออนซอนอีสาน";
    } elseif ($num == 4) {
        $category_name = "หมอลำพาม่วน";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $category_name;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/category/<?php echo $url; ?>" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/category/<?php echo $url; ?>" hreflang="th-TH" />

    <link rel="shortcut icon" href="../../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../../favicon.webp" />

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
                    "name": "หมวดหมู่ <?php echo $category_name;  ?>"
                }
            ]
        }
    </script>
    <?php include('./import-css.php'); ?>
</head>

<body>
    <?php include('./component/header-page.php'); ?>
    <article class="viewcontainer content">
        <div class="container boxcontainer" style="min-height: 60vh;">
            <div class="heading-bg-secon">
                <h1 class="bg-heading">
                    หมวดหมู่ : <?php echo $category_name; ?>
                </h1>
            </div>
            <div id="loadtable">
                <?php
                $lastid = '';
                include('./conn/connect.php');
                $query = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join category on articles.category_id = category.id WHERE category.id ='$category_name' ORDER BY articles.id  asc limit 9"); ?>
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
                                        <strong class="news-articles-h4"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 50, 'utf-8'))); ?></strong>
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
                        $Ncategory =  $category_name;
                    } ?>
                </div>
                <div id="remove">
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-cate="<?php echo $Ncategory; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </article>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#loadmore", function() {
                var lastid = $(this).data("id");
                var Ncategory = $(this).data("cate");
                $("#loadmore").html("กำลังโหลด...");
                $.ajax({
                    url: "../load_cate.php",
                    method: "POST",
                    data: {
                        Ncategory: Ncategory,
                        lastid: lastid,
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data != "") {
                            $("#remove").remove();
                            $("#loadtable").append(data);
                        } else {
                            $("#loadmore").html("ไม่มีข้อมูลเพิ่มเติม");
                        }
                    },
                });
            });
        });
    </script>
    <?php include('./component/footer-page.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>