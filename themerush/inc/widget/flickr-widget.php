<?php
add_action('widgets_init', 'themeloy_flickr_register_widget');

function themeloy_flickr_register_widget() {
        register_widget('themeloy_flickr_widget');
}

class themeloy_flickr_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
		$widget_ops = array('classname' => 'ht_flickr_widget', 'description' => __( 'Pulls in images from your Flickr account.', 'tl_back') );
		parent::__construct('flickr_widget', __('Themeloy: Flickr', 'tl_back'), $widget_ops);
	
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
	  	$number = (int) strip_tags($instance['number']);
	  	$id = strip_tags($instance['id']);
		
		echo $before_widget;
             if ( $title )
                 echo $before_title . $title . $after_title; ?>		
				<ul class="image-flickr-widget">
					<li class="clearfix">
					<script type="text/javascript" src="
http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;flickr_display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
					</li>          
				</ul>
			<?php
		echo $after_widget;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) strip_tags($new_instance['number']);
		$instance['id'] = strip_tags($new_instance['id']);

		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	
	function form( $instance ) {
	$instance = wp_parse_args( (array) $instance, array( 'title' => 'Flickr Feed', 'id' => '52617155@N08', 'number'=> 8 ) );
	$id = strip_tags($instance['id']);
	$number = strip_tags($instance['number']);
	$title = strip_tags($instance['title']);
	
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title:', 'tl_back'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
		esc_attr($title); ?>" /></p>
	
	<p><label for="<?php echo $this->get_field_id('id'); ?>">
	<?php _e('Flickr ID', 'tl_back'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo
		esc_attr($id); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('number'); ?>">
	<?php _e('Number:', 'tl_back'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo
		esc_attr($number); ?>" /></p>

	<?php
	}
}
?>