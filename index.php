<?php get_header(); ?>
<div id="main" class="updatable" role="main">

<div id="anakategorimenu2">
   <ul>
     <li><a><?php $dosya = fopen("sozler.txt","r"); while($satir = fgets($dosya,1024)) $sozler[] = $satir; fclose($dosya); $soz = $sozler[rand(0,count($sozler)-1)]; echo $soz; ?></a></li>
  </ul>
</div>
<div class="temiz"></div>

<div id="yukleyici"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="postkap"><div class="post"><div class="postic"> 
<div class="anatitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></div>
<div id="anaicerik-<?php the_ID(); ?>" class="anaicerik">
<?php the_excerpt(get_the_title(). ' yazisinin devamini okuyun &raquo;'); ?></div>
</div></div></div>
<div class="temiz"></div>
<?php endwhile; ?>
<?php else : ?>

<div class="post"> 
<div class="postic"> 
<h3>Üzgünüz, aradiginiz içerik bulunamadi.</h3>
<p>Asagidaki form araciligiyla site içerisinde arama yapabilirsiniz.</p>

<form style="width:380px;" method="get" id="searchform2" action="<?php bloginfo ('home'); ?>">
<input style="width:200px;" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Ara" />
</form>
<br />
<h4>Veya</h4>
<p class="center"><a href="//epfarki.com/?rastgele" title="Burasi sizi su anki ruh halinize uygun bir yaziya götürür!">Burasi sizi su anki ruh halinize uygun bir yaziya götürür!</a></p>
</div>
</div>

<?php endif; ?>

<?php wp_pagenavi(); ?>	
<div class="temiz"></div>

</div>
<div class="temiz"></div>
<?php get_footer(); ?>