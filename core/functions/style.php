<?php function wip_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BEGIN BODY STYLE =================== */

	$bodystyle = '';

	/* Background Image */
	if ( (wip_setting('wip_body_background')) && (wip_setting('wip_body_background') <> 'None') ):
		$bodystyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_body_background').');'; 
	elseif ( (!wip_setting('wip_body_custom_background')) && ( wip_setting('wip_body_background') == "None") ): 
		$bodystyle .= 'background-image: none;'; 
	elseif (wip_setting('wip_body_custom_background')): 
		$bodystyle .= 'background: url('.wip_setting('wip_body_custom_background').');'; 
	endif;

	/* Background Repeat */
	if ( (wip_setting('wip_body_background_repeat') ) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-repeat:'.wip_setting('wip_body_background_repeat').';'; 
	
	/* Background Position */
	if ( (wip_setting('wip_body_background_position') ) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-position:'.wip_setting('wip_body_background_position').';'; 
	
	/* Background Color */
	if (wip_setting('wip_body_background_color')) 
		$bodystyle .= 'background-color:'.wip_setting('wip_body_background_color').';';
		 
	/* Background Attachment */
	if ( (wip_setting('wip_body_background_attachment')) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-attachment:'.wip_setting('wip_body_background_attachment').';'; 

	if ($bodystyle)
		echo 'body { '.$bodystyle.' } ';
		
/* =================== END BODY STYLE =================== */

/* =================== END HEADER STYLE =================== */

	if ( wip_setting('wip_header_background_color') ):

		echo '#header, nav#mainmenu ul ul { background-color: '.wip_setting('wip_header_background_color').'; } ';
		echo 'nav#mainmenu ul ul { border-top-color: '.wip_setting('wip_header_background_color').'; } ';

	endif;	

	if ( wip_setting('wip_subheader_background_color') ):

		echo '#subheader { background-color: '.wip_setting('wip_subheader_background_color').'; } ';
		
	endif;	

	if ( wip_setting('wip_header_border_color') ):

		echo '#header, nav#mainmenu ul ul li a, #subheader { border-color: '.wip_setting('wip_header_border_color').'; } ';
		echo 'nav#mainmenu ul ul { border-left-color: '.wip_setting('wip_header_border_color').'; border-right-color: '.wip_setting('wip_header_border_color').'; border-bottom-color: '.wip_setting('wip_header_border_color').'; } ';
		
	endif;	

/* =================== END HEADER STYLE =================== */

/* =================== END BOTTOM STYLE =================== */

	if ( wip_setting('wip_bottom_background_color') ):

		echo '.bottom_widget { background-color: '.wip_setting('wip_bottom_background_color').'; } ';
		
	endif;	

	if ( wip_setting('wip_socialbox_background_color') ):

		echo '.bottom_socials { background-color: '.wip_setting('wip_socialbox_background_color').'; } ';
		
	endif;	

	if ( wip_setting('wip_footer_background_color') ):

		echo '#footer { background-color: '.wip_setting('wip_footer_background_color').'; } ';
		
	endif;	

	if ( wip_setting('wip_bottom_border_color') ):

		echo '#footer, .bottom_socials, .bottom_widget, .bottom_widget ul.contact-info li, .bottom_widget .widget-box li { border-color: '.wip_setting('wip_bottom_border_color').'; } ';
		
	endif;	

/* =================== END HEADER STYLE =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font */
	if (wip_setting('wip_logo_font')) 
		$logostyle .= "font-family:'".wip_setting('wip_logo_font')."',Verdana, Geneva, sans-serif;"; 

	/* Logo Font Size */
	if (wip_setting('wip_logo_font_size')) 
		$logostyle .= "font-size:".wip_setting('wip_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a { '.$logostyle.' } ';

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav Font */
	if (wip_setting('wip_menu_font')) 
		$navstyle .= "font-family:'".wip_setting('wip_menu_font')."',Verdana, Geneva, sans-serif;"; 

	/* Nav  Font Size */
	if (wip_setting('wip_menu_font_size')) 
		$navstyle .= "font-size:".wip_setting('wip_menu_font_size').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a, nav#mainmenu ul ul li a { '.$navstyle.' } ';
		
/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (wip_setting('wip_content_font')) 
		echo ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th, #searchform input[type=text], #searchform textarea, .contact-form input[type=text], .contact-form textarea, .comment-form input[type=text], .comment-form textarea, #searchform input[type=submit], .contact-form input[type=submit], .comment-form input[type=submit], .entry-tags, .entry-info, .widget-category li a, #wp-calendar th, #wp-calendar #today, #wp-calendar #today a, #wp-calendar caption, ul#twitter_update_list li, .tagcloud a, .tabs-container p, .tabs li a, .toggle, .toggle_container h5.element, .wp-pagenavi a, .wp-pagenavi a:link, .wp-pagenavi span.current, .wip-pagination span, p, li, address, dd, blockquote, td, th, .textwidget, .button, .btn, .bottom a, .bottom p, .bottom li, .bottom address, .bottom dd, .bottom blockquote, .bottom td, .bottom th, .bottom .textwidget, #footer a, #footer p, #footer li, #footer address, #footer dd, #footer blockquote, #footer td, #footer th, #footer .textwidget, #sidebar p, #sidebar li, #sidebar address, #sidebar dd, #sidebar blockquote, #sidebar td, #sidebar th, #sidebar .textwidget, .article-header,.skills .views, .filter li a, .filterable-grid .overlay, .comment-container, .pin-article .aside p{ font-family:'".wip_setting('wip_content_font')."',Verdana, Geneva, sans-serif;}"; 

	if (wip_setting('wip_content_font_size')) 
		echo ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th { font-size:".wip_setting('wip_content_font_size')."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	$titlestyle = '';

	if (wip_setting('wip_titles_font')) 
		$titlestyle .= "font-family:'".wip_setting('wip_titles_font')."',Verdana, Geneva, sans-serif;"; 
	
	if ($titlestyle)
		echo 'h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, h1, h2, h3, h4, h5, h6, #subheader p, #subheader h1, h3#reply-title, h3.comments,.pin-article .link a, .pin-article .quote p { '.$titlestyle.' } ';

	if (wip_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".wip_setting('wip_h1_font_size')."; }"; 
	if (wip_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".wip_setting('wip_h2_font_size')."; }"; 
	if (wip_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".wip_setting('wip_h3_font_size')."; }"; 
	if (wip_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".wip_setting('wip_h4_font_size')."; }"; 
	if (wip_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".wip_setting('wip_h5_font_size')."; }"; 
	if (wip_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".wip_setting('wip_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( wip_setting('wip_link_color') ):

		echo '::-moz-selection { background-color: '.wip_setting('wip_link_color').'; } ';
		echo '::selection { background-color: '.wip_setting('wip_link_color').'; } ';
		echo 'article blockquote { border-left-color: '.wip_setting('wip_link_color').'; } ';
		
	endif;	
	
	if ( wip_setting('wip_link_color_hover') ):

		echo '#back-to-top a:hover, body.light #back-to-top a:hover, nav#widgetmenu li a:hover, nav#widgetmenu li:hover > a , nav#widgetmenu li.current-menu-item > a, nav#widgetmenu li.current-menu-ancestor > a, .pin-article .link a:hover, .pin-article .quote:hover, .skills .views.active, .skills .views:hover, .filter li:hover, .filter li.active, #searchform input[type=submit]:hover, .contact-form input[type=submit]:hover, .comment-form input[type=submit]:hover, .widget-category li a:hover, .tagcloud a:hover, .tabs li a:hover, .tabs li.ui-tabs-active a, .tabs li.ui-state-active a, .socials a:hover,.button:hover, .wp-pagenavi a:hover, .wip-pagination span, .wip-pagination a span:hover, .wp-pagenavi span.current, #wp-calendar #today, #wp-calendar #today a, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover { background-color: '.wip_setting('wip_link_color_hover').'; } ';

		echo '#sidebar a:hover, .bottom a:hover, #footer a:hover, #logo a:hover, nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a,  nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, .pin-article h3.title a:hover, .filterable-grid  h4.title a:hover, .filterable-grid  h4.title a:focus , .filterable-grid  h4.title a:focus, .entry-info a:hover { color: '.wip_setting('wip_link_color_hover').'; } ';

		echo '#back-to-top a:hover, nav#widgetmenu li a:hover, nav#widgetmenu li:hover > a , nav#widgetmenu li.current-menu-item > a, nav#widgetmenu li.current-menu-ancestor > a, .widget-category li a:hover, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover, .toggle_container h5.element:hover:last-of-type, .toggle_container h5.inactive:last-of-type, .toggle_container h5.inactive:hover:last-of-type, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover  { border-color: '.wip_setting('wip_link_color_hover').'; } ';

	endif;	

	if ( wip_setting('wip_header_text_color') ):
	
		echo '#logo a, nav#mainmenu ul li a, nav#mainmenu ul ul li a { color: '.wip_setting('wip_header_text_color').'; } ';

	endif;	

	if ( wip_setting('wip_subheader_text_color') ):
	
		echo '#subheader, #subheader p, #subheader h1, #subheader p a, #subheader h1 a { color: '.wip_setting('wip_subheader_text_color').'; } ';

	endif;	

	if ( wip_setting('wip_bottom_text_color') ):
	
		echo '.bottom_widget a, .bottom_widget h3, .bottom_widget label, .bottom_widget caption, .bottom_widget p, .bottom_widget li, .bottom_widget address, .bottom_widget dd, .bottom_widget blockquote, .bottom_widget td, .bottom_widget th, .bottom_widget .textwidget { color: '.wip_setting('wip_bottom_text_color').'; } ';
		
	endif;	

	if ( wip_setting('wip_copyright_text_color') ):
	
		echo '#footer a, #footer p, #footer li, #footer address, #footer dd, #footer blockquote, #footer td, #footer th, #footer .textwidget  { color: '.wip_setting('wip_copyright_text_color').'; } ';

	endif;	

	if ( wip_setting('wip_social_icons_color') ):
	
		echo '.bottom_socials a { color: '.wip_setting('wip_social_icons_color').'; } ';

	endif;	

	if ( wip_setting('wip_social_icons_hover') ):
	
		echo '.bottom_socials a:hover { color: '.wip_setting('wip_social_icons_hover').'; } ';

	endif;	

/* =================== END LINK STYLE =================== */


	if (wip_setting('wip_custom_css_code'))
		echo wip_setting('wip_custom_css_code'); 

?>

</style>
    
<?php }

add_action('wp_head', 'wip_css_custom');

?>