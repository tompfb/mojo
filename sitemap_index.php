<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
    <sitemap>
        <loc>https://www.xn--82c8azatt7d.net/sitemap.xml</loc>
        <lastmod>2022-05-26T02:46:27+00:00</lastmod>
    </sitemap>


    <?php
    $sqlCate = "SELECT id FROM category";
    $resCate = mysqli_query($conn, $sqlCate);
    $countCate = mysqli_num_rows($resCate);
    if ($countCate !== 0) {
        echo "
        <sitemap>
            <loc>https://www.xn--82c8azatt7d.net/sitemap-category.xml</loc>
            <lastmod>2022-05-26T02:46:27+00:00</lastmod>
        </sitemap> 
      ";
    }
    ?>

    <?php
    $sqlTag = "SELECT id FROM tag";
    $resTag = mysqli_query($conn, $sqlTag);
    $countTag = mysqli_num_rows($resTag);
    if ($countTag !== 0) {
        echo "
        <sitemap>
            <loc>https://www.xn--82c8azatt7d.net/sitemap-tag.xml</loc>
            <lastmod>2022-05-26T02:46:27+00:00</lastmod>
        </sitemap>
      ";
    }
    ?>
    <?php
    $sqlAuthor = "SELECT id FROM user";
    $resAuthor = mysqli_query($conn, $sqlAuthor);
    $countAuth = mysqli_num_rows($resAuthor);
    if ($countAuth !== 0) {
        echo "
        <sitemap>
            <loc>https://www.xn--82c8azatt7d.net/sitemap-author.xml</loc>
            <lastmod>2022-05-26T02:46:27+00:00</lastmod>
        </sitemap>
      ";
    }
    ?>
    <?php
    $sqlArticle = "SELECT id FROM articles";
    $resArticle = mysqli_query($conn, $sqlArticle);
    $countArticle = mysqli_num_rows($resArticle);
    if ($countArticle !== 0) {
        echo "
            <sitemap>
                <loc>https://www.xn--82c8azatt7d.net/sitemap-view.xml</loc>
                <lastmod>2022-05-26T02:46:27+00:00</lastmod>
            </sitemap>
      ";
    }
    ?>

</sitemapindex>