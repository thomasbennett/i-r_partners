<?php // widgetize the sidebar, just in case
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :
  // wigets will show up here, else this will show up
endif;
?>

<ul>
  <?php $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
  if($children):
    echo $children;
  else:
    // place some static callout if no children or maybe just products?
  endif;
  ?>
</ul>
