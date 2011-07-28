<?php ob_start(); ?>

<?php if(function_exists('yoast_breadcrumb')):
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
endif; ?>

<?php include('loop.php') ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
