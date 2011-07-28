<?php ob_start(); ?>
<style>
  aside { width: <?php if(is_home()): echo '220px;'; else: echo '200px;'; endif; ?> }
  body { background: url('<?php bloginfo('template_directory') ?>/images/<?php if(is_home()): echo "home-bg.jpg') center 460px no-repeat"; else: echo "inner-bg.jpg') center top repeat-x"; endif; ?>; }
</style>

<div class="banner">
  <div class="banner-content">
    <h2 class="banner-headline museo border-bottom">&ldquo;...because lean always starts at the waste.&rdquo;</h2>
    <div class="gauge-flex">Gauge Flex</div>
    <p class="left white font34">A product line of I&amp;R Partners</p>
    <div class="callout">View Our Products</div>
  </div>
  <div class="featured-product"></div>
</div>

<h3 class="border-right" style="width: 230px;">Media</h3>
<aside class="home-sidebar">
  <?php query_posts('posts_per_page=3'); ?>
  <?php while(have_posts()): the_post(); ?>
    <div class="left offWhite">
      <span class="published">
        <?php the_time('M d'); ?>
      </span>
      <?php the_excerpt(); ?>
    </div>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
</aside>

<!-- one time width specific -->
<div class="w600 left" style="margin-top: -50px;">
  <h3 class="left" style="width: 280px;padding-left: 20px;">About I &amp; R Partners</h3>
  <div class="home-excerpt">
    <?php query_posts('pagename=home'); ?>
    <?php while(have_posts()): 
      the_post();
      the_content();
    endwhile; ?>
    <?php wp_reset_query(); ?>
    <a href="/about" class="right red-btn">Learn More</a>
  </div>
</div>

<!-- one time width specific -->
<div class="left w600">
  <h3 class="left" style="width: 220px;">Featured Products</h3>
  <div class="clearfix"></div>
  <ul id="ft-products" class="inline">
    <li>
      <h4>Product 1</h4>
      <p>Short description of the product.</p>
      <a class="black-underline" href="/"><strong>Learn More.</strong></a>
    </li>
    <li>
      <h4>Product 1</h4>
      <p>Short description of the product.</p>
      <a class="black-underline" href="/"><strong>Learn More.</strong></a>
    </li>
    <li>
      <h4>Product 1</h4>
      <p>Short description of the product.</p>
      <a class="black-underline" href="/"><strong>Learn More.</strong></a>
    </li>
  </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php include('template.php'); ?>
