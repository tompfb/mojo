<?php
session_start();
$userRole = $_SESSION['role'];
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    session_destroy();
}
include("connect/connect.php");


$fields = array(
    "file1" => "File 1:"
);

// ! new version
if (isset($_POST['btn_upload'])) {
    if (!isset($_FILES['file']['name']) || $_FILES['file']['name'] == '') {
        $title = $_POST['title'];
        $videoUrl = $_POST['videoUrl'];
        $id_us = $_SESSION['userid'];

        // Insert record
        $query = "INSERT INTO videos (name, v_title, videoUrl, location,user_id) VALUES (NULL, '" . $title . "', '" . $videoUrl . "', NULL,'" . $id_us . "' )";
        mysqli_query($conn, $query);

        $Vid_id = mysqli_insert_id($conn);

        foreach ($fields as $img => $value) {
            if (isset($_FILES[$img]['name']) && $_FILES[$img]['name'] != '') {
                $fileImg = $_FILES[$img]['tmp_name'];
                $file_nameImg = $_FILES[$img]['name'];
                $file_name_arrayImg = explode(".", $file_nameImg);
                $extensionImg = end($file_name_arrayImg);
                $new_image_nameImg = rand() . '.' . $extensionImg;
                $target_dirImg = "uploads/videos-img/";
                $target_fileImg = $target_dirImg . $new_image_nameImg;

                // Valid image extensions
                $allowed_extensions = array("jpg", "gif", "png");

                if (in_array(strtolower($extensionImg), $allowed_extensions)) {
                    if (move_uploaded_file($fileImg, $target_fileImg)) {
                        $imgSql = "UPDATE videos SET image_video = '$new_image_nameImg' WHERE id = '$Vid_id'";
                        $imgResult = mysqli_query($conn, $imgSql);

                        if ($imgResult) {
                            echo '<script language="javascript">';
                            echo 'alert("Create image video success")';
                            echo '</script>';
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Failed to update image video")';
                            echo '</script>';
                        }
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Error uploading image video")';
                        echo '</script>';
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Invalid image file extension")';
                    echo '</script>';
                }
            }
        }

        $_SESSION['message'] = "Message submitted successfully.";
    } else { // It's a file upload
        $maxsize = 1073741824; // 20MB

        $title = $_POST['title'];

        $name = $_FILES['file']['name'];
        $file = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $file_name_array = explode(".", $file_name);
        $extension = end($file_name_array);
        $new_video_name = rand() . '.' . $extension;
        $target_dir = "uploads/videos/";
        $target_file = $target_dir . $new_video_name;
        $actual_link = "http://$_SERVER[HTTP_HOST]";

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        // Check extension
        if (in_array(strtolower($extension), $extensions_arr)) {

            // Check file size
            if ($_FILES['file']['size'] >= $maxsize || $_FILES["file"]["size"] == 0) {
                $_SESSION['message'] = "File too large. File must be less than 20MB.";
            } else {
                // Upload
                if (move_uploaded_file($file, $target_file)) {
                    // Insert record
                    $query = "INSERT INTO videos (name, v_title, videoUrl, location) VALUES ('" . $name . "','" . $title . "', NULL, '" . $new_video_name . "')";
                    mysqli_query($conn, $query);
                    $_SESSION['message'] = "Upload successful.";

                    $Vid_id = mysqli_insert_id($conn);

                    foreach ($fields as $img => $value) {
                        if (isset($_FILES[$img]['name']) && $_FILES[$img]['name'] != '') {
                            $fileImg = $_FILES[$img]['tmp_name'];
                            $file_nameImg = $_FILES[$img]['name'];
                            $file_name_arrayImg = explode(".", $file_nameImg);
                            $extensionImg = end($file_name_arrayImg);
                            $new_image_nameImg = rand() . '.' . $extensionImg;
                            $target_dirImg = "uploads/videos-img/";
                            $target_fileImg = $target_dirImg . $new_image_nameImg;

                            // Valid image extensions
                            $allowed_extensions = array("jpg", "gif", "png");

                            if (in_array(strtolower($extensionImg), $allowed_extensions)) {
                                if (move_uploaded_file($fileImg, $target_fileImg)) {
                                    $imgSql = "UPDATE videos SET image_video = '$new_image_nameImg' WHERE id = '$Vid_id'";
                                    $imgResult = mysqli_query($conn, $imgSql);

                                    if ($imgResult) {
                                        echo '<script language="javascript">';
                                        echo 'alert("Create image video success")';
                                        echo '</script>';
                                    } else {
                                        echo '<script language="javascript">';
                                        echo 'alert("Failed to update image video")';
                                        echo '</script>';
                                    }
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alert("Error uploading image video")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("Invalid image file extension")';
                                echo '</script>';
                            }
                        }
                    }
                } else {
                    $_SESSION['message'] = "Error uploading file.";
                }
            }
        } else {
            $_SESSION['message'] = "Invalid file extension.";
        }
    }

    header('location: video.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <style>
        .custom-file-button input[type=file] {
            margin-left: -2px !important;
        }

        .custom-file-button input[type=file]::-webkit-file-upload-button {
            display: none;
        }

        .custom-file-button input[type=file]::file-selector-button {
            display: none;
        }

        .custom-file-button:hover label {
            background-color: #dde0e3;
            cursor: pointer;
        }

        .card-youtube {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color: #000;
            padding: 10px 0;
        }

        .card-youtube i {
            display: block;
            font-size: 3.3rem;
            color: #f00;
        }

        .card-youtube small {
            color: #dde0e3;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('./components/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('./components/topbar.php') ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-4 text-gray-800">Video</h1>
                        <div>
                            <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Create Video</span>
                            </a>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <!-- Upload response -->
                            <?php
                            if (isset($_SESSION['message'])) {
                                // echo $_SESSION['message'];
                                echo '<script language="javascript">';
                                echo 'alert("' . $_SESSION['message'] . '")';
                                echo '</script>';
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="row">

                                <?php
                                if ($userRole == 1) {
                                    $fetchVideos = mysqli_query($conn, "SELECT * FROM videos  ORDER BY id ASC");
                                    while ($row = mysqli_fetch_assoc($fetchVideos)) {
                                        $location = $row['location'];
                                        $Vidname = $row['v_title'];
                                        $Vid = $row['id'];

                                        $VName = $row['name'];
                                        $Vurl = $row['videoUrl'];
                                ?>
                                        <div class="col-lg-2 col-md-4 col-sm-12 my-2">
                                            <div class="card text-center d-flex justify-content-center">

                                                <h5 class="mt-3">วิดิโอ <?php echo trim(strip_tags(mb_substr($Vidname, 0, 30, 'utf-8'))); ?>...</h5>

                                                <div class="card-body ">
                                                    <?php
                                                    if ($location == null) {
                                                        echo "
                                                        <div class='card-youtube'>
                                                        <i class='fab fa-youtube'></i>
                                                        <small>YOUTUBE</small>
                                                        </div>";
                                                    } else { ?>
                                                        <video src='uploads/videos/<?php echo $location; ?>' class="img-fluid" controls height='320px'></video>
                                                    <?php } ?>

                                                    <?php
                                                    if ($VName == null) {
                                                        echo "<small> $Vurl</small>";
                                                    } else { ?>
                                                        <small><?php echo $VName ?></small>
                                                    <?php } ?>
                                                </div>

                                                <div class="card-footer">
                                                    <a href="video-edit.php?id=<?php echo $Vid; ?>" class="btn btn-warning btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <?php if ($userRole == '1') { ?>
                                                        <a href="#delModal" class="btn btn-danger btn-circle trash" data-id="<?php echo $row['id'] ?>" role="button" data-toggle="modal" data-name="<?php echo $row['name'] ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php   }
                                } else {
                                    $f = $_SESSION['userid'];
                                    $fetchVideos = mysqli_query($conn, "SELECT * FROM videos  where user_id = $f  ORDER BY id ASC");
                                    while ($row = mysqli_fetch_assoc($fetchVideos)) {
                                        $location = $row['location'];
                                        $Vidname = $row['v_title'];
                                        $VName = $row['name'];
                                        $Vid = $row['id'];
                                    ?>
                                        <div class="col-lg-2 col-md-4 col-sm-12 my-2">
                                            <div class="card text-center d-flex justify-content-center">

                                                <h5 class="mt-3">วิดิโอ <?php echo trim(strip_tags(mb_substr($Vidname, 0, 30, 'utf-8'))); ?></h5>


                                                <div class="card-body ">
                                                    <?php
                                                    if ($location == null) {
                                                        echo "
                                                        <div class='card-youtube'>
                                                        <i class='fab fa-youtube'></i>
                                                        <small>YOUTUBE</small>
                                                        </div>";
                                                    } else { ?>
                                                        <video src='uploads/videos/<?php echo $location; ?>' class="img-fluid" controls height='320px'></video>
                                                    <?php       }

                                                    ?>
                                                    <!-- <small><?php echo $VName ?></small> -->
                                                </div>

                                                <div class="card-footer">
                                                    <a href="video-edit.php?id=<?php echo $Vid; ?>" class="btn btn-warning btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#delModal" class="btn btn-danger btn-circle trash" data-id="<?php echo $row['id'] ?>" role="button" data-toggle="modal" data-name="<?php echo $row['name'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                <?php           }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ฉันไม่สามารถหยุดเปล่งประกายได้เลย <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script>
        function toggleInput(type) {
            var videoInput = document.getElementById('videoInput');
            var textInput = document.getElementById('textInput');

            if (type === 'video') {
                videoInput.style.display = 'block';
                textInput.style.display = 'none';
            } else if (type === 'text') {
                videoInput.style.display = 'none';
                textInput.style.display = 'block';
            }
        }
    </script>
    <!-- modal create -->
    <div class="modal small fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form> -->
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="modal-header">
                        <h3>Create Video</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type='text' name='title' class="form-control" placeholder="กรอกไตเติล" />
                        <div class="d-flex">
                            <div class="form-check m-4">
                                <input class="form-check-input" type="radio" name="inputType" id="videoRadio" onclick="toggleInput('video')">
                                <label class="form-check-label" for="videoRadio">Video</label>
                            </div>
                            <div class="form-check m-4">
                                <input class="form-check-input" type="radio" name="inputType" id="textRadio" onclick="toggleInput('text')">
                                <label class="form-check-label" for="textRadio">URL</label>
                            </div>
                        </div>
                        <div id="videoInput" style="display: none;">
                            <div class="mb-3">
                                <label for="video" class="form-label">Select Video from computer or phone:</label>
                                <div class="input-group custom-file-button">
                                    <label class="input-group-text" for="inputGroupFile">เลือกไฟล์ Video</label>
                                    <input type='file' name="file" class="form-control" id="video" accept="video/mp4,video/x-m4v,video/*">
                                </div>
                            </div>
                        </div>
                        <div id="textInput" style="display: none;">
                            <div class="mb-3">
                                <label for="videoUrl" class="form-label">Video URL:</label>
                                <textarea class="form-control" id="videoUrl" name="videoUrl"></textarea>
                            </div>
                        </div>

                        <!-- <?php
                                foreach ($fields as $field => $value) {
                                ?>
                            <div class="show-file mb-3" <?php echo "id='show-$field'"; ?>>
                                <img class="show-image" src="img/no-image.jpg" alt="">
                            </div>
                            <div class="custom-file">
                                <input type="file" <?php echo "name='$field' id='$field'"; ?> class="custom-file-input mb-2" required accept=".jpg, .png .webp" onchange="readURL(this)">
                                <label class="custom-file-label text-ellipsis" <?php echo "for='$field' id='label-$field'"; ?>>Choose
                                    file...</label>
                                <button type="button" class="btn btn-danger btn-user btn-block" <?php echo "id='btn-$field'"; ?> onclick="deleteImage(this)">Delete
                                    image</button>
                            </div>
                        <?php
                                }
                        ?> -->
                        <div id="image-error"> </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type='submit' value='upload' name='btn_upload' class="btn btn-outline-primary"> -->
                        <button type="submit" name="btn_upload" class="btn btn-primary">upload</button>
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>
                </form>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <!-- modal delete -->
    <div class="modal small fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Video</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h3><i class="fa fa-warning modal-icon"></i>Are you sure to delete - <span class="text-danger" id="modal_span"></span></h3>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <a href="#" class="btn btn-danger" id="modalDelete">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="functions/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<script>
    function readURL(input) {
        const allowType = ['jpg', 'jpeg', 'png'];

        const imgErrEl = document.getElementById('image-error');
        imgErrEl.innerHTML = '';

        const Element = document.getElementById('show-' + input.id);
        const lebelEl = document.getElementById('label-' + input.id);
        Element.innerHTML = '';
        lebelEl.innerHTML = 'Choose file';

        if (input.files && input.files[0]) {

            const file = input.files[0];
            const fileType = file.type;
            if (allowType.find(type => fileType.includes(type))) {
                lebelEl.innerHTML = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgEl = document.createElement('img');

                    imgEl.src = e.target.result;
                    imgEl.className = 'show-image';
                    Element.appendChild(imgEl);
                }
                reader.readAsDataURL(file);

            } else {
                const errorEl = document.createElement('div');
                errorEl.className = 'alert-danger p-2 mb-3';
                errorEl.innerHTML = 'File type is not correct.';
                imgErrEl.appendChild(errorEl);
            }
        }
    }

    function deleteImage(btn) {
        const id = btn.id.split('-')[1];

        const inputFile = document.getElementById(id);
        const labelEl = document.getElementById('label-' + id);
        const showImgEl = document.getElementById('show-' + id);
        const imgEl = document.createElement('img');

        inputFile.value = '';
        labelEl.innerHTML = 'Choose file';
        showImgEl.innerHTML = '';
        imgEl.src = "img/no-image.jpg";
        imgEl.className = 'show-image';
        showImgEl.appendChild(imgEl);
    }
</script>


<script>
    $('#delModal').on('show.bs.modal', function(event) {
        let name = $(event.relatedTarget).data('name')
        $("#modal_span").html(name);
    })
    $('.trash').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#modalDelete').attr('href', 'functions/vid-delete.php?id=' + id + '&name=' + name);
    })
</script>


</html>