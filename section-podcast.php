<section class="section-podcast py-5">
    <div class="container reveal fade-bottom">
        <h2 class="txt-heading">Esan podcast</h2>
        <div class="row">
            <?php
            $fetchpodcasts = mysqli_query($conn, "SELECT * FROM podcasts ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($fetchpodcasts)) {
                $location = $row['location'];
                $Podidname = $row['title'];
                $Pimg = $row['image_podcast'];
                $PName = $row['name'];
                $Podid = $row['id'];
            ?>
                <div class="col-lg-3 col-md-6 my-2">
                    <div class="card text-center d-flex justify-content-center" style="background-color: #111828;">
                        <a href="" class=" text-decoration-none">
                            <h4 class="white"><?php echo $Podidname; ?></h4>
                        </a>
                        <div class="card-body overflow-hidden">
                            <img src="./backend/uploads/podcast-img/<?php echo $Pimg; ?>" alt="<?php echo $Podidname; ?>" class="img-fluid card__image" width="250">
                            <audio controls height='320px' style="width: 100%;">
                                <source src="./backend/uploads/podcasts/<?php echo $location; ?>" type="audio/ogg">
                                <source src="./backend/uploads/podcasts/<?php echo $location; ?>" type="audio/mpeg">
                            </audio>
                            <!-- <small><?php echo $PName ?></small> -->
                        </div>
                    </div>
                </div>
            <?php    } ?>
        </div>
    </div>
</section>