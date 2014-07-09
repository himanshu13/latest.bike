<?php
add_action('widgets_init', 'themeloy_post_slider_register_widgets');

function themeloy_post_slider_register_widgets() {
            register_widget('themeloy_slider_posts_widget');
}

class themeloy_slider_posts_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'slider_widget',
            'description' => __('Display slider image from recent post entries from one or more categories.', 'tl_back')
        );
        parent::__construct('widget-slider', __('Themeloy: Image Slider Widget', 'tl_back'), $widget_ops);
    }


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? ' ' : $instance['title'], $instance, $this->id_base);


        if (!$number = absint($instance['number']))
            $number = 5;

        if (!$cats = $instance["cats"])
            $cats = '';
		
	
		 

        // array to call recent posts.

        $themeloyw_args = array(
            'showposts' => $number,
            'category__in' => $cats
			
        );
		
       $themeloy_widget = null;
		
        $themeloy_widget = new WP_Query($themeloyw_args);
        // Post list in widget
        echo $before_widget;

        // Widget title
        if (!empty($instance['title'])) {
            echo $before_title;
            echo $instance["title"];
            echo $after_title;
        }

        echo '<section class="slider">';
        echo '<div class="flexslider">';
		 echo ' <ul class="slides">';
        while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
            ?>
  			   <li>
  	    	    <?php
                $thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/slider-image.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '626x380');
				}
               
			
                ?>
                <a  href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php echo '<img src="' . $url[0] . '" alt="' . get_the_title() . '" />'; ?></a>
                <div class="caption">
								<?php if(themeloy_post_type()){?><div class="slider_post_type"><?php echo themeloy_post_type(); ?></div><?php }?>
                                <h4><a  href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								<span class="date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span> 
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
                
                </li>

           
            <?php   }  ?>
      
      
      
       </ul>
        </div>      
      </section>   
 
         <?php
        wp_reset_query();
        echo $after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number'] = absint($new_instance['number']);
		
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
		
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>


        <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back'); ?> 

        <?php
        $categories = get_categories('hide_empty=0');
        echo "<br/>";
        foreach ($categories as $cat) {
            $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
            if (isset($instance['cats'])) {
                foreach ($instance['cats'] as $cats) {
                    if ($cats == $cat->term_id) {
                        $option = $option . ' checked="checked"';
                    }
                }
            }
            $option .= ' value="' . $cat->term_id . '" />';
            $option .= '&nbsp;';
            $option .= $cat->cat_name;
            $option .= '<br />';
            echo $option;
        }
        ?>
            </label>
        </p>

                <?php
            }

        }

?>
