<?php

/* Category */
ob_start(); 
?>

<style> .entry { background: url('<?php bloginfo('template_directory') ?>/images/content-underline.jpg') no-repeat left bottom; padding-bottom: 15px; margin-bottom: 30px; } </style>

<?php 
$page_meta = "blog";

include('loop.php');

$content = ob_get_clean();
require('template.php');

?>
