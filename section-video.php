<section class="section-video">
    <div class="container reveal fade-bottom">
        <div class="card-tab">
            <h2 class="txt-heading white">Esan clip</h2>
            <a href="./esan-clip/" class="next-tab">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
        </div>
        <div class="row py-3">
            <?php
            $sqlVideo = "SELECT * from videos where videoUrl IS NOT NULL ORDER BY id DESC LIMIT 6";
            $q_video = mysqli_query($conn, $sqlVideo) or die("Error in query: $sqlVideo " . mysqli_error($conn));
            while ($video = mysqli_fetch_array($q_video)) {
                $link_youtube = substr($video['videoUrl'], 17);
            ?>
                <div class="col-lg-4 col-md-6 my-2 box-youtube">
                    <iframe src="https://www.youtube.com/embed/<?php echo $link_youtube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                    <a href="" class="text-decoration-none">
                        <h4 class="title-video">
                            <?php echo trim(strip_tags(mb_substr($video['v_title'], 0, 35, 'utf-8'))); ?>...
                        </h4>
                    </a>
                </div>
            <?php    }
            ?>
        </div>
    </div>
</section>