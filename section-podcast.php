<section class="section-podcast py-5">
    <div class="container ">
        <div class="card-tab">
            <h2 class="txt-heading ">พอดคาสต์</h2>
            <a href="./esan-clip/" class="next-tab text-dark">ดูทั้งหมด<span><i class="fas fa-long-arrow-right"></i></span></a>
        </div>
        <div class="row reveal fade-bottom">
            <?php
            $fetchpodcasts = mysqli_query($conn, "SELECT * FROM podcasts where status = 0 ORDER BY create_at DESC limit 4");
            while ($row = mysqli_fetch_array($fetchpodcasts)) {
                $Podidname = $row['title'];
                $Pimg = $row['image_podcast'];
                $Podid = $row['id'];
                $id_poda = $row['user_id']; 

                $Poauthor = "SELECT * FROM  user  WHERE id = $id_poda";
                $Po_a = mysqli_query($conn, $Poauthor) or die("Error in query: $Poauthor " . mysqli_error($conn));
                $Poa_n = mysqli_fetch_array($Po_a);
            ?>
                <div class="col-lg-3 col-md-6 my-2">
                    <a href="./view-podcast/<?php echo $Podid; ?>" class=" text-decoration-none">
                        <div class="card_podcast">
                            <figure>
                                <img src="./backend/uploads/podcast-img/<?php echo $Pimg; ?>" alt="<?php echo $Podidname; ?>" class="img-fluid card__image" width="100%" height="100%">
                                <img data-src="./img/icon-music.png" class="lazy img-fluid img_icon" width="60" height="60" alt="icon music">
                            </figure>
                            <h4 class="name-podcast"><?php echo trim(strip_tags(mb_substr($Podidname, 0, 40, 'utf-8'))); ?></h4>
                            <div class="card-flex-new">
                                <span>
                                    <img data-src="./backend/uploads/user-img/<?php echo $Poa_n['image_path']; ?>" class="lazy img-fluid" width="35" height="35" alt="img user">
                                    <?php echo $Poa_n["firstname"] . "  " . $Poa_n['lastname']; ?>
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
            <?php    } ?>
        </div>
    </div>
</section>