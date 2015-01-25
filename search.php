<?php get_header(); ?>
<div id="main" class="updatable" role="main">
<div id="yukleyici"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post"> 
<div id="postic-<?php the_ID(); ?>" class="postic"> 
<div id="anatitle-<?php the_ID(); ?>" class="anatitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></div>
<div id="detaylar-<?php the_ID(); ?>" class="detaylar"> 
<?php the_author_posts_link(); ?> tarafından <?php the_time('d.m.y') ?> tarihinde yazıldı / Güncelleme: <?php the_modified_date('d.m.y'); ?>
<span><?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?> / <?php comments_popup_link('Yorum Yok', '1 yorum', '% yorum'); ?></span>
</div>
<div id="anaicerik-<?php the_ID(); ?>" class="anaicerik"> 
<?php the_excerpt(get_the_title(). ' yazısının devamını okuyun &raquo;'); ?>
</div>
</div>
</div>
<div class="temiz"></div>
<?php endwhile; ?>
<?php else : ?>

<div id="post-<?php the_ID(); ?>" class="post"> 
<div id="postic-<?php the_ID(); ?>" class="postic"> 
<h3>Üzgünüz, aradığınız içerik bulunamadı.</h3>
<p>Aşağıdaki form aracılığıyla site içerisinde arama yapabilirsiniz.</p>

<form style="width:380px;" method="get" id="searchform2" action="<?php bloginfo ('home'); ?>">
<input style="width:200px;" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Ara" />
</form>
<br />
<h4>Veya</h4>
<p class="center"><a rel="appendix" href="//epfarki.com/?rastgele" title="Burası sizi şu anki ruh halinize uygun bir yazıya götürür!">Burası sizi şu anki ruh halinize uygun bir yazıya götürür!</a></p>
</div>
</div>

<?php endif; ?>
   	
<?php wp_pagenavi(); ?>	
<div class="temiz"></div>
</div>

</div>
<div class="temiz"></div>
<?php get_footer(); ?>