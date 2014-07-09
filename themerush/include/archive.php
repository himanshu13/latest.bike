
<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->            
<div class="container <?php if(of_get_option('post_layout') == '2c-r1-fixed') {}else{ echo 'two-columns-sidebar';}?><?php if(of_get_option('sidebar_center_width') == true) {echo " center_350";}?>">
  <div class="sidebar_content">
        <div class="p7ehc-a grid_7">
                			
		<h2 class="archive-month"><?php _e('Archives by Month', 'tl_back'); ?>:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
				<h2 class="archive-year"><?php _e('Archives by Year', 'tl_back'); ?>:</h2>
	
                <ul><?php wp_get_archives('type=yearly'); ?>  </ul>
                  
                  <?php if (have_posts()){ while (have_posts()){ the_post(); ?>
                  
                            <?php
                              $thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-4.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '415x260');
				}
                            ?>
                          
                          
                             <div class="post-news">
                                <div class="image_review_wrapper">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $url[0]; ?>" alt="<?php the_title_attribute(); ?>" class="image_over">
                                <?php echo themeloy_post_type(); ?>
                                </a>
                                
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
                                
                                <div class="post_title">
                               <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  /><?php the_title(); ?></a></h3>
                                 <p class="post-meta">
                                   <span class="date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                   <span class="meta-user"><i class="icon-user"></i> <?php echo the_author_posts_link(); ?></span>
                                   <span class="meta-cat"><i class="icon-book"></i> <?php the_category(', '); ?></span>
                                     <span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                     </p>
                                     
                                <?php echo themeloy_short_title(200, get_the_excerpt('')); ?> 
                                    <div class="more-link"><a href="<?php the_permalink(); ?>" rel="bookmark" class="read-more" title="Permanent link to <?php the_title_attribute(); ?>"><?php _e( 'Read More', 'tl_back' ); ?></a></div>
                                </div>
<div class="clear"></div>
                            </div>

                        <?php }; ?>                         
                                     
                    <?php }; ?> 
                    <?php themeloy_pagination(); ?>  
<div class="brack_space"></div>
        </div>
        </div>
        
  <div class="sidebar_center">
            <div class="p7ehc-a grid_3">   
<?php


				
				$ar_sidebar = of_get_option('ar_sidebar','');	
				$dyn_sidebar ='';
				if(!empty($ar_sidebar)) {	$dyn_sidebar = $ar_sidebar;	};				
				
				foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($dyn_sidebar)) {
					if (is_active_sidebar($dyn_sidebar)) : dynamic_sidebar($dyn_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('center-sidebar')) : dynamic_sidebar('center-sidebar');
		            endif;
				}	
		
									
?>
<div class="brack_space"></div>
            </div>
       </div>
       
   <?php if(of_get_option('post_layout') == '2c-r1-fixed') {  ?>           
         <div class="sidebar_last">
            <div class="p7ehc-a grid_2">
            <div class="sidebar_last_space"></div>
                <?php
                if (is_active_sidebar('last-sidebar')) { dynamic_sidebar('last-sidebar');	}
                ?>
          <div class="brack_space"></div>
            </div>
	    </div>
         <?php } ?>        
    </div>
</div>
 </section>
<!-- end content --> 