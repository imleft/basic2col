<?php basic2col_textdomain(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="Content-Type"
        content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title>
    <?php wp_title(' | ',true,'right'); ?> <?php bloginfo('name'); ?>
    <?php if (is_home() || is_front_page()) { ?> : <?php bloginfo('description'); ?><?php } ?>
  </title>

  <!--
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,700,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
  -->
  <?php basic2col_css() ?>

  <link rel="alternate"
        type="application/rss+xml"
        title="RSS 2.0"
        href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate"
        type="application/atom+xml"
        title="Atom 1.0"
        href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php /* wp_get_archives('type=monthly&format=link'); */ ?>
  <?php /* if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); */ ?>
  <?php wp_head(); ?>
</head>

<body id="top" class="<?php do_action('basic2col_bodyclass'); ?>">

  <div id="wrap">
    <div id="accessnav">
      [ <a href="#content"><?php _e('Content','basic2col'); ?></a> | <a href="#sidebar"><?php _e('Sidebar','basic2col'); ?></a> ]
    </div>

    <div id="header">
      <h1>
        <a accesskey="h" href="<?php bloginfo('url'); ?>/">
          <span title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></span>
        </a>
      </h1>

      <p><?php bloginfo('description'); ?></p>
    </div>

    <?php basic2col_navbar(); /*loading navbar.php if it exists*/ ?>
    <div id="content">

<!-- end header -->
