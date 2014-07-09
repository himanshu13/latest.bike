<?php

/*********************************************************
 *               Add Tinymce Button 
 *********************************************************/

function themeloy_add_button()
{
    if(current_user_can('edit_posts') && current_user_can('edit_pages'))
    {
         add_filter('mce_external_plugins', 'themeloy_add_plugin');  
         add_filter('mce_buttons_3', 'themeloy_register_button');  
    }
        
}

add_action('init',  'themeloy_add_button');

function themeloy_register_button($buttons)
{
    array_push($buttons,'tab','quote','dropcap','ul','button','image_thumbs','info', 'icons', 'youtube', 'vimeo', 'image_sliders', 'audio');
    return $buttons;
}

function themeloy_add_plugin($plugin_array)
{

    $plugin_array['tab']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['dropcap']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['ul']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['button']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['image_thumbs']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js'; 
    $plugin_array['quote']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['info']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    $plugin_array['icons']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
	$plugin_array['youtube']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
	$plugin_array['vimeo']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
	$plugin_array['image_sliders']=  get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
	$plugin_array['audio'] = get_template_directory_uri().'/inc/plugins/shortcode/customshortcode.js';
    
    return $plugin_array;
    
    
}

/*=================================================================== 
 *                           Image Carousel
  ==================================================================*/

function themeloy_image_source($att, $content = null)
{
    extract( shortcode_atts( array('link' => '#', 'source'=>'#'), $att ) );
	
    
	
    return '<li><a href="'.strip_tags($link).'"><img src="'.strip_tags($source).'" /></a>'.$content.'</li>';
}
add_shortcode('image_slider', 'themeloy_image_source');

function themeloy_image_thumb( $att, $content = null)
{
      return  '<ul class="jcarousel jcarousel-post">'.do_shortcode(strip_tags($content, '<a><strong><h2><h3><h5><h4>'))."</ul>";
}

add_shortcode('image_thumbs', 'themeloy_image_thumb');

/* ==================================================================
 *								slider
 * ================================================================== */


function themeloy_image_sliders( $att, $content = null)
{
 
	   return '<div class="flexslider"><ul class="slides">'.do_shortcode(strip_tags($content,  '<a><strong><h2><h3><h5><h4>'))."</div></ul>";  
    
}

add_shortcode('image_sliders', 'themeloy_image_sliders');

/*=========================================================
 *                      Drop Cap 
 * =======================================================*/

function themeloy_dropcap($atts, $content)
{
    
    extract( shortcode_atts(array('size'=>'small','color'=>'#888', 'type'=>''), $atts));
    $style= '';
    if( $type != '' )
    { $style='style="background-color:'.$color.';"'; }    
    else
    {  $style='style="color:'.$color.';"';  }
    
    $dropcap = '<span class="dropcap '.$size.' '.$type.'" '.$style.'>'.$content.'</span>';
    
    return $dropcap;
}

add_shortcode('dropcap', 'themeloy_dropcap');

 /* ===================================================
 *			List
 *  ===================================================*/

function themeloy_ul($atts, $content)
{
    
    extract( shortcode_atts(array('class'=>'none'), $atts));
  	
	$ullink = '<ul class="'.$class.'">'.do_shortcode($content).'</ul>';
	
	return $ullink;
}

add_shortcode('ul', 'themeloy_ul');

function themeloy_li($atts, $content)
{
	$lilink = '<li>'.$content.'</li>';
	
	return $lilink;
}
add_shortcode('li', 'themeloy_li');

/* =====================================================
 *                      Quote
 * =================================================== */

function themeloy_quote($atts, $content)
{
    
    return '<blockquote class="quote_content">'.$content.'</blockquote>';
}

add_shortcode('quote', 'themeloy_quote');

/* =======================================================
 *					Audio
 * ======================================================= */
 
 
function themeloy_audio($atts)
{
	extract( shortcode_atts(array('url'=>''), $atts));
    
    return '<audio  src="'.$url.'" type="audio/mp3" controls="controls"></audio>';
}

add_shortcode('audio', 'themeloy_audio');

/* ======================================================
 *                  Notification        
 * ====================================================*/

