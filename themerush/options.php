<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tl_back'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

        
        //Background Repeat        
        $bg_repeat = array(            
                'repeat'=>__('Repeat', 'tl_back'),
                'repeat-x'=>__('Repeat X', 'tl_back'),
                'repeat-y'=>__('Repeat Y', 'tl_back'),
                'no-repeat'=>__('No Repeat', 'tl_back')                
        );
        

        //Background Repeat        
        $bg_position = array(            
                'left top'=>__('left top', 'tl_back'),
                'left center'=>__('left center', 'tl_back'),
                'left bottom'=>__('left bottom', 'tl_back'),
                'right top'=>__('right top', 'tl_back'),
                'center top'=>__('center top', 'tl_back'),
                'center center'=>__('center center', 'tl_back'),
                'center bottom'=>__('center bottom', 'tl_back')
        );     


	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'Arial, sans-serif',
		'style' => 'bold',
		'color' => '#333333');
        
        $typography_google_defaults = array(
		'size' => '15px',
		'face' => 'Oswald, sans-serif',
		'style' => 'bold',
		'color' => '#333333');
        
        $os_font = array(
        'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma');
        
	$google_faces = array(
        'none' => 'None',
		'Roboto' => 'Roboto',
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Lobster, cursive' => 'Lobster',
		'Nobile, sans-serif' => 'Nobile',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Rokkitt, serif' => 'Rokkit',
		'PT Sans, sans-serif' => 'PT Sans',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, cursive' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
	);        
		
	
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','13','14','16','18','20','24','28','34' ),
		'faces' =>  false,
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => true
	);
        
	$typograph_h1 = array(
		'size' => '34px',		
		'style' => 'normal',
		'color' => '#333333');
 
	$typograph_h2 = array(
		'size' => '28px',		
		'style' => 'normal',
		'color' => '#333333');    
	$typograph_h3 = array(
		'size' => '24px',		
		'style' => 'normal',
		'color' => '#333333'); 

	$typograph_h4 = array(
		'size' => '18px',		
		'style' => 'normal',
		'color' => '#333333');    
        
	$typograph_h5 = array(
		'size' => '16px',		
		'style' => 'normal',
		'color' => '#333333'); 
        
	$typograph_h6 = array(
		'size' => '13px',		
		'style' => 'normal',
		'color' => '#333333');    
	$typograph_p = array(
		'size' => '13px',		
		'style' => 'normal',
		'color' => '#333333');         
        
	$typography_header = array(
		'sizes' => false,
		'faces' => $os_font,
		'styles' => false,
		'color' => false
	);        
        
       $typography_google_header = array(
		'sizes' => false,
		'faces' => $google_faces,
		'styles' => false,
		'color' => false
	);  

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	
        
	$options_ticker = array();
    $options_ticker[0] = __('Recently Posts', 'tl_back');
	$options_ticker_obj = get_categories();
	foreach ($options_ticker_obj as $category) {
		$options_ticker[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Option sidebar
	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['']='';
	
	if(isset($sidebars)) {
		if(is_array($sidebars)) {			
			foreach($sidebars as $sidebar) {				
				$option_sidebar[$sidebar] = $sidebar;
			}
			
		}
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';

	$options = array();
        
        
        $options[] = array(
		'name' => __('General Setting', 'tl_back'),
		'type' => 'heading');
        $options[] = array(
		'name' => __('Your website logo', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'logo_uploader',
		'type' => 'upload');
        $options[] = array(
		'name' => __('Your website favicon', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'favicon_uploader',
		'type' => 'upload'); 

	$options[] = array(
		'name' => __('Box layout', 'tl_back'),
		'desc' => __('Enable box layout or full width layout in your template.', 'tl_back'),
		'id' => 'box_design',
		'std' => '1',
		'type' => 'checkbox');   
        
	$options[] = array(
		'name' => __('Disable responsive Design', 'tl_back'),
		'desc' => __('Enable or disable responsive layout.', 'tl_back'),
		'id' => 'disable_design',
		'std' => '0',
		'type' => 'checkbox');         

	$options[] = array(
		'name' => __('Disable all review star', 'tl_back'),
		'desc' => __('Enable or disable all review star.', 'tl_back'),
		'id' => 'disable_review',
		'std' => '0',
		'type' => 'checkbox');            

	$options[] = array(
		'name' => __('Disable all user review', 'tl_back'),
		'desc' => __('Enable or disable all user review', 'tl_back'),
		'id' => 'user_disable_review',
		'std' => '0',
		'type' => 'checkbox');    
		
	$options[] = array(
		'name' => __('Disable sticky main menu', 'tl_back'),
		'desc' => __('Enable or disable sticky main menu.', 'tl_back'),
		'id' => 'disable_sticky',
		'std' => '0',
		'type' => 'checkbox');            
        
	$options[] = array(
		'name' => __('Newsticker', 'tl_back'),
		'desc' => __('Enable or disable news ticker on top menu.', 'tl_back'),
		'id' => 'enable_ticker',
		'std' => '1',
		'type' => 'checkbox'); 
	$options[] = array(
		'name' => __('Number of Post in ticker', 'tl_back'),
		'desc' => __('Show number of post in news ticker.', 'tl_back'),
		'id' => 'newsticker_num',
		'std' => '5',	
        'class' => 'mini',
		'type' => 'text');         
	$options[] = array(
		'name' => __('News ticker category', 'tl_back'),
		'desc' => __('Choose category for news ticker.', 'tl_back'),
		'id' => 'ticker_categories',
		'type' => 'select',
		'options' => $options_ticker);
             


	$options[] = array(
		'name' => __('Theme color', 'tl_back'),
		'desc' => __('Choose theme color for your template.', 'tl_back'),
		'id' => 'theme_color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Google analytics code', 'tl_back'),
		'desc' => __('Script for google analytics traffic your website without <script> tags', 'tl_back'),
		'id' => 'tracking_code',
		'std' => '',
		'type' => 'textarea');
        
	$options[] = array(
		'name' => __('Bottom menu', 'tl_back'),
		'desc' => __('Enable or disable your bottom menu.', 'tl_back'),
		'id' => 'enable_menu_bottom',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Top menu', 'tl_back'),
		'desc' => __('Enable or disable your top menu.', 'tl_back'),
		'id' => 'enable_menu_top',
		'std' => '1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Latest update date', 'tl_back'),
		'desc' => __('Enable or disable Date on top left header.', 'tl_back'),
		'id' => 'enable_latest_update_date',
		'std' => '1',
		'type' => 'checkbox');

		
		$options[] = array(
		'name' => __('Follow menu', 'tl_back'),
		'desc' => __('Enable or disable follow menu.', 'tl_back'),
		'id' => 'enable_follow',
		'std' => '1',
		'type' => 'checkbox');
        
	$options[] = array(
		'name' => __('Footer copyright', 'tl_back'),
		'desc' => __('Enable or disable footer copyright.', 'tl_back'),
		'id' => 'copyright',
		'std' => 'Copyright 2013 Themeloy / All rights reserved',
		'type' => 'textarea');
        //End Gerneral setting
    
	
	    //background option
	$options[] = array(
		'name' => __('Background', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => "Background option",
		'desc' => __('Choose background option for your theme', 'tl_back'),
		'id' => "background_option",
		'std' => "background_parttern",
		'type' => "images",
		'options' => array(
			'background_parttern' => $imagepath . 'bg_parttern.png',
			'background_image' => $imagepath . 'bg_big_img.png',
			'background_color_image' => $imagepath . 'bg_color_img.png'
			)
	);
        
	$options[] = array(
		'name' => "Background parttern",
		'desc' => "",
		'id' => "background_parttern",
		'std' => "wood_pattern",
		'type' => "images",
		'options' => array(
			'black_lozenge' => $imagepath . 'parttern/black_lozenge.png',
			'lghtmesh' => $imagepath . 'parttern/lghtmesh.png',
			'nasty_fabric' => $imagepath . 'parttern/nasty_fabric.png',
			'purty_wood' => $imagepath . 'parttern/purty_wood.png',
			'retina_wood' => $imagepath . 'parttern/retina_wood.png',
			'subtle_stripes' => $imagepath . 'parttern/subtle_stripes.png',
			'vertical_cloth' => $imagepath . 'parttern/vertical_cloth.png',
			'wild_oliva' => $imagepath . 'parttern/wild_oliva.png',
			'wood_pattern' => $imagepath . 'parttern/wood_pattern.png',
			'black_scales' => $imagepath . 'parttern/black_scales.png',
			'cartographer' => $imagepath . 'parttern/cartographer.png',
			'dark_wood' => $imagepath . 'parttern/dark_wood.png',
			'diagmonds' => $imagepath . 'parttern/diagmonds.png',
			'diamond_upholstery' => $imagepath . 'parttern/diamond_upholstery.png',
			'gplaypattern' => $imagepath . 'parttern/gplaypattern.png',
			'noisy_grid' => $imagepath . 'parttern/noisy_grid.png',
			'shattered' => $imagepath . 'parttern/shattered.png',
			'tasky_pattern' => $imagepath . 'parttern/tasky_pattern.png',
			'use_your_illusion' => $imagepath . 'parttern/use_your_illusion.png',
			'white_carbonfiber' => $imagepath . 'parttern/white_carbonfiber.png'
			)
	);
	
	    $options[] = array(
		'name' => __('Background large Image', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_large_image',
		'type' => 'upload');  


		$options[] = array(
		'name' => __('Background color or background .png with color', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_color_png',
		'std' => '',
		'type' => 'color' );


	    $options[] = array(
		'name' => __('', 'tl_back'),
		'desc' => __('', 'tl_back'),
		'id' => 'background_color_img_png',
		'type' => 'upload');  
	    
        
        $wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
        //End background option
	
	    
        
        //Layout
	$options[] = array(
		'name' => __('Layout', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => __('Sidebar Center width 350px', 'tl_back'),
		'desc' => __('Enable or disable sidebar center width 350px in your template.', 'tl_back'),
		'id' => 'sidebar_center_width',
		'std' => '0',
		'type' => 'checkbox');  
		
		
		$options[] = array(
		'name' => __("Home page Layout",'tl_back'),
		'desc' => __("Layout for home page two sidebar or one sidebar.", 'tl_back'),
		'id' => "home_page_layout",
		'std' => "2c-r1-fixed",
		'type' => "images",
		'options' => array(
			'2c-r-fixed' => $imagepath . '2cr.png',
			'2c-r1-fixed' => $imagepath . '2cr1.png'
			)
	);
	 
	 	 
		           
	$options[] = array(
		'name' => __("Single Post Layout",'tl_back'),
		'desc' => __("Layout for single post two sidebar or one sidebar.", 'tl_back'),
		'id' => "post_layout",
		'std' => "2c-r1-fixed",
		'type' => "images",
		'options' => array(
			'2c-r-fixed' => $imagepath . '2cr.png',
			'2c-r1-fixed' => $imagepath . '2cr1.png'
			)
	);
        
	$options[] = array(
		'name' => __("Other post page",'tl_back'),
		'desc' => __("Layout For category page, search page, not found page and tag page.", 'tl_back'),
		'id' => "cat_layout",
		'std' => "2c-r1-fixed",
		'type' => "images",
		'options' => array(
			'2c-r-fixed' => $imagepath . '2cr.png',
			'2c-r1-fixed' => $imagepath . '2cr1.png'
			)
	);


        //End layout option
    
	$options[] = array(
		'name' => __('Menu color', 'tl_back'),
		'type' => 'heading');   

	$options[] = array(
		'name' => __('home-color', 'tl_back'),
		'desc' => __('home page border color menu.', 'tl_back'),
		'id' => 'home_menu_color',
		'std' => '#3f4457',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('color-1', 'tl_back'),
		'desc' => __('color class name "color-1" just add to menu class', 'tl_back'),
		'id' => 'menu_color1',
		'std' => '#ee1c24',
		'type' => 'color' );   
		
	$options[] = array(
		'name' => __('color-2', 'tl_back'),
		'desc' => __('color class name "color-2" just add to menu class', 'tl_back'),
		'id' => 'menu_color2',
		'std' => '#007236',
		'type' => 'color' );     	
		
	$options[] = array(
		'name' => __('color-3', 'tl_back'),
		'desc' => __('color class name "color-3" just add to menu class', 'tl_back'),
		'id' => 'menu_color3',
		'std' => '#ebb424',
		'type' => 'color' );  
            
	$options[] = array(
		'name' => __('color-4', 'tl_back'),
		'desc' => __('color class name "color-4" just add to menu class', 'tl_back'),
		'id' => 'menu_color4',
		'std' => '#8c6239',
		'type' => 'color' ); 
		
	$options[] = array(
		'name' => __('color-5', 'tl_back'),
		'desc' => __('color class name "color-5" just add to menu class', 'tl_back'),
		'id' => 'menu_color5',
		'std' => '#0072bc',
		'type' => 'color' ); 
		
	$options[] = array(
		'name' => __('color-6', 'tl_back'),
		'desc' => __('color class name "color-6" just add to menu class', 'tl_back'),
		'id' => 'menu_color6',
		'std' => '#f26522',
		'type' => 'color' ); 

	$options[] = array(
		'name' => __('color-7', 'tl_back'),
		'desc' => __('color class name "color-7" just add to menu class', 'tl_back'),
		'id' => 'menu_color7',
		'std' => '#ed008c',
		'type' => 'color' ); 
		
	$options[] = array(
		'name' => __('color-8', 'tl_back'),
		'desc' => __('color class name "color-8" just add to menu class', 'tl_back'),
		'id' => 'menu_color8',
		'std' => '#fba546',
		'type' => 'color' ); 
		
    $options[] = array(
		'name' => __('color-9', 'tl_back'),
		'desc' => __('color class name "color-9" just add to menu class', 'tl_back'),
		'id' => 'menu_color9',
		'std' => '#39b54a',
		'type' => 'color' ); 
		
    $options[] = array(
		'name' => __('color-10', 'tl_back'),
		'desc' => __('color class name "color-10" just add to menu class', 'tl_back'),
		'id' => 'menu_color10',
		'std' => '#39b54a',
		'type' => 'color' ); 
		
		
       //Typography
    $options[] = array(
		'name' => __('Typography', 'tl_back'),
		'type' => 'heading');   
        
    $options[] = array(
		'name' => __('Header Font', 'tl_back'),
		'desc' => __('Header font family.', 'tl_back'),
		'id' => "header_font",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_header); 
        
    $options[] = array(
		'name' => __('Header Google Font', 'tl_back'),
		'desc' => __('Header font family.', 'tl_back'),
		'id' => "header_google_font",
		'std' => $typography_google_defaults,
		'type' => 'typography',
		'options' => $typography_google_header);  
        
	$options[] = array(
		'name' => __('H1 Typography', 'tl_back'),
		'desc' => __('H1 Typography.', 'tl_back'),
		'id' => "h1_typ",
		'std' => $typograph_h1,
		'type' => 'typography',
		'options' => $typography_options );  
	$options[] = array(
		'name' => __('H2 Typography', 'tl_back'),
		'desc' => __('H2 Typography.', 'tl_back'),
		'id' => "h2_typ",
		'std' => $typograph_h2,
		'type' => 'typography',
		'options' => $typography_options );     
	$options[] = array(
		'name' => __('H3 Typography', 'tl_back'),
		'desc' => __('H3 Typography.', 'tl_back'),
		'id' => "h3_typ",
		'std' => $typograph_h3,
		'type' => 'typography',
		'options' => $typography_options );   
	$options[] = array(
		'name' => __('H4 Typography', 'tl_back'),
		'desc' => __('H4 Typography.', 'tl_back'),
		'id' => "h4_typ",
		'std' => $typograph_h4,
		'type' => 'typography',
		'options' => $typography_options ); 
	$options[] = array(
		'name' => __('H5 Typography', 'tl_back'),
		'desc' => __('H5 Typography.', 'tl_back'),
		'id' => "h5_typ",
		'std' => $typograph_h5,
		'type' => 'typography',
		'options' => $typography_options );       
	$options[] = array(
		'name' => __('H6 Typography', 'tl_back'),
		'desc' => __('H6 Typography.', 'tl_back'),
		'id' => "h6_typ",
		'std' => $typograph_h6,
		'type' => 'typography',
		'options' => $typography_options );   
        
	$options[] = array(
		'name' => __('Paragraph Typography', 'tl_back'),
		'desc' => __('Paragraph Typography.', 'tl_back'),
		'id' => "p_typ",
		'std' => $typograph_p,
		'type' => 'typography',
		'options' => $typography_options );  
        //end typography
        
        //Blog
	$options[] = array(
		'name' => __('Blog', 'tl_back'),
		'type' => 'heading');   


	$options[] = array(
		'name' => __('Disable All review post', 'tl_back'),
		'desc' => __('Disable all review from post', 'tl_back'),
		'id' => 'enable_all_review',
		'std' => '0',                
		'type' => 'checkbox');
        
	$options[] = array(
		'name' => __('Disable Related post', 'tl_back'),
		'desc' => __('Disable related post below the post', 'tl_back'),
		'id' => 'blog_related',
		'std' => '0',                
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Hide date in related post', 'tl_back'),
		'desc' => __('Hide post date in related post', 'tl_back'),
		'id' => 'blog_related_date',
		'std' => '0',                
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Enable Feature Image on Post Content', 'tl_back'),
		'desc' => __('Enable Feature Image on Post Content', 'tl_back'),
		'id' => 'blog_post_feautre',
		'std' => '0',                
		'type' => 'checkbox');
        
	$options[] = array(
		'name' => __('Number of related post', 'tl_back'),
		'desc' => __('Amount of post that you wnat to show in related post box', 'tl_back'),
		'id' => 'blog_related_num',
		'std' => '4',	
        'class' => 'mini',
		'type' => 'text'); 
        

	$options[] = array(
		'name' => __('Disable more in this category', 'tl_back'),
		'desc' => __('Disable more in this category below the post', 'tl_back'),
		'id' => 'blog_cat',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Hide post date in more in this category box', 'tl_back'),
		'desc' => __('Hide post date more in this category below the post', 'tl_back'),
		'id' => 'blog_cat_date',
		'std' => '0',
		'type' => 'checkbox');    
        
	$options[] = array(
		'name' => __('Number of more in this category post', 'tl_back'),
		'desc' => __('Amount of post that you wnat to show in more in this category post box', 'tl_back'),
		'id' => 'blog_cat_num',
		'std' => '4',
         'class' => 'mini',
		'type' => 'text'); 
        
	$options[] = array(
		'name' => __('Hide Author Profile', 'tl_back'),
		'desc' => __('Hide author profile box', 'tl_back'),
		'id' => 'blog_author',
		'std' => '0',
		'type' => 'checkbox');   
	$options[] = array(
		'name' => __('Disable Next and Previous post', 'tl_back'),
		'desc' => __('Hide next and previous post in single post or article', 'tl_back'),
		'id' => 'blog_nav',
		'std' => '0',
		'type' => 'checkbox');    
        
        //Social Media
	$options[] = array(
		'name' => __('Social Media', 'tl_back'),
		'type' => 'heading'); 
        
	$options[] = array(
		'name' => __('Facebook', 'tl_back'),
		'desc' => __('Facebook URL', 'tl_back'),
		'id' => 'facebook_url',
		'std' => '#',		
		'type' => 'text'); 

	$options[] = array(
		'name' => __('Twitter', 'tl_back'),
		'desc' => __('Twitter URL', 'tl_back'),
		'id' => 'twitter_url',
		'std' => '#',		
		'type' => 'text'); 
        
	$options[] = array(
		'name' => __('GooglePlus', 'tl_back'),
		'desc' => __('Google Plus URL', 'tl_back'),
		'id' => 'gplus_url',
		'std' => '#',		
		'type' => 'text');  
		
	$options[] = array(
		'name' => __('Google', 'tl_back'),
		'desc' => __('Google  URL', 'tl_back'),
		'id' => 'google_url',
		'std' => '#',		
		'type' => 'text');         
        
	$options[] = array(
		'name' => __('RSS', 'tl_back'),
		'desc' => __('Feed URL', 'tl_back'),
		'id' => 'rss_url',
		'std' => '#',		
		'type' => 'text');   
        
	$options[] = array(
		'name' => __('Pinterest', 'tl_back'),
		'desc' => __('Pinterest URL', 'tl_back'),
		'id' => 'pin_url',
		'std' => '#',		
		'type' => 'text');        
	$options[] = array(
		'name' => __('LinkedIn', 'tl_back'),
		'desc' => __('Linkedin URL', 'tl_back'),
		'id' => 'linked_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Behance', 'tl_back'),
		'desc' => __('Behance URL', 'tl_back'),
		'id' => 'behance_url',
		'std' => '#',		
		'type' => 'text');       
	$options[] = array(
		'name' => __('Dribbble', 'tl_back'),
		'desc' => __('Dribbble URL', 'tl_back'),
		'id' => 'dribbble_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Evernote', 'tl_back'),
		'desc' => __('Evernote URL', 'tl_back'),
		'id' => 'evernote_url',
		'std' => '#',		
		'type' => 'text');  	
	$options[] = array(
		'name' => __('Grooveshark', 'tl_back'),
		'desc' => __('Grooveshark URL', 'tl_back'),
		'id' => 'grooveshark_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Instagram', 'tl_back'),
		'desc' => __('Instagram URL', 'tl_back'),
		'id' => 'instagram_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Vimeo', 'tl_back'),
		'desc' => __('Vimeo URL', 'tl_back'),
		'id' => 'vimeo_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('WordPress', 'tl_back'),
		'desc' => __('WordPress URL', 'tl_back'),
		'id' => 'wordpress_url',
		'std' => '#',		
		'type' => 'text');  
	$options[] = array(
		'name' => __('Youtube', 'tl_back'),
		'desc' => __('Youtube URL', 'tl_back'),
		'id' => 'youtube_url',
		'std' => '#',		
		'type' => 'text');  

		
    $options[] = array(
		'name' => __('Enable Facebook Share', 'tl_back'),
		'desc' => __('Enable Facebook Share in single post', 'tl_back'),
		'id' => 'share_facebook',
		'std' => '1',                
		'type' => 'checkbox');
       	$options[] = array(
		'name' => __('Enable Twitter Share', 'tl_back'),
		'desc' => __('Enable Twitter Share in single post', 'tl_back'),
		'id' => 'share_twitter',
		'std' => '1',                
		'type' => 'checkbox');
       	$options[] = array(
		'name' => __('Enable GooglePlus Share', 'tl_back'),
		'desc' => __('Enable GooglePlus Share in single post', 'tl_back'),
		'id' => 'share_googleplus',
		'std' => '1',                
		'type' => 'checkbox');    
		
		 $options[] = array(
		'name' => __('Enable linkedin Share', 'tl_back'),
		'desc' => __('Enable linkedin Share in single post', 'tl_back'),
		'id' => 'share_linkedin',
		'std' => '1',                
		'type' => 'checkbox');    
		
		 $options[] = array(
		'name' => __('Enable Pinterest Share', 'tl_back'),
		'desc' => __('Enable Pinterest Share in single post', 'tl_back'),
		'id' => 'share_pin',
		'std' => '1',                
		'type' => 'checkbox');    
		   
        
		$options[] = array(
		'name' => __('Text', 'tl_back'),
		'type' => 'heading');   
        
		$options[] = array(
		'name' => __('Term Latest', 'tl_back'),
		'desc' => __('Latest News for news ticker', 'tl_back'),
		'id' => 'term_latest',
		'std' => 'Latest News',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term Update', 'tl_back'),
		'desc' => __('Latest update', 'tl_back'),
		'id' => 'term_up',
		'std' => 'Latest update',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term Follow', 'tl_back'),
		'desc' => __('follow', 'tl_back'),
		'id' => 'term_follow',
		'std' => 'follow',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term Related', 'tl_back'),
		'desc' => __('Related', 'tl_back'),
		'id' => 'rela_articles',
		'std' => 'Related articles',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term review', 'tl_back'),
		'desc' => __('Review', 'tl_back'),
		'id' => 'term_review',
		'std' => 'Reviews',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Term more in this category', 'tl_back'),
		'desc' => __('More in this category', 'tl_back'),
		'id' => 'term_cat',
		'std' => 'More in this category',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Text Description on 404 Page / Not found page', 'tl_back'),
		'desc' => __("Text description on not found page", 'tl_back'),
		'id' => 'term_404',
		'std' => "The page you are looking for doesn't seem to exist.",
		'type' => 'textarea');
		
		$options[] = array(
		'name' => __('Custom CSS', 'tl_back'),
		'type' => 'heading');   
		
		$options[] = array(
		'name' => __('Custom CSS', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbols '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 1190px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_1190',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 959px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_959',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS max screen 767px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_767',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Custom CSS screen 480px to 767px', 'tl_back'),
		'desc' => __("Your CSS style go here. without symbol '&gt; ' or '&lt;'", 'tl_back'),
		'id' => 'custom_style_480',
		'std' => "",		
		'type' => 'textarea'		
		);
		
		$options[] = array(
		'name' => __('Dynamic sidebar', 'tl_back'),
		'type' => 'heading'); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'pg_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Post', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'po_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Archive page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'ar_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Categories page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'cat_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Tags page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'tag_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Author page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'au_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 	
		
		$options[] = array(
		'name' => __('Choose Dynamic sidebar for Search page', 'tl_back'),
		'desc' => __('Choose sidebar .', 'tl_back'),
		'id' => 'se_sidebar',
		'type' => 'select',
		'options' =>$option_sidebar); 		
		
		
	
		$options[] = array(
		'name'=>__('Dynamic sidebar for each categories'),
		'type'=>'toggle open',
		'id' =>'toggle'
		);
		
		foreach ($options_categories_obj as $category) {
		
		$cat_name = 'cat_'.$category->cat_ID;		
		
		$options[] = array(
		'name' => __(sprintf('Choose siddebar for category "%s"',$category->cat_name), 'tl_back'),
		'desc' => __('choose sidebar', 'tl_back'),
		'id' => $cat_name,
		'std' => 'Choose sidebar',
		'type' => 'select',
		'options' =>$option_sidebar);		
		
		}
		
		$options[] = array(
		'name'=>__('Dynamic for each categories'),
		'type'=>'toggle close',
		'id' =>'tog'
		);
		
		
		$options[] = array(
		'name'=>__('Dynamic sidebar for each tags'),
		'type'=>'toggle open',
		'id' =>'toggle-tag'
		);
		
		foreach ($options_tags_obj as $tag) {
		
		$tag_name = 'tag_'.$tag->term_id;		
		
		$options[] = array(
		'name' => __(sprintf('Choose sidebar for tag "%s"',$tag->name), 'tl_back'),
		'desc' => __('choose sidebar for tag', 'tl_back'),
		'id' => $tag_name,
		'std' => 'Choose sidebar',
		'type' => 'select',
		'options' =>$option_sidebar);				
		}		
		
		$options[] = array(
		'name'=>__('Dynamic for each categories'),
		'type'=>'toggle close',
		'id' =>'toggle-tag'
		);
	
	
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {


jQuery('#background_option_background_parttern').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern').show();
		jQuery('#section-background_large_image, #section-background_color_png, #section-background_color_img_png').hide();
});
	
jQuery('#background_option_background_image').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern, #section-background_color_png, #section-background_color_img_png').hide();
		jQuery('#section-background_large_image').show();
});

jQuery('#background_option_background_color_image').next('div').next('img').click(function() {
  		jQuery('#section-background_parttern, #section-background_large_image').hide();
		jQuery('#section-background_color_png, #section-background_color_img_png').show();
});

if (jQuery('#background_option_background_parttern:checked').val() !== undefined) {
		jQuery('#section-background_parttern').show();
		jQuery('#section-background_large_image, #section-background_color_png, #section-background_color_img_png').hide();
}

if (jQuery('#background_option_background_image:checked').val() !== undefined) {
		jQuery('#section-background_parttern, #section-background_color_png, #section-background_color_img_png').hide();
		jQuery('#section-background_large_image').show();
}

if (jQuery('#background_option_background_color_image:checked').val() !== undefined) {
		jQuery('#section-background_parttern, #section-background_large_image').hide();
		jQuery('#section-background_color_png, #section-background_color_img_png').show();
}
	

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}