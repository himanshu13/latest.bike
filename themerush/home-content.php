<section id="contents" class="clearfix">
    <div class="row">

<div class="container<?php if(of_get_option('sidebar_center_width') == true) {echo " center_350";}?>">
  

  <div class="sidebar_content">
        <div class="p7ehc-a grid_7">
        <div id="p7EHCd_1">
           <?php $home_layout = of_get_option('home_layout'); ?>
            <?php
            if ( is_active_sidebar('home-sidebar') ) : dynamic_sidebar('home-sidebar');    endif;
            ?>
            
           <div class="brack_space"></div>
           </div>
        </div>
        </div>
       
  <div class="sidebar_center">
            <div class="p7ehc-a grid_3">
            	<div id="p7EHCd_2">
                <?php
                if (is_active_sidebar('center-sidebar')) : dynamic_sidebar('center-sidebar');
                endif;
                ?>     
            <div class="brack_space"></div>    
            </div>
            </div>
       </div>
  
    
 <?php if(of_get_option('home_page_layout') == '2c-r1-fixed' || of_get_option('home_page_layout') == '') {?> 
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
    <?php }?> 
    
       </div>
</div>
</section>
<!-- end content -->
