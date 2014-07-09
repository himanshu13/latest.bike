<?php
/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
 

define('THEMELOY', get_template_directory_uri());

add_action('after_setup_theme', 'setup_language');
function setup_language(){
    load_theme_textdomain('tl_back', get_template_directory() . '/languages');
}

if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
    require_once dirname(__FILE__) . '/inc/options-framework.php';
}

add_filter( 'widget_text', 'do_shortcode' );

//load widget
require_once dirname(__FILE__) . '/inc/widget/init.php';

//load widget
require_once dirname(__FILE__) . '/inc/plugins/shortcode/shortcodeinit.php';

//load metabox
require_once dirname(__FILE__) . '/inc/plugins/meta-box/meta-box.php';

//load sidebar generator
require_once dirname(__FILE__) . '/inc/functions/sidebar_generator.php';

//load image resize
require_once dirname(__FILE__) . '/inc/functions/filosofo-custom-image-sizes.php';

//load user rating
require_once dirname(__FILE__) .'/inc/functions/user-rating.php';

//load twitter widget
require_once dirname(__FILE__) .'/inc/plugins/evolution-twitter-timeline/evolution-twitter-timeline.php';

//count review
function themeloy_get_total_review($post_id) {
    $total = 0;
    for ($i = 1; $i < 10; $i++) {
        $text = 'criteria' . $i . 'themeloy_slider';
        $slider_value = get_post_custom_values($text, $post_id);
        $divi = $i;
        if ($slider_value[0] == '' || $slider_value[0] == 0) {
            $i = 10;
        } else {
            $total = $slider_value[0] + $total;
        }
    }
	if($total == 0) 
	{ 
		return 0;
	} else {
		 return $total / ($divi - 1);
	}
   
}

//register menu
function themeloy_register_menu() {
    register_nav_menus(
            array(
                'Main_Menu' => 'Main menu',
                'Top_Menu' => 'Top menu',
                'Footer_Menu' => 'Bottom footer menu'
            )
    );
}

add_action('init', 'themeloy_register_menu');
add_theme_support('post-thumbnails');

// Add support to post and comment RSS feed links to head
add_theme_support( 'automatic-feed-links' );	

//Author contact
function themeloy_new_contactmethods($contactmethods) {
// Add Twitter
    $contactmethods['twitter'] = 'Twitter';
//add Facebook
    $contactmethods['facebook'] = 'Facebook';
//add google plus
    $contactmethods['googleplus'] = 'Googleplus';

    return $contactmethods;
}

// Set the max content width
if ( ! isset( $content_width ) ){ $content_width = 960; }

add_filter('user_contactmethods', 'themeloy_new_contactmethods', 10, 1);



function themeloy_sidebar_register() {

	
    register_sidebar(array(
        'name' => __('Home Sidebar', 'tl_back'),
        'id' => 'home-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Center Sidebar', 'tl_back'),
        'id' => 'center-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Last Sidebar', 'tl_back'),
        'id' => 'last-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Top Ads Banner', 'tl_back'),
        'id' => 'banner-sidebar',
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer1 Sidebar', 'tl_back'),
        'id' => 'footer1-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer2 Sidebar', 'tl_back'),
        'id' => 'footer2-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer3 Sidebar', 'tl_back'),
        'id' => 'footer3-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer4 Sidebar', 'tl_back'),
        'id' => 'footer4-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}

add_action('init', 'themeloy_sidebar_register');

// Get image attachment (sizes: thumbnail, medium, full)
function themeloy_get_thumbnail($postid=0, $size='full') {
	if ($postid<1) 
	$postid = get_the_ID();
	$thumb = '';
	if(version_compare(get_bloginfo('version'), '2.9') >= 0) {
		if(!$thumb && has_post_thumbnail($postid) && function_exists( 'the_post_thumbnail' ) ) {
			$post_thumbnail_id = get_post_thumbnail_id( $postid );
			$image = wp_get_attachment_image_src( $post_thumbnail_id, $size );
			$thumb = $image[0];
		}
	}

	if ($thumb != null or $thumb != '') {
		return $thumb; 
	} elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', ))) {
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
			return $thumbnail[0]; 
		}
	}
	
}



