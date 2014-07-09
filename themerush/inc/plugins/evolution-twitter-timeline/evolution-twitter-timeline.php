<?php

/*
Plugin Name: Evolution Twitter Timeline
Plugin URI: http://hechtmediaarts.com/evolution-twitter-timeline/
Description: Creates a new and simple to use widget that outputs the awesome Twitter Embedded Timeline.
Version: 1.0.2
Author: Hecht MediaArts
Author URI: http://hechtmediaarts.com
License: http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
*/

/**
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */


class themeloy_twitter_timeline_widget extends WP_Widget {


/**
 * Register widget with WordPress.
 */
    public function __construct() {
		parent::__construct(
	 		'themeloy_twitter_timeline', // Base ID
			'Themeloy Twitter Timeline', // Name
			array( 'description' => __( 'Create the cool Embedded Timeline with this widget.', 'tl_back' ), ) // Args
		);

		// Registers Script with WordPress ( to wp_footer(); )
		wp_register_script( 'widgets', 'http://platform.twitter.com/widgets.js','','', true );

		// Adding the javascript only if widget in use
			if ( is_active_widget( false, false, $this->id_base, true ) ) {

			wp_enqueue_script('widgets');

			}
	}	

    /**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
    public function widget($args, $instance) {  	
    	
    	//global $app_id;
        extract( $args );
        
		$title 						=	apply_filters('widget_title', $instance['title']);
		$width					=	$instance['width'];
		$height					=	$instance['height'];
		$twitter_name	=	$instance['twitter_name'];
		$widget_id			=	$instance['widget_id'];
		$link_color			=	$instance['link_color'];
		$theme_color	= $instance['theme_color'];
		$bordercolor = $instance['border_color'];
		$nofooter		= $instance['nofooter'];
		$noheader		= $instance['noheader'];
		$noborders		= $instance['noborders'];
		$noscrollbar	= $instance['noscrollbar'];
		$transparent	= $instance['transparent'];
		
		echo $before_widget;
        if ( $title )
       echo $before_title . $title . $after_title;

 		echo '<a class="twitter-timeline" data-widget-id="'.$widget_id.'" href="https://twitter.com/" '.$twitter_name.' data-border-color="'.$bordercolor.'"  data-chrome="'.$nofooter.' ' .$noheader.' '.$noborders.' '. $noscrollbar.' '.$transparent.' "  width="'.$width.'" height="'.$height.'" data-theme="'.$theme_color.'" data-link-color="'.$link_color.'" >Tweets von @"'.$twitter_name.'"</a>' ;
      
 		echo $after_widget;

} 


    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
    public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] 							= strip_tags( $new_instance['title'] );
		$instance['width'] 						= strip_tags( $new_instance['width'] );
		$instance['height'] 						=   strip_tags($new_instance['height'] );
		$instance['twitter_name']		= strip_tags($new_instance['twitter_name'] );
		$instance['widget_id']				= strip_tags($new_instance['widget_id'] );
		$instance['link_color']				= strip_tags($new_instance['link_color'] );
		$instance['theme_color']			= strip_tags($new_instance['theme_color'] );
		$instance['border_color']			= strip_tags($new_instance['border_color'] );
		
		$instance['nofooter']		= strip_tags($new_instance['nofooter']);
		$instance['noheader']		= strip_tags($new_instance['noheader']);
		$instance['noborders']		= strip_tags($new_instance['noborders']);
		$instance['noscrollbar']	= strip_tags($new_instance['noscrollbar']);
		$instance['transparent']	= strip_tags($new_instance['transparent']);

		return $instance;

	}


    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
    public function form($instance) {

    	/**
    	 * Set Default Value for widget form
    	 */   	
    	$default_value	=	array("title"=> "Follow me on Twitter", "width" => "340", "height" => "400", "twitter_name" => "Themeforest", "widget_id" => "364951857468149760", "link_color" => "#f96e5b", "border_color" => "#e8e8e8", "theme_color" => "light" , "nofooter" => "nofooter", "noheader" => "noheader", "noborders" => "noborders", "noscrollbar" => "noscrollbar", "transparent" => "transparent");
		
    	$instance		=	wp_parse_args((array)$instance,$default_value);
        
    		$title						=	esc_attr($instance['title']);
        	$width					=	esc_attr($instance['width']);
        	$height					=	esc_attr($instance['height']);
        	$twitter_name	=	esc_attr($instance['twitter_name']);
        	$widget_id			=	esc_attr($instance['widget_id']);
        	$link_color			=	esc_attr($instance['link_color']);
        	$theme_color	=	esc_attr($instance['theme_color']);
        	$border_color	=	esc_attr($instance['border_color']);
			
