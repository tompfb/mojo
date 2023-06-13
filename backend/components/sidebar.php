        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center py-2" href="dashboard.php">

                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-ghost"></i>
                    
                </div> -->
                <div class="sidebar-brand-text mx-3 py-2">
                    <img src="../img/Logo-mojoesan.png" class=" img-fluid" width="100" alt="">
                    <!-- Admin<sup>2</sup> -->
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>แดชบอร์ด</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                เนื้อหา
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="article.php">
                    <i class="fas fa-newspaper"></i>
                    <span>บทความ</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                การจัดการ
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="category.php">
                    <i class="fas fa-layer-group"></i>
                    <span>หมวดหมู่</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tag.php">
                    <i class="fas fa-hashtag"></i>
                    <span>ป้าย</span></a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                ไฟล์
            </div>

            <li class="nav-item">
                <a class="nav-link" href="video.php">
                    <i class="fas fa-video"></i>
                    <span>วิดิโอ</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="podcast.php">
                    <i class="fas fa-headphones"></i>
                    <span>พอดคาสต์</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($userRole == '1') { ?>
                <div class="sidebar-heading">
                    การจัดการ ผู้ใช้งาน
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                        <i class="fas fa-users"></i>
                        <span>ผู้ใช้งาน</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            <?php } ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->