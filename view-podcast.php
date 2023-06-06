<?php
include "./connection.php";
include './functions/date-thai.php';
@$id =  $_GET["name"];
if ($id) {
    $sql = "SELECT * FROM podcasts WHERE id = $id";
    $Qsql = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($Qsql);
    $name = $row['title'];
    $usId = $row['user_id'];
    $cateId = $row['category_id'];
    $localtion = $row['location'];

    $Asql = "SELECT * from user where id = $usId";
    $Q_au = mysqli_query($conn, $Asql);
    $result = mysqli_fetch_array($Q_au);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $name;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://www.mojoesan.com/view-podcast/<?php echo $id ; ?>" />
    <link rel="alternate" href="https://www.mojoesan.com/view-podcast/<?php echo $id ; ?>" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
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
                    "name": "พอดคาสต์",
                    "item": "https://www.mojoesan.com/podcast/"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo $name;  ?>"
                }
            ]
        }
    </script>
    <?php include('./import-css.php'); ?>

    <style>
        .card_podcast figure {
            height: 120px !important;
        }

        .card_podcast {
            padding: 20px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 1px 1px 5px #ececec;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <div class="container py-3 con-vh">
            <div class="row">
                <div class="col-lg-9 my-1">
                    <div class="img-moblie">
                        <div class="div-one">
                            <img src="../backend/uploads/podcast-img/<?php echo $row['image_podcast']; ?>" alt="<?php echo  $name; ?>" class="img-fluid art" width="100%" height="100%">
                            <audio  controls  style="width: 100%;">
                                <source src="../backend/uploads/podcasts/<?php echo $localtion; ?>" type="audio/ogg">
                                <source src="../backend/uploads/podcasts/<?php echo $localtion; ?>" type="audio/mpeg">
                            </audio>
                            <h1 class="txt-heading"><?php echo $name; ?></h1>
                            <div class="card-flex-new">
                                <span>
                                    <img data-src="../backend/uploads/user-img/<?php echo $result['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                    <?php echo $result["firstname"] . "  " . $result['lastname']; ?>
                                </span>
                                <span class="date">
                                    <i class="fas fa-clock"></i>
                                    <?php
                                    $str_po = $row['create_at'];;
                                    echo ": " . DateThai($str_po);
                                    ?>
                                </span>
                            </div>
                            <aside class="site mt-4">
                                <div class="buttons">
                                    <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=https://www.mojoesan.com/view-podcast/<?php echo $id ?>" title="Join us on Facebook" onclick="window.open(this.href, 'facebook-share','width=500,height=300');return false;"><i class="fab fa-facebook" aria-hidden="true"></i>facebook</a>
                                    <a class="tw" href="https://twitter.com/share?text=title &url=https://www.mojoesan.com/view-podcast/<?php echo $id ?>" title="Join us on Twitter" target="_blank" onclick="window.open(this.href, 'twitter-share', 'width=500,height=300');return false;"><i class="fab fa-twitter" aria-hidden="true"></i>twitter</a>
                                    <a class="i-line" href="https://social-plugins.line.me/lineit/share?url=https://www.mojoesan.com/view-podcast/<?php echo $id ?>" title="Join us on line" onclick="window.open(this.href, 'facebook-share','width=500,height=500');return false;"><i class="fab fa-line" aria-hidden="true"></i>line</a>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-1">
                    <h3 class="txt-heading">ที่เกี่ยวข้อง</h3>
                    <div class="row">
                        <?php
                        $fetchpodcasts  =  mysqli_query($conn, "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id = $cateId ORDER BY podcasts.id DESC LIMIT 4");
                        while ($row = mysqli_fetch_array($fetchpodcasts)) {
                        ?>
                            <div class="col-lg-12 col-md-6 my-2">
                                <a href="../view-podcast/<?php echo $row['id'] ?>" class=" text-decoration-none">
                                    <div class="card_podcast">
                                        <figure>
                                            <img src="../backend/uploads/podcast-img/<?php echo $row['image_podcast']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                            <img data-src="../img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                                        </figure>
                                        <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row['title'], 0, 40, 'utf-8'))); ?></h4>
                                        <div class="card-flex-new">
                                            <span>
                                                <img data-src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
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
                        <?php     } ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>