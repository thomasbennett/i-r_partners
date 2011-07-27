<?php ob_start(); ?>

<div class="banner">
  <h2 class="banner-headline museo border-bottom">"...because lean always starts at the waste."</h2>
  <div class="gauge-flex">Gauge Flex</div>
  <p class="left white font30">A product line of I&amp;R Partners</p>
  <div class="callout">View Our Products</div>
  <div class="featured-product"></div>
</div>

<aside>
  <h3>Media</h3>
  <?php while(have_posts()): the_post(); ?>
    <span class="published"><?php the_date('M j'); ?></span>
    <div class="left offWhite"><?php the_excerpt(); ?></div>
  <?php endwhile; ?>
  <?php rewind_posts(); ?>
</aside>

<h3>About I &amp; R Partners</h3>
<?php query_posts('pagename=home'); ?>
<?php include('loop.php') ?>
<a href="/about" class="red-btn">Learn More</a>

<h3>Featured Products</h3>
<ul class="inline">
  <li>Product 1</li>
  <li>Product 1</li>
  <li>Product 1</li>
</ul>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
