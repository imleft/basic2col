<?php
  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
?>

  <article class="post page" id="post-<?php the_ID(); ?>">
    <header id="pagetitle">
      <h2>
        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
      </h2>
    </header>

    <?php edit_post_link(__('Edit','basic2col'),'<p>','</p>'); ?>

    <div class="postcontent">
      <?php the_content(); ?>
      <?php wp_link_pages('before=<p id="pages">'.__('Pages:','basic2col').'&after=</p>'); ?>
      <?php /*subpages*/ $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
        if ($children) {?>
        <h3 id="subpages"><?php _e('Subpages','basic2col'); ?></h3>
        <ul>
          <?php echo $children; ?>
        </ul>
      <?php } ?>

    </div>

    <footer class="postmeta">
      <p>
      <?php _e('Updated on','basic2col'); ?> <?php the_modified_date(); ?>
      </p>
    </footer>
    
  </article>
  
  <?php comments_template();?>

<?php
  endwhile; else :
  echo basic2col_404_message();
  endif;

  get_footer();
?>
