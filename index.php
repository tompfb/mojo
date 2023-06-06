<?php
include "./connection.php";
include './functions/date-thai.php';
@$key_search = $_GET["s"];
if ($key_search) {
    $sql = "SELECT * FROM articles WHERE status = 0 and topic_name LIKE '%" . $key_search . "%' ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
} else {
    $sql = "SELECT * FROM articles WHERE status = 0 ORDER BY id DESC LIMIT 0,6 ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <title>mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน </title>
    <meta name="title" content="mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta name="description" content="ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน) หรือ Esan Mobile Journalist เป็นโครงการที่ดำเนินงานโดยมูลนิธิสื่อสร้างสุข ได้รับการสนับสนุนงบประมาณจากสำนักงานกองทุนสนับสนุนสุขภาพ (สสส.)" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index,follow" />
    <meta name="Author" content="mojo esan ">
    <meta name="googlebots" content="all">
    <meta name="audience" content="all">
    <meta name="Rating" content="General">
    <meta name="distribution" content="Global">
    <meta name="allow-search" content="yes">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta property="og:description" content="ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน) หรือ Esan Mobile Journalist เป็นโครงการที่ดำเนินงานโดยมูลนิธิสื่อสร้างสุข ได้รับการสนับสนุนงบประมาณจากสำนักงานกองทุนสนับสนุนสุขภาพ (สสส.)" />
    <meta property="og:url" content="https://www.mojoesan.com/" />
    <meta property="og:site_name" content="mojo esan " />
    <meta property="og:image" content="./img/Logo-mojoesan.png" />

    <meta property="twitter:url" content="https://www.mojoesan.com/">
    <meta property="twitter:image" content="./img/Logo-mojoesan.png">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน" />
    <meta name="twitter:description" content="ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน) หรือ Esan Mobile Journalist เป็นโครงการที่ดำเนินงานโดยมูลนิธิสื่อสร้างสุข ได้รับการสนับสนุนงบประมาณจากสำนักงานกองทุนสนับสนุนสุขภาพ (สสส.)" />
    <meta name="twitter:site" content="mojo esan ">
    <meta name="twitter:creator" content="mojo esan ">

    <link rel="canonical" href="https://www.mojoesan.com/" />
    <link rel="alternate" href="https://www.mojoesan.com/" hreflang="th-TH" />

    <link rel="shortcut icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./favicon.webp" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700&family=Sarabun:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Google tag (gtag.js) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://www.mojoesan.com/",
            "logo": "https://www.mojoesan.com/img/Logo-mojoesan.png"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebPage",
            "name": "mojo esan ",
            "speakable": {
                "@type": "SpeakableSpecification",
                "xPath": [
                    "/html/head/title",
                    "/html/head/meta[@name='description']/@content"
                ]
            },
            "url": "https://www.mojoesan.com/"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "url": "https://www.mojoesan.com/",
            "name": "mojo esan ",
            "description": "mojo esan ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน",
            "potentialAction": [{
                "@type": "SearchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "https://www.mojoesan.com/?s={search_term_string}"
                },
                "query-input": "required name=search_term_string"
            }]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "mojo esan "
            }]
        }
    </script>
    <style>
        <?php
        include('bootstrap/bootstrap.css');
        include('css/style.css');

        ?>
    </style>
    <link href="./css/carousel.css" rel="stylesheet" />
</head>

