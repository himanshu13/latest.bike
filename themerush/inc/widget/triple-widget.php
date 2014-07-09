<?php
add_action('widgets_init', 'triple_register_widgets');

function triple_register_widgets() {
    register_widget('Triple_Posts_Widget');
}

class Triple_Posts_Widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'triple_recent_entries widget_tag_cloud clearfix',
            'description' => __('Triple widget: Recently, latest and Tags.', 'tl_back')
        );
        parent::__construct('triple-posts', __('Themeloy: Triple widget', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {

        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))  $number = 5;
        $themeloy_args = array(
            'showposts' => $number,
            'orderby' => 'comment_count'
        );
		$show_comment_tab = isset($instance['show_comment_tab']) ? $instance['show_comment_tab'] : false;
        $themeloy_args1 = array(
            'showposts' => $number,
            'orderby' => 'date',
        );

        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);

        $themeloy_widget1 = null;
        $themeloy_widget1 = new WP_Query($themeloy_args1);

        echo $before_widget;

        if ($title != "") {
            echo $before_title;
            echo $title;
            echo $after_title;
        }
        ?>
        <div class="triple widget">    

            <!--tabs-nav -->
            <ul class="tabs-nav">
                <li class="active"><a class="title" href="#tab1"><?php _e('Popular', 'tl_back'); ?></a></li>
                <li class=""><a class="title" href="#tab2"><?php _e('Latest', 'tl_back'); ?></a></li>
                <li class=""><a class="title" href="#tab3"><?php _e('Tag', 'tl_back'); ?></a></li>
               <?php if ($show_comment_tab == true) { ?> <li class=""><a class="title" href="#tab4"><i class="icon-comments"></i></a></li><?php }?>
            </ul>
            <!-- end tabs-nav -->

            <div class="tabs-container">

                <!--tab1 -->
                <div id="tab1" class="tab-content" style="display: block;">


                    <ul class="ulpost picture">
                        <?php
                        while ($themeloy_widget->have_posts()) {
                            $themeloy_widget->the_post();
                            ?>
                            <li>
                                <?php
                           
								
					 $thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-5.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}
				
                 echo '<a  class="entry-thumb feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '"><img src="' . $url[0] . '" alt="' . get_the_title() . '" />'; ?>
                                  <?php echo themeloy_post_type(); ?>
                                  </a>
                          
                                <div class="ulpost_title">
                                    <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
									<?php echo themeloy_short_title(60, get_the_title('')); ?>
									</a>

                                    <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>

                                        <span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>

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
                                    </p>

                                </div>


                            </li>
                            <?php
                        }
                        wp_reset_query();
                        ?>
                    </ul>

                </div>
                <!-- end tab1 -->

                <!--tab2 -->
                <div id="tab2" class="tab-content">

                    <ul class="ulpost picture">
                        <?php
                        while ($themeloy_widget1->have_posts()) {
                            $themeloy_widget1->the_post();
                            ?>
                            <li>
                                <?php
                               	
				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-5.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}								
								
                                echo '<a  class="entry-thumb feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '"><img src="' . $url[0] . '" alt="' . get_the_title() . '" />'; ?>
                                  <?php echo themeloy_post_type(); ?>
                                  </a>

                                <div class="ulpost_title">
                                    <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                    <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>

                                        <span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>

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
                                    </p>
                                </div>


                            </li>
                            <?php
                        }
                        wp_reset_query();
                        ?>
                    </ul>

                </div>
                <!-- end tab2 -->

  

                <!--tab3 -->
                <div id="tab3" class="tab-content tagcloud">
                    <?php
                    $all_tags = get_tags('hide_empty=0');

                    if (!empty($all_tags)) {
                        foreach ($all_tags as $tag) {
                            ?>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tags"> <?php echo $tag->name; ?></a>
                            <?php
                        }
					}
                    ?>
                </div>
                <!-- end tab3 -->
                
                <?php if ($show_comment_tab == true) { ?>
                 <!--tab4 -->
                <div id="tab4" class="tab-content comment-tab">
                 
                 <ul class="ulpost picture">
            <?php 
                $args = array(
                       'status' => 'approve',
                        'number' => $number
					);	
				
				$postcount=0;
                $comments = get_comments($args);
				
                foreach($comments as $comment) :
						$postcount++;								
                        $commentcontent = strip_tags($comment->comment_content);			
                        if (strlen($commentcontent)> 50) {
                            $commentcontent = mb_substr($commentcontent, 0, 100) . "...";
                        }
                        $commentauthor = $comment->comment_author;
                        if (strlen($commentauthor)> 30) {
                            $commentauthor = mb_substr($commentauthor, 0, 29) . "...";			
                        }
                        $commentid = $comment->comment_ID;
                        $commenturl = get_comment_link($commentid); ?>
                       <li>
							<a  class="entry-thumb feature-link" href="<?php echo $commenturl; ?>"><?php echo get_avatar( $comment, '65' ); ?></a>
                              <div class="ulpost_title">

									 <a class="title" href="<?php echo $commenturl; ?>"><?php echo $commentcontent; ?></a>
									<p class="post-meta">
                                        <span class="meta-date"><i class="icon-time"></i> <?php echo human_time_diff(get_comment_date('U',$comment->comment_ID), current_time('timestamp')), __(' ago', 'tl_back'); ?>
                                        </span>
                                        </p>
                                        </div>
						</li>
            <?php endforeach; ?>
        </ul>
                 
                </div>
                <!-- end tab4 -->
              <?php }?>

            </div>

        </div>
        <!-- end tabs-container -->
        <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
		$instance['show_comment_tab'] = $new_instance['show_comment_tab'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 6;
		
		$defaults = array( 			
			'show_comment_tab' => 'on'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
       
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

 <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_comment_tab'], 'on'); ?> id="<?php echo $this->get_field_id('show_comment_tab'); ?>" name="<?php echo $this->get_field_name('show_comment_tab'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_comment_tab'); ?>"><?php _e( 'Show comment tab', 'tl_back'); ?></label>
		</p>

        <?php
    }

}
?>