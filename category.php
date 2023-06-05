<?php
include("./connection.php");
if (isset($_GET["news"])) {
    $category_ = $_GET["news"];
    $sqlC = "SELECT * FROM category WHERE cate_url = '$category_'";
    $Qsql =   mysqli_query($conn, $sqlC) or die("Error in query: $sqlC " . mysqli_error($conn));
    $rowone = mysqli_fetch_array($Qsql);
    $category_name =  $rowone['name'];
    $category_id =  $rowone['id'];
    $url = "news/" . $category_;
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
            <div class="py-3">
                <h1 class="txt-heading"> <?php echo $category_name; ?></h1>
            </div>
            <?php
            if (isset($_GET['news'])) { ?>
                <div id="loadtable">
                    <?php
                    $lastid = '';
                    include("./connection.php");
                    include './functions/date-thai.php';

                    $query = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.category_id = $category_id and articles.status = 0   order by articles.id DESC limit 9"); ?>
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                                <div class="box-post">
                                    <a href="../../view/<?php echo $row['url_articles_seo']; ?>" class="post_link" rel="ugc">
                                        <figure class="news-articles-img">
                                            <img class="lazy img-fluid " data-src="../../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
                                        </figure>
                                        <div class="px-2">
                                            <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                            <div class="card-flex-new">
                                                <span>
                                                    <img data-src="../../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
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
                        <?php
                            $lastid = $row['id'];
                            $Ncategory =  $category_id;
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
            <?php   } else { ?>
                <div id="loadtable">
                    <?php
                    $lastid = '';
                    include("./connection.php");
                    include './functions/date-thai.php';
                    $query  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =   $num ORDER BY podcasts.id DESC LIMIT 9");
                    ?>
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                                <a href="../../view-podcast/<?php echo $row['id'] ?>" class=" text-decoration-none">
                                    <div class="card_podcast">
                                        <figure>
                                            <img src="../../backend/uploads/podcast-img/<?php echo $row['image_podcast']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                            <img data-src="../../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                        </figure>
                                        <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row['title'], 0, 40, 'utf-8'))); ?></h4>
                                        <div class="card-flex-new">
                                            <span>
                                                <img data-src="../../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
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
                        <?php
                            $lastid = $row['id'];
                            $Ncategory =  $num;
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
            <?php     }
            ?>
        </div>
    </article>
    <br><br>
    <?php include('./component/footer-page.php'); ?>
    <?php
    if (isset($_GET['news'])) { ?>
        <script>
            $(document).ready(function() {
                $(document).on("click", "#loadmore", function() {
                    var lastid = $(this).data("id");
                    var Ncategory = $(this).data("cate");
                    $("#loadmore").html("กำลังโหลด...");
                    $.ajax({
                        url: "../../load_cate.php",
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
    <?php     } else { ?>
        <script>
            $(document).ready(function() {
                $(document).on("click", "#loadmore", function() {
                    var lastid = $(this).data("id");
                    var Ncategory = $(this).data("cate");
                    $("#loadmore").html("กำลังโหลด...");
                    $.ajax({
                        url: "../../load_pod.php",
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

    <?php   }

    ?>
    <?php include('./import-js.php'); ?>
</body>

</html>