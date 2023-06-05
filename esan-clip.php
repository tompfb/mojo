<?php
include "./connection.php";
include './functions/date-thai.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>คลิป</title>
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
    <link href="../css/carousel.css" rel="stylesheet" />
    <?php include('./import-css.php'); ?>
    <style>
        .fix-l-r {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: fit-content;
            display: flex;
            justify-content: space-between;
            z-index: 10 !important;
        }

        .carousel-inner iframe {
            z-index: 20 !important;
        }

        .carousel-inner {
            padding-top: 50px;
        }

        .carousel-indicators {
            bottom: 30px;
        }

        .a-links {
            z-index: 888 !important;
            cursor: pointer;
        }

        .title-video {
            padding: 0 10px;
            font-size: 20px !important;
        }
    </style>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <section class="main_text_heading">
            <div class="bg-text-heading  mb-0" style="background-image: url(../img/bg-clip.webp);">
                <h1>อีสาน คลิป</h1>
            </div>
        </section>
        <section class="position-relative" style="background-color:#111828;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $query = mysqli_query($conn, "SELECT * ,videos.id as id FROM videos LEFT join user on videos.user_id = user.id WHERE videos.status = 0 and videos.videoUrl IS NOT NULL ORDER BY videos.id DESC LIMIT 1");
                    $ve_one = mysqli_fetch_array($query);
                    $id_i =  $ve_one['id'];
                    ?>
                    <div class="carousel-item active">
                        <div style="min-height:100vh;" class="container">
                            <div class="row justify-content-center py-3">
                                <div class="col-lg-8 col-md-10 col-sm-12">
                                    <iframe src="https://www.youtube.com/embed/<?php echo substr($ve_one['videoUrl'], 17); ?>" frameborder="0" allowfullscreen></iframe>
                                    <a href="../view-video/<?php echo $ve_one['id']; ?>/" class="text-decoration-none a-links">
                                        <h4 class="title-video">
                                            <?php echo trim(strip_tags(mb_substr($ve_one['v_title'], 0, 100, 'utf-8'))); ?>...
                                        </h4>
                                    </a>
                                    <div class="card-flex">
                                        <span style="color: #f1f1f1; margin-right:10px">
                                            <img data-src="../backend/uploads/user-img/<?php echo $ve_one['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                            <?php echo $ve_one["firstname"] . "  " . $ve_one['lastname']; ?>
                                        </span>
                                        <span class="date" style="color: #f1f1f1;">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $Adate = $ve_one['create_at'];;
                                            echo ": " . DateThai($Adate);
                                            ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $query_ = mysqli_query($conn, "SELECT * ,videos.id as id FROM videos LEFT join user on videos.user_id = user.id WHERE videos.status = 0 and videos.videoUrl IS NOT NULL and videos.id < $id_i ORDER  BY videos.id DESC LIMIT 2");
                    while ($ve_one_ = mysqli_fetch_array($query_)) {
                    ?>
                        <div class="carousel-item">
                            <div style="min-height:100vh;" class="container">
                                <div class="row justify-content-center py-3">
                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                        <iframe src="https://www.youtube.com/embed/<?php echo substr($ve_one_['videoUrl'], 17); ?>" frameborder="0" allowfullscreen></iframe>
                                        <a href="../view-video/<?php echo $ve_one_['id']; ?>/" class="text-decoration-none a-links">
                                            <h4 class="title-video">
                                                <?php echo trim(strip_tags(mb_substr($ve_one_['v_title'], 0, 100, 'utf-8'))); ?>...
                                            </h4>
                                        </a>
                                        <div class="card-flex">
                                            <span style="color: #f1f1f1; margin-right:10px">
                                                <img data-src="../backend/uploads/user-img/<?php echo $ve_one_['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                <?php echo $ve_one_["firstname"] . "  " . $ve_one_['lastname']; ?>
                                            </span>
                                            <span class="date" style="color: #f1f1f1;">
                                                <i class="fas fa-clock"></i>
                                                <?php
                                                $date_ve = $ve_one_['create_at'];;
                                                echo ": " . DateThai($date_ve);
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $l_id = $ve_one_['id'];
                    } ?>
                </div>
            </div>
            <div class="fix-l-r">
                <a class="a_left" href="#myCarousel" role="button" data-slide="prev"> <span> <i class="fas fa-chevron-left"></i></span></a>
                <a class="a_right" href="#myCarousel" role="button" data-slide="next"> <span> <i class="fas fa-chevron-right"></i></span></a>
            </div>
        </section>
        <section class="news-video-affter">
            <div class="container py-4">
                <div>
                    <div id="loadtable">
                        <?php
                        $lastid = '';
                        include("./connection.php");
                        $sql = mysqli_query($conn, "SELECT * ,videos.id as id FROM videos LEFT join user on videos.user_id = user.id WHERE videos.status = 0 and videos.videoUrl IS NOT NULL and videos.id < $l_id ORDER BY videos.id DESC LIMIT 9");
                        ?>
                        <div class="row">
                            <?php
                            while ($row = mysqli_fetch_array($sql)) {

                            ?>
                                <div class="col-lg-4 col-md-6  col-sm-12 box-youtube my-2">
                                    <iframe src="https://www.youtube.com/embed/<?php echo substr($row['videoUrl'], 17); ?>" frameborder="0" allowfullscreen></iframe>
                                    <a href="../view-video/<?php echo $row['id']; ?>/" class="text-decoration-none">
                                        <h4 class="title-ve">
                                            <?php echo trim(strip_tags(mb_substr($row['v_title'], 0, 35, 'utf-8'))); ?>...
                                        </h4>
                                    </a>
                                    <div class="card-flex">
                                        <span style="color: #111828; margin-right:10px">
                                            <img data-src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                            <?php echo $row["firstname"] . "  " . $row['lastname']; ?>
                                        </span>
                                        <span class="date" style="color: #111828;">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            echo ": " . DateThai($row['create_at']);
                                            ?>
                                        </span>
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
            </div>
        </section>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#loadmore', function() {
                var lastid = $(this).data('id');
                $('#loadmore').html('กำลังโหลด...');
                $.ajax({
                    url: "../load_video.php",
                    method: "POST",
                    data: {
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
    <script>
        window.jQuery ||
            document.write('<script src="../js/jquery-slim.min.js"><\/script>');
    </script>
    <script>
        $(document).ready(function() {

            $(".fa-search").click(function() {
                $(".togglesearch").toggle();
                // $("input[type='text']").focus();
            });

        });
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/holder.min.js"></script>
</body>

</html>