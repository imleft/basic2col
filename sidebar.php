<!-- begin sidebar -->
<div id="sidebar">
  <ul id="sb1">
    <?php if(!is_front_page() && !is_home()) { ?>
      <li id="homelink">
        <a href="<?php bloginfo('url'); ?>/">
          <?php _e('Home','basic2col'); ?>
        </a>
      </li>
    <?php } ?>

    <li id="search">
      <form id="searchform" method="get" action="<?php bloginfo('url') ?>">
        <h2><label for="s"><?php _e('Search','basic2col'); ?></label></h2>
        <div>
          <input type="text" value="" name="s" id="s" />
          <input type="submit" class="submit" accesskey="s"
                 value="<?php _e('Search','basic2col'); ?>" />
        </div>
      </form>
    </li>

    <?php
      wp_list_pages( array(
        'title_li'    => '<h2>' . __('Pages','basic2col') . '</h2>',
        'sort_column' => 'menu_order',
        'depth'       => 1
      ) );
    ?>

    <!-- Dynamic sidebar inserted here -->

    <?php if (dynamic_sidebar('Sidebar 1')) : else : ?>
      <!-- Things /not/ included if dynamic sidebar activated -->
    <?php endif; ?>

    <?php
      wp_list_categories( array(
        'title_li'    => '<h2>' . __('Categories','basic2col') . '</h2>',
        'sort_column' => 'name',
        'show_count'  => 1
      ) );
    ?>
  </ul>

  <ul>
    <li id="randomlinks">
      <h2><?php _e('Random links','basic2col'); ?></h2>
      <ul>
        <?php
          wp_list_bookmarks( array(
            'orderby'    => 'rand',
            'categorize' => 0,
            'limit'      => 5,
            'title_li'   => ''
          ) );
        ?>
      </ul>
    </li>
  </ul>

  <ul>
    <li id="randomposts">
      <h2>Random Posts</h2>
      <ul>
        <?php
          $posts = get_posts(array('orderby'=>'rand', 'numberposts'=>5));
          foreach ($posts as $post) {
        ?>
          <li>
            <a href="<?php the_permalink(); ?>"
               title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
            (<?php the_time('Y'); ?>)
          </li>
        <?php } ?>
      </ul>
    </li>
  </ul>

  <ul id="sb2">
    <?php if (dynamic_sidebar('Sidebar 2')) : else : ?>
      <!-- Things /not/ included if dynamic sidebar 2 is activated -->
    <?php endif; ?>
  </ul>

  <!-- Meta section -->
  <ul>
    <li>
      <h2><?php _e('Meta','basic2col'); ?></h2>
      <ul>
        <li>
          <a href="<?php bloginfo('rss2_url'); ?>">
            <img src="<?php bloginfo('template_url')?>/gfx/rss.png"
                 alt="RSS" class="rssimg" />
            <?php _e('Posts','basic2col'); ?>
          </a>
        </li>
        <li>
          <a href="<?php bloginfo('comments_rss2_url'); ?>">
            <img src="<?php bloginfo('template_url')?>/gfx/rss.png"
                 alt="RSS" class="rssimg" />
            <?php _e('Comments','basic2col'); ?>
          </a>
        </li>

        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
      </ul>
    </li>
  </ul>
</div>
<!-- end sidebar -->
