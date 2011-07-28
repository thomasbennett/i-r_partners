<?php
/*
Template Name: Blog
*/
ob_start();

$page_meta = "blog"; ?>

<style> .entry { background: url('<?php bloginfo('template_directory') ?>/images/content-underline.jpg') no-repeat left bottom; padding-bottom: 15px; margin-bottom: 30px; } </style>

<aside>
  <?php get_sidebar(); ?>  
</aside>

<div class="main">
<?php
query_posts(array(
  'orderby' => 'date',
  'order'   => 'ASC'
  )
);

include('loop.php');
echo "</div>";

$content = ob_get_clean();
require('template.php');
?>
