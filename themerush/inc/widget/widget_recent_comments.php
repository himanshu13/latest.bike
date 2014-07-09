<?php
add_action( 'widgets_init', 'themeloy_recent_comments_widgets' );

function themeloy_recent_comments_widgets() {
	register_widget( 'themeloy_recent_comments_widget' );
}

class themeloy_recent_comments_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_recent_comments_widget() {
		$widget_ops = array( 'classname' => 'widget_comments', 'description' => __('Displays the recent comments with thumbnails.', 'tl_back') );
		$this->WP_Widget( 'themeloy_recent_comments_widget', __('Themeloy: Recent Comments', 'tl_back'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		
		extract( $args );
	    $title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		if ( $title )
		echo $before_title . $title . $after_title;
  
       ?>
       <?php
	   $entries_display = $instance['entries_display']; ?>
	    <ul>
            <?php 
                $args = array(
                       'status' => 'approve',
                        'number' => $entries_display
					);	
				
				$postcount=0;
                $comments = get_comments($args);
				
                foreach($comments as $comment) :
						$postcount++;								
                        $commentcontent = strip_tags($comment->comment_content);			
                        if (strlen($commentcontent)> 50) {
                            $commentcontent = mb_substr($commentcontent, 0, 49) . "...";
                        }
                        $commentauthor = $comment->comment_author;
                        if (strlen($commentauthor)> 30) {
                            $commentauthor = mb_substr($commentauthor, 0, 29) . "...";			
                        }
                        $commentid = $comment->comment_ID;
                        $commenturl = get_comment_link($commentid); ?>
                       <li>
							<?php echo get_avatar( $comment, '65' ); ?>
							<div class="comment">
								<div class="comment-text">
									<a class="title <?php if($postcount==1) { ?> first<?php } ?>" href="<?php echo $commenturl; ?>"><?php echo $commentcontent; ?></a>
								</div>
								<div class="comment-time">
									<i class="icon-time"></i> <?php echo human_time_diff(get_comment_date('U',$comment->comment_ID), current_time('timestamp')), __(' ago', 'tl_back'); ?>
								</div>
							</div>
						</li>
            <?php endforeach; ?>
        </ul>
		
	   <?php
		
		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form( $instance ) {
		$defaults = array('title' => 'Recent Comments', 'entries_display' => 5);
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themeloy'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'entries_display' ); ?>"><?php _e('How many entries to display?', 'themeloy'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('entries_display'); ?>" name="<?php echo $this->get_field_name('entries_display'); ?>" value="<?php echo $instance['entries_display']; ?>" style="width:100%;" /></p>
 		
	<?php
	}
}
?>