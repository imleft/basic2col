<?php
  get_header();

  if (have_posts()) {
    while (have_posts()) {
      the_post();
?>

  <article class="post home" id="post-<?php the_ID(); ?>">
    <header class="posttitle">
      <h2>
        <a href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?>
        </a>
      </h2>
    </header>

    <p class="date">
      <?php the_time(__('F jS, Y','basic2col')); ?>
    </p>

    <div class="postcontent">
      <?php the_content(''. the_title('', '', false) .' '.__('continued &raquo;','basic2col').'' ); ?>
    </div>

    <footer class="postmeta">
      <p>
        <?php _e('Filed in','basic2col'); ?> <?php the_category(',') ?>

        <?php basic2col_tags_front(); ?>

        <?php if(comments_open() || pings_open()) : ?>
          - <a href="<?php comments_link(); ?>"
               title="<?php _e('Comments to','basic2col'); ?> <?php the_title(); ?>">
          <?php comments_number('0','1','%'); ?> <?php _e('Comments','basic2col'); ?></a>
        <?php else : ?>
          - <?php _e('Comments closed','basic2col'); ?>
        <?php endif; ?>

        <?php edit_post_link(__('Edit','basic2col'),' - ',''); ?>
      </p>
    </footer>
  </article>

<?php
    }
  }
  else {
    echo basic2col_404_message();
  }

  get_footer();
?>
