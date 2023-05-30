<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

  <?php
  $entries = "SELECT * FROM articles";
  $r = mysqli_query($conn, $entries);
  while ($row = mysqli_fetch_assoc($r)) {
    $url_articles_seo = stripslashes($row['url_articles_seo']); 
    // $date = date("Y-m-d", strtotime($row['create_at']));
    $date = date('Y-m-d\TH:i:sP', strtotime($row['create_at']));
    $encode = urlencode($url_articles_seo);
    echo "
      <url>
      <loc>https://www.xn--82c8azatt7d.net/view/$encode</loc>
      <lastmod>" . $date . "</lastmod>
      <priority>0.75</priority>
      </url>";
  }
  ?>
</urlset>