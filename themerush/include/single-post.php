                    <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                    
                        <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
                                <?php
                                $categories = get_the_category();
                                $tags = get_the_tags();
                                $post_id = get_the_ID();
                                ?>

                                   <h2 class="post-title"><?php the_title(); ?></h2>
                                <p class="post-meta">
                                   <span class="date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                   <span class="meta-user"><i class="icon-user"></i> <?php echo the_author_posts_link(); ?></span>
                                   <span class="meta-cat"><i class="icon-book"></i> <?php the_category(', '); ?></span>
                                     <span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                     </p>
                               <hr class="none" />
                               
                              <?php if(of_get_option('blog_post_feautre') == 1) { ?>
                              <?php $image_feature = wp_get_attachment_url( get_post_thumbnail_id($post_id, 'full') ); ?> 
                              <?php if(!empty($image_feature)) { ?>
                              <img src="<?php echo $image_feature; ?>" alt="<?php the_title(); ?>" />
                              
                              <?php
							 	 		}
							   		} 
								?>
                               
                                <?php the_content(); ?> 
                                                               
							<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tl_back' ) . '</span>', 'after' => '</div>' ) ); ?>
                            
                            <?php 
							$GLOBALS['sbg_sidebar'] = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);  
							
							?>
                          
                              <?php	$enable_review = get_post_custom_values('reviewthemeloy_checkbox');
							  		$total_review = absint(themeloy_get_total_review($post_id));
							  	?>
                                           
                                <?php if (of_get_option('disable_review') == 0){
									if($enable_review[0] == 1 && $total_review > 0) { ?> 
                                 <!-- review box -->   
                                <div class="reviewbox">
                                <div class="review_header"><h3> <?php echo of_get_option('term_review'); ?> </h3></div>
                                  <ul class="progress-bar">
                              <?php 
										for($i=0; $i<10; $i++) 
										{
											$rate_value = 'criteria'.$i.'themeloy_slider';
											$text_value = 'criteria'.$i.'themeloy_text';
											
											$rate = get_post_custom_values($rate_value);
											$rating_text = get_post_custom_values($text_value);
											
											if(!empty($rate[0]) && !empty($rating_text[0]) && $rate[0] >0)
											{
											?>
                                <li class="meter">
                                  <div class="meter-content" style="width:<?php echo $rate[0]; ?>%"></div>
                                  <span class="meter-title"><?php echo $rating_text[0]; ?> - <?php echo $rate[0]; ?>%</span>
                                  </li>
                           
                           <?php 
						   		}
						  	 }
						   ?>
                              
                              <li class="meter">
                                  <div class="meter-content" style="width:<?php echo themeloy_get_total_review($post_id); ?>%"></div>
                                  <span class="meter-title"><?php _e('Total Score', 'tl_back'); ?> <?php echo $total_review; ?>%</span>
                                  </li>
                              
                                </ul>
                                
                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                  <meta itemprop="worstRating" content = "1">
                  <meta itemprop="ratingValue" content = "<?php echo $total_review / 20;?>">
                  <meta itemprop="bestRating" content = "5">
                </div>
								
                                
                                
                                   <?php if($review_summer = get_post_custom_values('review_themeloy_wysiwyg')){?>
                                <div class="review-summery">
                                  <h4><?php $review_title = get_post_custom_values('reviewtitlethemeloy_text'); echo $review_title[0]; ?></h4>
                                  <?php echo $review_summer[0]; ?>
                                  </div>
                                  <?php }?>                                 
                                <?php $userreview = get_post_custom_values('userreviewthemeloy_checkbox'); ?>      
                                
                                <?php if( of_get_option('user_disable_review') == 0) { ?>
                                
                                <?php if($userreview[0] == 1) { ?>
                              
                                <div class="clearfix"></div>
                                 
                                 
                            
                                <div class="votebox">
                                	 <div id="votecount"><img src="<?php echo get_template_directory_uri(); ?>/img/ajax-loading.gif"  /> <span class="user-rate-summery"> <?php _e('User rating: ', 'tl_back'); ?> </span> <span class="vote-per"><?php echo themeloy_get_user_review($post_id); ?></span>% ( <span class="vote-count"><?php echo $user_vote = absint(get_post_meta($post_id,'votes_count', true ));  ?></span> </div> 
                                     <span class="vote-label"><?php _e(' votes )', 'tl_back'); ?></span>
                                     
                                     <div id="star" data-readonly="<?php echo themeloy_vote_response($post_id); ?>" data-score="<?php echo (themeloy_get_user_review($post_id) / 20); ?>" data-postid="<?php the_ID(); ?>" data-path="<?php echo get_template_directory_uri(); ?>/img">
                                </div> 
                                </div>
                                 <?php } } ?> 
                                  
                                 </div>
                                 <!-- close review box --> 
                                    <?php }} ?>
                                
                                
                                <hr class="none" />
                                <ul class="tag-cat">                                                               
                                    <?php if (!empty($tags)){ ?><li> <i class="icon-tags"></i>  <?php the_tags('', ', '); ?></li> <?php } ?>                                                          
                                </ul>
                                <?php  $facebook = of_get_option('share_facebook'); $twitter = of_get_option('share_twitter'); $googleplus = of_get_option('share_googleplus');
								$pinterest = of_get_option('share_pin','1'); 
								$linkedin = of_get_option('share_linkedin','1');
								?>
                                <?php if( !empty($facebook) || !empty($twitter) || !empty($googleplus) ) { ?>
                                  <div class="clearfix"></div> 
                                
                                <div class="share-post">
                                 <ul>
                                 <?php if( $facebook == 1 ) {  ?>
                                                   
<li>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
</li>

  <?php } ?>
                                    <?php if( $twitter == 1 ) { ?>
                                    
<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li> 
 
                                    <?php } ?>
                                 
                                    <?php if( $googleplus == 1 ) { ?>
                                    
<li>
<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
			<script type='text/javascript'>
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
</li>
  <?php if( $linkedin == 1 ) {  ?>
                                   <?php } ?>
                              <li><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php echo get_permalink(); ?>" data-counter="right"></script></li>     
                              
                 <?php } ?>             
                 <?php if( $pinterest == 1 ) {  ?>
                              <li style="width:80px;"><script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&amp;media=<?php $thumb = get_post_thumbnail_id(get_the_ID()); if($thumb){echo $thumb;}?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="http://assets.pinterest.com/images/PinExt.png" title="Pin It"/></a></li>
                              <?php } ?>
                                
              </ul>
             <div class="clear"></div>
             
              </div>
                                
                                <?php }; ?>
                            
                            
                            
                            </div>
                            <!-- end post --> 
                           
               
                          
                            <?php if(of_get_option('blog_nav') == 0){ ?>
                        
                            <div class="postnav">
                                       
                            
                                <?php
                                $next_post = get_next_post();
								
                                if (!empty($next_post)){
									
                                    ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" id="prepost"><span class="previouspost"><i class="icon-double-angle-left"></i></span><?php echo $next_post->post_title; ?></a>

                                <?php }; ?>

                                <?php
								
                                $prev_post = get_previous_post();
                                if (!empty($prev_post)){
								
                                    ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" id="nextpost"><?php echo $prev_post->post_title; ?><span class="nextpost"><i class="icon-double-angle-right"></i></span></a>
                                <?php }; ?>
                                
                                
                                
                            </div>
                            <hr class="none">
                            <?php }; ?>
                           <?php if (is_active_sidebar('below-content')){ ?>
                                 <?php dynamic_sidebar('below-content'); ?>
                           <?php } ?>
                            
                            <?php if(of_get_option('blog_author') == 0){ ?>
                            <div class="auth">                                       
                                <?php echo get_avatar(get_the_author_meta('user_email'), 90); ?> <h5><?php the_author_posts_link(); ?></h5>
                                <p><?php echo get_the_author_meta('description'); ?></p>
                                <div class="socialmedia">

                                    <?php if ((get_the_author_meta('user_url')) != ''){ ?>
                                        <span class="globe"><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank" rel="no-follow"><i class="icon-globe"></i></a></span>                                    
                                    <?php }; ?>

                                    <?php if ((get_the_author_meta('facebook')) != ''){ ?>
                                        <span class="facebook"><a href="<?php echo get_the_author_meta('facebook'); ?>" target="_blank" rel="no-follow"><i class="icon-facebook"></i></a></span>
                                    <?php }; ?>
                                    <?php if ((get_the_author_meta('twitter')) != ''){ ?>
                                        <span class="twitter"><a href="<?php echo get_the_author_meta('twitter'); ?>" target="_blank" rel="no-follow"><i class="icon-twitter"></i></a></span>
                                    <?php }; ?>
                                    <?php if ((get_the_author_meta('googleplus')) != ''){ ?>
                                        <span class="googleplus"><a href="<?php echo get_the_author_meta('googleplus'); ?>" target="_blank" rel="no-follow"><i class="icon-google-plus"></i></a></span>
                                    <?php }; ?>
                                </div>
                            </div>
                            <?php }; ?>
                            
                        <?php }; // end of the loop.   ?>                    

                    <?php }; ?>
                    <?php if(of_get_option('blog_related')== 0){ ?>
                    <div class="relativepost clearfix">
                        <h5><?php echo of_get_option('rela_articles'); ?></h5>

                        <?php
                        $themeloy_tags = null;
                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                $themeloy_tags[] = $tag->term_id;
                            }
                        };
                        $arg_tag = array('tag__in' => $themeloy_tags, 'showposts' => of_get_option('blog_related_num'), 'post__not_in' => array($post_id));
                        $post_query = null;
                        $post_query = new WP_Query($arg_tag);
                        echo "<ul  class=\"ulpost picture\">\n";


                        while ($post_query->have_posts()) {
                            $post_query->the_post();
                            ?>
                            <li>
                                <?php
                         				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-7.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}
								
                                echo '<a  class="entry-thumb feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '"><img src="' . $url[0] . '" alt="' . get_the_title() . '" />'.themeloy_post_type().'</a>';
                                ?>

 
                                <div class="ulpost_title">
                                    <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
									<?php echo themeloy_short_title(40, get_the_title('')); ?>
                                    
                                    </a>
                                 <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                        </p>
                                </div>
                              
                            </li>
                            <?php
                        }

                        wp_reset_query();

                        echo "</ul>\n";
                        ?>

                    </div>                  
                    <?php }; ?>        
                           
                    <?php if(of_get_option('blog_cat')==0){ ?>       
                    <div class="moreincategories clearfix">

                        <h5><?php echo of_get_option('term_cat'); ?></h5>

                        <?php
                        $themeloy_categories = null;
                        foreach ($categories as $category) {
                            $themeloy_categories[] = $category->term_id;
                        }
						
						if(isset($themeloy_tags)) {
							     $arg_cat = 
						array(
							'category__in' => $themeloy_categories, 
							'showposts' => of_get_option('blog_cat_num'), 
							'post__not_in' => array($post_id),
							'tag__not_in' => $themeloy_tags						
							);
						 }else {
							      $arg_cat = 
						array(
							'category__in' => $themeloy_categories, 
							'showposts' => of_get_option('blog_cat_num'), 
							'post__not_in' => array($post_id)
											
							);
						 }
						
                   
							
							
                        $post_cat = null;
                        $post_cat = new WP_Query($arg_cat);
                        echo "<ul  class=\"ulpost picture\">\n";

                        while ($post_cat->have_posts()) {
                            $post_cat->the_post();
                            ?>
                            <li>
                                <?php
                             
								
				$thumb = get_post_thumbnail_id(get_the_ID());
                if (!$thumb) {
                    $url[0] = get_template_directory_uri() . '/img/demo/dum-7.jpg';
                }else{
					 $url = wp_get_attachment_image_src( $thumb , '120x85');
				}
								
                                echo '<a  class="entry-thumb feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '"><img src="' . $url[0] . '" alt="' . get_the_title() . '" />'.themeloy_post_type().'</a>';
                                ?>


                                <div class="ulpost_title">
                                    <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
									<?php echo themeloy_short_title(40, get_the_title('')); ?>
                                    </a>
                            
                            <p class="post-meta">
                                        <span class="meta-date"><i class="icon-calendar"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                    	<span class="meta-comment last-meta"><?php comments_popup_link(__('<i class="icon-comments-alt"></i> 0', 'tl_back'), __('<i class="icon-comments-alt"></i> 1', 'tl_back'), __('<i class="icon-comments-alt"></i> %', 'tl_back')); ?></span>
                                        </p>
                            
                                </div>
                                

                            </li>
                            <?php
                        }

                        wp_reset_query();

                        echo "</ul>\n";
                        ?>

                    </div>
                    
                     <?php }; ?>       
					<hr class="none" />

                    <!-- comment -->
                    <?php comments_template('', true); ?>


            