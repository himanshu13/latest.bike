<!DOCTYPE html>
<html>
    <head>
        <title><?php if (isset($_GET['get'])) echo $_GET['get']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script type="text/javascript" src="jquery.min.js"></script>  
        <script type="text/javascript" src="tiny_mce_popup.js?ver=3223"></script>
        <link href="css/shortcode.css" type="text/css" rel="stylesheet" />

        <style>
            ul li{
                cursor: pointer;
            }
            .buttonshow{
                width:200px;
                float: left;
            }
            .buttonbig{
                width:200px;
                float:left;

            }
            .iconsdiv {width: 250px; float: left;}
            .buttonbig a, .buttonshow a{
                color:#FFF;
                margin-top: 10px;

            }
            table tr td label{
                margin-right: 20px;
            }
            table tr td input{
                padding:5px;
            }
            table tr td img{
                border: 1px solid #DDD;
                cursor: pointer;
            }

            .error{
                cursor: pointer;
            }

        </style>
        <script>
            function  parseShortcode(shortcode) {
	    
                var shortcode_value = jQuery('#'+shortcode).html();
	    
                window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, shortcode_value);
                window.tinyMCE.activeEditor.execCommand('mceRepaint');
                tinyMCEPopup.close();
            }            
            
            function parseList(objlist)
            {
                var shortcode_value = '[ul class="' + objlist +'"] \n[li]List_1[/li]  \n[li] List_2 [/li][/ul]';
	    
                window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, shortcode_value);
                window.tinyMCE.activeEditor.execCommand('mceRepaint');
                tinyMCEPopup.close();
            }
            
            function parseCols(columns)
            {
                var colum_value='';
                switch(columns){
                  
                    case 2:
                        colum_value ='<div class="column-a" style="width:'+jQuery("#firsta").val()+'px;">column a</div><div class="column-b" style="width:'+jQuery("#firstb").val()+'px;">column b</div>&nbsp;';
                        break;
                    case 3:
                        colum_value ='<div class="column-a" style="width:'+jQuery("#seconda").val()+'px;">column a</div><div class="column-b" style="width:'+jQuery("#secondb").val()+'px;">column b</div><div class="column-c" style="width:'+jQuery("#secondc").val()+'px;">column c</div>&nbsp;';
                        break;
                    case 4:
                        colum_value ='<div class="column-a" style="width:'+jQuery("#thirda").val()+'px;">column a</div><div class="column-b" style="width:'+jQuery("#thirdb").val()+'px;">column b</div><div class="column-c" style="width:'+jQuery("#thirdc").val()+'px;">column c</div><div class="column-d" style="width:'+jQuery("#thirdd").val()+'px;">column d</div>&nbsp;';
                        break;
                  
                }
                window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, colum_value);
                window.tinyMCE.activeEditor.execCommand('mceRepaint');
                tinyMCEPopup.close();
              
            }
          
            
          
        </script>

    </head>
    <body>




        <?php if (isset($_GET['list'])): ?>
            <h2>Choose List Style Below By Click</h2>
            <div style="width:200px; float:left;">
                <ul class="list-arrow_blue" onClick="parseList('list list-arrow_blue');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-arrow_blue_1" onClick="parseList('list list-arrow_blue_1');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-arrow_blue_2"  onClick="parseList('list list-arrow_blue_2');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-arrow_blue_3" onClick="parseList('list list-arrow_blue_3');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-cross_black" onClick="parseList('list list-cross_black');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>

                <ul class="list-cross_red" onClick="parseList('list list-cross_red');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>

                <ul class="list-minus_black" onClick="parseList('list list-minus_black');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-minus_red" onClick="parseList('list list-minus_red');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-minus_red_2" onClick="parseList('list list-minus_red_2');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>


                <ul class="list-tick_blue" onClick="parseList('list list-tick_blue');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-tick_green" onClick="parseList('list list-tick_green');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-zoom" onClick="parseList('list list-zoom');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
            </div>


            <div style="width:200px; float:right" >
                <ul class="list-calendar_black" onClick="parseList('list list-calendar_black');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-calendar_red" onClick="parseList('list list-calendar_red');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-calendar_task" onClick="parseList('list list-calendar_task');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-clipboard" onClick="parseList('list list-clipboard');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-folder" onClick="parseList('list list-folder');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-folder_open" onClick="parseList('list list-folder_open');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-plus" onClick="parseList('list list-plus');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-point" onClick="parseList('list list-point');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-search" onClick="parseList('list list-search');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-star_black" onClick="parseList('list list-star_black');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
                <ul class="list-star_blue" onClick="parseList('list list-star_blue');">
                    <li>List item 1</li>
                    <li>List item 2</li>
                </ul>
            </div>


        <?php endif; ?>

        <?php if (isset($_GET['button'])): ?>
            <h2>Choose Button by click</h2>

            <div class="buttonshow"  onClick="parseShortcode('btn_smallgray');">
                <a href="#" class="btn_smallgray">Small Button</a>
                <span id="btn_smallgray" style="display: none;">[button class="btn_smallgray" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smallred');">
                <a href="#" class="btn_smallred">Small Button</a>
                <span id="btn_smallred" style="display: none;">[button class="btn_smallred" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smallgreen');">
                <a href="#" class="btn_smallgreen">Small Button</a>
                <span id="btn_smallgreen" style="display: none;">[button class="btn_smallgreen" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smallblue');">
                <a href="#" class="btn_smallblue">Small Button</a>
                <span id="btn_smallblue" style="display: none;">[button class="btn_smallblue" url="#" text="button"]</span>
            </div>
            <div class="buttonshow"  onClick="parseShortcode('btn_smallgold');">
                <a href="#" class="btn_smallgold">Small Button</a>
                <span id="btn_smallgold" style="display: none;">[button class="btn_smallgold" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smallviolet');">
	            <a href="#" class="btn_smallviolet">Small Button</a>
                <span id="btn_smallviolet" style="display: none;">[button class="btn_smallviolet" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smallvio');">
                <a href="#" class="btn_smallvio">Small Button</a>
                <span  id="btn_smallvio" style="display: none;">[button class="btn_smallvio" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smalllightgreen');">
                <a href="#" class="btn_smalllightgreen">Small Button</a>
                <span id="btn_smalllightgreen" style="display: none;">[button class="btn_smalllightgreen" url="#" text="button"]</span>
            </div>
            <div class="buttonshow" onClick="parseShortcode('btn_smalllightgold');">
                <a href="#" class="btn_smalllightgold">Small Button</a>
                 <span id="btn_smalllightgold" style="display: none;">[button class="btn_smalllightgold" url="#" text="button"]</span>
            </div>
            <div class="buttonshow"  onClick="parseShortcode('btn_smallwhite');">
                <a href="#" class="btn_smallwhite">Small Button</a>
                <span id="btn_smallwhite" style="display: none;">[button class="btn_smallwhite" url="#" text="button"]</span>
            </div>

            <div class="buttonbig" onClick="parseShortcode('btn_biggray');">
                <a href="#" class="btn_biggray">Big Button</a>
                 <span id="btn_biggray" style="display: none;">[button class="btn_biggray" url="#" text="button"]</span>
            </div>

            <div class="buttonbig" onClick="parseShortcode('btn_bigred');">
                <a href="#" class="btn_bigred">Big Button</a>
                 <span id="btn_bigred" style="display: none;">[button class="btn_bigred" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_biggreen');">
                <a href="#" class="btn_biggreen">Big Button</a>
                 <span id="btn_biggreen" style="display: none;">[button class="btn_biggreen" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_bigblue');">
                <a href="#" class="btn_bigblue">Big Button</a>
                 <span  id="btn_bigblue" style="display: none;">[button class="btn_bigblue" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_biggold');">
                <a href="#" class="btn_biggold">Big Button</a>
                 <span  id="btn_biggold" style="display: none;">[button class="btn_biggold" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_bigviolet');">
                <a href="#" class="btn_bigviolet">Big Button</a>
                <span  id="btn_bigviolet" style="display: none;">[button class="btn_bigviolet" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_bigvio');">
                <a href="#" class="btn_bigvio">Big Button</a>
                <span id="btn_bigvio"  style="display: none;">[button class="btn_bigvio" url="#" text="button"]</span>
            </div>
            <div class="buttonbig"  onClick="parseShortcode('btn_biglightgreen');">
                <a href="#" class="btn_biglightgreen">Big Button</a>
                 <span id="btn_biglightgreen"  style="display: none;">[button class="btn_biglightgreen" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_biglightgold');">
                <a href="#" class="btn_biglightgold">Big Button</a>
                <span id="btn_biglightgold"  style="display: none;">[button class="btn_biglightgold" url="#" text="button"]</span>
            </div>
            <div class="buttonbig" onClick="parseShortcode('btn_bigwhite');">
                <a href="#" class="btn_bigwhite">Big Button</a>
                <span  id="btn_bigwhite" style="display: none;">[button class="btn_bigwhite" url="#" text="button"]</span>              
            </div>

        <?php endif; ?>


        <?php if (isset($_GET['info'])): ?>

            <h2>Notification</h2>

            <div id="info_warning" onClick="parseShortcode('pastinfo_warning')">
                <div class="alert">
                    <i class="icon-warning-sign"></i>
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    Alert warning
                </div>
                <div id="pastinfo_warning" style="display:none">[info_warning]warning[/info_warning]</div>
            </div>

            <div id="info_error" onClick="parseShortcode('pastinfo_error')">
                <div class="alert alert-error">
                    <i class="icon-remove-sign"></i>
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    Change a few things up and try submitting again.
                </div>
                <div id="pastinfo_error" style="display:none">[info_error]error[/info_error]</div>
            </div>

            <div id="info_success" onClick="parseShortcode('pastinfo_success')">
                <div class="alert alert-success">
                    <span class=" icon-check"></span>
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    You successfully read this important alert message.
                </div>
                <div id="pastinfo_success" style="display:none">[info_success]success[/info_success]</div>
            </div>

            <div id="info" onClick="parseShortcode('pastinfo')">
                <div class="alert alert-info">
                    <i class="icon-info-sign"></i>
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    This alert needs your attention, but it's not super important.
                </div>
                <div id="pastinfo" style="display:none">[info]info[/info]</div>
            </div>

            &nbsp;
        <?php endif; ?>

        <?php if (isset($_GET['icons'])): ?>     
            <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">              
            <style> i{ font-size: 18px; } ul { list-style: none; } ul li { margin-bottom: 5px;}</style>
            <script>
                jQuery("document").ready(function(){
                    $(".the-icons li").click(function(){
                        var shortcode_value = '[icons icon_name="' + $(this).find('i').attr('class') + '" icon_size="14px"]';
                                        window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, shortcode_value);
                window.tinyMCE.activeEditor.execCommand('mceRepaint');
                tinyMCEPopup.close();
                    });
                });
             </script>
            <div class="iconsdiv"> 
                <ul class="the-icons">
                    <li><i class="icon-adjust"></i> icon-adjust</li>
                    <li><i class="icon-asterisk"></i> icon-asterisk</li>
                    <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
                    <li><i class="icon-bar-chart"></i> icon-bar-chart</li>
                    <li><i class="icon-barcode"></i> icon-barcode</li>
                    <li><i class="icon-beaker"></i> icon-beaker</li>
                    <li><i class="icon-beer"></i> icon-beer</li>
                    <li><i class="icon-bell"></i> icon-bell</li>
                    <li><i class="icon-bell-alt"></i> icon-bell-alt</li>
                    <li><i class="icon-bolt"></i> icon-bolt</li>
                    <li><i class="icon-book"></i> icon-book</li>
                    <li><i class="icon-bookmark"></i> icon-bookmark</li>
                    <li><i class="icon-bookmark-empty"></i> icon-bookmark-empty</li>
                    <li><i class="icon-briefcase"></i> icon-briefcase</li>
                    <li><i class="icon-bullhorn"></i> icon-bullhorn</li>
                    <li><i class="icon-calendar"></i> icon-calendar</li>
                    <li><i class="icon-camera"></i> icon-camera</li>
                    <li><i class="icon-camera-retro"></i> icon-camera-retro</li>
                    <li><i class="icon-certificate"></i> icon-certificate</li>
                    <li><i class="icon-check"></i> icon-check</li>
                    <li><i class="icon-check-empty"></i> icon-check-empty</li>
                    <li><i class="icon-circle"></i> icon-circle</li>
                    <li><i class="icon-circle-blank"></i> icon-circle-blank</li>
                    <li><i class="icon-cloud"></i> icon-cloud</li>
                    <li><i class="icon-cloud-download"></i> icon-cloud-download</li>
                    <li><i class="icon-cloud-upload"></i> icon-cloud-upload</li>
                    <li><i class="icon-coffee"></i> icon-coffee</li>
                    <li><i class="icon-cog"></i> icon-cog</li>
                    <li><i class="icon-cogs"></i> icon-cogs</li>
                    <li><i class="icon-comment"></i> icon-comment</li>
                    <li><i class="icon-comment-alt"></i> icon-comment-alt</li>
                    <li><i class="icon-comments"></i> icon-comments</li>
                    <li><i class="icon-comments-alt"></i> icon-comments-alt</li>
                    <li><i class="icon-credit-card"></i> icon-credit-card</li>
                    <li><i class="icon-dashboard"></i> icon-dashboard</li>
                    <li><i class="icon-desktop"></i> icon-desktop</li>
                    <li><i class="icon-download"></i> icon-download</li>
                    <li><i class="icon-download-alt"></i> icon-download-alt</li>        
                    <li><i class="icon-edit"></i> icon-edit</li>
                    <li><i class="icon-envelope"></i> icon-envelope</li>
                    <li><i class="icon-envelope-alt"></i> icon-envelope-alt</li>
                    <li><i class="icon-exchange"></i> icon-exchange</li>
                    <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
                    <li><i class="icon-external-link"></i> icon-external-link</li>
                    <li><i class="icon-eye-close"></i> icon-eye-close</li>
                    <li><i class="icon-eye-open"></i> icon-eye-open</li>
                    <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
                    <li><i class="icon-fighter-jet"></i> icon-fighter-jet</li>
                    <li><i class="icon-film"></i> icon-film</li>
                    <li><i class="icon-filter"></i> icon-filter</li>
                    <li><i class="icon-fire"></i> icon-fire</li>
                    <li><i class="icon-flag"></i> icon-flag</li>
                    <li><i class="icon-folder-close"></i> icon-folder-close</li>
                    <li><i class="icon-folder-open"></i> icon-folder-open</li>
                    <li><i class="icon-folder-close-alt"></i> icon-folder-close-alt</li>
                    <li><i class="icon-folder-open-alt"></i> icon-folder-open-alt</li>
                    <li><i class="icon-food"></i> icon-food</li>
                    <li><i class="icon-gift"></i> icon-gift</li>
                    <li><i class="icon-glass"></i> icon-glass</li>
                    <li><i class="icon-globe"></i> icon-globe</li>
                    <li><i class="icon-group"></i> icon-group</li>
                    <li><i class="icon-hdd"></i> icon-hdd</li>
                    <li><i class="icon-headphones"></i> icon-headphones</li>
                    <li><i class="icon-heart"></i> icon-heart</li>
                    <li><i class="icon-heart-empty"></i> icon-heart-empty</li>
                    <li><i class="icon-home"></i> icon-home</li>
                    <li><i class="icon-inbox"></i> icon-inbox</li>
                    <li><i class="icon-info-sign"></i> icon-info-sign</li>
                    <li><i class="icon-key"></i> icon-key</li>
                    <li><i class="icon-leaf"></i> icon-leaf</li>
                    <li><i class="icon-laptop"></i> icon-laptop</li>
                    <li><i class="icon-legal"></i> icon-legal</li>
                    <li><i class="icon-lemon"></i> icon-lemon</li>
                    <li><i class="icon-lightbulb"></i> icon-lightbulb</li>
                    <li><i class="icon-lock"></i> icon-lock</li>
                    <li><i class="icon-unlock"></i> icon-unlock</li>
                    <li><i class="icon-magic"></i> icon-magic</li>
                    <li><i class="icon-magnet"></i> icon-magnet</li>
                    <li><i class="icon-map-marker"></i> icon-map-marker</li>
                    <li><i class="icon-minus"></i> icon-minus</li>
                    <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
                    <li><i class="icon-mobile-phone"></i> icon-mobile-phone</li>
                    <li><i class="icon-money"></i> icon-money</li>
                    <li><i class="icon-move"></i> icon-move</li>
                    <li><i class="icon-music"></i> icon-music</li>
                    <li><i class="icon-off"></i> icon-off</li>
                    <li><i class="icon-ok"></i> icon-ok</li>
                    <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
                    <li><i class="icon-ok-sign"></i> icon-ok-sign</li>
                    <li><i class="icon-pencil"></i> icon-pencil</li>
                    <li><i class="icon-picture"></i> icon-picture</li>
                    <li><i class="icon-plane"></i> icon-plane</li>
                    <li><i class="icon-plus"></i> icon-plus</li>
                    <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
                    <li><i class="icon-print"></i> icon-print</li>
                    <li><i class="icon-pushpin"></i> icon-pushpin</li>
                    <li><i class="icon-qrcode"></i> icon-qrcode</li>
                    <li><i class="icon-question-sign"></i> icon-question-sign</li>
                    <li><i class="icon-quote-left"></i> icon-quote-left</li>
                    <li><i class="icon-quote-right"></i> icon-quote-right</li>
                    <li><i class="icon-random"></i> icon-random</li>
                    <li><i class="icon-refresh"></i> icon-refresh</li>
                    <li><i class="icon-remove"></i> icon-remove</li>
                    <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
                    <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
                    <li><i class="icon-reorder"></i> icon-reorder</li>
                    <li><i class="icon-reply"></i> icon-reply</li>
                    <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
                    <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
                    <li><i class="icon-retweet"></i> icon-retweet</li>
                    <li><i class="icon-road"></i> icon-road</li>
                    <li><i class="icon-rss"></i> icon-rss</li>
                    <li><i class="icon-screenshot"></i> icon-screenshot</li>
                    <li><i class="icon-search"></i> icon-search</li>              
                    <li><i class="icon-share"></i> icon-share</li>
                    <li><i class="icon-share-alt"></i> icon-share-alt</li>
                    <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
                    <li><i class="icon-signal"></i> icon-signal</li>
                    <li><i class="icon-signin"></i> icon-signin</li>
                    <li><i class="icon-signout"></i> icon-signout</li>
                    <li><i class="icon-sitemap"></i> icon-sitemap</li>
                    <li><i class="icon-sort"></i> icon-sort</li>
                    <li><i class="icon-sort-down"></i> icon-sort-down</li>
                    <li><i class="icon-sort-up"></i> icon-sort-up</li>
                    <li><i class="icon-spinner"></i> icon-spinner</li>
                    <li><i class="icon-star"></i> icon-star</li>
                      </ul>
            </div>

            <div class="iconsdiv">
                <ul class="the-icons">
                    <li><i class="icon-star-empty"></i> icon-star-empty</li>
                    <li><i class="icon-star-half"></i> icon-star-half</li>
                    <li><i class="icon-tablet"></i> icon-tablet</li>
                    <li><i class="icon-tag"></i> icon-tag</li>
                    <li><i class="icon-tags"></i> icon-tags</li>
                    <li><i class="icon-tasks"></i> icon-tasks</li>
                    <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                    <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                    <li><i class="icon-time"></i> icon-time</li>
                    <li><i class="icon-tint"></i> icon-tint</li>
                    <li><i class="icon-trash"></i> icon-trash</li>
                    <li><i class="icon-trophy"></i> icon-trophy</li>
                    <li><i class="icon-truck"></i> icon-truck</li>
                    <li><i class="icon-umbrella"></i> icon-umbrella</li>
                    <li><i class="icon-upload"></i> icon-upload</li>
                    <li><i class="icon-upload-alt"></i> icon-upload-alt</li>
                    <li><i class="icon-user"></i> icon-user</li>
                    <li><i class="icon-user-md"></i> icon-user-md</li>
                    <li><i class="icon-volume-off"></i> icon-volume-off</li>
                    <li><i class="icon-volume-down"></i> icon-volume-down</li>
                    <li><i class="icon-volume-up"></i> icon-volume-up</li>
                    <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
                    <li><i class="icon-wrench"></i> icon-wrench</li>
                    <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
                    <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
                    <li><i class="icon-file"></i> icon-file</li>
                </ul>
            </div>

            <div class="iconsdiv" >
                <ul class="the-icons">

                    <li><i class="icon-file-alt"></i> icon-file-alt</li>
                    <li><i class="icon-cut"></i> icon-cut</li>
                    <li><i class="icon-copy"></i> icon-copy</li>
                    <li><i class="icon-paste"></i> icon-paste</li>
                    <li><i class="icon-save"></i> icon-save</li>
                    <li><i class="icon-undo"></i> icon-undo</li>
                    <li><i class="icon-repeat"></i> icon-repeat</li>
                </ul>      
            </div>
            <div class="iconsdiv"><ul class="the-icons">
                    <li><i class="icon-text-height"></i> icon-text-height</li>
                    <li><i class="icon-text-width"></i> icon-text-width</li>
                    <li><i class="icon-align-left"></i> icon-align-left</li>
                    <li><i class="icon-align-center"></i> icon-align-center</li>
                    <li><i class="icon-align-right"></i> icon-align-right</li>
                    <li><i class="icon-align-justify"></i> icon-align-justify</li>
                    <li><i class="icon-indent-left"></i> icon-indent-left</li>
                    <li><i class="icon-indent-right"></i> icon-indent-right</li>
                    <li><i class="icon-font"></i> icon-font</li>
                </ul></div>
            <div class="iconsdiv"><ul class="the-icons">

                    <li><i class="icon-bold"></i> icon-bold</li>
                    <li><i class="icon-italic"></i> icon-italic</li>
                    <li><i class="icon-strikethrough"></i> icon-strikethrough</li>
                    <li><i class="icon-underline"></i> icon-underline</li>
                    <li><i class="icon-link"></i> icon-link</li>
                    <li><i class="icon-paper-clip"></i> icon-paper-clip</li>
                    <li><i class="icon-columns"></i> icon-columns</li>
                </ul></div>
            <div class="iconsdiv"><ul class="the-icons">
                    <li><i class="icon-table"></i> icon-table</li>
                    <li><i class="icon-th-large"></i> icon-th-large</li>
                    <li><i class="icon-th"></i> icon-th</li>
                    <li><i class="icon-th-list"></i> icon-th-list</li>
                    <li><i class="icon-list"></i> icon-list</li>
                    <li><i class="icon-list-ol"></i> icon-list-ol</li>
                    <li><i class="icon-list-ul"></i> icon-list-ul</li>
                    <li><i class="icon-list-alt"></i> icon-list-alt</li>
                    <li><i class="icon-angle-left"></i> icon-angle-left</li>
                    <li><i class="icon-angle-right"></i> icon-angle-right</li>
                    <li><i class="icon-angle-up"></i> icon-angle-up</li>
                    <li><i class="icon-angle-down"></i> icon-angle-down</li>
                    <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
                    <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
                    <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
                    <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
                    <li><i class="icon-caret-down"></i> icon-caret-down</li>
                    <li><i class="icon-caret-left"></i> icon-caret-left</li>
                    <li><i class="icon-caret-right"></i> icon-caret-right</li>
                    <li><i class="icon-caret-up"></i> icon-caret-up</li>
                    <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
                    <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
                    <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
                    <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
                    <li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
                    <li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
                    <li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
                    <li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
                    <li><i class="icon-double-angle-left"></i> icon-double-angle-left</li>
                    <li><i class="icon-double-angle-right"></i> icon-double-angle-right</li>
                    <li><i class="icon-double-angle-up"></i> icon-double-angle-up</li>
                    <li><i class="icon-double-angle-down"></i> icon-double-angle-down</li>
                    <li><i class="icon-hand-down"></i> icon-hand-down</li>
                    <li><i class="icon-hand-left"></i> icon-hand-left</li>
                    <li><i class="icon-hand-right"></i> icon-hand-right</li>
                    <li><i class="icon-hand-up"></i> icon-hand-up</li>
                    <li><i class="icon-circle"></i> icon-circle</li>
                    <li><i class="icon-circle-blank"></i> icon-circle-blank</li>
                    <li><i class="icon-play-circle"></i> icon-play-circle</li>
                    <li><i class="icon-play"></i> icon-play</li>
                    <li><i class="icon-pause"></i> icon-pause</li>
                    <li><i class="icon-stop"></i> icon-stop</li>
                    <li><i class="icon-step-backward"></i> icon-step-backward</li>
                    <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                    <li><i class="icon-backward"></i> icon-backward</li>
                    <li><i class="icon-forward"></i> icon-forward</li>      
                    <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                    <li><i class="icon-step-forward"></i> icon-step-forward</li>
                    <li><i class="icon-eject"></i> icon-eject</li>  
                    <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
                    <li><i class="icon-resize-full"></i> icon-resize-full</li>
                    <li><i class="icon-resize-small"></i> icon-resize-small</li>  
          
                    <li><i class="icon-phone"></i> icon-phone</li>
                    <li><i class="icon-phone-sign"></i> icon-phone-sign</li>
                    <li><i class="icon-facebook"></i> icon-facebook</li>
                    <li><i class="icon-facebook-sign"></i> icon-facebook-sign</li>    
                    <li><i class="icon-twitter"></i> icon-twitter</li>
                    <li><i class="icon-twitter-sign"></i> icon-twitter-sign</li>
                    <li><i class="icon-github"></i> icon-github</li>
                    <li><i class="icon-github-alt"></i> icon-github-alt</li>
                    <li><i class="icon-github-sign"></i> icon-github-sign</li>
                    <li><i class="icon-linkedin"></i> icon-linkedin</li>
                    <li><i class="icon-linkedin-sign"></i> icon-linkedin-sign</li>
                    <li><i class="icon-pinterest"></i> icon-pinterest</li>
                    <li><i class="icon-pinterest-sign"></i> icon-pinterest-sign</li>
                    <li><i class="icon-google-plus"></i> icon-google-plus</li>
                    <li><i class="icon-google-plus-sign"></i> icon-google-plus-sign</li>
                    <li><i class="icon-sign-blank"></i> icon-sign-blank</li> 
         
                    <li><i class="icon-ambulance"></i> icon-ambulance</li>
                    <li><i class="icon-beaker"></i> icon-beaker</li>      
                    <li><i class="icon-h-sign"></i> icon-h-sign</li>
                    <li><i class="icon-hospital"></i> icon-hospital</li>      
                    <li><i class="icon-medkit"></i> icon-medkit</li>
                    <li><i class="icon-plus-sign-alt"></i> icon-plus-sign-alt</li>      
                    <li><i class="icon-stethoscope"></i> icon-stethoscope</li>
                    <li><i class="icon-user-md"></i> icon-user-md</li> 
                </ul>
            </div>

        <?php endif; ?>      

    </body>
</html>
