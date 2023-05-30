<div class="card-article container">
    <div id="slider">
        <div class="dp-wrap">
            <div id="dp-slider">
                <?php
                @$num_id = "0";
                $sql_first = "SELECT * FROM `articles` WHERE status = 0 ORDER BY create_at DESC LIMIT 4";
                $query_first = mysqli_query($conn, $sql_first) or die("Error in query: $sql_first " . mysqli_error($conn));
                while ($first = mysqli_fetch_assoc($query_first)) {
                    $num_id++;
                    $cate =  $first['category_id'];
                    $use_id =  $first['user_id'];

                    $sql_category = "SELECT * FROM category WHERE id = $cate ";
                    $query_cate = mysqli_query($conn, $sql_category) or die("Error in query: $sql_category " . mysqli_error($conn));
                    $result_cate = mysqli_fetch_array($query_cate);

                     $sql_author = "SELECT * FROM  user  WHERE id = $use_id";
                    $query_article = mysqli_query($conn, $sql_author) or die("Error in query: $sql_author " . mysqli_error($conn));
                    $author = mysqli_fetch_array($query_article);
                ?>
                    <div class="dp_item" data-class="<?php echo $num_id; ?>" data-position="<?php echo $num_id; ?>">
                        <div class="dp-content">
                            <h3><?php echo trim(strip_tags(mb_substr($first['topic_name'], 0, 40, 'utf-8'))); ?>...</h3>
                            <a href="" class="a_cate"><?php echo $result_cate['name']; ?></a>
                            <p><?php echo trim(strip_tags(mb_substr($first['descripion_seo'], 0, 90, 'utf-8'))); ?>...</p>
                            <div class="card-flex">
                                <a href="">
                                    <img data-src="./backend/uploads/user-img/<?php echo $author['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                    <?php echo $author["firstname"] . "  " . $author['lastname']; ?>
                                </a>
                                <span class="date">
                                    <i class="fas fa-clock"></i>
                                    <?php
                                    $strDate = $first['create_at'];;
                                    echo ": " . DateThai($strDate);
                                    ?>
                                </span>
                            </div>

                            <a href="#" class="site-btn">อ่านต่อ…</a>
                        </div>
                        <div class="dp-img">
                            <img class="img-fluid lazy" data-src="./backend/uploads/article-img/<?php echo $first['image_banner']; ?>" alt="<?php echo $first['topic_name']; ?>" width="100%" height="100%">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <span id="dp-next">
                <i class="fas fa-chevron-right"></i>
            </span>

            <span id="dp-prev">
                <i class="fas fa-chevron-left"></i>
            </span>
        </div>
    </div>
</div>