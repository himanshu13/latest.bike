<?php
add_action( 'widgets_init', 'themeloy_hr_register_widgets' );

function themeloy_hr_register_widgets() {
	register_widget( 'themeloy_hr_widget' );
}

class themeloy_hr_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'hr widget', 
			'description' => __('Add Line separate in content or sidebar: dotted, dashed, line, double, multidotted, none', 'tl_back')
		);
    	parent::__construct('hr-widget', __('Themeloy: Line Break', 'tl_back'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget($args, $instance) {
           
			extract( $args );
		
			$class = apply_filters( 'widget_title', empty($instance['class']) ? 'none' : $instance['class'], $instance, $this->id_base);				
			
		echo "<hr class=\"$class\" />";     

	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['class'] = strip_tags($new_instance['class']);
                
                return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	
	function form( $instance ) {
		$class = isset($instance['class']) ? esc_attr($instance['class']) : 'none';
		
?>
        <p><label for="<?php echo $this->get_field_id('class'); ?>"><?php _e('Div Class: dashed, none, line, dotted, double, multidotted', 'tl_back'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo $class; ?>" /></p>
                        
     
        
<?php
	}
}
?>
