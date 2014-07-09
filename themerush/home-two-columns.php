<?php
/*
  Template Name: Home Page two columns
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
      <!-- Basic Page Needs
  	  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?>  <?php wp_title('-'); ?></title>
        <!-- Mobile Specific Metas
  		================================================== -->
        <?php if (of_get_option('disable_design') == 0){ ?>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php } ?>
        <!-- CSS
  		================================================== -->             
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-ie7.min.css" media="screen">
        <![endif]-->
        
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Favicons
        ================================================== -->
        <?php $favor = of_get_option('favicon_uploader'); ?>        
        <?php if (!empty($favor)): ?>
            <link rel="shortcut icon" href="<?php echo $favor; ?>">
        <?php else: ?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
        <?php endif; ?>
        
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>    

<?php 
		// add facebook thumbnail to this page
		
		
			if ( is_singular() ) {
			$thumbnail_id = get_post_thumbnail_id();
			if( !empty($thumbnail_id) ){
				$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
				echo '<meta property="og:image" content="' . $thumbnail[0] . '"/>';		
			}			 
			}



wp_head(); ?>   
    	

<!-- end head -->
</head>
<body <?php body_class(); ?>>
<?php if(of_get_option('box_design') == 1 ){if(of_get_option('background_option') == 'background_image'){?>
<div class="full-background"><img id="logo" src="<?php echo of_get_option('background_large_image');?>" alt="" /></div>
<?php }}?>
<?php if(of_get_option('box_design') == 1 ) { $box_design = 'box-wrapper'; } else { $box_design = 'full-wrapper';} ?>   
   
<div class="container-wrap <?php echo $box_design;?> two-columns-layout">
      
            <!-- Primary Page Layout
            ================================================== -->
            <!-- HEADER -->
            <!-- start header -->
            <header class="header-wraper">
                <div class="header-top">
                    <div class="row">
                    
                    
                    <?php $last = wp_get_recent_posts( array('numberposts'=>1));  $last_id = $last['0']['ID'];?>
                    
                        <div class="grid_6 header-top-left"><?php if(of_get_option('enable_latest_update_date') == 1){?><p class="date"><span><?php echo of_get_option('term_up'); ?></span> <?php echo get_the_time('F jS, Y g:i A', $last_id ); ?></p><?php }else{echo "&nbsp;";}?></div>

                        <div class="grid_6 header-top-right">

<div class="mainmenu">
                            <?php if (of_get_option('enable_menu_top') == 1): ?>
                                <?php $top_menu = array('theme_location' => 'Top_Menu', 'container' => '', 'menu_class' => 'sf-top-menu', 'menu_id' => 'menu-top', 'fallback_cb' => false); ?>
                                <?php wp_nav_menu($top_menu); ?>
                            <?php endif; ?>
                        </div>
</div>
                    </div>
                </div>

				<!-- header, logo, top ads -->
                <div class="header-main">

                    <div class="row">
                    <?php if (is_active_sidebar('banner-sidebar')) { $grid_width = 'grid_2'; } else { $grid_width = 'grid_12';} ?>
                        <div class="<?php echo $grid_width; ?>">
                            <!-- begin logo -->
                            <h4>
                                <a href="<?php echo home_url(); ?>" alt="<?php bloginfo('description'); ?>">
                                    <?php $logo = of_get_option('logo_uploader'); ?>
                                    <?php if (!empty($logo)): ?>   
                                        <img src="<?php echo $logo; ?>" alt="<?php bloginfo('description'); ?>"/>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('description'); ?>"/>
                                    <?php endif; ?>
                                </a>
                            </h4>
                            <!-- end logo -->
                        </div>


                       
                            <?php if (is_active_sidebar('banner-sidebar')): ?>
                             <div class="grid_10 banner-ads"> 
                                <?php dynamic_sidebar('banner-sidebar'); ?>
                             </div>
                            <?php endif; ?>
                       
                        
                        
                    </div>

<?php if (of_get_option('enable_ticker') == 1): ?>
<div class="row">
<div class="grid_12">
            <div class="latest-news">
           <h3><?php echo of_get_option('term_latest'); ?></h3>
 <div class="container">
	 <?php get_template_part('newsticker'); ?>       
 </div>
</div>
</div>
</div>
<?php endif; ?>

                </div>          
				
                <!-- end header, logo, top ads -->

                <nav <?php if (of_get_option('disable_sticky') == 0){echo'id="main-menu"';}?> class="main-menu">
                    <div class="row">
                        <div class="grid_10">     

                            <!-- main menu -->
                            <div class="mainmenu">
                                <?php
                                $home_link = '<ul class="sf-menu" id="mainmenu"><li id="home"><a href="' . home_url() . '" alt="' . get_bloginfo('description') . '"><span id="homeicon">' . __('Home', 'tl_back') . '</span><i class="icon-home"></i></a></li>%3$s</ul>';

                                $arg = array(
                                    'theme_location' => 'Main_Menu',
                                    'container' => false,
                                    'items_wrap' => $home_link,
									'link_before' => '<span>',
									'link_after'=>'</span>'
                                );
                                ?>


                                <?php if (has_nav_menu('Main_Menu')): ?>
                                    <?php wp_nav_menu($arg); ?>
                                <?php else: ?>
                                    <ul class="sf-menu" id="mainmenu">
                                        <?php wp_list_categories('title_li=&orderby=id'); ?>
                                    </ul>
                                <?php endif; ?>
                                <!-- end menu -->
                            </div>
                            <!-- end main menu -->
                        </div>
                        <div class="grid_2"> 
                            <ul class="share-search">
                               <?php if (of_get_option('enable_follow') == 1){?>
                                <li class="share-button"><a href="#" id="tickersocial"><i class="icon-plus"></i><span><?php echo of_get_option('term_follow'); ?></span></a>
                                <div class="socialdrop">
                                	<ul>
                                    	<?php if(of_get_option('facebook_url')){ ?>
                                    	<li><a href="<?php echo of_get_option('facebook_url'); ?>" class="facebook"><i class="icon-facebook"></i><?php _e('Facebook', 'tl_back'); ?></a></li>
                                        <?php } ?>
                                        <?php if(of_get_option('twitter_url')){ ?>
                                        <li><a href="<?php echo of_get_option('twitter_url'); ?>" class="twitter"><i class="icon-twitter"></i><?php _e('Twitter', 'tl_back'); ?></a></li>
                                        <?php } ?>
                                        <?php if(of_get_option('gplus_url')){ ?>
                                        <li><a href="<?php echo of_get_option('gplus_url'); ?>" class="google"><i class="icon-google-plus"></i><?php _e('Google+', 'tl_back'); ?></a></li>
                                        <?php  } ?>
                                        <?php if(of_get_option('pin_url')){ ?>
                                        <li><a href="<?php echo of_get_option('pin_url'); ?>" class="pinterest"><i class="icon-pinterest"></i><?php _e('Pinterest', 'tl_back'); ?></a></li>
                                        <?php } ?>
                                        <?php if(of_get_option('rss_url')){ ?>
                                        <li><a href="<?php echo of_get_option('rss_url'); ?>" class="rss-feed"><i class="icon-rss"></i><?php _e('RSS Feed', 'tl_back'); ?></a></li>
                                        <?php } ?>
                                        <?php if(of_get_option('linked_url')){ ?>
                                        <li><a href="<?php echo of_get_option('linked_url'); ?>" class="linkedin"><i class="icon-linkedin-sign"></i><?php _e('Linked', 'tl_back'); ?></a></li>
                                        <?php } ?>
                                        
                                         <?php if(of_get_option('youtube_url')){ ?>
                                         <li>
                                       <a href="<?php echo of_get_option('youtube_url'); ?>" class="youtube"><i class="icon-play-circle"></i><?php _e('Youtube', 'tl_back'); ?></a></li>
                                        <?php } ?> 
                                    </ul>
                                </div>
                                </li>
                                <?php }?>
                                <li class="search-button"><a href="#" id="tickersearch"><i class="icon-search"></i></a>
                                    <form action="" id="tickersearchform" method="get" role="search">
                                        <div><label for="s" class="screen-reader-text"><?php _e('Search for:', 'tl_back'); ?></label>
                                            <input type="text" id="s" name="s" value="" placeholder="<?php _e('Search here', 'tl_back'); ?>">
                                        </div>
                                    </form>

                                </li>
                            </ul>


                        </div>
                    </div>   
                </nav>

            </header>

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
  
    
       </div>
</div>
</section>
<!-- end content -->


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