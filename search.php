<?php
/**
 * Search Results
 */

ob_start();
?>

<?php if (function_exists('relevanssi_didyoumean')): 
  relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "?</p>", 5); 
endif; ?>
<?php if (have_posts()): ?>
  <div style="background: #eee; padding: 10px; margin-bottom: 20px">
    <h2 class="left"><?php printf( __( 'Search Results for: %s', 'dev_theme' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    <p class="right"><?php echo $wp_query->found_posts . ' <small>hits were found.</small>'; ?><p>
  </div>

  <section class="main">
    <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
      <?php the_excerpt(); ?>
    <?php endwhile; ?>
  </section>
<?php else : ?>
  <section class="main">
    <div class="post no-results not-found">
      <h2 class="entry-title"><?php _e( 'Nothing Found', 'dev_theme' ); ?></h2>
      <div class="entry-content">
        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'dev_theme' ); ?></p>
        <?php get_search_form(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php')?>
