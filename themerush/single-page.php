<?php $post_id = null; 
$enable_full_width_post = get_post_custom_values('full_width_postthemeloy_checkbox');
?>

<!-- begin content -->            
<section id="contents"  >
<div class="row" >

<div class="container <?php if(of_get_option('post_layout') == '2c-r1-fixed') {}else{ echo 'two-columns-sidebar';}?><?php if(of_get_option('sidebar_center_width') == true) {echo " center_350";}?>">



  <div class="sidebar_content" >
        <div class="p7ehc-a <?php if($enable_full_width_post[0] == 1) {echo "grid_12";}else{echo "grid_7";}?>" >
        <div id="p7EHCd_1">
            <?php $post_layout = of_get_option('post_layout'); ?>
            <?php require_once dirname(__FILE__) . '/include/single-post.php'; ?>  
        <div class="brack_space" > </div>
        </div>
        </div>
        </div>
       
 
 <?php if($enable_full_width_post[0] == 0) { ?>       
  <div class="sidebar_center"  style="float:left" >
            <div class="p7ehc-a grid_3">
            <div id="p7EHCd_2">  
<?php
				$dyn_sidebar = $GLOBALS['sbg_sidebar'][0];
				
				$po_sidebar = of_get_option('po_sidebar','');	
				if(!empty($po_sidebar)) {
					$dyn_sidebar = $po_sidebar;
				};				
				
				foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_sidebar = $sidebar['id'];
						}
				} 
				if($dyn_sidebar) {
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
       </div>
       <?php }?>
       
        <?php 
		if($enable_full_width_post[0] == 0) {
		if(of_get_option('post_layout') == '2c-r1-fixed') {  ?>           
         <div class="sidebar_last">
            <div class="p7ehc-a grid_2">
            <div id="p7EHCd_3">
            <div class="sidebar_last_space"></div>
                <?php
                if (is_active_sidebar('last-sidebar')) : dynamic_sidebar('last-sidebar');
                endif;
                ?>
               <div class="brack_space"></div> 
               </div>
            </div>
	    </div>
         <?php }} ?>        
    </div>
</div>
 </section>
<!-- end content --> 