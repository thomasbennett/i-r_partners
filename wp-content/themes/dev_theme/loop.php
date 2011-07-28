<?php while(have_posts()) : the_post(); ?>
  <div class="post">
    <article class="entry">  
      <?php the_content(); ?>
    </article>
  </div>
<?php endwhile; ?>     
