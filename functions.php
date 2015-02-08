<?php

/*some template functions to make child theme customization a bit more flexible*/

/*basic2col_navbar - either create a function and hook into 'basic2col' navbar or create a file called navbar.php*/
function basic2col_navbar() {
  do_action('basic2col_navbar');

  if(function_exists('precious_get_file')) { precious_get_file('navbar'); } else {

    if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/navbar.php')) {
      load_template(STYLESHEETPATH . '/navbar.php');
    } elseif (file_exists(TEMPLATEPATH . '/navbar.php')) {
      load_template(TEMPLATEPATH . '/navbar.php');
    }
  }

}

function basic2col_contentheader() {

  do_action('basic2col_contentheader');

  if(function_exists('precious_get_file')) { precious_get_file('contentheader'); } else {

    if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/contentheader.php')) {
      load_template(STYLESHEETPATH . '/contentheader.php');
    } else {
      load_template(TEMPLATEPATH . '/contentheader.php');
    }
  }

}


function basic2col_contentfooter() {
  do_action('basic2col_contentfooter');

  if(function_exists('precious_get_file')) { precious_get_file('contentfooter'); } else {

    if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/contentfooter.php')) {
      load_template(STYLESHEETPATH . '/contentfooter.php');
    } else {
      load_template(TEMPLATEPATH . '/contentfooter.php');
    }
  }

}


function basic2col_sidebar() {
  do_action('basic2col_sidebar');

  if(function_exists('precious_get_file')) { precious_get_file('sidebar'); } else {

    if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(STYLESHEETPATH . '/sidebar.php')) {
      load_template(STYLESHEETPATH . '/sidebar.php');
    } else {
      load_template(TEMPLATEPATH . '/sidebar.php');
    }
  }

}




/*language support - .mo files need to have names like basic2col-LANG_code.mo and should be added to the /lang directory*/
function basic2col_textdomain($domain = 'basic2col') {
  global $l10n;

  $locale = get_locale();
  if ( empty($locale) )
    $locale = 'en_US';

  $mofile = TEMPLATEPATH . "/lang/basic2col-$locale.mo";
  load_textdomain('basic2col', $mofile);
}


function basic2col_lang_init() {
  basic2col_textdomain($domain);
}
add_action('init', 'basic2col_lang_init' );

/*support for wpmu*/
function is_basic2col_wpmu() {
  return function_exists('is_site_admin');
}

/*basic2col css files support*/
function basic2col_css() { ?>

  <link type="text/css" href="<?php bloginfo('template_url'); ?>/css/classes.css" media="all" rel="stylesheet" />
    <link type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" rel="stylesheet" />
    <!--[if lte IE 7]>
    <link type="text/css" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/style-ie.css" media="screen" rel="stylesheet" />
    <![endif]-->
    <link type="text/css" href="<?php bloginfo('template_url'); ?>/css/print.css" media="print" rel="stylesheet" />

    <?php do_action('basic2col_css'); ?>

    <?php }


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
if ( function_exists('register_sidebars') )
  register_sidebars(2, array(
                             'before_title' => '<h2>',
                             'after_title' => '</h2>',
                             ));


/*basic2col widgets*/
function widget_basic2col_search() { ?>

  <li id="search">
    <form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
    <h2><label for="s"><?php _e('Search','basic2col'); ?></label></h2>
                                                             <div>
                                                             <input type="text" value="" name="s" id="s" />
                                                             <input type="submit" class="submit" accesskey="s" value="<?php _e('Search','basic2col'); ?>" />
                                                             </div>
                                                             </form>
                                                             </li>
                                                             <?php }
if ( function_exists('register_sidebar_widget') )
  register_sidebar_widget(__('Search','basic2col'), 'widget_basic2col_search');



/*Add your own functions - need to be added to parent theme as a child theme can use have it's own functions.php file */
if(file_exists(TEMPLATEPATH . '/my-functions.php')) {
  require_once('my-functions.php');
}

?>
