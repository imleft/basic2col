<?php 
  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
?>

  <div class="post page linkspage" id="post-<?php the_ID(); ?>">
    <h2 id="pagetitle">
      <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>
    <?php edit_post_link(__('Edit','basic2col'),'<p class="editlink">','</p>'); ?>
    <div class="postcontent">
      <?php the_content(); ?>
      <?php wp_list_bookmarks('category_before=&category_after=&title_before=<h3>&title_after=</h3'); ?>
    </div>
  </div>
  
<?php
  endwhile; else : 
  echo basic2col_404_message(); 
  endif; 

  get_footer();
?>
