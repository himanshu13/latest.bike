<?php
add_action('widgets_init', 'themeloy_bi_register_widgets');

function themeloy_bi_register_widgets() {
    register_widget('themeloy_recent_posts_widget');
}

class themeloy_recent_posts_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'bi_recent_entries clearfix',
            'description' => __('Display two list of recent post entries from one or more categories in a form of 2 columns.', 'tl_back')
        );
        parent::__construct('bi-recent-posts', __('Themeloy: 2 Columns Recently Post', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);
        $title1 = apply_filters('widget_title', empty($instance['title1']) ? 'Recent Posts' : $instance['title1'], $instance, $this->id_base);
        
        if (!$number = absint($instance['number']))
            $number = 5;

        if (!$cats = $instance["cats"])
            $cats = '';
        if (!$cats1 = $instance["cats1"])
            $cats1 = '';

        // array to call recent posts.

        $themeloy_args = array(
            'showposts' => $number,
            'category__in' => $cats,
        );

        $themeloy_args1 = array(
            'showposts' => $number,
            'category__in' => $cats1);

        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);



        echo $before_widget;

        $i = 0;
        while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
            $i++;         


            if ($i == 1) {

         		$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-1.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '415x260');
				}
				
                ?>   

                <div class="main-post-col1">
                    <?php
                    echo $before_title;
                    echo $instance["title"];
                    echo $after_title;
                    ?>
                  <div class="image_review_wrapper">
                     <a href="<?php the_permalink(); ?>"><img class="main" src="<?php echo $url[0]; ?>" alt="<?php the_title(); ?>" />
                     <?php echo themeloy_post_type(); ?>
                     </a>
                    <?php $enable_review = get_post_custom_values('reviewthemeloy_checkbox', get_the_ID()); ?>
	                <?php 
					if (of_get_option('disable_review') == 0){
						if($enable_review[0] == 1){ ?>
                     <span class="review-wrap">
                     <span class="review-star">
                          <span style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%" class="review-star-inline"> </span>
                     </span>
                     </span>
                     <?php }else{?>
					  <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
					 <?php }}else{?>
                      <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
                    	<?php } ?>  
                  
                     </div>
                  
                    <div class="feature-text-col">

                        <div class="post-title"><h3><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php echo themeloy_short_title(75, get_the_title('')); ?>
						</a></h3></div> 
                      <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                        
                                        </p> 
                    <?php echo themeloy_short_title(190, get_the_excerpt()); ?>  
                    </div>
                                       

                   <?php
			}else {

				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-2.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}
                    
                    ?>
                    <div class="small-feature">
                         <a href="<?php the_permalink(); ?>" class="feature-link"><img src="<?php echo $url[0]; ?>" alt="<?php the_title(); ?>" />
                         <?php echo themeloy_post_type(); ?>
                         </a>
                       
                        <div class="feature-text">
                            <div class="post-title"><h4><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php echo themeloy_short_title(50, get_the_title('')); ?>
                            </a></h4></div>
               
                           <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                                     
                                        </p>
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
                

                    </div>


                <?php
			};
            }
            ?>
        </div>

        <?php
        wp_reset_query();

        // column right      

        $themeloy_widget1 = null;
        $themeloy_widget1 = new WP_Query($themeloy_args1);

        $i = 0;
        while ($themeloy_widget1->have_posts()) {
            $themeloy_widget1->the_post();
            $i++;

            $thumb = themeloy_get_thumbnail(get_the_ID());


            if ($i == 1) {
				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-1.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '415x260');
				}
                ?>   

                <div class="main-post-col2">
                    <?php
                    echo $before_title;
                    echo $instance["title1"];
                    echo $after_title;
                    ?>
                    <div class="image_review_wrapper">
                    <a href="<?php the_permalink(); ?>"> <img class="main" src="<?php echo $url[0]; ?>" alt="<?php the_title(); ?>" /></a>
                     <?php echo themeloy_post_type(); ?>
                    <?php $enable_review = get_post_custom_values('reviewthemeloy_checkbox', get_the_ID()); ?>
	                <?php 
					if (of_get_option('disable_review') == 0){
						if($enable_review[0] == 1){ ?>
                     <span class="review-wrap">
                     <span class="review-star">
                          <span style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%" class="review-star-inline"> </span>
                     </span>
                     </span>
                     <?php }else{?>
					  <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
					 <?php }}else{?>
                      <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
                    	<?php } ?> 
                    </div>
	              	
                
                    <div class="feature-text-col">

                        <div class="post-title"><h3><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php echo themeloy_short_title(75, get_the_title('')); ?>
						</a></h3></div> 
                   
                       <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                        </p> 
                   
                   <?php echo themeloy_short_title(190, get_the_excerpt()); ?>  
                    </div>
                    <?php
			}else {

                        		$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-2.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}

                        $date = '<span class="date">' . get_the_date('M d, Y') . '</span>';
                 
                    ?>
                    <div class="small-feature">
                       <a href="<?php the_permalink(); ?>" class="feature-link">  <img src="<?php echo $url[0]; ?>" alt="<?php the_title(); ?>" />
                        <?php echo themeloy_post_type(); ?>
                        </a>
                        <div class="feature-text">
                            <div class="post-title"><h4><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php echo themeloy_short_title(50, get_the_title('')); ?>
							</a></h4></div>
                           <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                 
                                        </p>
                                        
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
             

                    </div>


                <?php
				}
            }
            ?>
        </div>
      
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
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['cats'] = $new_instance['cats'];
        $instance['cats1'] = $new_instance['cats1'];
        $instance['number'] = absint($new_instance['number']);
       
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $title1 = isset($instance['title1']) ? esc_attr($instance['title1']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title for right column:','tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" type="text" value="<?php echo $title1; ?>" /></p>

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

        <p>
            <label for="<?php echo $this->get_field_id('cats1'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back'); ?> 

                <?php
                $categories = get_categories('hide_empty=0');
                echo "<br/>";
                foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats1') . '[]" name="' . $this->get_field_name('cats1') . '[]"';
                    if (isset($instance['cats1'])) {
                        foreach ($instance['cats1'] as $cats) {
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