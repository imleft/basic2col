<?php get_header();
  if (have_posts()) :
?>

  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  
  <?php /* If this is a category archive */ if (is_category()) : ?>
    <h2 id="pagetitle">
      <?php _e('Archives for','basic2col'); ?>
      <?php echo single_cat_title(); ?>
    </h2>

  <?php /* If this is a tag archive WP Tags */ elseif (is_tag()) : ?>
    <h2 id="pagetitle">
      <?php _e('Posts tagged','precious'); ?>
      <?php single_tag_title(); ?>
    </h2>

  <?php /* If this is a daily archive */ elseif (is_day()) : ?>
    <h2 id="pagetitle">
      <?php _e('Archives for','basic2col'); ?>
      <?php the_time(__('F jS, Y','basic2col')); ?>
    </h2>
        
  <?php /* If this is a monthly archive */ elseif (is_month()) : ?>
    <h2 id="pagetitle">
      <?php _e('Archives for','basic2col'); ?>
      <?php the_time(__('F, Y','basic2col')); ?>
    </h2>
    
  <?php /* If this is a yearly archive */ elseif (is_year()) : ?>
    <h2 id="pagetitle">
      <?php _e('Archives for','basic2col'); ?>
      <?php the_time(__('Y','basic2col')); ?>
    </h2>
    
  <?php /* If this is an author archive */ elseif (is_author()) : ?>
    <?php
      if (isset($_GET['author_name'])) {
        $curauth = get_userdatabylogin($author_name);
      } else {
        $curauth = get_userdata(intval($author));
      }        
    ?>
    <h2 id="pagetitle">
      <?php _e('Posts by','basic2col'); ?>
      <?php echo $curauth->display_name; ?>
    </h2>
              
  <?php /* If this is a paged archive */
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
    <h2 id="pagetitle"><?php _e('Archives','basic2col'); ?></h2>

  <?php endif; ?>
  
  <?php /*start loop*/ while (have_posts()) : the_post(); ?>

    <article class="post archives" id="post-<?php the_ID(); ?>">
      <header class="posttitle">
        <h3>
          <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?>
          </a>
        </h3>
      </header>
      
      <p class="date"><?php the_time(__('F jS, Y','basic2col')); ?></p>

      <div class="postcontent">
        <?php the_content() ?>
      </div>

      <footer class="postmeta">
        <p>
          <?php _e('Filed in','basic2col'); ?> <?php the_category(',') ?>
          
          <?php basic2col_tags_front(); ?>
        
          <?php if(comments_open() || pings_open()) : ?> -
            <a href="<?php comments_link(); ?>"
               title="<?php _e('Comments to','basic2col'); ?><?php the_title(); ?>">
              <?php comments_number('0','1','%'); ?> <?php _e('Comments','basic2col'); ?>
            </a>
        <?php else : ?>
            - <?php _e('Comments closed','basic2col'); ?>
          <?php endif; ?>

          <?php edit_post_link(__('Edit','basic2col'),' - ',''); ?>
        </p>
      </footer>
    </article>

  <?php endwhile; else :
    echo basic2col_404_message();
    endif; ?>

  <?php get_footer(); ?>
