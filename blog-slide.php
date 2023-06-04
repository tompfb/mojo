<section class=" position-relative">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <?php
        $sql_first = "SELECT * FROM articles WHERE status = 0 ORDER BY create_at DESC LIMIT 1";
        $query_first = mysqli_query($conn, $sql_first) or die("Error in query: $sql_first " . mysqli_error($conn));
        $first = mysqli_fetch_assoc($query_first);
        ?>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row"> 
                        <div class="col-lg-6 position-relative">
                            <?php
                            $cate =  $first['category_id'];
                            $use_id =  $first['user_id'];
                            $sql_category = "SELECT name,cate_url FROM category WHERE id = $cate ";
                            $query_cate = mysqli_query($conn, $sql_category) or die("Error in query: $sql_category " . mysqli_error($conn));
                            $result_cate = mysqli_fetch_array($query_cate);

                            $sql_author = "SELECT image_path,firstname,lastname FROM  user  WHERE id = $use_id";
                            $query_article = mysqli_query($conn, $sql_author) or die("Error in query: $sql_author " . mysqli_error($conn));
                            $author = mysqli_fetch_array($query_article);

                            ?>
                            <div class="carousel-cardtext">
                                <a href="./category/news/<?php echo $result_cate['cate_url']; ?>" class="a_cate"><?php echo $result_cate['name']; ?></a>
                                <h3><?php echo trim(strip_tags(mb_substr($first['topic_name'], 0, 42, 'utf-8'))) ?>..</h3>
                                <p><?php echo trim(strip_tags(mb_substr($first['descripion_seo'], 0, 120, 'utf-8'))); ?></p>
                                <div class="card-flex">
                                    <span style="margin-right:10px">
                                        <img data-src="./backend/uploads/user-img/<?php echo $author['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                        <?php echo $author["firstname"] . "  " . $author['lastname']; ?>
                                    </span>
                                    <span class="date">
                                        <i class="fas fa-clock"></i>
                                        <?php
                                        $strDate = $first['create_at'];;
                                        echo ": " . DateThai($strDate);
                                        ?>
                                    </span>
                                </div>
                                <a class="text-center read_more" href="./view/<?php echo $first['url_articles_seo']; ?>" rel="ugc" role="button">อ่านต่อ</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="carousel-img">
                                <img class="lazy img-fluid" data-src="./backend/uploads/article-img/<?php echo $first['image_banner']; ?>" width="100%" height="100%" style="object-fit: cover" alt="<?php echo trim(strip_tags(mb_substr($first['topic_name'], 0, 40, 'utf-8'))); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql_two = "SELECT * FROM articles WHERE status = 0 ORDER BY create_at DESC LIMIT 1,2";
            $query_two = mysqli_query($conn, $sql_two) or die("Error in query: $sql_two " . mysqli_error($conn));
            while ($two = mysqli_fetch_assoc($query_two)) {
                $twocate =  $two['category_id'];
                $twouse_id =  $two['user_id'];
                $two_category = "SELECT name,cate_url FROM category WHERE id = $twocate ";
                $two_cate = mysqli_query($conn, $two_category) or die("Error in query: $two_category " . mysqli_error($conn));
                $result_two = mysqli_fetch_array($two_cate);

                $two_author = "SELECT image_path,firstname,lastname FROM  user  WHERE id = $twouse_id";
                $two_au = mysqli_query($conn, $two_author) or die("Error in query: $two_author " . mysqli_error($conn));
                $twoauthor = mysqli_fetch_array($two_au);
            ?>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 position-relative">
                                <div class="carousel-cardtext">
                                    <a href="./category/news/<?php echo $result_two['cate_url']; ?>"  class="a_cate"><?php echo $result_two['name']; ?></a>
                                    <h3><?php echo trim(strip_tags(mb_substr($two['topic_name'], 0, 42, 'utf-8'))) ?>..</h3>
                                    <p><?php echo trim(strip_tags(mb_substr($two['descripion_seo'], 0, 120, 'utf-8'))); ?></p>
                                    <div class="card-flex">
                                        <span style="margin-right:10px">
                                            <img data-src="./backend/uploads/user-img/<?php echo $twoauthor['image_path']; ?>" class="lazy img-fluid" width="20" height="20" alt="img user">
                                            <?php echo $twoauthor["firstname"] . "  " . $twoauthor['lastname']; ?>
                                        </span>
                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            <?php
                                            $str = $two['create_at'];;
                                            echo ": " . DateThai($str);
                                            ?>
                                        </span>
                                    </div>
                                    <a class="text-center read_more" href="./view/<?php echo $two['url_articles_seo']; ?>" rel="ugc" role="button">อ่านต่อ</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="carousel-img">
                                    <img class="lazy img-fluid" data-src="./backend/uploads/article-img/<?php echo $two['image_banner']; ?>" width="100%" height="100%" style="object-fit: cover" alt="<?php echo trim(strip_tags(mb_substr($two['topic_name'], 0, 40, 'utf-8'))); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
    <div class="fix-l-r">
        <a class="a_left" href="#myCarousel" role="button" data-slide="prev"> <span> <i class="fas fa-chevron-left"></i></span></a>
        <a class="a_right" href="#myCarousel" role="button" data-slide="next"> <span> <i class="fas fa-chevron-right"></i></span></a>
    </div>
</section>