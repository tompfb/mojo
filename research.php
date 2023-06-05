<?php
include "./connection.php";
include './functions/date-thai.php';
$page = 3; ?>
<!DOCTYPE html>
<html>

<head>
    <title>งานวิจัย</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <?php include('./import-css.php'); ?>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <section class="main_text_heading">
            <div class="bg-text-heading" style="background-image: url(../img/bg-RESEARCH.webp);">
                <h1>งานวิจัย</h1>
            </div>
        </section>
        <section class="content-news">
            <?php
            $cate_one = "SELECT * from category where page_id = $page ORDER BY id DESC LIMIT 1";
            $query_c = mysqli_query($conn, $cate_one) or die("Error in query: $cate_one " . mysqli_error($conn));
            $Cate_fetch = mysqli_fetch_array($query_c);
            $id_ca =  $Cate_fetch['id'];
            ?>
            <div class="container py-4">
                <div>
                    <div id="loadtable">
                        <?php
                        $lastid = '';
                        include("./connection.php");
                        $sql = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles  left join user on articles.user_id = user.id WHERE articles.category_id = $id_ca  AND articles.status = 0   order by articles.id asc limit 9");
                        ?>
                        <div class="row">
                            <?php
                            while ($row = mysqli_fetch_array($sql)) {
                                $article_id = $row['id'];
                            ?>
                                <div class="col-lg-4 col-md-6  col-sm-12 my-2">
                                    <div class="box-post">
                                        <a href="../view/<?php echo $row['url_articles_seo']; ?>" class="post_link" rel="ugc">
                                            <figure class="news-articles-img">
                                                <img class="lazy img-fluid " data-src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
                                            </figure>
                                            <div class="px-2">
                                                <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 40, 'utf-8'))); ?></h4>
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
                            <?php
                                $lastid = $row['id'];
                            } ?>
                        </div>
                        <div id="remove">
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-cate="<?php echo $id_ca; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                                </div>
                            </div>
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
                var Ncategory = $(this).data("cate");
                $('#loadmore').html('กำลังโหลด...');
                $.ajax({
                    url: "../load_research.php",
                    method: "POST",
                    data: {
                        Ncategory: Ncategory,
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