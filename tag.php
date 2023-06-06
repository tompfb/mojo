<?php
include "./connection.php";
include './functions/date-thai.php';
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
    <link rel="canonical" href="https://www.mojoesan.com/tag/<?php echo $tagUrl ?>" />
    <link rel="alternate" href="https://www.mojoesan.com/tag/<?php echo $tagUrl ?>" hreflang="th-TH" />
    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                "name": "แท็ก <?php echo $t_name;  ?>"
            }]
        }
    </script>
    <?php include('./import-css.php'); ?>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <section class="container">
            <div class="heading-bg-secon py-3">
                <h1 class="txt-heading">
                    แท็ก : <?php echo $name; ?>
                </h1>
            </div>
            <div id="loadtable">
                <?php
                $lastid = '';
                $query = mysqli_query($conn, "SELECT *,articles.id as id FROM articles LEFT join tag_log on articles.id = tag_log.articles_id WHERE tag_log.tag_id ='$t_id' ORDER BY articles.id  DESC limit 9"); ?>
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                            <div class="box-post">
                                <a href="../view/<?php echo $row['url_articles_seo']; ?>" class="post_link" rel="ugc">
                                    <figure class="news-articles-img">
                                        <img class="lazy img-fluid " data-src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
                                    </figure>
                                    <div class="px-2">
                                        <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                        <div class="card-flex-new">
                                            <span>
                                                <i class="fa fa-eye"></i> : <?php echo $row['view'];   ?>
                                            </span>
                                            <span class="date">
                                                <i class="fas fa-clock"></i>
                                                <?php
                                                $str_Date = $row['create_at'];
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
    <br><br>
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