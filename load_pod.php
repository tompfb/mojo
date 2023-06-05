<?php
sleep(1);
include("./connection.php");
include './functions/date-thai.php';

if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];
    $category_name = $_POST['Ncategory'];
    $sqlAllArticle  = "SELECT *,podcasts.id as id FROM podcasts LEFT join user on podcasts.user_id = user.id WHERE podcasts.status = 0 and podcasts.category_id =  $category_name AND podcasts.id < '$lastid'  ORDER BY podcasts.id DESC LIMIT 9";
    $allArticle = mysqli_query($conn, $sqlAllArticle) or die("Error in query: $sqlAllArticle " . mysqli_error($conn));

    if (mysqli_num_rows($allArticle) > 0) {
?>
        <div class="row">
            <?php while ($row = mysqli_fetch_array($allArticle)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                    <a href="../../view-podcast/<?php echo $row['id'] ?>" class=" text-decoration-none">
                        <div class="card_podcast">
                            <figure>
                                <img src="../../backend/uploads/podcast-img/<?php echo $row['image_podcast']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid card__image" width="100%" height="100%">
                                <img src="../../img/icon-music.png" class="img-fluid img_icon" width="60" height="60" alt="icon music">
                            </figure>
                            <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($row['title'], 0, 40, 'utf-8'))); ?></h4>
                            <div class="card-flex-new">
                                <span>
                                    <img src="../../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="img-fluid" width="35" height="35" alt="img user">
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
                $Ncategory = $category_name;
            }
            ?>
        </div>
        <div id="remove">
            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-cate="<?php echo $Ncategory; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>