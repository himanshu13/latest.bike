<?php
/*
  Template Name: Page no sidebar
 */
?>
<?php get_header(); ?>
<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->            
  <div <?php post_class('grid_12 page-full'); ?> id="post-<?php the_ID(); ?>">  
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h3 class="page-title"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                    <?php endwhile; // end of the loop.    ?>
                <?php endif; ?>
      </div>
  </div> </section>
<?php get_footer(); ?>


