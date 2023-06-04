<section class="list-title-news py-5">
    <div class="container">
        <div class="tab">
            <?php
            $cate_  = "SELECT * FROM category WHERE page_id = 1 ORDER BY id DESC ";
            $query_cate_ = mysqli_query($conn, $cate_) or die("Error in query: $cate_ " . mysqli_error($conn));
            while ($result_cate_ = mysqli_fetch_assoc($query_cate_)) {
            ?>
                <a href="./category/news/<?php echo  $result_cate_['cate_url']; ?>"><?php echo $result_cate_['name']; ?></a>
            <?php      }
            ?>
        </div>
        <div class="row py-3 reveal fade-bottom"> 
            <?php
            $sql_next = "SELECT * FROM `articles` WHERE status = 0 ORDER BY create_at DESC LIMIT 3,8";
            $query_next = mysqli_query($conn, $sql_next) or die("Error in query: $sql_next " . mysqli_error($conn));
            while ($re_next = mysqli_fetch_assoc($query_next)) {
                $n_id =  $re_next['user_id'];
                $n_cate =   $re_next['category_id'];
                $n_author = "SELECT * FROM  user  WHERE id = $n_id";
                $query_n = mysqli_query($conn, $n_author) or die("Error in query: $n_author " . mysqli_error($conn));
                $author_n = mysqli_fetch_array($query_n);

                $sql_c = "SELECT * FROM category WHERE id =  $n_cate";
                $query_c = mysqli_query($conn, $sql_c) or die("Error in query: $sql_c " . mysqli_error($conn));
                $result_c = mysqli_fetch_array($query_c);
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                    <div class="box-post">
                        <a href="./view/<?php echo $re_next['url_articles_seo']; ?>/" class="post_link" rel="ugc">
                            <figure class="news-articles-img">
                                <img class="lazy img-fluid " data-src="./backend/uploads/article-img/<?php echo $re_next['image_banner']; ?>" alt="<?php echo $re_next['topic_name']; ?>" width="100%" height="100%">
                            </figure>
                            <div class="px-2">
                                <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($re_next['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                <div class="card-flex-new">
                                    <span>
                                        <img data-src="./backend/uploads/user-img/<?php echo $author_n['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                        <?php echo $author_n["firstname"] . "  " . $author_n['lastname']; ?>
                                    </span>
                                    <span class="date">
                                        <i class="fas fa-clock"></i>
                                        <?php
                                        $str_Date = $re_next['create_at'];;
                                        echo ": " . DateThai($str_Date);
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a href="./category/news/<?php echo $result_c['cate_url']; ?>/" class="cate_absolute"><?php echo $result_c['name']; ?></a>
                    </div>
                </div>
            <?php    }    ?>

        </div> 
    </div>
</section>