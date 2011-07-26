<?php
/* Single */
ob_start();

include('loop.php');

if(!is_page()):
  comments_template();
endif;

$content = ob_get_clean();
require('template.php');
?>
