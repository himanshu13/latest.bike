<?php
add_action('widgets_init', 'themeloy_ads_register_widgets');

function themeloy_ads_register_widgets() {
    register_widget('themeloy_ads_widget');
}

class themeloy_ads_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'ads',
            'description' => __('For embed Ads: Google ads, Yahoo ads..', 'tl_back')
        );
        parent::__construct('adds-widget', __('Themeloy: Embed Ads', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $content = empty($instance['content']) ? '' : $instance['content'];
        echo $before_widget;
        if($title !=''){ 
		echo $before_title;
        echo $title;		
        echo $after_title;
		}
      
        echo wpautop($content, false);
        echo $after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        if (current_user_can('unfiltered_html'))
            $instance['content'] = $new_instance['content'];
        else
        $instance['content'] = stripslashes(wp_filter_post_kses(addslashes($new_instance['content']))); // wp_filter_post_kses() expects slashed
      


        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $content = isset($instance['content']) ? esc_textarea($instance['content']) : '';
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Text: ', 'tl_back'); ?></p>
        <textarea  class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" rows="20" cols="16"><?php echo $content; ?></textarea>

        <?php
    }

}
?>
