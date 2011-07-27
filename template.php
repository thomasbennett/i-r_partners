<?php include_once('wp-config.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8">
  <title>I&R Partners<?php wp_title(); ?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="author" content="Thomas Bennett for iostudio" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css" />
  <style>aside { width: <?php if(is_home()): echo '300px;'; else: echo '200px;'; endif; ?> }</style>
  <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/ie7.css" />
  <![endif]-->

  <?php // instaniante the comment reply and other scripts where appropriate ?>
  <?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
  <?php wp_enqueue_script('jquery'); ?>

  <?php get_header() ?>
  <?php // make ie like html5 and put the rest of the js at the bottom ?>
  <script src="<?php bloginfo('template_directory') ?>/js/libs/modernizr-1.7.min.js"></script>
</head>

<body>
  <div class="top-bar"></div>
  <div id="container">
    <header>
      <a href="/"><h1 id="logo"><?php bloginfo('name'); ?></h1></a>
      <div class="right">
        <span class="font20">Call now for more info</span><br />
        <span class="red font26">615-420-6342</span>
      </div>
      <nav>
        <ul class="inline">
          <li class="main-link"><a href="/">Home</a></li>
          <li class="main-link"><a href="/products">Products</a></li>
          <li class="main-link"><a href="/distributors">Distributors</a></li>
          <li class="main-link"><a href="/news">News</a></li>
          <li class="secondary-link"><a href="/testimonials">Testimonials</a></li>
          <li class="secondary-link"><a href="/faq">FAQs</a></li>
          <li class="secondary-link"><a href="/contact">Contact</a></li>
          <?php get_search_form() ?>
        </ul>
      </nav>
    </header>

    <aside>
      <?php get_sidebar(); ?>
    </aside>
 
    <div id="content">
      <?php echo $content ?>
    </div>

    <div class="clearfix"></div>
  </div>
  <footer>
    <div class="center">
      <?php get_footer() ?>
    </div>
  </footer>

  <script src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_directory') ?>/js/script.js"></script>

  <!--[if lt IE 7 ]>
    <script src="<?php bloginfo('template_directory') ?>/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->
</body>
</html>
