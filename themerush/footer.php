<!-- footer -->  
<footer id="<?php if (is_active_sidebar('footer1-sidebar') || is_active_sidebar('footer2-sidebar') || is_active_sidebar('footer3-sidebar') || is_active_sidebar('footer4-sidebar') ) {echo "footer-container";}else{echo "footer-container-none";}?>">


    <div class="footer-columns">
        <div class="row">
            <div class="grid_3"><?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?></div>
            <div class="grid_3"><?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?></div>
            <div class="grid_3"><?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?></div>
            <div class="grid_3"><?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar');  endif; ?></div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="row">
            <div class="grid_6 footer-left"> <?php echo of_get_option('copyright'); ?></div>
            <div class="grid_6 footer-right">  
                <?php if (of_get_option('enable_menu_bottom') == 1){ ?>
                
                    <?php $footer_menu = array('theme_location' => 'Footer_Menu', 'depth' => 1, 'container' => false, 'menu_class' => 'menu-footer', 'menu_id' => '', 'fallback_cb' => false ); ?>
                
                    
                    <?php wp_nav_menu($footer_menu); ?>
                    
                <?php }; ?></div>
        </div>  
    </div>
    


</footer>
<!-- end footer -->



<?php
$tracking_code = of_get_option('tracking_code');

if (!empty($tracking_code)) {
    echo '<script>' . $tracking_code . '</script>';
}


?>

</div>
<!-- end container-->

<?php
wp_footer();
?>
</body>
</html>