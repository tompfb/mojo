<section class="section-video">
    <div class="container">
        <div class="card-tab">
            <h2 class="txt-heading white">Esan clip</h2>
            <a href="./esan-clip/" class="next-tab">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
        </div>
        <div class="row py-3 reveal fade-bottom">
            <?php
            $sqlVideo = "SELECT * from videos where status = 0 AND videoUrl IS NOT NULL ORDER BY create_at DESC LIMIT 6";
            $q_video = mysqli_query($conn, $sqlVideo) or die("Error in query: $sqlVideo " . mysqli_error($conn));
            while ($video = mysqli_fetch_array($q_video)) {
                $link_youtube = substr($video['videoUrl'], 17);
                $Aid = $video['user_id'];
                $Avide = "SELECT image_path,firstname,lastname FROM  user  WHERE id = $Aid";
                $Aquery = mysqli_query($conn, $Avide) or die("Error in query: $Avide " . mysqli_error($conn));
                $Afetch = mysqli_fetch_array($Aquery);
            ?>

                <!-- <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                    <div class="card_white" style="box-shadow: 0px 0px 1px #ececec;">
                        <a href="./view-video/<?php echo $video['id']; ?>">
                            <h3><?php echo trim(strip_tags(mb_substr($video['v_title'], 0, 35, 'utf-8'))) ?>...</h3>
                            <div class="card-flex">
                                <span style="color: #101010; margin-right:10px">
                                    <img data-src="./backend/uploads/user-img/<?php echo $Afetch['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                    <?php echo $Afetch["firstname"] . "  " . $Afetch['lastname']; ?>
                                </span>
                                <span class="date" style="color: #101010;">
                                    <i class="fas fa-clock"></i>
                                    <?php
                                    echo ": " . DateThai($video['create_at']);
                                    ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6 my-2 box-youtube my-2">
                    <iframe src="https://www.youtube.com/embed/<?php echo $link_youtube; ?>" frameborder="0" allowfullscreen></iframe>
                    <a href="./view-video/<?php echo $video['id']; ?>" class="text-decoration-none">
                        <h4 class="title-video">
                            <?php echo trim(strip_tags(mb_substr($video['v_title'], 0, 35, 'utf-8'))); ?>...
                        </h4>
                    </a>
                    <div class="card-flex">
                        <span style="color: #f1f1f1; margin-right:10px">
                            <img data-src="./backend/uploads/user-img/<?php echo $Afetch['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                            <?php echo $Afetch["firstname"] . "  " . $Afetch['lastname']; ?>
                        </span>
                        <span class="date" style="color: #f1f1f1;">
                            <i class="fas fa-clock"></i>
                            <?php
                            $Adate = $video['create_at'];;
                            echo ": " . DateThai($Adate);
                            ?>
                        </span>
                    </div>
                </div>
            <?php    }
            ?>
        </div>
    </div>
</section>