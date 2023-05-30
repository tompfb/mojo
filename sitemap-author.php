<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

    <?php
    $author = "SELECT * FROM user";
    $query_tag = mysqli_query($conn, $author);
    while ($row_tag = mysqli_fetch_assoc($query_tag)) {
        $author = stripslashes($row_tag['firstname']); 
        $encode_tag = urlencode($author);
        echo "
    <url>
    <loc>https://www.xn--82c8azatt7d.net/author/$encode_tag</loc>
    <lastmod>2022-05-26T02:46:27+00:00</lastmod>
    <priority>0.75</priority>
    </url>";
    }
    ?> 
</urlset>