

//blog quote
(function() {  
    tinymce.create('tinymce.plugins.quote', {  
        init : function(ed, url) {  
            ed.addButton('quote', {  
                title : 'Add quote',  
                image : url+'/css/quote.gif',  
                onclick : function() {  
                     ed.selection.setContent('[quote]blog_quote_content[/quote]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);  
})();


//tab

(function() {  
    tinymce.create('tinymce.plugins.tab', {  
        init : function(ed, url) {  
            ed.addButton('tab', {  
                title : 'Add tab',  
                image : url+'/css/tab.gif',  
                onclick : function() {  
                     ed.selection.setContent('[Htab]<br />[tab  title="tab_title_1"]Tab_content_1[/tab]<br />[tab title="tab_title_2"]Tab_content_2[/tab]<br />[tab title="tab_title_3"]Tab_content_3[/tab]<br />[/Htab]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('tab', tinymce.plugins.tab);  
})();


//DropCap
(function() {  
    tinymce.create('tinymce.plugins.dropcap', {  
        init : function(ed, url) {  
            ed.addButton('dropcap', {  
                title : 'Add dropcap',  
                image : url+'/css/dropcap.gif',  
                onclick : function() {  
                     ed.selection.setContent('[dropcap color="#888" type="square"]A[/dropcap]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);  
})();

//Audio
(function() {  
    tinymce.create('tinymce.plugins.audio', {  
        init : function(ed, url) {  
            ed.addButton('audio', {  
                title : 'Add audio',  
                image : url+'/css/audio.gif',  
                onclick : function() {  
                     ed.selection.setContent('[audio url="audio_url"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('audio', tinymce.plugins.audio);  
})();


//list style
(function(){
    
        tinymce.create('tinymce.plugins.ul',{
           
           init: function(ed, url){
                 ed.addButton('ul', {
				title : 'List style',
				image : url+'/css/list.gif', 
				onclick : function() {
					ed.windowManager.open({
						file : url + '/shortcode_popup.php?list=1&get=List',
						width : 540,
						height : 330,
                                                title: 'List style',
						inline : 1	
					});
				}
			});
           }
           
        });
          tinymce.PluginManager.add('ul', tinymce.plugins.ul);  
    
    
})();

//button
(function(){
    
        tinymce.create('tinymce.plugins.button',{
           
           init: function(ed, url){
                 ed.addButton('button', {
				title : 'Button Style',
				image : url+'/css/button.png', 
				onclick : function() {
					ed.windowManager.open({
						file : url + '/shortcode_popup.php?button=1&get=Button',
						width : 540,
						height : 330,
                                                title: 'Button Style',
						inline : 1	
					});
				}
			});
           }
           
        });
          tinymce.PluginManager.add('button', tinymce.plugins.button);  
    
    
})();



//info graphic
(function(){    
        tinymce.create('tinymce.plugins.info',{
           
           init: function(ed, url){
                 ed.addButton('info', {
				title : 'info',
				image : url+'/css/info.png', 
				onclick : function() {
					ed.windowManager.open({
						file : url + '/shortcode_popup.php?info=1&get=Notification',
						width : 540,
						height : 330,
                                                title: 'Info',
						inline : 1	
					});
				}
			});
           }
           
        });
          tinymce.PluginManager.add('info', tinymce.plugins.info); 
})();


//Icons
(function(){    
        tinymce.create('tinymce.plugins.icons',{           
           init: function(ed, url){
                 ed.addButton('icons', {
				title : 'Icons',
				image : url+'/css/plus-icon.gif', 
				onclick : function() {
					ed.windowManager.open({
						file : url + '/shortcode_popup.php?icons=1&get=icons',
						width : 540,
						height : 330,
                                                title: 'Icons',
						inline : 1	
					});
				}
			});
           }           
        });
          tinymce.PluginManager.add('icons', tinymce.plugins.icons); 
})();



//image thumbs
(function() {
    tinymce.create('tinymce.plugins.image_thumbs', {
        init : function(ed, url) {
            ed.addButton('image_thumbs', {
                title : 'Image carousel',
                image : url+'/css/gallery.gif',
                onclick : function() {            
                ed.selection.setContent('[image_thumbs]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description [/image_slider]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description  [/image_slider]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description  [/image_slider]<br/>\n\
[/image_thumbs]');              
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('image_thumbs', tinymce.plugins.image_thumbs);
})();

//image slider
(function() {
    tinymce.create('tinymce.plugins.image_sliders', {
        init : function(ed, url) {
            ed.addButton('image_sliders', {
                title : 'Image Sliders',
                image : url+'/css/image-sliders.gif',
                onclick : function() {            
                ed.selection.setContent('[image_sliders]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description [/image_slider]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description  [/image_slider]<br/>\n\
[image_slider link="full_url_link" source="full_image_source"] Description  [/image_slider]<br/>\n\
[/image_sliders]');              
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('image_sliders', tinymce.plugins.image_sliders);
})();


//Youtube
(function() {
    tinymce.create('tinymce.plugins.youtube', {
        init : function(ed, url) {
            ed.addButton('youtube', {
                title : 'Youtube',
                image : url+'/css/youtube.gif',
                onclick : function() {            
                ed.selection.setContent('[youtube url="video_url" width="560" height="315"]');              
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);
})();

//vimeo
(function() {
    tinymce.create('tinymce.plugins.vimeo', {
        init : function(ed, url) {
            ed.addButton('vimeo', {
                title : 'Vimeo',
                image : url+'/css/vimeo.gif',
                onclick : function() {            
                ed.selection.setContent('[vimeo url="video_url" width="560" height="315"]');              
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);
})();


