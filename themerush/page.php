<?php
/*
  Template Name: Page with Sidebar
 */
?>
<?php get_header(); ?>
  

<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->            

<div class="container <?php if(of_get_option('cat_layout') != '2c-r1-fixed') {echo 'two-columns-sidebar';}?><?php if(of_get_option('sidebar_center_width') == true) {echo " center_350";}?>">
  <div class="sidebar_content">
        <div <?php post_class('p7ehc-a grid_7 page-sidebar'); ?> id="post-<?php the_ID(); ?>">
<?php get_template_part('content-page'); ?> 
<div class="brack_space"></div>       
        </div>
        </div>
        
  <div class="sidebar_center">
            <div class="p7ehc-a grid_3">   
          
<?php
				
				if(isset($GLOBALS['sbg_sidebar'][0])){
					$dyn_sidebar = $GLOBALS['sbg_sidebar'][0];
					
					$pg_sidebar = of_get_option('pg_sidebar','');	
					if(!empty($pg_sidebar)) {
						$dyn_sidebar = $pg_sidebar;
					};
				
					foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_side = $sidebar['id'];
						}
					} 
				}			

				if(isset($dyn_side)) {
					
					if (is_active_sidebar($dyn_side)) : dynamic_sidebar($dyn_side);
		            endif;								
					
					
				} else{
					if (is_active_sidebar('center-sidebar')) { dynamic_sidebar('center-sidebar'); }
				}					
				
				
?>
<div class="brack_space"></div>
            </div>
       </div>
       
         <?php if(of_get_option('cat_layout') == '2c-r1-fixed') {  ?>           
         <div class="sidebar_last">
            <div class="p7ehc-a grid_2">
            <div class="sidebar_last_space"></div>
                <?php
                if (is_active_sidebar('last-sidebar')) : dynamic_sidebar('last-sidebar');
                endif;
                ?>
                <div class="brack_space"></div>
            </div>
	    </div>
         
        <?php } ?>
   
        
    </div>
</div>
 </section>
<!-- end content --> 

<?php get_footer(); ?>


