<?php 
  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
?>

  <div class="post page archivepage" id="post-<?php the_ID(); ?>">
    <h2 id="pagetitle">
      <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>

    <?php edit_post_link(__('Edit','basic2col'),'<p>','</p>'); ?>
	
    <div class="postcontent">
      <?php the_content(); ?>
      <h3><?php _e('Categories','basic2col'); ?></h3>
      <ul id="archivepage">
	<?php wp_list_categories('sort_column=name&show_count=1&title_li='); ?>
      </ul>
      <?php basic2col_archive(); ?>
    </div>
  </div>

<?php
  endwhile; else : 
  echo basic2col_404_message(); 
  endif; 

  get_footer();
?>
