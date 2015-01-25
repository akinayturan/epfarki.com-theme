<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
<div id="main" class="updatable" role="main">
<div id="yukleyici"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" class="post"> 
<div id="postic-<?php the_ID(); ?>" class="postic"> 
<div id="title-<?php the_ID(); ?>" class="title"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></div>
<div class="temiz"></div>
<div id="icerik-<?php the_ID(); ?>" class="icerik">
		<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>


<?php
$args=array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories=get_categories($args);
$cat_count = 0;
foreach($categories as $c) {
$cat_count++;
}
$count_posts = wp_count_posts();
$published = $count_posts->publish;
?>
<blockquote> Web sitemizde <strong><?php echo $cat_count; ?></strong> kategori'de <strong><?php echo $published;?></strong> adet yazı yazılmış ve <strong><?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");?></strong> yorum bulunmaktadır.
</blockquote>
             


     
<div class="tab2_content">
    <h5>Yazar(lar):</h5>
    <ul class="sitemap-authors">
    <?php 
       //http://codex.wordpress.org/Function_Reference/wp_list_authors
       wp_list_authors('exclude_admin=1&optioncount=1');
    ?>
    </ul>  
</div>
             
<div class="tab2_content">
    <h5>Sayfalar:</h5>
    <ul class="sitemap-pages">
    <?php
      wp_list_pages('exclude=1115&title_li='); //***Exclude page Id, separated by comma. I excluded the sitemap of this blog (page_ID=1115).
    ?>
    </ul> 
</div>
         
<div class="tab2_content">
    <h5>Yazılar:</h5>
    <ul>
    <?php
    $cats = get_categories('exclude='); //***Exclude categories by ID, separated by comma if you like.
    foreach ($cats as $cat) {
      echo '<li class="category">'."\n".'<h6><span class="grey">Kategori: </span>'.$cat->cat_name.'</h6>'."\n";
      echo '<ul class="cat-posts">'."\n";
       
      query_posts('posts_per_page=-1&cat='.$cat->cat_ID); //-1 shows all posts per category. 1 to show most recent post.
         
      while(have_posts()): the_post(); 
         $category = get_the_category();
         if ($category[0]->cat_ID == $cat->cat_ID) {?>
            <li><a href="<?php the_permalink() ?>"  title="Permanent Link to: <?php the_title(); ?>">
            <?php the_title(); ?></a> (<?php comments_number('0', '1', '%'); ?>)</li>
       <?php } //endif
        endwhile; //endwhile
       ?>
      </ul> 
      </li>
    <?php } ?>
    </ul>
    <?php 
    wp_reset_query(); 
    ?>            
</div>
     

<blockquote>sitemap.xml'e <a href="//epfarki.com/sitemap.xml" rel="external" title="Site Haritası">buradan</a> ulaşabilirsiniz.</blockquote>
    

</div>
</div>

<div class="temiz"> </div>
   <?php endwhile; else: ?>
   <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
   <?php endif; ?>
<div class="temiz"></div>
</div>
</div>

</div>
<div class="temiz"></div>
<?php get_footer(); ?>