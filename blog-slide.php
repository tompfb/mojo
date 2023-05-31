<section>
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

        $sql_two = "SELECT * FROM articles WHERE status = 0 ORDER BY create_at DESC LIMIT 1,1";
        $query_two = mysqli_query($conn, $sql_two) or die("Error in query: $sql_two " . mysqli_error($conn));
        $two = mysqli_fetch_assoc($query_two);

        $sql_three = "SELECT * FROM articles WHERE status = 0 ORDER BY create_at DESC LIMIT 2,1";
        $query_three = mysqli_query($conn, $sql_three) or die("Error in query: $sql_three " . mysqli_error($conn));
        $three = mysqli_fetch_assoc($query_three);

        ?>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide lazy img-fluid" data-src="./backend/uploads/article-img/<?php echo $first['image_banner']; ?>" width="100%" height="100%" style="object-fit: cover" alt="<?php echo trim(strip_tags(mb_substr($first['topic_name'], 0, 40, 'utf-8'))); ?>" />
                <div class="container">
                    <div class="carousel-caption text-left">
                        <!-- <h3 class="h1 text-show"><?php echo trim(strip_tags(mb_substr($first['topic_name'], 0, 44, 'utf-8'))); ?></h3> -->
                        <h3 class="text-show"><?php echo $first['topic_name']; ?></h3>
                        <p><?php echo trim(strip_tags(mb_substr($first['descripion_seo'], 0, 120, 'utf-8'))); ?></p>
                        <a class="text-center" href="#" role="button">อ่านต่อ</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide lazy img-fluid" data-src="./backend/uploads/article-img/<?php echo $two['image_banner']; ?>" width="100%" height="100%" style="object-fit: cover" alt="<?php echo trim(strip_tags(mb_substr($two['topic_name'], 0, 40, 'utf-8'))); ?>" />
                <div class="container">
                    <div class="carousel-caption text-left">
                        <!-- <h3 class="text-show"><?php echo trim(strip_tags(mb_substr($two['topic_name'], 0, 40, 'utf-8'))); ?></h3> -->
                        <h3 class="text-show"><?php echo $two['topic_name']; ?></h3>
                        <p><?php echo trim(strip_tags(mb_substr($two['descripion_seo'], 0, 120, 'utf-8'))); ?></p>
                        <a class="text-center" href="#" role="button">อ่านต่อ</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide lazy img-fluid" data-src="./backend/uploads/article-img/<?php echo $three['image_banner']; ?>" width="100%" height="100%" style="object-fit: cover" alt="<?php echo trim(strip_tags(mb_substr($three['topic_name'], 0, 40, 'utf-8'))); ?>" />
                <div class="container">
                    <div class="carousel-caption text-left">
                        <!-- <h3 class="text-show"><?php echo trim(strip_tags(mb_substr($three['topic_name'], 0, 40, 'utf-8'))); ?></h3> -->
                        <h3 class="text-show"><?php echo $three['topic_name']; ?></h3>
                        <p><?php echo trim(strip_tags(mb_substr($three['descripion_seo'], 0, 120, 'utf-8'))); ?></p>
                        <a class="text-center" href="#" role="button">อ่านต่อ</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
