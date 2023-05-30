<?php
$uri_path = $_SERVER['REQUEST_URI'];
$currentSegment = basename(parse_url($uri_path, PHP_URL_PATH));
