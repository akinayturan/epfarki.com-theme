<!DOCTYPE html>
<html dir="ltr" lang="tr">
<head><!-- Bismillahirrahmanirrahim ~ Rahmân ve Rahîm olan Allah'ın adıyla. -->

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
 
<meta charset="UTF-8"/>
<meta name="designer" content="bizimakin"/> 
<meta name="author" content="bizimakin" />    
<meta name="generator" content="EP 2.0"/> 
<meta name="rating" content="general"/>

<link href="//epfarki.com/wp-content/themes/epbeyaz/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="//epfarki.com/ep/tanitim/epfarki-com-banner-149-149.jpg" rel="image_src" />  
<link href="//epfarki.com/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link href="//plus.google.com/102424977791408310221" rel="author" /> 
<link href="//epfarki.com/" rel="index" title="EPfarki" />  

<link href="//feeds.feedburner.com/epfarki" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
<link href="//epfarki.com/feed/" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
<link href="//epfarki.com/xmlrpc.php" rel="pingback" />
<?php wp_head(); ?>
</head>
<body>
<div id="genel">
<!--[if lte IE 9]>
<blockquote>Kullandiginiz tarayıcı bu sitede kullanılan çoğu özelligi desteklemiyor. Kullandiginiz tarayıcıyı <a href="http://windows.microsoft.com/tr-tr/internet-explorer/download-ie" title="internet-explorer" target="_blank"><font color="#BF0000"><b>Yeni Sürüm İnternet Explorer</b></font></a>'a yükseltmenizi yada daha gelişmiş olan <a href="http://google.com/chrome" title="chrome" target="_blank"><font color="#BF0000"><b>Google Chrome</b></font></a> veya <a href=" http://www.mozilla.org/tr/firefox/new/" title="firefox" target="_blank"><font color="#BF0000"><b>Mozilla Firefox</b></font></a> yüklemenizi öneririm :)</blockquote>
<![endif]-->

<div id="ortalan">
<?php get_sidebar(); ?>
<div id="anayazialan"><div id="yazialan">
<div id="ustmenu">
<div id="siteisim">
<?php include (TEMPLATEPATH . "/menu-ust.php"); ?>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
</div>
</div>

<?php include (TEMPLATEPATH . '/reklam-hareketli.php'); ?>
<div id="altyazialan">
