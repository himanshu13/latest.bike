    <?php
                    if (is_search()) {
                        echo '<h3 class="categories-title title">';
                        _e('Result for: ', 'tl_back');
                        the_search_query();
                        echo '</h3>';
                    }else if(is_category() ) {
							echo '<h3 class="categories-title title">';
							_e('Category Archive: ', 'tl_back');
							 the_category(', ');
							echo '</h3>';
					} else if(is_author() ) {
							echo '<h3 class="categories-title title">';
							_e('Author Archive: ', 'tl_back');
							 the_author();
							echo '</h3>';
					}else if(is_tag() ) {
							echo '<h3 class="categories-title title">';							
							_e('Tag Archive: ', 'tl_back');
							 the_tags('');
							echo '</h3>';
					}
                    ?>
                    <?php echo category_description(); ?>
                    <?php if (have_posts()){ while (have_posts()){ the_post(); 
                        
							
				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-8.jpg';
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
                               <h3><a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  /><?php the_title(); ?></a></h3>
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

                        <?php } ?>
                    <?php }else{ ?>       
                        <?php
                        if (is_search()) {
                            _e('No result found', 'tl_back');
                        }
                        ?>                   
                    <?php } ?>

                   <?php themeloy_pagination(); ?>  