<?php
sleep(1);
include('conn/connect.php');

if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];
    $category_name = $_POST['Ncategory'];

    $sqlAllArticle = "SELECT * ,articles.id as id FROM articles LEFT join category on articles.category_id = category.id WHERE category.name ='$category_name' AND articles.id > '$lastid' ORDER BY articles.id asc limit 9";
    $allArticle = mysqli_query($conn, $sqlAllArticle) or die("Error in query: $sqlAllArticle " . mysqli_error($conn));

    if (mysqli_num_rows($allArticle) > 0) {
?>
        <div class="row">
            <?php while ($row = mysqli_fetch_array($allArticle)) {
                $article_id = $row['id'];
            ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="bg_articles my-2">
                        <a href="../view/<?php echo $row['url_articles_seo']; ?>">
                            <figure class="news-articles-img">
                                <div class="bg-img">
                                    <img class="img-fluid" src="../backend/uploads/article-img/<?php echo $row['image_banner']; ?>" alt="<?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?>" width="100%" height="100%">
                                </div>
                            </figure>
                            <div class="px-2">
                                <strong class="news-articles-h4"><?php echo trim(strip_tags(mb_substr($row['topic_name'], 0, 30, 'utf-8'))); ?></strong>
                                <div class=" view_date">
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