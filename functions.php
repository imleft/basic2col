<?php
  /*basic2col_navbar - either create a function and hook into 'basic2col' navbar or create a file called navbar.php*/
  function basic2col_navbar() {
    do_action('basic2col_navbar');

    if (TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/navbar.php')) {
      load_template(STYLESHEETPATH . '/navbar.php');
    }
    elseif (file_exists(TEMPLATEPATH . '/navbar.php')) {
      load_template(TEMPLATEPATH . '/navbar.php');
    }
  }

  function basic2col_sidebar() {
    do_action('basic2col_sidebar');

    if (TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/sidebar.php')) {
      load_template(STYLESHEETPATH . '/sidebar.php');
    }
    else {
      load_template(TEMPLATEPATH . '/sidebar.php');
    }
  }

  function basic2col_lang_init() {
    load_theme_textdomain('basic2col', get_template_directory() . '/lang');
  }

  add_action('after_setup_theme', 'basic2col_lang_init');

  /*basic2col css files support*/
  function basic2col_css() {
?>
  <link type="text/css"
        href="<?php bloginfo('stylesheet_url'); ?>"
        media="screen"
        rel="stylesheet" />
<?php
  }

  /*filters */

  /*This filter allows you to remove the tag list from the frontpage or set it up differently*/
  function basic2col_tags_front() {
    $tags = ' ' . the_tags(__('- Tags:  ','basic2col'), ', ', '') . ' ';

    echo apply_filters('basic2col_tags_front', $tags);
  }

  /*This filter let you change the 404 message*/
  function basic2col_404_message() {
    $message = '<h2 id="pagetitle">'.__('404 Not Found','basic2col') .'</h2>
	<p>'. __('Whatever you were looking for can not be found','basic2col') .'</p>';

    return apply_filters('basic2col_404_message', $message);
  }

  /*This filter let you change the welcome message if you use a page on front*/
  function basic2col_welcome_message() {
    $message = ''.__('Welcome to ','basic2col') . get_bloginfo('name') .'';

    return apply_filters('basic2col_welcome_message', $message);
  }

  /*This filter let you change the awaiting moderation message*/
  function basic2col_moderation_message() {
    $message = ''.__('Your comment is awaiting moderation','basic2col').'';

    return apply_filters('basic2col_moderation_message', $message);
  }

  /*register sidebars*/
  if (function_exists('register_sidebars'))
    register_sidebars(2, array(
      'before_title' => '<h2>',
      'after_title' => '</h2>',
    ));

  /*basic2col widgets*/
  function widget_basic2col_search() {
?>
  <li id="search">
    <form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
      <h2><label for="s"><?php _e('Search','basic2col'); ?></label></h2>
      <div>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" class="submit" accesskey="s"
               value="<?php _e('Search','basic2col'); ?>" />
      </div>
    </form>
  </li>
<?php
  }

  if (function_exists('wp_register_sidebar_widget'))
    wp_register_sidebar_widget('basic2col-search',
			       __('Search','basic2col'),
			       'widget_basic2col_search');

  function basic2col_remove_rel($html, $id) {
    return preg_replace('/\s+rel="attachment wp-att-[0-9]+"/i', '', $html);
  }

  function basic2col_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <?php
      if (function_exists('get_avatar')) {
	echo get_avatar( get_comment_author_email(), 40 );
      }
    ?>

    <span class="comment_author">
      <?php comment_type(__('Comment by ','basic2col'),
                         __('Trackback from','basic2col'),
                         __('Pingback from','basic2col')); ?>
      <cite><?php comment_author_link() ?></cite>
    </span>

    <div class="comment_text">
      <?php comment_text() ?>
    </div>

    <!--
    <div>
      <?php comment_reply_link(
        array_merge( $args, array('depth' => $depth,
                                  'max_depth' => $args['max_depth']))) ?>
    </div>
    -->

    <?php if ($comment->comment_approved == '0') : ?>
      <p class="approve"><?php echo basic2col_moderation_message(); ?></p>
    <?php endif; ?>

    <p class="comment_time">
      <?php comment_date() ?> @
      <a href="#comment-<?php comment_ID() ?>"
	 title="Permalink to comment-<?php comment_ID() ?>">
	<?php comment_time() ?></a>
      <?php edit_comment_link(__('Edit','basic2col'),' - ',''); ?>
    </p>
<?php
   }

  add_filter('image_send_to_editor', 'basic2col_remove_rel', 10, 2);

  /* WordPress does this itself now
  function basic2col_lazy_images($content) {
    if (!in_the_loop() || !is_main_query()) {
      return $content;
    }

    if (!preg_match_all('/<img [^>]+>/', $content, $matches)) {
      return $content;
    }

    foreach ( $matches[0] as $image ) {
      if (strpos($image, 'wp-image-')) {
        $new = '<img loading="lazy" ' . substr($image, 5);
        $content = str_replace($image, $new, $content);
      }
    }

    return $content;
  }
  add_filter('the_content', 'basic2col_lazy_images');
  */

  add_action( 'do_faviconico', function() {
    //Check for icon with no default value
    if ( $icon = get_site_icon_url( 32 ) ) {
      //Show the icon
      wp_redirect( $icon );
    } else {
      //Show nothing
      header( 'Content-Type: image/vnd.microsoft.icon' );
    }
    exit;
  } );

  // Remove Gutenberg editor bloat
  add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
  }, 100 );

  // Remove emoji script
  add_action( 'init', function () {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    add_filter( 'emoji_svg_url', function ($url) { return ''; } );

    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', function ($filter) {
      if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
      } else {
	return array();
      }
    });
  });
?>
