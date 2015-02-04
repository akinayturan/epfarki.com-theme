<?php
$url_al = $_SERVER['REQUEST_URI'];
$url_dizisi = split(' |/', $url_al);
header("Location: http://epfarki.com/?s=$url_dizisi[1]");
?>
