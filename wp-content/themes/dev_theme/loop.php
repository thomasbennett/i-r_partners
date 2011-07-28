<?php while(have_posts()) : the_post(); ?>
  <div class="post">
    <h2>
      <a href="<?php the_permalink() ?>" 
         rel="bookmark" 
         title="Permanent Link to <?php the_title_attribute(); ?>">
         <?php the_title(); ?>
      </a>
    </h2>
    <article class="entry">  
      <?php the_excerpt(); ?>
    </article>
  </div>
<?php endwhile; ?>     
