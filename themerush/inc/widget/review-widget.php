<?php
add_action('widgets_init', 'themeloy_review_register_widgets');

function themeloy_review_register_widgets() {
    register_widget('themeloy_review_widget');
}

class themeloy_review_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'review_widget',
            'description' => __('Add Recently review', 'tl_back')
        );
        parent::__construct('review_widget', __('Themeloy: Recently review', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number'])) $number = 6;
        
        // array to call recent posts.

        $post_cat_args = array(
            'showposts' => $number,
            'meta_query' => array(
                array(
                    'key' => 'reviewthemeloy_checkbox',
                    'value' => 1                   
                )
            )
        );

        $post_cat_widget = null;
        $post_cat_widget = new WP_Query($post_cat_args);

        echo $before_widget;

        // Widget title
		if( $title ) {
			
		echo $before_title;
        echo $instance["title"];
        echo $after_title;			
		}

        // Post list in widget

        echo '<ul  class="review-post picture">';

        while ($post_cat_widget->have_posts()) {
            $post_cat_widget->the_post();
            ?>
            <li>
               <div class="image_review_wrapper">
                <?php
            				
				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-5.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '300x240');
				}
				
                echo '<div class="image_wrapper"><a class="entry-thumb" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '"><img src="' . $url[0] . '" alt="' . get_the_title() . '" />';   ?>
                
                  <?php echo themeloy_post_type(); ?>
                  </a></div>
                  
                  <?php $enable_review = get_post_custom_values('reviewthemeloy_checkbox', get_the_ID()); ?>
             <?php if (of_get_option('disable_review') == 0){
						if($enable_review[0] == 1){?>
                     <span class="review-star">
                          <span style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%" class="review-star-inline"></span>
                     </span>
                    <?php }else{?>
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
						<?php }}else{?>
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                    	<?php } ?>
            </div>
            
                <div class="ulpost_title">
                    <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php echo themeloy_short_title(60, get_the_title('')); ?>
					</a>
                </div>
                                <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>

                                        <span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                    </p>
              
<?php echo themeloy_short_title(80, get_the_excerpt('')); ?>

            </li>
            <?php
        }

        wp_reset_query();

        echo "</ul>\n";
        echo $after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
		
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Review';
        $number = isset($instance['number']) ? absint($instance['number']) : 8;
     
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
      <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>


        <?php
    }

}

?>
