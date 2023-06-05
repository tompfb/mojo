<?php
sleep(1);
include "./connection.php";
include './functions/date-thai.php';
if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];
    $name = $_POST['aaname'];

    $query = mysqli_query($conn, "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE user.firstname ='$name' and articles.id < $lastid order by articles.id DESC limit 8");
    if (mysqli_num_rows($query) > 0) {

?>
        <div class="row align-items-end">
            <?php
            while ($row = mysqli_fetch_array($query)) {
                $article_id = $row['id'];
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                    <div class="box-post">
                        <a href="../view/<?php echo $row['url_articles_seo']; ?>" class="post_link" rel="ugc">
                            <figure class="news-articles-img">
                                <img class="img-fluid " src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
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
                $aaname =  $name;
            } ?>
        </div>

        <div id="remove">
            <div style="height:10px;"></div>
            <div id="remove_row" class="row">
                <div class="col-lg-12">
                    <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" data-aaname="<?php echo $aaname; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>
</div>