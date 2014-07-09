<?php
header("Content-type: text/css; charset: UTF-8");
require_once( '../../../../wp-load.php' );

	   $google_fontface = of_get_option('header_google_font');

        if ($google_fontface['face'] != 'none') {
            $google_font = explode(", ", $google_fontface['face']);
            if (strpos($google_font[0], " ") > 0) {
                $face = explode(" ", $google_font[0]);
                $google_font = $face[0] . '+' . $face[1] . '|';
            } else {
                $google_font = $google_font[0] . '|';
            }
        } else {
            $google_font = 'Oswald|';
     }
	 
	 echo '@import url(http://fonts.googleapis.com/css?family='.$google_font.'Open+Sans:400,600);';

$themecolor = of_get_option('theme_color');
if (!empty($themecolor)) { ?>
.more-link .read-more, 
.meter-content, 
.sidebar_last .widget-title, 
.latest-news,
 #calendar_wrap tbody td#today, 
 .caption span.date, 
 .flex-control-paging li a:hover, 
 .header-wraper, .pagination .page:hover, 
  .tabs-nav li.active a, 
 .sidebar_center .widget-title, 
 .sidebar_center .sidebar_last,
 .flex-direction-nav a, 
 .flex-control-paging li a.flex-active, 
 .newsletter .buttons, 
 .header-top-left p.date span,
 .widget_tag_cloud .tagcloud a:hover,
 .share li, 
 .jcarousel-next-horizontal, 
 .jcarousel-prev-horizontal, 
 .post .jcarousel-next-horizontal,
 .post .jcarousel-prev-horizontal,
 .widget_search #searchsubmit, 
 .search-cus .buttons{background-color: <?php echo $themecolor . ';'; ?>;}
#calendar_wrap tfoot td a:hover, a.readmore:hover{color:<?php echo $themecolor . ';'; ?>}
.dateinfo{ border-top: 5px solid <?php echo $themecolor . ';'; ?>} 
.image-flickr-widget a:hover{ border: 5px solid <?php echo $themecolor . ';'; ?>}              
 .minim-flickr-widget a:hover { border: 5px solid <?php echo $themecolor; ?>;}
 .main-post-large-style .post_type, .main-post-large .post_type, .post-tab-home .post_type, .image_review_wrapper .post_type, post-news .image_review_wrapper .post_type, .feature-link .post_type{ background: <?php echo $themecolor; ?> url(<?php echo get_template_directory_uri(); ?>/img/title.png) bottom repeat-x;}
.feature-link .post_type{ background: <?php echo $themecolor; ?> url(<?php echo get_template_directory_uri(); ?>/img/title.png) bottom repeat-x;}
.slider_post_type{ background: <?php echo $themecolor; ?> url(<?php echo get_template_directory_uri(); ?>/img/title.png) bottom repeat-x;}
.mejs-controls .mejs-time-rail .mejs-time-current {
	width: 0;
	background: <?php echo $themecolor; ?>;
	background-image: -webkit-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -moz-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -o-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -ms-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	-moz-background-size: 6px 6px;
	background-size: 6px 6px;
	-webkit-background-size: 6px 5px;
	z-index: 1;
}

.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
	position: absolute;
	left: 0;
	top: 11px;
	width: 50px;
	height: 5px;
	margin: 1px;
	padding: 0;
	font-size: 1px;

	background: <?php echo $themecolor; ?>;
	background-image: -webkit-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -moz-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -o-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -ms-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	-moz-background-size: 6px 6px;
	background-size: 6px 6px;
	-webkit-background-size: 6px 5px;

} 				
<?php } ?>            
<?php
if ($google_fontface['face'] != 'none') {
?>
.sf-menu > li a, .widget-title, .tabs-nav li a, #wp-calendar caption, #tickersocial, span.count, .newsletter .buttons, .widget_search #searchsubmit, .review-post .ulpost_title a.title, .caption h4 a, .main-post-large .post-title h3 a.title, .main-post-large-style .post-title h3 a.title, .feature-text .post-title h4 a.title, .ulpost_title a.title, .title-feature h4 a.title, .main-post-col1 .post-title h3 a.title, .main-post-col2 .post-title h3 a.title, .post_title a.title, .latest-news h3, .post h2, .auth h5, .relativepost h5, .moreincategories h5, .relativepost ul li .ulpost_title a.title, .moreincategories ul li .ulpost_title a.title, .comments-area h3#reply-title, .comments-area h4, .review_header h3, .postnav a, .post-news h3 a, .categories-title, .page_error h1.big, .archive-month, .archive-year, h3.page-title, h2.post-title{ font-family: <?php echo $google_fontface['face'] ?>;} 
h1, h2, h3, h4, h5, h6{ font-family: <?php echo $google_fontface['face'] ?>, Helvetica, sans-serif;}    
<?php }?>            
<?php
$h1 = of_get_option('h1_typ');
$h2 = of_get_option('h2_typ');
$h3 = of_get_option('h3_typ');
$h4 = of_get_option('h4_typ');
$h5 = of_get_option('h5_typ');
$h6 = of_get_option('h6_typ');
$p = of_get_option('p_typ');
echo '.post h1 { font-size:' . $h1['size'] . '; color: ' . $h1['color'] . '; font-weight:' . $h1['style'] . ';}';
echo '.post h2 { font-size:' . $h2['size'] . '; color: ' . $h2['color'] . '; font-weight:' . $h2['style'] . ';}';
echo '.post h3 { font-size:' . $h3['size'] . '; color: ' . $h3['color'] . '; font-weight:' . $h3['style'] . ';}';
echo '.post h4 { font-size:' . $h4['size'] . '; color: ' . $h4['color'] . '; font-weight:' . $h4['style'] . ';}';
echo '.post h5 { font-size:' . $h5['size'] . '; color: ' . $h5['color'] . '; font-weight:' . $h5['style'] . ';}';
echo '.post h6 { font-size:' . $h6['size'] . '; color: ' . $h6['color'] . '; font-weight:' . $h6['style'] . ';}';
echo '.post p { font-size:' . $p['size'] . '; color: ' . $p['color'] . '; font-weight:' . $p['style'] . ';}';
for ($i=1;$i<11;$i++) {		
?>
.sf-menu > li.color-<?php echo $i; ?>.current-menu-item a, .sf-menu > li.color-<?php echo $i; ?> a:hover, .sf-menu > li.color-<?php echo $i; ?> li:hover, .sf-menu > li.color-<?php echo $i; ?> li.sfHover{ background: <?php echo of_get_option('menu_color'.$i); ?> url(<?php echo get_template_directory_uri(); ?>/img/header-top-border.png) repeat-x bottom;}
.sf-menu li.color-<?php echo $i; ?> a {border-top:3px solid <?php echo of_get_option('menu_color'.$i); ?>;}
<?php }?>
.sf-menu li#home a { border-top:3px solid <?php echo of_get_option('home_menu_color'); ?>;}
.sf-menu li#home a:hover { background: <?php echo of_get_option('home_menu_color'); ?>}
<?php if(of_get_option('box_design') == 1 ){if(of_get_option('background_option') == 'background_parttern') {?>
body{ background:url(<?php echo get_template_directory_uri(); ?>/img/pattern/<?php echo of_get_option('background_parttern');?>.png);}
<?php }elseif(of_get_option('background_option') == 'background_color_image'){?>
body{ background:<?php echo of_get_option('background_color_png');?><?php if(of_get_option('background_color_img_png') !=""){echo " url(".of_get_option('background_color_img_png').")";}?>}
<?php }}?>
<?php 
if(of_get_option('enable_menu_top') == 0) {
echo ".header-top-left p.date{ margin: 8px 0px 8px 0px;}";
}elseif ( !has_nav_menu( 'Top_Menu' ) ) {
echo ".header-top-left p.date{ margin: 8px 0px 8px 0px;}";
}?>

<?php echo of_get_option('custom_style'); ?>

@media only screen and (min-width:768px) and (max-width:1190px) {
<?php echo of_get_option('custom_style_1190'); ?>
}

@media only screen and (min-width:768px) and (max-width:959px) {
<?php echo of_get_option('custom_style_959'); ?>
}

@media only screen and (max-width:767px) {
<?php echo of_get_option('custom_style_767'); ?>
}

@media only screen and (min-width:480px) and (max-width:767px) {
<?php echo of_get_option('custom_style_480'); ?>
}


<?php 
for ($i=1;$i<11;$i++) {		
?>
.sf-top-menu li.color-<?php echo $i; ?> a {border-top:3px solid <?php echo of_get_option('menu_color'.$i); ?>;}
<?php }?>
