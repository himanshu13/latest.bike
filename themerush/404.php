<?php get_header(); ?>

<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->            
  <div class="grid_12 page_error">  
                    <h1 class="big"><?php _e('404', 'tl_back'); ?></h1>
                    <p class="description">  
                    <?php $notfound = of_get_option('term_404'); ?>
					<?php echo $notfound; ?></p>
 <div class="search-cus">
		              <form action="<?php echo home_url( '/' ); ?>" method="get" role="search">
		     <input type="text" class="text" name="s">
		     <input type="submit" class="buttons" value="<?php _e('Search', 'tl_back'); ?>">
            </form>
            </div>
      </div>
  </div> </section>

<?php get_footer(); ?>


