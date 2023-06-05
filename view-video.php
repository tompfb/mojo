<?php
include "./connection.php";
include './functions/date-thai.php';
@$id =  $_GET["name"];
$sql1 = "UPDATE videos SET  view=view+1   WHERE id='$id'";
$query1 = mysqli_query($conn, $sql1);


if ($id) {
    $sql = "SELECT * FROM videos WHERE id = $id";
    $Qsql = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($Qsql);
    $name = $row['v_title'];
    $usId = $row['user_id'];
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
    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/category/" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/category/" hreflang="th-TH" />

    <link rel="shortcut icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="icon" href="../favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../favicon.webp" />
    <?php include('./import-css.php'); ?>

</head>

<body>
    <?php include('./component/header.php'); ?>
    <article class="content">
        <div class="container py-3 con-vh">
            <div class="row">
                <div class="col-lg-8 my-1">
                    <h1 class="txt-heading"><?php echo $name; ?></h1>
                    <iframe src="https://www.youtube.com/embed/<?php echo substr($row['videoUrl'], 17); ?>" frameborder="0" allowfullscreen></iframe>
                    <div class="card-flex">
                        <span style="color: #101010; margin-right:10px">
                            <img data-src="../backend/uploads/user-img/<?php echo $result['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                            <?php echo $result["firstname"] . "  " . $result['lastname']; ?>
                        </span>
                        <span class="date" style="color: #101010;">
                            <i class="fas fa-clock"></i>
                            <?php
                            echo ": " . DateThai($row['create_at']);
                            ?>
                        </span>
                    </div>
                    <br>
                    <p>ลิงค์ : <a href="<?php echo $row['videoUrl']; ?>" target="_blank"><?php echo $row['videoUrl']; ?></a>
                    </p>
                    <aside class="site mt-4">
                        <div class="buttons">
                            <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=#/view-video/<?php echo $id ?>" title="Join us on Facebook" onclick="window.open(this.href, 'facebook-share','width=500,height=300');return false;"><i class="fab fa-facebook" aria-hidden="true"></i>facebook</a>
                            <a class="tw" href="https://twitter.com/share?text=title &url=#/view-video/<?php echo $id ?>" title="Join us on Twitter" target="_blank" onclick="window.open(this.href, 'twitter-share', 'width=500,height=300');return false;"><i class="fab fa-twitter" aria-hidden="true"></i>twitter</a>
                            <a class="i-line" href="https://social-plugins.line.me/lineit/share?url=#/view-video/<?php echo $id ?>" title="Join us on line" onclick="window.open(this.href, 'facebook-share','width=500,height=500');return false;"><i class="fab fa-line" aria-hidden="true"></i>line</a>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-4 my-1">
                    <h3 class="txt-heading">คลิปยอดอิต</h3>
                    <div class="row">
                        <?php
                        $Vsql = "SELECT * ,videos.id as id FROM videos  left join user on videos.user_id = user.id  where  videos.status = 0 and videos.videoUrl IS NOT NULL ORDER BY videos.view DESC LIMIT 6";
                        $Vquery = mysqli_query($conn, $Vsql);
                        while ($rowvideo = mysqli_fetch_array($Vquery)) { ?>
                            <div class="col-lg-12 col-md-4 col-sm-12 my-2">
                                <div class="card_white">
                                    <a href="../view-video/<?php echo $rowvideo['id']; ?>">
                                        <h3><?php echo trim(strip_tags(mb_substr($rowvideo['v_title'], 0, 35, 'utf-8'))) ?>...</h3>
                                        <div class="card-flex">
                                            <span style="color: #101010; margin-right:10px">
                                                <img data-src="../backend/uploads/user-img/<?php echo $result['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                <?php echo $result["firstname"] . "  " . $result['lastname']; ?>
                                            </span>
                                            <span class="date" style="color: #101010;">
                                                <i class="fas fa-clock"></i>
                                                <?php
                                                echo ": " . DateThai($row['create_at']);
                                                ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php     }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </article>


    <?php include('./component/footer.php'); ?>
    <?php include('./import-js.php'); ?>
</body>

</html>