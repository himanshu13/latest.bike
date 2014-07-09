<?php
add_action('widgets_init','themeloy_ads160x600_load_widgets');


function themeloy_ads160x600_load_widgets(){
		register_widget("themeloy_ads160x600_widget");
}

class themeloy_ads160x600_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_ads160x600_widget(){
		$widget_ops = array( 'classname' => 'themeloy_ads160x600_widget', 'description' => __( 'Ads 160x600 for sidebar widget' , 'tl_back') );
		$control_ops = array( 'id_base' => 'themeloy_ads160x600_widget' );
		$this->WP_Widget( 'themeloy_ads160x600_widget', __( 'Themeloy: Ads 160x600' , 'tl_back') ,  $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
		extract($args);		

		$link = $instance['link'];
		$image = $instance['image'];
		?>

		<div class="widget">


		
			<div class="ads160x600-thumb">
				<a href="<?php if($link != ""){echo $link;}else{echo "#";} ?>">
					<img src="<?php if($image != ""){echo $image;}else{echo get_template_directory_uri()."/img/ads/160x600.png";} ?>" alt="" />
				</a>
			</div>
		</div>
		<?php
	
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance){
		?>
		<?php
			$defaults = array( 'title' => __( 'ADS 160' , 'tl_back'), 'link' => '' , 'image' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link Url:' , 'themeloy' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance['link']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e( 'Image Url:' , 'themeloy' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $instance['image']; ?>" />
		</p>
		<?php

	}
}
?>