			$nofooter		= esc_attr($instance['nofooter']);
			$noheader		= esc_attr($instance['noheader']);
			$noborders		= esc_attr($instance['noborders']);
			$noscrollbar	= esc_attr($instance['noscrollbar']);
			$transparent	= esc_attr($instance['transparent']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titel:', 'tl_back'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		
        <p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Choose the width of the timeline:', 'tl_back' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
		</p>
		
		 <p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Choose the height of the timeline:', 'tl_back' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id('twitter_name'); ?>"><?php _e('Your Twitter name:', 'tl_back'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_name'); ?>" name="<?php echo $this->get_field_name('twitter_name'); ?>" type="text" value="<?php echo $twitter_name; ?>" />
        </p>
        
        <p>
			<label for="<?php echo $this->get_field_id('widget_id'); ?>"><?php _e('Your Twitter Widget ID:', 'tl_back'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('widget_id'); ?>" name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" value="<?php echo $widget_id; ?>" />
        </p>
        
        <p>
			<label for="<?php echo $this->get_field_id('link_color'); ?>"><?php _e('Link-color:', 'tl_back'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link_color'); ?>" name="<?php echo $this->get_field_name('link_color'); ?>" type="text" value="<?php echo $link_color; ?>" />
        </p> 

        <p>
			<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e('Border-color:', 'tl_back'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" type="text" value="<?php echo $border_color; ?>" />
        </p>
        
   
   <p>
   <label for="<?php echo $this->get_field_id('nofooter'); ?>">
   <input type="checkbox" value="nofooter" name="<?php echo $this->get_field_name('nofooter'); ?>" 
id="<?php echo $this->get_field_id('nofooter'); ?>"  <?php checked( $nofooter, 'nofooter' ); ?>> <?php _e('nofooter', 'tl_back') ?>
	</label>
   </p>
   
  <p>
   <label for="<?php echo $this->get_field_id('noborders'); ?>">
   <input type="checkbox" value="noborders" name="<?php echo $this->get_field_name('noborders'); ?>" 
id="<?php echo $this->get_field_id('noborders'); ?>" <?php checked( $noborders, 'noborders' ); ?>> <?php _e('noborders', 'tl_back') ?>
	</label>
   </p>
   
   <p>
   <label for="<?php echo $this->get_field_id('noheader'); ?>">
   <input type="checkbox" value="noheader" name="<?php echo $this->get_field_name('noheader'); ?>" 
id="<?php echo $this->get_field_id('noheader'); ?>" <?php checked( $noheader, 'noheader' ); ?>> <?php _e('noheader', 'tl_back') ?>
	</label>
   </p>
   
   <p>
   <label for="<?php echo $this->get_field_id('noscrollbar'); ?>">
   <input type="checkbox" value="noscrollbar" name="<?php echo $this->get_field_name('noscrollbar'); ?>" 
id="<?php echo $this->get_field_id('noscrollbar'); ?>" <?php checked( $noscrollbar, 'noscrollbar' ); ?>> <?php _e('noscrollbar', 'tl_back') ?>
	</label>

   </p>
   
   <p>
    <label for="<?php echo $this->get_field_id('transparent'); ?>">
   <input type="checkbox" value="transparent" name="<?php echo $this->get_field_name('transparent'); ?>" 
id="<?php echo $this->get_field_id('transparent'); ?>" <?php checked( $transparent, 'transparent' ); ?>> <?php _e('transparent', 'tl_back') ?>
</label>
   </p>
   
        
        
        <p>
			<label for="<?php echo $this->get_field_id('theme_color'); ?>"><?php _e('Choose a theme color (light or dark):', 'tl_back'); ?></label>
			<select name="<?php echo $this->get_field_name('theme_color'); ?>" id="<?php echo $this->get_field_id('theme_color'); ?>" class="widefat">
				<option value="light"<?php selected( $instance['theme_color'], 'light' ); ?>><?php _e('Light', 'tl_back'); ?></option>
				<option value="dark"<?php selected( $instance['theme_color'], 'dark' ); ?>><?php _e('Dark', 'tl_back'); ?></option>
			</select>
        </p> 
        
        
		
       <?php
    }

}
function themeloy_twitter_timeline_init() {

	register_widget('themeloy_twitter_timeline_widget');	

}

add_action('widgets_init', 'themeloy_twitter_timeline_init');
