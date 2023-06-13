<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
include("connect/connect.php");

$userRole = $_SESSION['role'];
$vid_id = $_GET['id'];

$sql = "SELECT * FROM videos WHERE id='$vid_id'";

$VideoQuery = mysqli_query($conn, $sql);
$videos = mysqli_fetch_array($VideoQuery);


if (isset($_POST['submit'])) {
    if (
        !empty($_POST["title"]) &&
        !empty($_POST["videoUrl"])
    ) {
        $title = $_POST['title'];
        $vUrl = $_POST['videoUrl'];

        // Assuming you have established a database connection $conn

        // Escape the user inputs to prevent SQL injection
        $title = mysqli_real_escape_string($conn, $title);
        $vUrl = mysqli_real_escape_string($conn, $vUrl);

        // Update the video record in the database
        $strSQL = "UPDATE videos SET v_title='$title', videoUrl='$vUrl' WHERE id='$vid_id'";
        $VideoResult = mysqli_query($conn, $strSQL);

        if ($VideoResult) {
            echo '<script language="javascript">';
            echo 'alert("Video updated successfully.")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Failed to update video.")';
            echo '</script>';
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Please fill in all fields")';
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

    <title> Edit <?php echo $videos['v_title']; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            min-height: 190px;
        }

        .card-youtube i {
            display: block;
            font-size: 3.3rem;
            color: #f00;
        }

        .card-youtube small {
            color: #dde0e3;
        }

        .status-btn {
            position: relative;
            border-radius: 1.5em;
            padding: .5em .75em .5em .75em;
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
                            <div class="col-lg-6">
                                <div class="card shadow p-3">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control form-control-user" name="title" value="<?php echo $videos['v_title']; ?>">
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <!-- Delete button with a name attribute for server-side processing -->


                                            <div class="card-body ">
                                                <?php $Vidname = $videos['v_title']; ?>
                                                <h5 class="mt-3">วิดิโอ <?php echo trim(strip_tags(mb_substr($Vidname, 0, 30, 'utf-8'))); ?>...</h5>
                                                <?php
                                                if ($videos['location'] == null) {
                                                    echo "
                                                        <div class='card-youtube'>
                                                        <i class='fab fa-youtube'></i>
                                                        <small>YOUTUBE</small>
                                                        </div>";
                                                } else { ?>
                                                    <video src='uploads/videos/<?php echo $videos['location']; ?>' class="img-fluid" controls height='320px'></video>
                                                <?php } ?>

                                                <?php
                                                $Vurl = $videos['videoUrl'];
                                                if ($Vurl == null) {
                                                    echo "<small> $Vurl;</small>";
                                                } else { ?>
                                                    <small><?php echo $videos['name']; ?></small>
                                                <?php } ?>
                                                <form method="post" class="my-4 me-auto">
                                                    <button class="btn btn-danger my-4 me-auto" id="deleteBtn" name="delete">Delete video</button>
                                                </form>
                                                <?php
                                                // Check if the delete button is pressed
                                                if (isset($_POST['delete'])) {
                                                    // Handle delete functionality here
                                                    // This code will be executed when the delete button is pressed
                                                    $vid = $_GET['id'];

                                                    $sql = "SELECT * FROM videos where id = '" . $vid . "' ";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $vid_id = $row['id'];
                                                        $location = $row['location'];

                                                        $file_to_delete2 = './uploads/videos/' . $location;
                                                        unlink($file_to_delete2);

                                                        $strSQL = "UPDATE videos SET name=null, location=null WHERE id='$vid_id'";
                                                        $deleteResult = mysqli_query($conn, $strSQL);
                                                    }

                                                    echo "Delete already";
                                                }


                                                ?>
                                            </div>
                                        </div>
                                        <hr class="mt-5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow p-3">
                                    <div class="mb-3">
                                        <label for="videoUrl" class="form-label">Video URL:</label>
                                        <textarea class="form-control" id="videoUrl" name="videoUrl" value="<?php echo $videos['videoUrl']; ?>"><?php echo $videos['videoUrl']; ?></textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block">
                                        Edit article
                                    </button>
                                </div>
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

</body>

</html>