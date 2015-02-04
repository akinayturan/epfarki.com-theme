<?php get_header(); ?>
    <div id="main" class="updatable" role="main">
        <div id="yukleyici"></div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="post">
            <div id="postic-<?php the_ID(); ?>" class="postic">
                <div id="title-<?php the_ID(); ?>" class="title"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4></div>
                <div class="temiz"></div>

                <div id="icerik-<?php the_ID(); ?>" class="icerik">
                    <?php the_content('<p class="serif">Read more &raquo;</p>'); ?>
                    <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
                </div>
                <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
            </div>
            <div class="temiz"></div>
            <?php endwhile; endif; ?>
            <div class="temiz"></div>
        </div>

    </div>
    <div class="temiz"></div>
<?php get_footer(); ?>