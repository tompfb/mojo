<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
include("connect/connect.php");
include_once('functions/category-function.php');
include_once('functions/tag-function.php');

$categoryFn = new categoryFunction();
$categoryList = $categoryFn->getAllCategory();

$tagFn = new tagFunction();
$tagList = $tagFn->getAllTag();

$userRole = $_SESSION['role'];
$vid_id = $_GET['id'];

$sql = "SELECT * FROM videos WHERE id='$vid_id'"; 

$VideoQuery = mysqli_query($conn, $sql);
$videos = mysqli_fetch_array($VideoQuery);

$fields = array(
    "file1" => "File 1:",
    // "file2" => "File 2:",
);

if (isset($_POST['submit'])) {
    if (
        !empty($_POST["title"])
    ) {
        $title = $_POST['title'];

        $strSQL = "UPDATE videos SET v_title='$title' WHERE id='$vid_id'";

        $VideoResult = mysqli_query($conn, $strSQL);

        if ($VideoResult) {
            foreach ($fields as $img => $value) {
                if ($_FILES[$img]['name']) {
                    $file = $_FILES[$img]['tmp_name'];
                    $file_name = $_FILES[$img]['name'];
                    $file_name_array = explode(".", $file_name);
                    $extension = end($file_name_array);
                    $new_image_name = rand() . '.' . $extension;
                    chmod('uploads/videos-img/', 0777);
                    $actual_link = "http://$_SERVER[HTTP_HOST]";

                    $allowed_extension = array("jpg", "gif", "png");
                    if (in_array($extension, $allowed_extension)) {
                        move_uploaded_file($file, 'uploads/videos-img/' . $new_image_name);
                        $imgSql = "UPDATE videos SET image_video = '$new_image_name' WHERE id = '$vid_id'";
                        $imgResult = mysqli_query($conn, $imgSql);

                        if ($imgResult) {
                            unlink('uploads/videos-img/' . $videos['image_video']);
                            echo '<script language="javascript">';
                            echo 'alert("Edit video success")';
                            echo '</script>';
                            echo "<script>window.location.href='video.php';</script>";
                        }
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Edit video success")';
                    echo '</script>';
                    echo "<script>window.location.href='video.php';</script>";
                }
            }
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Please fill data")';
        echo '</script>';
    }
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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <h1 class="h3 mb-4 text-gray-800">Video Edit</h1>
                        <!-- <div>
                            <a class="btn btn-danger btn-icon-split trash" href="#delModal" data-id="<?php echo $videos['id'] ?>" data-img="<?php echo $videos['image_video'] ?>" role="button" data-toggle="modal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <span class="text">Delete article</span>
                            </a>
                        </div> -->
                    </div>
                    <form class="user" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control form-control-user" name="title" value="<?php echo $videos['v_title']; ?>">
                                    </div>
                                    <!-- <div class="card-body">
                                        <div class="form-group">
                                            <label>Image banner
                                                <span class="text-danger">*</span>
                                            </label>
                                            <br>
                                            <?php
                                            foreach ($fields as $field => $value) {
                                            ?>
                                                <div class="show-file mb-3" <?php echo "id='show-$field'"; ?>>
                                                    <img <?php if ($videos['image_video']) {
                                                                echo "src='uploads/videos-img/" . $videos['image_video'] . "'";
                                                            } else {
                                                                echo "src='img/no-image.jpg'";
                                                            }
                                                            ?> alt="" class="show-image mx-auto">
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" <?php echo "name='$field' id='$field'"; ?> class="custom-file-input mb-2" accept=".jpg, .png" onchange="readURL(this)">
                                                    <label class="custom-file-label text-ellipsis" <?php echo "for='$field' id='label-$field'"; ?>>Choose file...</label>
                                                    <button type="button" class="btn btn-danger btn-user btn-block" <?php echo "id='btn-$field'"; ?> onclick="deleteImage(this)">Delete image</button>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="col">
                                                <div id="image-error"> </div>
                                            </div>
                                        </div>
                                        <hr class="mt-5">
                                    </div> -->
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <hr>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block">
                                            Edit article
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <!-- modal delete -->
    <div class="modal small fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h2 class="text-danger"><i class="fa fa-warning modal-icon"></i>Are you sure to delete?
                    </h2>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger" id="modalDelete">Delete</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // ! ckediter
        CKEDITOR.replace('editor', {
            height: "500px",
            language: 'en',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: "functions/upload-img.php",
            extraPlugins: 'contents',
        });

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
        $('.trash').click(function() {
            var id = $(this).data('id');
            var img = $(this).data('img');
            $('#modalDelete').attr('href', 'functions/article-delete.php?id=' + id + '&img=' + img);
        })

        $(function() {
            //Initialize Select2 Elements
            $('#tag').select2({
                placeholder: "Select Tag",
                allowClear: true,
            })

        })
    </script>

</body>

</html>