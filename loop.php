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
      <?php if(!is_page()): ?>
        <span class="published">Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
      <?php endif; ?>
      <?php if($page_meta == "blog"): ?>
        <?php the_excerpt(); ?>
      <?php else: ?>
        <?php the_content('Read More &raquo;'); ?>
      <?php endif; ?>
    </article>
  </div>
<?php endwhile; ?>     
