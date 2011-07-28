<?php ob_start(); ?>

<?php // wrap in if statement is_page('PAGE_ID') ?>
<p class="museo quote font24">The GaugFlex brand is a suite of hardware and software products designed for simple, flexible and cost-effective data collections solutions.</p>

<?php while(have_posts()): the_post(); ?>
  <h2><?php the_title(); ?></h2>
<?php endwhile; ?>

<aside>
  <?php get_sidebar(); ?>
</aside>

<?php include('loop.php') ?>
 
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
