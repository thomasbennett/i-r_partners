<?php
/**
 * @package WordPress
 * @subpackage TGB_Development_Theme
**/

// Add featured image to posts
add_theme_support('post-thumbnails');

// Defines the Excerpt
function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Gives the excerpt a Read More link
function new_excerpt_more($more) {
    global $post;
	return '... <a class="read-more" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//  Adds Custom menu ability
add_action('init', 'register_custom_menu');

// Allow users to add their own Menu
function register_custom_menu() {
    register_nav_menu('custom_menu', __('Custom Menu'));
}

// Dynamic Widgetized Sidebars
if (function_exists('register_sidebar')) {
   widgets_array(); 
}

function widgets_array()
{
	$widgetized_areas = array(
		'Sidebar' => array(
      'admin_menu_order'  => 100,
			'args' => array (
				'name'          => 'Sidebar',
				'id'            => 'sidebar-widget',
        'description'   => 'What ya put here will show up in your sidebar.',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
				'before_widget' => '',
				'after_widget'  => '',
      ),
    ),
    'Custom' => array(
      'admin_menu_order'  => 200,
      'args' => array(
        'name'          => 'Custom',
        'id'            => 'custom-sidebar',
        'description'   => 'Sidebar for a custom page.',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
        'before_widget' => '',
        'after_widget'  => '',
      )
    )
  );

	return apply_filters('widgetized_areas', $widgetized_areas);
}

$widgetized_areas = widgets_array();

if ( !function_exists('register_sidebars') )
    return;

foreach ($widgetized_areas as $key => $value) {
    register_sidebar($widgetized_areas[$key]['args']);
}

// Default comments template (use DISQUS)
if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
    function twentyten_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
        case '' :
            ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 40 ); ?>
                <?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
                <br />
                <?php endif; ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                /* translators: 1: date, 2: time */
                printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
            ?>
                </div><!-- .comment-meta .commentmetadata -->

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
                </div><!-- #comment-##  -->

                <?php
                break;
        case 'pingback'  :
        case 'trackback' :
            ?>
                <li class="post pingback">
                <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
                <?php
                break;
            endswitch;
    }
endif;

function clear() {
    $clear = "<div class='clear'></div>";
    echo $clear;
}

/* clean up wp-head */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

remove_filter('the_content', 'wptexturize');
remove_filter('comment_text', 'wptexturize');

// add tags to meta keywords 
function tags_to_keywords(){
    global $post;
    if(is_single() || is_page()){ 
        $tags = wp_get_post_tags($post->ID); 
        foreach($tags as $tag){ 
            $tag_array[] = $tag->name; 
        }
        $tag_string = implode(', ',$tag_array); 
        if($tag_string !== ''){
            echo "<meta name='keywords' content='".$tag_string."' />\r\n";
        }
    }
}

// Add tags_to_keywords to wp_head function
add_action('wp_head','tags_to_keywords'); 

// add except as description
function excerpt_to_description(){
    global $post;
    if(is_single() || is_page()){ 
        $all_post_content = wp_get_single_post($post->ID); 
        $excerpt = substr($all_post_content->post_content, 0, 100).' [...]'; 
        echo "<meta name='description' content='".$excerpt."' />\r\n"; 
    }
    else{ 
        echo "<meta name='description' content='".get_bloginfo('description')."' />\r\n"; 
    }
}
add_action('wp_head','excerpt_to_description');

// show admin bar only for admins
if (!current_user_can('manage_options')) {
  add_filter('show_admin_bar', '__return_false');
}

// 
$new_meta_boxes =
array(
  "family" => array(
    "name" => "family_volunteer",
    "title" => "Family Volunteer",
    "type" => "textarea",
    "std" => ""
  ),
  "pro" => array(
    "name" => "young_professional",
    "title" => "Young Professional",
    "std" => ""
  ),
  "Partner Agency" => array(
    "name" => "partner_agency",
    "title" => "Partner Agency",
    "std" => ""
  ),
  "Community Service" => array(
    "name" => "community_service",
    "title" => "Community Service",
    "std" => ""
  ),
  "Group Volunteer" => array(
    "name=" => "group_volunteer",
    "title" => "Group Volunteer",
    "std" => ""
  )
);

function new_meta_boxes() {
  global $post, $new_meta_boxes;
   
  foreach($new_meta_boxes as $meta_box) {
  $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
   
  if($meta_box_value == "")
  $meta_box_value = $meta_box['std'];
   
  echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
  
  echo'<table><tr>';
  echo'<td style="width:140px"><label>'.$meta_box['title'].'</label></td>';
  echo'<td><input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /></td>';
  echo'</tr></table>'; 
  echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
  }
}

function create_meta_box() {
  global $tgb_development_theme;
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  if ( function_exists('add_meta_box') ) {
    if($template_file == 'act.php'){
      add_meta_box( 'new-meta-boxes', 'Volunteer Opportunities', 'new_meta_boxes', 'page', 'normal', 'low' );
    }
  }
}

function save_postdata( $post_id ) {
  global $post, $new_meta_boxes;
   
  foreach($new_meta_boxes as $meta_box) {
  // Verify
  if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
  return $post_id;
  }
   
  if ( 'page' == $_POST['post_type'] ) {
  if ( !current_user_can( 'edit_page', $post_id ))
  return $post_id;
  } else {
  if ( !current_user_can( 'edit_post', $post_id ))
  return $post_id;
  }
   
  $data = $_POST[$meta_box['name'].'_value'];
   
  if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
  add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
  elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
  update_post_meta($post_id, $meta_box['name'].'_value', $data);
  elseif($data == "")
  delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
  }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
