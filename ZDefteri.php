<?php
/*
Template Name: ZDefteri
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
            </div>
         </div>
         <div class="temiz"></div>


         <div id="postic-<?php the_ID(); ?>-2" class="postic">
            <div class="yorumlar">
               <?php comments_template(); ?>
               <div class="temiz"> </div>
               <?php endwhile; else: ?>
                  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
               <?php endif; ?>
            </div>
         </div>
         <div class="temiz"></div>
      </div>

   </div>
   <div class="temiz"></div>
<?php get_footer(); ?>