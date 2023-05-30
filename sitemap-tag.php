<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

    <?php
    $tag = "SELECT * FROM tag";
    $query_tag = mysqli_query($conn, $tag);
    while ($row_tag = mysqli_fetch_assoc($query_tag)) {
        $name = stripslashes($row_tag['tag_url']);
        $date = date('Y-m-d\TH:i:sP', strtotime($row_tag['create_at']));
        $encode_tag = urlencode($name);
        echo "
   <url>
   <loc>https://www.xn--82c8azatt7d.net/tag/$encode_tag</loc>
   <lastmod>" . $date  . "</lastmod>
   <priority>0.75</priority>
   </url>";
    }
    ?>
</urlset>