<?php
   /*language stuff*/
   if(function_exists('load_betterlang_textdomain')) { load_betterlang_textdomain('basic2col'); }
   else { basic2col_textdomain(); }
   /*doctype*/
   echo basic2col_doctype();
   ?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type"
        content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title>
    <?php wp_title(' | ',true,'right'); ?> <?php bloginfo('name'); ?>
    <?php if (is_home() || is_front_page()) { ?> : <?php bloginfo('description'); ?><?php } ?>
  </title>

  <?php basic2col_css() ?>

  <link rel="alternate"
        type="application/rss+xml"
        title="RSS 2.0"
        href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate"
        type="text/xml"
        title="RSS .92"
        href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate"
        type="application/atom+xml"
        title="Atom 0.3"
        href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php wp_head(); ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-8194326-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>

<body id="top" class="<?php do_action('basic2col_bodyclass'); ?>">

  <?php basic2col_contentheader(); /*loading contentheader.php*/ ?>

<!-- end header -->
