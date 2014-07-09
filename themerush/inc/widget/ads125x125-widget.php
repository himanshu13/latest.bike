<?php
add_action('widgets_init','themeloy_adswidgets');

function themeloy_adswidgets(){
		register_widget("themeloy_ads125x125_widget");
}

class themeloy_ads125x125_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_ads125x125_widget() {
		$widget_ops = array( 'classname' => 'themeloy_ads125x125_widget', 'description' => __( '4 Ads 125x125 for sidebar widget', 'tl_back') );
		$control_ops = array( 'id_base' => 'themeloy_ads125x125_widget' );
		$this->WP_Widget( 'themeloy_ads125x125_widget', __( 'Themeloy: 4 Ads 125x125', 'tl_back') , $widget_ops, $control_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance) {
		extract($args);
		
		$title = $instance['title'];
		
		$link1 = $instance['link1'];	
		$image1 = $instance['image1'];
		
		$link2 = $instance['link2'];		
		$image2 = $instance['image2'];
		
		$link3 = $instance['link3'];		
		$image3 = $instance['image3'];
		
		$link4 = $instance['link4'];
		$image4 = $instance['image4'];
		
		?>
		<div class="widget ads125">
		<?php
		if($title) {
			echo $before_title.$title.$after_title;
		}
			?>				

				<ul class="four-ads-blocks">
                
                  <li class="ads1"><a href="<?php if($link1 != ''){echo $link1;}else{echo "#";} ?>"><img src="<?php if($image1 != ''){echo $image1;}else{echo get_template_directory_uri()."/img/ads/125x125.png";} ?>" alt="" /></a></li>
                    <li class="ads2"><a href="<?php if($link2 != ''){echo $link2;}else{echo "#";} ?>"><img src="<?php if($image2 != ''){echo $image2;}else{echo get_template_directory_uri()."/img/ads/125x125.png";} ?>" alt="" /></a></li>
                      <li class="ads3"><a href="<?php if($link3 != ''){echo $link3;}else{echo "#";} ?>"><img src="<?php if($image3 != ''){echo $image3;}else{echo get_template_directory_uri()."/img/ads/125x125.png";} ?>" alt="" /></a></li>
                        <li class="ads4"><a href="<?php if($link4 != ''){echo $link4;}else{echo "#";} ?>"><img src="<?php if($image4 != ''){echo $image4;}else{echo get_template_directory_uri()."/img/ads/125x125.png";} ?>" alt="" /></a></li>
             	</ul>
				<div class="clear"></div>
		</div>
		<?php

	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];		
		$instance['link1'] = $new_instance['link1'];
		$instance['image1'] = $new_instance['image1'];

		$instance['link2'] = $new_instance['link2'];
		$instance['image2'] = $new_instance['image2'];
		
		$instance['link3'] = $new_instance['link3'];
		$instance['image3'] = $new_instance['image3'];
		
		$instance['link4'] = $new_instance['link4'];
		$instance['image4'] = $new_instance['image4'];
		
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance){
		?>
		<?php
			$defaults = array( 'title' => __( 'ADS125x125', 'tl_back'), 'link1' => '' , 'image1' => '', 'link2' => '' , 'image2' => '', 'link3' => '' , 'image3' => '', 'link4' => '' , 'image4' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'tl_back'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e( 'Link Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" value="<?php echo $instance['link1']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image1'); ?>"><?php _e( 'Image Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" value="<?php echo $instance['image1']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e( 'Link2 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image2'); ?>"><?php _e( 'Image2 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" value="<?php echo $instance['image2']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e( 'Link3 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" value="<?php echo $instance['link3']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image3'); ?>"><?php _e( 'Image3 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" value="<?php echo $instance['image3']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e( 'Link4 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" value="<?php echo $instance['link4']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image4'); ?>"><?php _e( 'Image4 Url:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" value="<?php echo $instance['image4']; ?>" />
		</p>

		<?php

	}
}
?>