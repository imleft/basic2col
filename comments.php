<div id="commentbox">
  <?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
    <p><?php _e('Enter password to view comments.', 'basic2col'); ?></p>
  <?php return; endif; ?>

  <?php if ( $comments || comments_open() || pings_open() ) : ?>
    <h3 id="comments">
      <?php comments_rss_link('<img src="'. get_bloginfo('wpurl') .'/wp-includes/images/rss.png" alt="'.__('RSS Comments','basic2col').'" class="rssimg" />'); ?>

      <?php comments_number(__('No Comments','basic2col'),__('One Comment','basic2col'),__('% Comments','basic2col') );?>
    </h3>

  <?php endif; ?>

  <p class="small">
    <?php if ( comments_open() ) : ?>
      <a href="<?php the_permalink() ?>#postcomment"
	 title="<?php _e('Write a comment to','basic2col'); ?> <?php the_title(); ?>">
	<?php _e('Write comment','basic2col'); ?></a>
    <?php endif; ?>
    <?php if ( pings_open() ) : ?>
      - <a href="<?php trackback_url() ?>" rel="trackback"
	   title="<?php _e('Trackback link to','basic2col'); ?>
		  <?php the_title(); ?>"><?php _e('Trackback','basic2col'); ?></a>
    <?php endif; ?>
    <?php if (comments_open() || pings_open() ) : ?>

    <?php elseif ( ($comments) && (!comments_open() && !pings_open())  )  : ?>
      <?php _e('Comments closed','basic2col'); ?>
    <?php endif; ?>
  </p>

  <?php if ( $comments ) : ?>
    <ol id="commentlist">
      <?php
	wp_list_comments( array(
	  'style'       => 'ol',
	  'short_ping'  => true,
	  'avatar_size' => 56,
          'callback'    => 'basic2col_comment_callback'
	) );
      ?>
    </ol>

  <?php else : // If there are no comments yet ?>
    <?php if ('open' == $post->comment_status) : ?>
      <p class="small"></p>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ('open' == $post->comment_status) : ?>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <p>
        <?php _e('You have to be','basic2col'); ?>
        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">
          <?php _e('logged in','basic2col'); ?>
        </a>
        <?php _e('to post a comment','basic2col'); ?>
      </p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <fieldset>
          <legend id="postcomment"><?php _e('Write comment','basic2col'); ?></legend>
          <?php if ( $user_ID ) : ?>
            <p>
              <?php _e('You are logged in as','basic2col'); ?>
              <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
                <?php echo $user_identity; ?>
              </a>.
              <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">
                <?php _e('Logout','basic2col'); ?>
              </a>
            </p>
          <?php else : ?>
            <label for="author">
              <?php _e('Name','basic2col'); ?>
              <small>(<?php _e('optional','basic2col');?>)</small>
            </label>
            <input type="text"
                   name="author"
                   id="author"
                   value="<?php echo $comment_author; ?>"
                   size="30"
                   tabindex="1" />

            <label for="email">
              <?php _e('Email','basic2col'); ?>
              <small>(<?php _e('optional','basic2col');?>)</small>
            </label>
            <input type="text"
                   name="email"
                   id="email" value="<?php echo $comment_author_email; ?>"
                   size="30"
                   tabindex="2" />
          <?php endif; ?>

          <label for="comment"><?php _e('Your comment','basic2col'); ?></label>
          <textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea>
          <!--<small><strong>XHTML:</strong>  <?php echo allowed_tags(); ?></small>-->

          <?php do_action('comment_form', $post->ID); ?>

          <input name="submit" type="submit" id="submit" tabindex="6" value="<?php _e('Submit','basic2col'); ?>" />
          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
        </fieldset>

      </form>

    <?php endif; // If registration required and not logged in ?>

<?php endif; ?>

</div>
