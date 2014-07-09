<section id="contents" class="clearfix">
<div class="row">
        <!-- begin content -->            
<div class="container <?php if(of_get_option('cat_layout') != '2c-r1-fixed') {echo 'two-columns-sidebar';} ?><?php if(of_get_option('sidebar_center_width') == true) {echo " center_350";}?>">
  <div class="sidebar_content">
  <div class="p7ehc-a grid_7">
          <div id="p7EHCd_1">
            <?php require_once dirname(__FILE__) . '/include/cat.php'; ?>   
               
  <div class="brack_space"></div>
  </div>
  </div>
  </div>
        
  <div class="sidebar_center">
            <div class="p7ehc-a grid_3">
            <div id="p7EHCd_2">   
<?php

			
				
				 $ge_sidebar = '';
				 if (is_search()) {
                      $ge_sidebar = of_get_option('se_sidebar','');
                    }else if(is_category() ) {
						
						$category = get_the_category();						
						
						$cn_sidebar ='';
						foreach($category as $ca_id) {
							if(empty($cn_sidebar)) { $cn_sidebar = of_get_option('cat_'.$ca_id->term_id);}								
							
						}
						
						if(empty($cn_sidebar)) {
							$ge_sidebar = of_get_option('cat_sidebar','');
						} else { $ge_sidebar = $cn_sidebar; }
						
						
					} else if(is_author() ) {
						
						$ge_sidebar = of_get_option('au_sidebar','');
						
					}else if(is_tag() ) {
						
						$tags = get_the_tags();						
						
						$cn_sidebar ='';
						foreach($tags as $tg_id) {
							if(empty($cn_sidebar)) { $cn_sidebar = of_get_option('tag_'.$tg_id->term_id);}								
						}
						 
						if(empty($cn_sidebar)) {
							$ge_sidebar = of_get_option('tag_sidebar','');
						} else { $ge_sidebar = $cn_sidebar; }
					}				
					
					
					
				$dyn_sidebar ='';
				if(!empty($ge_sidebar)) {	$dyn_sidebar = $ge_sidebar;	};				
				
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
       </div>
       
         <?php if(of_get_option('cat_layout') == '2c-r1-fixed') {  ?>           
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
         
         <?php } ?>
   
        
    </div>
</div>
 </section>
<!-- end content --> 