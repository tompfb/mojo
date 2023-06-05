<?php
sleep(1);
include("./connection.php");
include './functions/date-thai.php';

if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];
    $category_name = $_POST['Ncategory'];
    $sqlAllArticle = "SELECT * ,articles.id as id FROM articles LEFT join user on articles.user_id = user.id WHERE articles.category_id = $category_name AND articles.status = 0 AND articles.id < '$lastid'  order by articles.id DESC limit 8";
    $allArticle = mysqli_query($conn, $sqlAllArticle) or die("Error in query: $sqlAllArticle " . mysqli_error($conn));

    if (mysqli_num_rows($allArticle) > 0) {
?>
        <div class="row">
            <?php while ($row = mysqli_fetch_array($allArticle)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                    <div class="box-post">
                        <a href="../../view/<?php echo $row['url_articles_seo']; ?>" class="post_link" rel="ugc">
                            <figure class="news-articles-img">
                                <img class="img-fluid " src="../../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo $row['topic_name']; ?>" width="100%" height="100%">
                            </figure>
                            <div class="px-2">
                                <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                <div class="card-flex-new">
                                    <span>
                                        <img src="../../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="img-fluid" width="30" height="30" alt="img user">
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