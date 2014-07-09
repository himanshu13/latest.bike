                      
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <h3 class="page-title"><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                                
                                 <?php 	$GLOBALS['sbg_sidebar'] = get_post_meta(get_the_ID(), 'sbg_selected_sidebar_replacement', true);  ?>
                        <?php endwhile; // end of the loop.  ?>
                    <?php endif; ?>
            