function themeloy_info_error($att, $content)
{
    return '<div class="alert"><i class="icon-warning-sign"></i> <button type="button" class="close" data-dismiss="alert">×</button>'.$content.'</div>';
}

add_shortcode('info_error', 'themeloy_info_error');


function themeloy_info_success($att, $content)
{
    return '<div class="alert alert-success"> <span class=" icon-check"></span>  <button data-dismiss="alert" class="close" type="button">x</button>'.$content.'</div>';
}

add_shortcode('info_success', 'themeloy_info_success');


function themeloy_info($att, $content)
{
    return '<div class="alert alert-info"><i class="icon-info-sign"></i> <button data-dismiss="alert" class="close" type="button">x</button>'.$content.'</div>';
}

add_shortcode('info', 'themeloy_info');

function themeloy_info_warning($att, $content)
{
    return ' <div class="alert alert-error"><i class="icon-remove-sign"></i> <button data-dismiss="alert" class="close" type="button">x</button>'.$content.'</div>';
}

add_shortcode('info_warning', 'themeloy_info_warning');

/* =====================================================
 *                     Icons 
 * =====================================================*/

function themeloy_icons($attr)
{
     extract( shortcode_atts(array('icon_name'=>'icon-tint','icon_size'=>'14px'), $attr));
     
     return '<i class="'.$icon_name.'" style="font-size:'.$icon_size.'"></i>' ;
    
}

add_shortcode('icons', 'themeloy_icons');

/* ======================================================
 *					Youtube
 * ===================================================== */
 
 function themeloy_youtube($attr)
{
     extract( shortcode_atts(array('url'=>'','width'=>'560', 'height' => '315'), $attr));
	 $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  $url_string= isset($args['v']) ? $args['v'] : false;
     
     return '<div class="embed"><div class="video"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$url_string.'" frameborder="0" allowfullscreen></iframe></div></div>' ;
    
}

add_shortcode('youtube', 'themeloy_youtube');

/* ======================================================
 *					Vimeo
 * ===================================================== */

 function themeloy_vimeo($attr)
{
     extract( shortcode_atts(array('url'=>'','width'=>'560', 'height' => '315'), $attr));
	 preg_match('/https?:\/\/vimeo.com\/(\d+)$/', $url, $id);
     return '<div class="embed"><div class="video"><iframe src="http://player.vimeo.com/video/'.$id[1].'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>' ;
   
}

add_shortcode('vimeo', 'themeloy_vimeo');

/* ====================================================
 *					Buttons
 * ====================================================*/
 
 
 function themeloy_button($attr)
{
     extract( shortcode_atts(array('class'=>'btn_smallgray', 'url'=>'#', 'text'=>'button'), $attr));
     
     return '<a href="'.$url.'" class="'.$class.'">'.$text.'</a>' ;
    
}

add_shortcode('button', 'themeloy_button');


/* ===================================================
 *                    Tab
 * ================================================== */


function themeloy_htab($att, $content)
{
    
  $ul ='<ul class="tabs-nav">';
  $li ='';
  $content = do_shortcode($content);
  $i=0;
  foreach( $GLOBALS['tabs_title'] as $value )
  {
      $i++;
      $li .='<li><a href="#tab'.$i.'">'.$value.'</a></li>';;
  }
  
 
  $tab_content = '';
  if( is_array( $GLOBALS['tabs'] ) ) {	
    
      foreach($GLOBALS['tabs'] as $tab_value)
      {
          $tab_content .= $tab_value;
      }
  }
  $tab_container = '<div class="tabs-container">'.$tab_content.'</div>';
  
  return $ul.$li.'</ul>'.$tab_container;
    
}

add_shortcode('Htab', 'themeloy_htab');


function theme_tab($att, $content)
{
    extract( shortcode_atts(array('title'=>'tab'), $att) ); 
    
    $GLOBALS['tabs_title'][] = $title;
    
    $div = '<div class="tab-content" id="tab'.count($GLOBALS['tabs_title']).'">'.$content.'</div>';   
   
    $GLOBALS['tabs'][] = $div;
    
 
}

add_shortcode('tab', 'theme_tab');


?>
