<?php
include "./connection.php";
include './functions/date-thai.php';
@$key_search = $_GET["s"];
if ($key_search) {
    $sql = "SELECT * FROM articles WHERE topic_name LIKE '%" . $key_search . "%' ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
} else {
    $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 0,6 ";
    $q = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <title>mojo esan</title>
    <meta name="title" content="   mojo esan" />
    <meta name="description" content="หวยหุ้นจีน เปิดให้บริการบนหวยหุ้นจีนออนไลน์ จ่ายสูงสุดบาทละ 1,000 บาท บริการแทงหวยไม่มีขั้นต่ำ ฝาก-ถอนรวดเร็วโอนไว ถอนได้ไม่มีอั้นตลอด 24 ชั่วโมง" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="th" />
    <meta http-equiv="content-type" content="text/html;" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index,follow" />
    <meta name="Author" content="หวยหุ้นจีน ">
    <meta name="googlebots" content="all">
    <meta name="audience" content="all">
    <meta name="Rating" content="General">
    <meta name="distribution" content="Global">
    <meta name="allow-search" content="yes">

    <meta property="og:locale" content="th_TH" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="mojo esan" />
    <meta property="og:description" content="หวยหุ้นจีน เปิดให้บริการบนหวยหุ้นจีนออนไลน์ จ่ายสูงสุดบาทละ 1,000 บาท บริการแทงหวยไม่มีขั้นต่ำ ฝาก-ถอนรวดเร็วโอนไว ถอนได้ไม่มีอั้นตลอด 24 ชั่วโมง" />
    <meta property="og:url" content="https://www.xn--82c8azatt7d.net/" />
    <meta property="og:site_name" content="หวยหุ้นจีน " />
    <meta property="og:image" content="./img/logo-lotto-chinese.webp" />

    <meta property="twitter:url" content="https://www.xn--82c8azatt7d.net/">
    <meta property="twitter:image" content="./img/logo-lotto-chinese.webp">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="   mojo esan" />
    <meta name="twitter:description" content="หวยหุ้นจีน เปิดให้บริการบนหวยหุ้นจีนออนไลน์ จ่ายสูงสุดบาทละ 1,000 บาท บริการแทงหวยไม่มีขั้นต่ำ ฝาก-ถอนรวดเร็วโอนไว ถอนได้ไม่มีอั้นตลอด 24 ชั่วโมง" />
    <meta name="twitter:site" content="หวยหุ้นจีน ">
    <meta name="twitter:creator" content="หวยหุ้นจีน ">

    <link rel="canonical" href="https://www.xn--82c8azatt7d.net/" />
    <link rel="alternate" href="https://www.xn--82c8azatt7d.net/" hreflang="th-TH" />

    <link rel="shortcut icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="icon" href="./favicon.webp" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./favicon.webp" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700&family=Sarabun:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://www.xn--82c8azatt7d.net/",
            "logo": "https://www.xn--82c8azatt7d.net/img/logo-lotto-chinese.webp"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebPage",
            "name": "หวยหุ้นจีน ",
            "speakable": {
                "@type": "SpeakableSpecification",
                "xPath": [
                    "/html/head/title",
                    "/html/head/meta[@name='description']/@content"
                ]
            },
            "url": "https://www.xn--82c8azatt7d.net/"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "url": "https://www.xn--82c8azatt7d.net/",
            "name": "หวยหุ้นจีน ",
            "description": "หวยหุ้นจีน ฝาก-ถอนรวดเร็ว ตลอด 24 ชั่วโมง",
            "potentialAction": [{
                "@type": "SearchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "https://www.xn--82c8azatt7d.net/?s={search_term_string}"
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
                "name": "หวยหุ้นจีน "
            }]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Store",
            "image": [
                "https://www.xn--82c8azatt7d.net/img/logo-lotto-chinese.webp",
                "https://www.xn--82c8azatt7d.net/img/banner.webp",
                "https://www.xn--82c8azatt7d.net/img/img-lotto-chinese-01.webp"
            ],
            "name": "หวยหุ้นจีน ",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "TH"
            },
            "url": "https://www.xn--82c8azatt7d.net/",
            "priceRange": "฿฿฿",
            "telephone": "+6696-921-9245",
            "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday"
                    ],
                    "opens": "08:00",
                    "closes": "23:59"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "Sunday",
                    "opens": "08:00",
                    "closes": "23:00"
                }
            ]
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
        <div class="container">
            <div class="row align-items-center desktop-show">
                <div class="col-lg-2 site-logo ">
                    <a href="./">
                        <img data-src="./img/Logo-mojoesan.png" class="lazy img-fluid zoom-hover" width="150" height="500" alt="logo mojoesan">
                    </a>
                </div>
                <div class="col-lg-8">
                    <nav class="nav-bar">
                        <ul>
                            <!-- <li><a href="./esan-news/">esan news</a></li> -->
                            <li><a href="./">home</a></li>
                            <li><a href="./interview/">interview</a></li>
                            <li><a href="./research/">research</a></li>
                            <li><a href="./podcast/">podcast</a></li>
                            <li><a href="./esan-clip/">clip</a></li>
                            <li><a href="./about/">About</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 list-icon">
                    <a href="" title="search">
                        <i class="far fa-search"></i>
                    </a>
                    <a href="./login.php" title="เข้าสู่ระบบ"><i class="fal fa-user-circle"></i></a>
                </div>
            </div>
        </div>
    </header>
    <article class="article-content content">
    <!-- fadeInUp-animation -->
        <section class="site-main-content">
            <div class="container mb-5 ">
                <h1 class="txt-heading">mojo esan</h1>
                <p class="p_site mb-0">
                    <strong>ศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสาน (MOJO อีสาน)</strong> <br>
                    ติดตามข่าวสารเศรษฐกิจชุมชน สถานการณ์พื่นที่ งานบุญศีลกินทาน <br>
                    โครงการ EVENT พื่นที่ชุมชน รู้ทันทุกความเคลื่อนไหว
                </p>
            </div>
            <!-- < ?php include('./aritcle-box.php'); ?> -->
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
                    <a href="https://www.thaihealth.or.th" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="สสส."><img data-src="./img/Logo-sss.png" class="lazy img-fluid" width="180" height="165" alt=""></a>
                    <a href="https://thecitizen.plus" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="thecitizen"><img data-src="./img/Logo-thecitizen.png" class="lazy img-fluid" width="400" height="165" alt=""></a>
                    <!-- <br> -->
                    <a href="https://www.facebook.com/UbonConnect" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="ubon connect"><img data-src="./img/Logo-Ubon-Connect.png" class="lazy img-fluid" width="110" height="200" alt=""></a>
                    <a href="https://www.facebook.com/UbonConnect" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="สื่อสร้างสุขอุบลราชธานี"><img data-src="./img/Logo-medie.png" class="lazy img-fluid" width="110" height="200" alt=""></a>
                    <a href="https://www.facebook.com/juiorn" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="ห้องสมุดแมวหางกิ้นส์"><img data-src="./img/Logo-eat.png" class="lazy img-fluid" width="110" height="200" alt=""></a>
                    <a href="https://www.facebook.com/Ginsabaijai" class="text-decoration-none d-inline-block my-2 mx-3" target="_blank" title="กินสบายใจ"><img data-src="./img/Logo-cat.png" class="lazy img-fluid" width="110" height="200" alt=""></a>
                </div>

            </div>
        </section>
    </article>
    <footer class="site-footer">
        <div class="container">
            <h4 class="text-center h1 white pt-3">ติดต่อเรา</h4>
            <div class="row">
                <div class="col-lg-8 col-md-12 my-1 d-flex align-items-center">
                    <img data-src="./img/Logo-mojoesan-white.png" class="lazy img-fluid me-1" width="200" height="500" alt="logo mojoesan">
                    <p class="white h5">โครงการศูนย์สื่อสุขภาวะเพื่อการสื่อสารภาคอีสานสำนักงานมูลนิธิสือสร้างสุข <br>
                        330/5 หมู่ 17 ตำบลไร่น้อย อำเภอเมือง จังหวัดอุบลราธานี
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 my-1 d-flex">
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
    <script>
        $(document).ready(function() {
            $("#dp-next").click(function() {
                var total = $(".dp_item").length;
                $("#dp-slider .dp_item:first-child").hide().appendTo("#dp-slider").fadeIn();
                $.each($(".dp_item"), function(index, dp_item) {
                    $(dp_item).attr("data-position", index + 1);
                });
                detect_active();
            });

            $("#dp-prev").click(function() {
                var total = $(".dp_item").length;
                $("#dp-slider .dp_item:last-child").hide().prependTo("#dp-slider").fadeIn();
                $.each($(".dp_item"), function(index, dp_item) {
                    $(dp_item).attr("data-position", index + 1);
                });

                detect_active();
            });
            $("body").on("click", "#dp-slider .dp_item:not(:first-child)", function() {
                var get_slide = $(this).attr("data-class");
                console.log(get_slide);
                $("#dp-slider .dp_item[data-class=" + get_slide + "]")
                    .hide()
                    .prependTo("#dp-slider")
                    .fadeIn();
                $.each($(".dp_item"), function(index, dp_item) {
                    $(dp_item).attr("data-position", index + 1);
                });

                detect_active();
            });
        });
    </script>
    <?php include('./import-js.php'); ?>
    <!-- <script src="./js/jquery-3.3.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery ||
            document.write('<script src="./js/jquery-slim.min.js"><\/script>');
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/holder.min.js"></script>
</body>

</html>