if ( ! function_exists( 'themeloy_comment' ) ) :
function themeloy_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'tl_back'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'tl_back'), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'tl_back') . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'tl_back'), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tl_back'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'tl_back'), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tl_back'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


?>
<?php		

/*==============================================================
 *  
 *                      Pagination
 *  
 ===============================================================*/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="page"';
}
// replace next_posts_link() and previous_posts_link() with custom pagination
function themeloy_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     
      if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
	     previous_posts_link(__('PREV','tl_back')); 
         
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"page currentpage\">".$i."</span>":'<a href="'.get_pagenum_link($i).'" class="page" >'.$i.'</a>';
             }
         }

    
	    next_posts_link(__('NEXT','tl_back'));
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
		{ 
			echo '<a href="' .get_pagenum_link($pages).'" class="page">'.__('LAST', 'tl_back').'</a>'; 
		}
		
		 
         echo "</div>\n";
		
     }
}

	 /* ============================================================
	 *			
	 *						Post Format
	 *					
	 *============================================================== */
	 
add_theme_support( 'post-formats', array('gallery','video','audio' ) );
function themeloy_post_type()
{
    
    if(has_post_format( 'gallery' )){
        $symbol = '<span class="post_type image_post"><span class="icon"></span></span>';
    }elseif(has_post_format('video')){
         $symbol = '<span class="post_type video_post"><span class="icon"></span></span>';
    }elseif(has_post_format('audio')){
         $symbol = '<span class="post_type audio_post"><span class="icon"></span></span>';
    }else{
        $symbol ='';
    } 
    return $symbol;    
}

    /* ==============================================================
     *  
     *                      Short Title
     *  
      =============================================================== */
function themeloy_short_title($limit, $text){
$chars_limit = $limit;
$chars_text = strlen($text);
$text = $text." ";
$text = substr($text,0,$chars_limit);
$text = substr($text,0,strrpos($text,' '));
if ($chars_text > $chars_limit){$text = $text."...";}
return $text;
}
	
	/* =========================================================
	 *							
	 *						Scripts
	 *
	 ===========================================================*/

function themeloy_enqueue_style() {
	wp_enqueue_style( 'base', get_template_directory_uri().'/css/base.css', false, '1.6' ); 
	if (of_get_option('disable_design') == 0){
	wp_enqueue_style( 'grid', get_template_directory_uri().'/css/amazium.css', false, '1.6' ); 
	}else{
	wp_enqueue_style( 'grid', get_template_directory_uri().'/css/no-responsive.css', false, '1.6' ); 
	}
	wp_enqueue_style( 'shortcode', get_template_directory_uri().'/css/shortcode.css', false, '1.6' ); 	
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css', false, '1.6' ); 
	wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', false, '1.6' );  
	if (of_get_option('disable_design') == 0){
	wp_enqueue_style( 'layout', get_template_directory_uri().'/css/layout.css', false, '1.6' );
	}
	wp_enqueue_style( 'awesome-font', get_template_directory_uri().'/css/font-awesome.min.css', false, '1.6' );
	wp_enqueue_style( 'mediaelement-css', get_template_directory_uri().'/css/mediaelementplayer.css', false, '1.6' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri().'/css/custom.php', false, '1.6','all' ); 
}
       


function themeloy_enqueue_script() {
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery-1.8.2.js', false, '1.6', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'simplyscroll', get_template_directory_uri().'/js/jquery.simplyscroll.min.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui-1.8.20.custom.min.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'totop', get_template_directory_uri().'/js/jquery.ui.totop.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'selectnav', get_template_directory_uri().'/js/selectnav.min.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'jcarousel', get_template_directory_uri().'/js/jquery.jcarousel.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri().'/js/jquery.sticky.js', array('jquery'), '1.6', true );
	//wp_enqueue_script( 'p7EH', get_template_directory_uri().'/js/p7EHCscripts.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'mediaelement-player', get_template_directory_uri().'/js/mediaelement-and-player.min.js', array('jquery'), '1.6', true );
	wp_enqueue_script( 'custom', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.6', true );

}
          
add_action( 'wp_enqueue_scripts', 'themeloy_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeloy_enqueue_script' );



	
    ?>
