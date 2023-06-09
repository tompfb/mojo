<?php

session_start();
if (!isset($_SESSION['userid'])) {
    // echo "<script> window.location.replace('login.php') </script>";
    header('Location: login.php');
}
$userRole = $_SESSION['role'];
include_once('connect/connect.php');

if ($userRole == 2) {
    $id_users = $_SESSION['userid'];
    $sqlArt = "SELECT * FROM articles where user_id = $id_users";
    $resultArt = mysqli_query($conn, $sqlArt);
    $rowcountArt = mysqli_num_rows($resultArt);

    $sqlVide = "SELECT * FROM videos where user_id = $id_users";
    $resultVide = mysqli_query($conn, $sqlVide);
    $rowcountVide = mysqli_num_rows($resultVide);


    $sqlPod = "SELECT * FROM podcasts where user_id = $id_users";
    $resultPod = mysqli_query($conn, $sqlPod);
    $rowcountPod = mysqli_num_rows($resultPod);
} else {
    $sqlArt = "SELECT * FROM articles";
    $resultArt = mysqli_query($conn, $sqlArt);
    $rowcountArt = mysqli_num_rows($resultArt);

    $sqlVide = "SELECT * FROM videos ";
    $resultVide = mysqli_query($conn, $sqlVide);
    $rowcountVide = mysqli_num_rows($resultVide);


    $sqlPod = "SELECT * FROM podcasts ";
    $resultPod = mysqli_query($conn, $sqlPod);
    $rowcountPod = mysqli_num_rows($resultPod);
}


$sqlCat = "SELECT * FROM category";
$resultCat = mysqli_query($conn, $sqlCat);
$rowcountCat = mysqli_num_rows($resultCat);

$sqlTag = "SELECT * FROM tag";
$resultTag = mysqli_query($conn, $sqlTag);
$rowcountTag = mysqli_num_rows($resultTag);

$sqlUser = "SELECT * FROM user";
$resultUser = mysqli_query($conn, $sqlUser);
$rowcountUser = mysqli_num_rows($resultUser);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include('./components/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('./components/topbar.php') ?>

                <div class="container-fluid">
                    <!-- Begin Page Content -->

                    <?php if ($userRole == '1' || $userRole == '2') { ?>

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">แดชบอร์ด</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="article.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    บทความ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountArt ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="video.php">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                    วิดิโอ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountVide ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-video fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="podcast.php">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    พอดคาสต์</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountPod ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-headphones fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="category.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    หมวดหมู่</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountCat ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="tag.php">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    ป้าย</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountTag ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hashtag fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                            if ($userRole == 1) { ?>
                                <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="user.php">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        ผู้ใช้งาน</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowcountUser ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php  }else{?>
                                <a class="col-xl-3 col-md-6 mb-4 card-dashboard" href="user-edit.php?id=<?php echo $id_users; ?>">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        แก้ไขข้อมูลผู้ใช้งาน</div>
                                               
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                   <?php         }
                            ?>

                        </div>

                    <?php } else { ?>

                        <h2>กรุณารอ แอดมิน อนุมัติ สักครู่</h2>
                        <span> ติดต่อ แอดมิน :</span> <a href="https://www.facebook.com/profile.php?id=100064054450605" target="_blank" class=" d-inline-block me-3"><img data-src="../img/icon_facebook.png" class="img-fluid" width="35" height="35" alt="icon facebook" src="../img/icon_facebook.png"></a>
                    <?php } ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; mojoesan.com 2021</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">พร้อมจะออก ใช่ไหม?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">เลือก "ออกจากระบบ" ด้านล่างหากคุณพร้อมที่จะออกระบบ</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="functions/logout.php">ออกระบบ</a>
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
</body>

</html>