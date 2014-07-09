<?php 
add_action('widgets_init','themeloy_newsletter_register');

function themeloy_newsletter_register() { 
				register_widget('themeloy_newsletter'); 
}


class themeloy_newsletter extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_newsletter() {
		$widget_ops = array('classname' => 'themeloy_newsletter','description' => __('Widget display the Subscribe box', 'tl_back'));
			parent::__construct('themeloy_newsletter', __('Themeloy: Newsletter', 'tl_back'), $widget_ops);
		}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
		
	function widget( $args, $instance ) {
		extract( $args );
		$feed_url = $instance['feed_url'];
		$show_social_network = isset($instance['show_social_network']) ? $instance['show_social_network'] : false;
		$show_subscribe = isset($instance['show_subscribe']) ? $instance['show_subscribe'] : false;

?>

		<div class="newsletter widget">
        <?php if ($show_subscribe == true) { ?>
		             <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed_url; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		     <input type="text" class="text" name="email" value="<?php _e('Your Email', 'tl_back'); ?>" onfocus="if(this.value=='<?php _e('Your Email', 'tl_back'); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Your Email', 'tl_back'); ?>';"/>
		     <input type="hidden" name="loc" value="en_US"/>
			<input type="hidden" value="<?php echo $feed_url; ?>" name="uri"/>
		     <input type="submit"  class="buttons" value="<?php _e('Subscribe', 'tl_back');?>" />
                     </form>
         	<?php }?>
             <?php if ($show_social_network == true) { ?>	
              <ul class="icon-wrapper">
              <?php
			  
              		$behance_url = of_get_option('behance_url');
              		$dribbble_url = of_get_option('dribbble_url');
					$facebook_url = of_get_option('facebook_url');
					$twitter_url = of_get_option('twitter_url');
					$gplus_url = of_get_option('gplus_url');
					$rss_url = of_get_option('rss_url');
					$pin_url = of_get_option('pin_url');
					$evernote_url = of_get_option('evernote_url');
					$instagram_url = of_get_option('instagram_url');
					$grooveshark_url = of_get_option('grooveshark_url');
					$vimeo_url = of_get_option('vimeo_url');
					$instagram_url = of_get_option('instagram_url');
					$youtube_url = of_get_option('youtube_url');
					$google_url = of_get_option('google_url');
					$wordpress_url = of_get_option('wordpress_url');
					
              ?>
              

               <?php if($facebook_url) { ?>
              <li class="icon-lists"><a href="<?php echo $facebook_url; ?>"><span class="icons-facebook"></span></a> </li>
               <?php } ?>

              <?php if($twitter_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $twitter_url; ?>"><span class="icons-twitter"></span></a></li>
              <?php } ?>

              <?php if($vimeo_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $vimeo_url; ?>"><span class="icons-vimeo"></span></a></li>
              <?php } ?>

                  <?php if($rss_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $rss_url; ?>"><span class="icons-rss-feed"></span></a></li>
              <?php } ?>

                 <?php if($instagram_url) { ?> 
              <li class="icon-lists"><a href="<?php echo $instagram_url; ?>"><span class="icons-instagram"></span></a></li>
              <?php } ?>

              <?php if($dribbble_url) { ?>
               <li class="icon-lists"><a href="<?php echo $dribbble_url; ?>"><span class="icons-dribbble"></span></a></li>
              <?php } ?>
              
              <?php if($evernote_url) { ?>
              <li class="icon-lists"><a href="<?php echo $evernote_url; ?>"><span class="icons-evernote"></span></a></li>
               <?php } ?>

               <?php if($youtube_url ) { ?>  
              <li class="icon-lists"><a href="<?php echo $youtube_url; ?>"><span class="icons-youtube"></span></a></li>
               <?php } ?>

              <?php if($behance_url) { ?>
              <li class="icon-lists"><a href="<?php echo $behance_url; ?>"><span class="icons-behance"></span></a></li> <?php } ?>              
                               
              <?php if($google_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $google_url; ?>"><span class="icons-google"></span></a></li>
               <?php } ?>

                 <?php if($pin_url) { ?> 
              <li class="icon-lists"><a href="<?php echo $pin_url; ?>"><span class="icons-pinterest"></span></a></li>
                <?php } ?>
               
              <?php if($gplus_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $gplus_url; ?>"><span class="icons-googleplus"></span></a></li>
               <?php } ?>
               
                <?php if($grooveshark_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $grooveshark_url; ?>"><span class="icons-grooveshark"></span></a></li>
                <?php } ?>
                                                                                        
               <?php if($wordpress_url) { ?>  
              <li class="icon-lists"><a href="<?php echo $wordpress_url; ?>"><span class="icons-wordpress"></span></a></li>
              <?php } ?>
              
              </ul>
              <?php } ?>
              
              </div>
              
              
<?php 
}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['feed_url'] = $new_instance['feed_url'];
		$instance['show_social_network'] = $new_instance['show_social_network'];
		$instance['show_subscribe'] = $new_instance['show_subscribe'];
		
		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form( $instance ) {

		$defaults = array( 			
			'feed_url' => '1stepwebdesign',
			'show_social_network' => 'on',
			'show_subscribe' => 'on'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
		<label for="<?php echo $this->get_field_id( 'feed_url' ); ?>"><?php _e('feedburner name: (your name without http://feeds.feedburner.com/)', 'tl_back'); ?></label>
		<input id="<?php echo $this->get_field_id( 'feed_url' ); ?>" name="<?php echo $this->get_field_name( 'feed_url' ); ?>" value="<?php echo $instance['feed_url']; ?>" class="widefat" />
		</p>
     <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_subscribe'], 'on'); ?> id="<?php echo $this->get_field_id('show_subscribe'); ?>" name="<?php echo $this->get_field_name('show_subscribe'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_subscribe'); ?>"><?php _e( 'Show Subscribe', 'tl_back'); ?></label>
		</p>
        
     <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_social_network'], 'on'); ?> id="<?php echo $this->get_field_id('show_social_network'); ?>" name="<?php echo $this->get_field_name('show_social_network'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_social_network'); ?>"><?php _e( 'Show Social network', 'tl_back'); ?></label>
		</p>


   <?php 
}
}
?>