<body>
    <header class="main-header" id="navbar-sticky">
        <div class=" menu-moblie">
            <div class="open-nav">
                <button class="openmenu" type="button" onclick="openNav()"><span>&#9776;</span></button>
            </div>
            <div class="logo-center text-center">
                <a href="./">
                    <img data-src="./img/Logo-mojoesan.png" class="lazy img-fluid" width="200" height="500" alt="logo mojoesan">
                </a>
            </div>
            <div class="list-icon">
                <a href="./login.php" title="เข้าสู่ระบบ"><i class="fal fa-user-circle"></i></a>
            </div>
        </div>
        <div class="container  d-md-none">
            <div class="row align-items-center desktop-show">
                <div class="col-lg-2 site-logo ">
                    <a href="./">
                        <img data-src="./img/Logo-mojoesan.png" class="lazy img-fluid zoom-hover" width="150" height="500" alt="logo mojoesan">
                    </a>
                </div>
                <div class="col-lg-8 ">
                    <nav class="nav-bar">
                        <ul>
                            <li><a class="active" href="./">หน้าแรก</a></li>
                            <li><a href="./interview/">สัมภาษณ์</a></li>
                            <li><a href="./research/">งานวิจัย</a></li>
                            <li><a href="./podcast/">พอดคาสต์</a></li>
                            <li><a href="./esan-clip/">คลิป</a></li>
                            <li><a href="./about/">เกี่ยวกับเรา</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 list-icon">
                    <div class="navbarss">
                        <ul>
                            <li class="searchbar">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <div class="togglesearch">
                                    <form action="./?s=s" method="GET">
                                        <input type="text" name="s" class="search-input-toggles" placeholder="กรอกคำค้นหา..." required />
                                        <button type="submit">ค้นหา</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="./login.php" title="เข้าสู่ระบบ"><i class="fal fa-user-circle"></i></a>
                </div>
            </div>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <img data-src="./img/Logo-mojoesan-white.png" class="lazy img-fluid me-1" width="150" height="500" alt="logo mojoesan">
                <br>
                <a href="./">หน้าแรก</a>
                <a href="./interview/">สัมภาษณ์</a>
                <a href="./research/">งานวิจัย</a>
                <a href="./podcast/">พอดคาสต์</a>
                <a href="./esan-clip/">คลิป</a>
                <a href="./about/">เกี่ยวกับเรา</a>
                <form action="./?s=s" method="GET">
                    <input type="text" name="s" class="search-input-toggles" placeholder="กรอกคำค้นหา..." required />
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </header>
    <?php
    if (!$key_search) {
    ?>
        <article class="article-content content">
            <section class="site-main-content">
                <div class="container">
                    <h1 class="txt-heading">mojo esan</h1>
                    <p class="p_site mb-0">
                        <strong>ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)</strong> <br>
                        ติดตามข่าวสารเศรษฐกิจชุมชน สถานการณ์พื่นที่ งานบุญศีลกินทาน <br>
                        โครงการ EVENT พื่นที่ชุมชน รู้ทันทุกความเคลื่อนไหว
                    </p>
                </div>
            </section>
            <?php include('./blog-slide.php'); ?>
            <!-- ----------------- -->
            <?php include('./list-box.php'); ?>
            <!-- ----------------- -->
            <?php include('./section-video.php'); ?>
            <!-- ----------------- -->
            <?php include('./section-podcast.php'); ?>
            <section class="py-5">
                <div class="container">
                    <h2 class="txt-heading">กิจกรรมภาคี <small>(สสส.)(เพจภาคี 6 จังหวัด)</small></h2>
                    <div class="d-block my-3 text-center">
                        <a href="https://www.thaihealth.or.th" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="สสส."><img data-src="./img/Logo-sss.png" class="lazy img-fluid zoom-hover" width="180" height="165" alt=""></a>
                        <a href="https://thecitizen.plus" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="thecitizen"><img data-src="./img/Logo-thecitizen.png" class="lazy img-fluid zoom-hover" width="380" height="165" alt=""></a>
                        <!-- <br> -->
                        <a href="https://www.facebook.com/UbonConnect" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="ubon connect"><img data-src="./img/Logo-Ubon-Connect.png" class="lazy img-fluid zoom-hover" width="110" height="200" alt=""></a>
                        <a href="https://www.facebook.com/UbonConnect" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="สื่อสร้างสุขอุบลราชธานี"><img data-src="./img/Logo-medie.png" class="lazy img-fluid zoom-hover" width="110" height="200" alt=""></a>
                        <a href="https://www.facebook.com/juiorn" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="ห้องสมุดแมวหางกิ้นส์"><img data-src="./img/Logo-eat.png" class="lazy img-fluid zoom-hover" width="110" height="200" alt=""></a>
                        <a href="https://www.facebook.com/Ginsabaijai" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="กินสบายใจ"><img data-src="./img/Logo-cat.png" class="lazy img-fluid zoom-hover" width="110" height="200" alt=""></a>
                    </div>

                </div>
            </section>
        </article>
    <?php
    } else {
    ?>
        <article class="article-container-card content pt-4">
            <div class="container">
                <div class="text-center ">
                    <p class="text-bold-search mb-0 ">
                        Search By : <?php echo $key_search; ?>
                    </p>
                </div>
                <div class="row justify-content-center align-items-end mt-4">
                    <?php
                    $num = mysqli_num_rows($q);
                    if ($num == 0) {
                        echo " <p class='p-sea'>ไม่มีเนื้อหาที่ท่านค้นหา..</p>";
                    } else {
                        while ($resuret = mysqli_fetch_array($q)) {
                            $n_id =  $resuret['user_id'];
                            $n_cate =   $resuret['category_id'];
                            $n_author = "SELECT * FROM  user  WHERE id = $n_id";
                            $query_n = mysqli_query($conn, $n_author) or die("Error in query: $n_author " . mysqli_error($conn));
                            $author_n = mysqli_fetch_array($query_n);

                            $sql_c = "SELECT * FROM category WHERE id =  $n_cate";
                            $query_c = mysqli_query($conn, $sql_c) or die("Error in query: $sql_c " . mysqli_error($conn));
                            $result_c = mysqli_fetch_array($query_c);
                    ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                                <div class="box-post">
                                    <a href="./view/<?php echo $resuret['url_articles_seo']; ?>/" class="post_link" rel="ugc">
                                        <figure class="news-articles-img">
                                            <img class="lazy img-fluid " data-src="./backend/uploads/article-img/<?php echo $resuret['image_banner']; ?>" alt="<?php echo $resuret['topic_name']; ?>" width="100%" height="100%">
                                        </figure>
                                        <div class="px-2">
                                            <h4 class="new-title-post"><?php echo trim(strip_tags(mb_substr($resuret['topic_name'], 0, 40, 'utf-8'))); ?></h4>
                                            <div class="card-flex-new">
                                                <span>
                                                    <img data-src="./backend/uploads/user-img/<?php echo $author_n['image_path']; ?>" class="lazy img-fluid" width="30" height="30" alt="img user">
                                                    <?php echo $author_n["firstname"] . "  " . $author_n['lastname']; ?>
                                                </span>
                                                <span class="date">
                                                    <i class="fas fa-clock"></i>
                                                    <?php
                                                    $str_Date = $resuret['create_at'];;
                                                    echo ": " . DateThai($str_Date);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="./category/<?php echo $result_c['cate_url']; ?>/" class="cate_absolute"><?php echo $result_c['name']; ?></a>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </article>
    <?php
    }
    ?>
    <footer class="site-footer" style="background-image: url(./img/bg-footer.webp);">
        <div class="container">
            <h4 class="text-center h1 white pt-3">ติดต่อเรา</h4>
            <div class="row">
                <div class="col-lg-8 col-md-12 my-1 f-none">
                    <img data-src="./img/Logo-mojoesan-white.png" class="lazy img-fluid me-1" width="200" height="500" alt="logo mojoesan">
                    <p class="white h5">โครงการศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสานสำนักงานมูลนิธิสือสร้างสุข <br>
                        330/5 หมู่ 17 ตำบลไร่น้อย อำเภอเมือง จังหวัดอุบลราธานี
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 my-1 d-flex justify-content-center ">
                    <div class="span-box">
                        <span> <i class="fas fa-phone-volume"></i></span>
                    </div>
                    <div class="span_a">
                        <a href="tel:0878766413">087-876-6413</a>
                        <a href="tel:0854157901">085-415-7901</a>
                        <a href="tel:0998980280">099-898-0280</a>
                        <div class="d-block mt-2">
                            <a href="" class=" d-inline-block me-3"><img data-src="./img/icon_facebook.png" class="lazy img-fluid" width="35" height="35" alt="icon facebook"></a>
                            <a href="" class=" d-inline-block "><img data-src="./img/icon_youtube.png" class="lazy img-fluid" width="35" height="35" alt="icon youtube"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <a href="" class="scrollup">
        <span><i class="fas fa-arrow-up"></i></span>
    </a>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "280px";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0";
        }
    </script>
    <script src="./js/jquery-latest.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 600) {
                $(".scrollup").fadeIn();
            } else {
                $(".scrollup").fadeOut();
            }
        })

        $(".scrollup").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages;

            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        })
    </script>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar-sticky");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    <script>
        window.jQuery ||
            document.write('<script src="./js/jquery-slim.min.js"><\/script>');
    </script>
    <script>
        $(document).ready(function() {

            $(".fa-search").click(function() {
                $(".togglesearch").toggle();
                // $("input[type='text']").focus();
            });

        });
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/holder.min.js"></script>
</body>

</html>