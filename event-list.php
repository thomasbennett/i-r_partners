<?php
/*
Template Name: Event List
*/ 
ob_start();
?>
<style> .entry { background: url('<?php bloginfo('template_directory') ?>/images/content-underline.jpg') no-repeat left bottom; padding-bottom: 15px; margin-bottom: 30px; } </style>
<?php query_posts('eventDisplay=upcoming&category_name=campaigns') ?>
<?php foreach(get_events(10) as $post): ?>
  <div class="post">
    <h2>
      <a href="<?php the_permalink() ?>" 
         rel="bookmark" 
         title="Permanent Link to <?php the_title_attribute(); ?>">
         <?php the_title(); ?>
      </a>
    </h2>
    <article class="entry">  
      <ul>
        <li>Date: <?php echo the_event_start_date(); ?> to <?php echo the_event_end_date(); ?></li>
        <li>Venue: <?php echo the_event_venue() ?></li>
        <li>Address: <?php echo the_event_address() ?><br />
          <?php echo the_event_city() ?>, <?php echo the_event_state() ?> <?php echo the_event_zip() ?>
        </li>
        <li>Phone: <?php echo the_event_phone() ?></li>
      </ul>
      <p><a href="<?php the_permalink() ?>">See event</a></p>
    </article>
  </div>
<?php endforeach; ?>
<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>
