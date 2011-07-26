<?php // widgetize the sidebar, just in case
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :
endif;

echo "<ul class=\"sidebar\">";
  // detect the homepage and main blog page by ID
  if(!is_page() || $post->ID==126):
    // if its the blog page they want to add the categories
    $catArgs = array(
      'title_li' => __('<li class="page_item"><a href="#">Categories</a></li>')
    );
    wp_list_categories($catArgs);
    // related posts
    the_related();
  else:
    // if not the homepage detect if there is a grndparent page
    $parent = $post->post_parent;
    $get_grandparent = get_post($parent);
    $grandparent = $get_grandparent->post_parent;
    
    $topdog = array(
      'depth' => 0,
      'child_of' => $grandparent,
      'title_li' => ''
    );
    if($grandparent !== 0):
      // overwrites style for primary pages
      echo "<style>.current_page_ancestor { display: block !important; }</style>";
      wp_list_pages($topdog);
    else:
      // list adults and siblings but never 3 deep unless on grandkids page
      if($post->post_parent):
        wp_list_pages('title_li=&include='.$post->post_parent);
        wp_list_pages('title_li=&child_of='.$post->post_parent);
      else:
        wp_list_pages('title_li=&include='.$post->ID);
        wp_list_pages('title_li=&child_of='.$post->ID);
      endif;  
    endif;

    // they want categories on the act page as well
    if($post->ID==25):
      wp_list_categories('title_li=');
    endif;
  endif;
echo "</ul>";
?>

<ul id="sidebar-donate-links">
  <li class="food-small"><a href="/give/donate-food"><h3 class="h4">Donate Food</h3><span>Host a food drive</span></a></li>
  <li class="time-small"><a href="/give/donate-time"><h3 class="h4">Donate Time</h3><span>Volunteer to fight hunger</span></a></li>
  <li class="money-small"><a href="/give/donate-money"><h3 class="h4">Donate Money</h3><span>Make a difference right now</span></a></li>
</ul>
