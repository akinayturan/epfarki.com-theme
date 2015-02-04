<?php

if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Lütfen bu sayfayı direkt yüklemeyin. Teşekkürler');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('Bu yazı parola korumalı.', 'mavibeyaz'); ?></p>
	<?php
	return;
}
?>

<?php if ( have_comments() ) : ?>
<?php else :?>
	<?php if ( comments_open() ) : ?>
	<?php else :?>
		<p class="nocomments"><?php _e('Yroumlara kapalı.'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>

	<div id="respond">
		<h3><?php comment_form_title( __('Leave a Comment'), __('%sye cevap yaz' ) ); ?></h3>

		<div id="cancel-comment-reply">
			<small><?php cancel_comment_reply_link() ?></small>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if ( is_user_logged_in() ) : ?>

					<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>

				<?php else : ?>

					<p>
						<input type="text" name="author" id="author" value="<?php if( esc_attr($comment_author) != '' ) echo esc_attr($comment_author); else echo "isim ..."; ?>" onfocus="if (this.value == 'isim ...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'isim ...';}"   tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
						<input type="text" name="email" id="email" value="<?php if( esc_attr($comment_author_email) != '' ) echo esc_attr($comment_author_email); else echo "Email ..."; ?>" onfocus="if (this.value == 'Email ...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email ...';}"  tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
						<input type="text" name="url" id="url" value="<?php if( esc_attr($comment_author_url) != '' ) echo esc_attr($comment_author_url); else echo "url ..."; ?>" onfocus="if (this.value == 'url...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'url ...';}"  tabindex="3" />
					</p>

				<?php endif; ?>

				<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>'), allowed_tags()); ?></small></p>-->

				<p>
					<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
				</p>

				<p>
					<input name="submit" type="submit" class="steelblue button" tabindex="5" value="<?php _e('Post Comment'); ?>" />
					<?php comment_id_fields(); ?>
				</p>

				<?php do_action('comment_form', $post->ID); ?>
			</form>

		<?php endif;?>
	</div>

	<h3 id="comments"><?php comments_number(__(''), __('Buraya 1 kişi renk katmış.'), __('Buraya % kişi renk katmış.'));?></h3>
	<div class="clear"></div>

	<ol class="commentlist">
		<?php wp_list_comments('avatar_size=64'); ?>
	</ol>

	<div class="navigation">
		<?php if ( get_previous_comments_link() != '' ) : ?><div class="alignleft"><?php previous_comments_link() ?></div><?php endif; ?>
		<?php if ( get_next_comments_link() != '' ) : ?><div class="alignright"><?php next_comments_link() ?></div><?php endif; ?>
	</div>

<?php endif;?>