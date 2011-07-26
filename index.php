<?php ob_start(); ?>

<ul id="donate-links" class="inline">
  <li class="food"><a href="/give/donate-food"><h3>Donate Food</h3><span>Host a food drive</span></a></li>
  <li class="time"><a href="/give/donate-time"><h3>Donate Time</h3><span>Volunteer to fight hunger</span></a></li>
  <li class="money"><a href="/give/donate-money"><h3>Donate Money</h3><span>Make a difference right now</span></a></li>
</ul>

<div class="home-right lacuna">
  <form id="email-list" name="" action="">
    <label class="left">Join Our Email List:</label>
    <input type="text" alt="Email Address" class="email-input" />
    <button class="email-send" type="submit">Send</button>
  </form>

  <div class="latest-news">
    <h3>Latest News</h3>
    <ul>
    <?php 
    $homeNews = new WP_Query('posts_per_page=3');
    if($homeNews->have_posts()):
      while($homeNews->have_posts()):
        $homeNews->the_post(); ?>
        <li>
          <h4 class="border-bottom lacunaItalic <?php if($homeNews->current_post == ($homeNews->post_count -1)){ ?>last_post <?php } ?>">
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
        </li>
      <?php endwhile; ?>
    <?php endif; ?> 
      <li style="margin-top:-20px;" class="right"><a class="h4 lacunaItalic" href="/blog">View All News</a></li>
    </ul>
  </div>

  <ul id="members" class="inline">
    <li class="last"><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/feeding-america-logo.jpg" alt="Feeding America" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/united-way-logo.jpg" alt="United Way" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/giving-matters-logo.jpg" alt="Giving Matters" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/hands-on-logo.jpg" alt="Hands On" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/bbb-logo.jpg" alt="BBB - Acredited Business" /></a></li>
  </ul>
</div>

<div class="video-promo">
  <span class="promo-text lacuna"><span class="h3">Our Mission:</span> To feed hungry people and work to solve hunger issues in our community. <a class="lacunaItalic" href="#">Learn More.</a></span>
  <iframe style="margin-top: 15px;border: 1px solid #aaa;" width="440" height="300" src="http://www.youtube.com/embed/rGCBfoaDDD0" frameborder="0" allowfullscreen></iframe>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
