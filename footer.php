<!-- begin footer -->

<?php if(!(is_page() || is_single()) ){ ?>
  <div id="pagenav">
    <?php posts_nav_link('<span class="sep none"> - </span>', '<span class="right nextposts">'.__('Next &raquo;','basic2col').'</span>', '<span class="left preciousposts">'.__('&laquo; Previous','basic2col').'</span>'); ?>
  </div>
<?php } ?>

</div>

<?php basic2col_sidebar() ?>
<div id="footer">
  <ul>
    <li>
      <?php _e('Content','basic2col'); ?>
      &copy;
      <a accesskey="1" href="<?php bloginfo('url'); ?>/">
	<?php bloginfo('name'); ?>
      </a>
      2008-2018
    </li>
    <li>
      <a href="http://validator.w3.org/check?uri=referer"
         title="<?php _e('Valid HTML5','basic2col'); ?>">
	html5
      </a>
    </li>
    <li>
      <a href="http://jigsaw.w3.org/css-validator/check/referer"
         title="<?php _e('Valid CSS 3','basic2col'); ?>">
	css3
      </a>
    </li>
    <li>
      <a href="#top" accesskey="t"><?php _e('Top','basic2col'); ?></a>
    </li>
  </ul>
</div>

</div>

<?php wp_footer(); ?>

</body>
</html>
