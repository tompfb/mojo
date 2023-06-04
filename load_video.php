<?php
sleep(1); 
include("./connection.php");
include './functions/date-thai.php';
if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];

    $sqlAllArticle = "SELECT * ,videos.id as id FROM videos LEFT join user on videos.user_id = user.id WHERE videos.status = 0 and videos.videoUrl IS NOT NULL and videos.id < $lastid ORDER BY videos.id DESC LIMIT 9";
    $allArticle = mysqli_query($conn, $sqlAllArticle) or die("Error in query: $sqlAllArticle " . mysqli_error($conn));

    if (mysqli_num_rows($allArticle) > 0) {
?>
        <div class="row">
            <?php while ($row = mysqli_fetch_array($allArticle)) {

            ?>
                <div class="col-lg-4 col-md-6  col-sm-12 box-youtube my-2">
                    <iframe src="https://www.youtube.com/embed/<?php echo substr($row['videoUrl'], 17); ?>" frameborder="0" allowfullscreen></iframe>
                    <a href="../view-video/<?php echo $row['id']; ?>/" class="text-decoration-none">
                        <h4 class="title-ve">
                            <?php echo trim(strip_tags(mb_substr($row['v_title'], 0, 35, 'utf-8'))); ?>...
                        </h4>
                    </a>
                    <div class="card-flex">
                        <span style="color: #111828; margin-right:10px">
                            <img src="../backend/uploads/user-img/<?php echo $row['image_path']; ?>" class="img-fluid" width="30" height="30" alt="img user">
                            <?php echo $row["firstname"] . "  " . $row['lastname']; ?>
                        </span>
                        <span class="date" style="color: #111828;">
                            <i class="fas fa-clock"></i>
                            <?php
                            echo ": " . DateThai($row['create_at']);
                            ?>
                        </span>
                    </div>
                </div>
            <?php
                $lastid = $row['id'];
            }
            ?>
        </div>
        <div id="remove">
            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" name="loadmore" id="loadmore" id="<?php echo $lastid; ?>" class="btn-btn-success">ดูเพิ่มเติม</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>