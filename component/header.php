<?php
$uri_path = $_SERVER['REQUEST_URI'];
$currentSegment = basename(parse_url($uri_path, PHP_URL_PATH));
?>
    <header class="main-header" id="navbar-sticky">
        <div class=" menu-moblie">
            <div class="open-nav">
                <button class="openmenu" type="button" onclick="openNav()"><span>&#9776;</span></button>
            </div>
            <div class="logo-center text-center">
                <a href="../">
                    <img data-src="../img/Logo-mojoesan.png" class="lazy img-fluid" width="200" height="500" alt="logo mojoesan">
                </a>
            </div>
            <div class="list-icon">
                <a href="../login.php" title="เข้าสู่ระบบ"><i class="fal fa-user-circle"></i></a>
            </div>
        </div>
        <div class="container  d-md-none">
            <div class="row align-items-center desktop-show">
                <div class="col-lg-2 site-logo ">
                    <a href="../">
                        <img data-src="../img/Logo-mojoesan.png" class="lazy img-fluid zoom-hover" width="150" height="500" alt="logo mojoesan">
                    </a>
                </div>
                <div class="col-lg-8 ">
                <nav class="nav-bar">
                    <ul>
                        <li><a href="../">หน้าแรก</a></li>
                        <li><a class="<?php if ($currentSegment == "interview") {
                                            echo "active";
                                        }  ?>" href="../interview/">สัมภาษณ์</a></li>
                        <li><a class="<?php if ($currentSegment == "research") {
                                            echo "active";
                                        }  ?>" href="../research/">งานวิจัย</a></li>
                        <li><a class="<?php if ($currentSegment == "podcast") {
                                            echo "active";
                                        }  ?>" href="../podcast/">พอดคาสต์</a></li>
                        <li><a class="<?php if ($currentSegment == "esan-clip") {
                                            echo "active";
                                        }  ?>" href="../esan-clip/">คลิป</a></li>
                        <li><a class="<?php if ($currentSegment == "about") {
                                            echo "active";
                                        }  ?>" href="../about/">เกี่ยวกับเรา</a></li>
                    </ul>
                </nav>
                </div>
                <div class="col-lg-2 list-icon">
                    <div class="navbarss">
                        <ul>
                            <li class="searchbar">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <div class="togglesearch">
                                    <form action="../?s=s" method="GET">
                                        <input type="text" name="s" class="search-input-toggles" placeholder="กรอกคำค้นหา..." required />
                                        <button type="submit">ค้นหา</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="../login.php" title="เข้าสู่ระบบ"><i class="fal fa-user-circle"></i></a>
                </div>
            </div>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <img data-src="../img/Logo-mojoesan-white.png" class="lazy img-fluid me-1" width="150" height="500" alt="logo mojoesan">
                <br>
                <a href="../">หน้าแรก</a>
                <a href="../interview/">สัมภาษณ์</a>
                <a href="../research/">งานวิจัย</a>
                <a href="../podcast/">พอดคาสต์</a>
                <a href="../esan-clip/">คลิป</a>
                <a href="../about/">เกี่ยวกับเรา</a>
                <form action="../?s=s" method="GET">
                    <input type="text" name="s" class="search-input-toggles" placeholder="กรอกคำค้นหา..." required />
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </header>
