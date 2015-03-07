<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$panel = array (

/* =================== NAV =================== */

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "General" => __( "General","wip") , "Fonts" => __( "Fonts","wip") , "Colors" => __( "Colors","wip") ,"Slide Options" => __( "Slide Options","wip") , "Sidebars" => __( "Sidebars","wip") , "Backgrounds" => __( "Backgrounds","wip")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  
	   
/* =================== END NAV =================== */

/* =================== GENERAL TAB =================== */

array( "type" => "begintab",
	   "tab" => "General",
	   "element" =>
	   
	array( "type" => "form",
	       "name" => "General"),

/* START LOAD SYSTEM */ 

	array( "type" => "startopen",
	       "val" => "Load system",
	       "name" => __( "Load system","wip")),

	array( "name" => __( "Load system","wip"),
	       "desc" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","wip"),
	       "id" => $shortname."_loadsystem",
	       "type" => "select",
	       "options" => array(
			   "mode_a" => __( "Mode a","wip"),
			   "mode_b" => __( "Mode b","wip"),
		   ),
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END LOAD SYSTEM */ 

/* START SKINS */ 

	array( "type" => "start",
	       "val" => "Skins",
	       "name" => __( "Skins","wip")),

	array( "name" => __( "Theme skin","wip"),
	       "desc" => __( "Select a skin, the options will be charged in accordance with the chosen style.","wip"),
	       "id" => $shortname."_skins",
	       "type" => "select",
	       "options" => array(
	   	   "turquoise" => __( "Turquoise","wip"),
	   	   "orange" => __( "Orange","wip"),
	   	   "blue" => __( "Blue","wip"),
	   	   "red" => __( "Red","wip"),
	   	   "purple" => __( "Purple","wip"),
	   	   "yellow" => __( "Yellow","wip"),
	   	   "green" => __( "Green","wip"),
	   	   "light_turquoise" => __( "Light & Turquoise","wip"),
	   	   "light_orange" => __( "Light & Orange","wip"),
	   	   "light_blue" => __( "Light & Blue","wip"),
	   	   "light_red" => __( "Light & Red","wip"),
	   	   "light_purple" => __( "Light & Purple","wip"),
	   	   "light_yellow" => __( "Light & Yellow","wip"),
	   	   "light_green" => __( "Light & Green","wip"),
		   ),
	       "std" => "light_turquoise"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END SKINS */ 

/* START MAIN */ 

	array( "type" => "start",
	       "val" => "General",
	       "name" => __( "General","wip")),
	
	array( "name" => __( "Home Blog Layout","wip"),
	       "desc" => __( "If you don't select a single page, select a layout for homepage","wip"),
	       "id" => $shortname."_home",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","wip"),
	   	   "left-sidebar" => __( "Left Sidebar","wip"),
	   	   "right-sidebar" => __( "Right Sidebar","wip"),
	   	   "span6" => __( "Masonry Two Columns","wip"),
	   	   "span4" => __( "Masonry Three Columns","wip"),
	   	   "masonry-left-sidebar" => __( "Masonry Two Columns + Left Sidebar","wip"),
	   	   "masonry-right-sidebar" => __( "Masonry Two Columns + Right Sidebar","wip"),
		   ),
	       "std" => ""),
	
	array( "name" => __( "Category Layout","wip"),
	       "desc" => __( "Select a layout for category pages","wip"),
	       "id" => $shortname."_category_layout",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","wip"),
	   	   "left-sidebar" => __( "Left Sidebar","wip"),
	   	   "right-sidebar" => __( "Right Sidebar","wip"),
	   	   "span6" => __( "Masonry Two Columns","wip"),
	   	   "span4" => __( "Masonry Three Columns","wip"),
	   	   "masonry-left-sidebar" => __( "Masonry Two Columns + Left Sidebar","wip"),
	   	   "masonry-right-sidebar" => __( "Masonry Two Columns + Right Sidebar","wip"),
		   ),
	       "std" => ""),

	array( "name" => __( "Search Layout","wip"),
	       "desc" => __( "Select a layout for search page","wip"),
	       "id" => $shortname."_search_layout",
	       "type" => "select",
	       "options" => array(
		   "full" => __( "Full Width","wip"),
	   	   "left-sidebar" => __( "Left Sidebar","wip"),
	   	   "right-sidebar" => __( "Right Sidebar","wip"),
	   	   "span6" => __( "Masonry Two Columns","wip"),
	   	   "span4" => __( "Masonry Three Columns","wip"),
	   	   "masonry-left-sidebar" => __( "Masonry Two Columns + Left Sidebar","wip"),
	   	   "masonry-right-sidebar" => __( "Masonry Two Columns + Right Sidebar","wip"),
		   ),
	       "std" => ""),

	array( "name" => __( "Read more button","wip"),
	       "desc" => __( "You want to display the read more button?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_readmore",
	       "type" => "on-off",
	       "std" => "on"),

	array( "name" => __( "Comments","wip"),
	       "desc" => __( "You want to view the comments after articles?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_comments",
	       "type" => "on-off",
	       "std" => "off"),
	
	array( "name" => __( "Social Buttons","wip"),
	       "desc" => __( "You want to view the social buttons after articles?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_social_buttons",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "name" => __( "Custom css","wip"),
	       "desc" => __( "Insert your custom css code","wip"),
	       "id" => $shortname."_custom_css_code",
	       "type" => "textarea",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END GENERAL */ 

/* START THUMBNAILS  */ 

	array( "type" => "start",
	       "val" => "Thumbnails",
	       "name" => __( "Thumbnails","wip")),

	array( "name" => __( "Blog Thumbnail","wip"),
	       "desc" => __( "Insert the height for blog thumbnail.","wip"),
	       "id" => $shortname."_blog_thumbinal",
	       "type" => "thumbs",
	       "std" => "429"),
		   
	array( "name" => __( "Portfolio Thumbnail","wip"),
	       "desc" => __( "Insert the height for portfolio thumbnail.","wip"),
	       "id" => $shortname."_portfolio_thumbinal",
	       "type" => "thumbs",
	       "std" => "429"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END THUMBNAILS */ 

/* START LAYOUT */ 

	array( "type" => "start",
	       "val" => "Layout",
	       "name" => __( "Layout","wip")),

	array( "name" => __( "Header Sidebar Area Layout","wip"),
	       "desc" => __( "Select the layout for header sidebar area","wip"),
	       "id" => $shortname."_header_sidebar_area",
	       "type" => "select",
	       "options" => array(
		   "span12" => __( "One Column","wip"),
	   	   "span6" => __( "Two Columns","wip"),
	   	   "span4" => __( "Three Columns","wip"),
	   	   "span3" => __( "Four Columns","wip"),
		   ),
	       "std" => "span12"),

	array( "name" => __( "Bottom Sidebar Area Layout","wip"),
	       "desc" => __( "Select the layout for bottom sidebar area","wip"),
	       "id" => $shortname."_bottom_sidebar_area",
	       "type" => "select",
	       "options" => array(
		   "span12" => __( "One Column","wip"),
	   	   "span6" => __( "Two Columns","wip"),
	   	   "span4" => __( "Three Columns","wip"),
	   	   "span3" => __( "Four Columns","wip"),
		   ),
	       "std" => "span3"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END GENERAL */ 

/* START HEADER */ 

	array( "type" => "start",
	       "val" => "Header",
	       "name" => __( "Header","wip")),

	array( "name" => __( "Custom Logo","wip"),
	       "desc" => __( "You want to upload a custom logo?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_view_custom_logo",
	       "type" => "on-off",
	       "std" => "off"),

	array( "name" => __( "Upload Custom Logo","wip"),
	       "desc" => __( "Upload a custom logo","wip"),
           "id" => $shortname."_custom_logo",     
           "data" => "array",
           "type" => "upload",
           "class" => "hidden-element",
	       "std" => ""),
		   
	array( "name" => __( "Upload Custom Favicon","wip"),
	       "desc" => __( "Upload a custom favicon","wip"),
           "id" => $shortname."_custom_favicon",     
           "data" => "array",
           "type" => "upload",
           "class" => "",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END HEADER */ 

/* START FOOTER */ 

	array( "type" => "start",
	       "val" => "Footer",
	       "name" => __( "Footer","wip")),

	array( "name" => __( "Copyright Text","wip"),
	       "desc" => __( "Insert copyright text","wip"),
	       "id" => $shortname."_copyright_text",
	       "type" => "textarea",
	       "std" => ""),
		   
	array( "name" => __( "Facebook Url","wip"),
	       "desc" => __( "Insert Facebook Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_facebook_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Twitter Url","wip"),
	       "desc" => __( "Insert Twitter Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_twitter_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Flickr Url","wip"),
	       "desc" => __( "Insert Flickr Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_flickr_button",
	       "type" => "text",
	       "std" => ""),
	
	array( "name" => __( "Google Url","wip"),
	       "desc" => __( "Insert Google Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_google_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Linkedin Url","wip"),
	       "desc" => __( "Insert Linkedin Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_linkedin_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Pinterest Url","wip"),
	       "desc" => __( "Insert Pinterest Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_pinterest_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Tumblr Url","wip"),
	       "desc" => __( "Insert Tumblr Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_tumblr_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Youtube Url","wip"),
	       "desc" => __( "Insert Youtube Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_youtube_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Vimeo Url","wip"),
	       "desc" => __( "Insert Vimeo Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_vimeo_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Skype Url","wip"),
	       "desc" => __( "Insert Skype ID (empty if you want to hide the button), you can add <strong>'skype:'</strong>, after your ID (for example skype:alexvtn)","wip"),
	       "id" => $shortname."_footer_skype_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Instagram  Url","wip"),
	       "desc" => __( "Insert Instagram Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_instagram_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Github  Url","wip"),
	       "desc" => __( "Insert Github Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_github_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Xing  Url","wip"),
	       "desc" => __( "Insert Xing Url (empty if you want to hide the button)","wip"),
	       "id" => $shortname."_footer_xing_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Email Address","wip"),
	       "desc" => __( "Insert Email Address (empty if you want to hide the button), you can add <strong>'mailto:</strong>', after your email (for example mailto:info@wpinprogress.com)","wip"),
	       "id" => $shortname."_footer_email_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Feed Rss Button","wip"),
	       "desc" => __( "You want display the Feed Rss button?","wip"),
	       "class" => "hidden",
	       "id" => $shortname."_footer_rss_button",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "name" => __( "Google analytics","wip"),
	       "desc" => __( "You can paste the google analytics code.","wip"),
	       "id" => $shortname."_analytics_code",
	       "type" => "textarea",
	       "std" => ""),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

array( "type" => "end"),

/* END FOOTER */ 

),

array( "type" => "endtab"),
	   

/* =================== FONTS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Fonts",
	   "element" =>
	   
/* START LOGO FONT */ 

	array( "type" => "form",
	       "name" => "Fonts"),

	array( "type" => "startopen",
			   "val" => "Character sets",
			   "name" => __( "Character sets","wip")),
	
	array( "name" => __( "Character sets","wip"),
		   "desc" => __( "Choose the character sets you want:","wip"),
		   "id" => $shortname."_charset",
		   "type" => "multioptions",
		   "options" => array(
			   "latin" => __( "Latin","wip"),
			   "latin-ext" => __( "Latin Extended","wip"),
			   "cyrillic" => __( "Cyrillic","wip"),
			   "cyrillic-ext" => __( "Cyrillic Extended","wip"),
			   "greek" => __( "Greek","wip"),
			   "greek-ext" => __( "Greek Extended","wip"),
			   "vietnamese" => __( "Vietnamese","wip"),
		   ),
			   
	),
	
	array( "type" => "save-button",
			   "value" => "Save",
			   "class" => "General"),
	
	array( "type" => "end"),

	array( "type" => "start",
	       "val" => "Fonts",
	       "name" => __( "Fonts","wip")),

	array( "name" => __( "Logo font","wip"),
	       "desc" => __( "Select a font for logo","wip"),
	       "id" => $shortname."_logo_font",
	       "type" => "select",
	       "options" => wip_get_font("","getlist"),
	       "std" => "Montez"),
		   
	array( "name" => __( "Font size","wip"),
	       "desc" => __( "Select a size for logo","wip"),
	       "id" => $shortname."_logo_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "55px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Fonts"),

	array( "type" => "end"),

/* END LOGO FONT */ 

/* START MENU FONT */ 

	array( "type" => "start",
	       "val" => "Menu font",
	       "name" => __( "Menu font","wip")),

	array( "name" => __( "Menu font","wip"),
	       "desc" => __( "Select a font for menu","wip"),
	       "id" => $shortname."_menu_font",
	       "type" => "select",
	       "options" => wip_get_font("","getlist"),
	       "std" => "Oxygen"),
	
	array( "name" => __( "Menu size","wip"),
	       "desc" => __( "Select a size for menu","wip"),
	       "id" => $shortname."_menu_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "14px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START MENU FONT */ 

	array( "type" => "start",
	       "val" => "Content font",
	       "name" => __( "Content font","wip")),

	array( "name" => __( "Content font","wip"),
	       "desc" => __( "Select a font for the content","wip"),
	       "id" => $shortname."_content_font",
	       "type" => "select",
	       "options" => wip_get_font("","getlist"),
	       "std" => "Oxygen"),
	
	array( "name" => __( "Content size","wip"),
	       "desc" => __( "Select a size for the content","wip"),
	       "id" => $shortname."_content_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "14px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START TITLE FONT */ 
	   
	array( "type" => "start",
	       "val" => "Title fonts",
	       "name" => __( "Titles font","wip")),

	array( "name" => __( "Titles font","wip"),
	       "desc" => __( "Select a font for titles","wip"),
	       "id" => $shortname."_titles_font",
	       "type" => "select",
	       "options" => wip_get_font("","getlist"),
	       "std" => "Yanone Kaffeesatz"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Titles font"),

	array( "type" => "end"),

/* END TITLE FONT */ 

/* START HEADLINE FONT SIZES */ 
	   
	array( "type" => "start",
	       "val" => "Headline font sizes",
	       "name" => __( "Headline font sizes","wip")),

	array( "name" => __( "H1 headline","wip"),
	       "desc" => __( "Select a size for H1 elements","wip"),
	       "id" => $shortname."_h1_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "28px"),

	array( "name" => __( "H2 headline","wip"),
	       "desc" => __( "Select a size for H2 elements","wip"),
	       "id" => $shortname."_h2_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "26px"),

	array( "name" => __( "H3 headline","wip"),
	       "desc" => __( "Select a size for H3 elements","wip"),
	       "id" => $shortname."_h3_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "24px"),
		   
	array( "name" => __( "H4 headline","wip"),
	       "desc" => __( "Select a size for H4 elements","wip"),
	       "id" => $shortname."_h4_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "21px"),
		   
	array( "name" => __( "H5 headline","wip"),
	       "desc" => __( "Select a size for H5 elements","wip"),
	       "id" => $shortname."_h5_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "18px"),
		   
	array( "name" => __( "H6 headline","wip"),
	       "desc" => __( "Select a size for H6 elements","wip"),
	       "id" => $shortname."_h6_font_size",
	       "type" => "select",
			"options" => wip_jsonfile("fontsizes.json"),
	       "std" => "16px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Headline font sizes"),

	array( "type" => "end"),

/* END FONT SIZES */ 

),

array( "type" => "endtab"),

/* =================== END FONTS OPTION TAB =================== */


/* =================== COLORS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Colors",
	   "element" =>
	   
/* START TEXT COLOR */ 

	array( "type" => "form",
	       "name" => "Colors"),

	array( "type" => "start",
	       "val" => "General colors",
	       "name" => __( "General colors","wip")),

	array( "name" => __( "Text color","wip"),
	       "desc" => __( "Select a color for general text","wip"),
	       "id" => $shortname."_text_font_color",
	       "type" => "color",
	       "std" => "#616161"),

	array( "name" => __( "Link color","wip"),
	       "desc" => __( "Select a color for link","wip"),
	       "id" => $shortname."_link_color",
	       "type" => "color",
	       "std" => "#48c9b0"),

	array( "name" => __( "Link color hover","wip"),
	       "desc" => __( "Select a color for link hover","wip"),
	       "id" => $shortname."_link_color_hover",
	       "type" => "color",
	       "std" => "#1abc9c"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General colors"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

/* START HEADER COLOR */ 

	array( "type" => "start",
	       "val" => "Header colors",
	       "name" => __( "Header colors","wip")),

	array( "name" => __( "Logo and menus","wip"),
	       "desc" => __( "Select a color for the logo and menu of header","wip"),
	       "id" => $shortname."_header_text_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Subheader","wip"),
	       "desc" => __( "Select a color for the subheader text","wip"),
	       "id" => $shortname."_subheader_text_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Header colors"),

	array( "type" => "end"),

/* END HEADER COLOR */ 

/* START BOTTOM COLOR */ 

	array( "type" => "start",
	       "val" => "Bottom colors",
	       "name" => __( "Bottom colors","wip")),

	array( "name" => __( "Text color","wip"),
	       "desc" => __( "Select a color for the text of bottom","wip"),
	       "id" => $shortname."_bottom_text_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Social icons","wip"),
	       "desc" => __( "Select a color for the social icons","wip"),
	       "id" => $shortname."_social_icons_color",
	       "type" => "color",
	       "std" => "#dddddd"),

	array( "name" => __( "Social icons hover","wip"),
	       "desc" => __( "Select a color for the social icons hover","wip"),
	       "id" => $shortname."_social_icons_hover",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Copyright color","wip"),
	       "desc" => __( "Select a color for the text of bottom","wip"),
	       "id" => $shortname."_copyright_text_color",
	       "type" => "color",
	       "std" => "#616161"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Bottom colors"),

	array( "type" => "end"),

/* END BOTTOM COLOR */ 

),

array( "type" => "endtab"),
	   
/* =================== END COLORS OPTION TAB =================== */

/* =================== SLIDE OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "SlideOptions",
	   "element" =>

/* START NIVO SLIDER SETTING*/ 

	array( "type" => "form",
	       "name" => "SlideOptions"),

	array( "type" => "start",
	       "val" => "Nivo Slider Settings",
	       "name" => __( "Nivo Slider Settings","wip")),
		   
	array( "name" => __( "Effect","wip"),
	       "desc" => __( "Specify sets like: fold,fade,sliceDown,random...","wip"),
	       "id" => $shortname."_nivo_effect",
	       "type" => "select",
			"options" => array(
				'sliceDown' => 'sliceDown' ,
				'sliceDownLeft' => 'sliceDownLeft', 
				'sliceUp' => 'sliceUp' ,
				'sliceUpLeft' => 'sliceUpLeft', 
				'sliceUpDown' => 'sliceUpDown' ,
				'sliceUpDownLeft' => 'sliceUpDownLeft', 
				'fold' => 'fold' ,
				'random' => 'random', 
				'slideInRight' => 'slideInRight' ,
				'slideInLeft' => 'slideInLeft', 
				'boxRandom' => 'boxRandom' ,
				'boxRain' => 'boxRain', 
				'boxRainReverse' => 'boxRainReverse' ,
				'boxRainGrow' => 'boxRainGrow', 
				'boxRainGrowReverse' => 'boxRainGrowReverse' ,
			),
	       "std" => "random"),

	array( "name" => __( "Animation Speed","wip"),
	       "desc" => __( "Slide transition speed, in milliseconds.","wip"),
	       "id" => $shortname."_nivo_animationspeed",
	       "type" => "text",
	       "std" => "500"),
		   		   
	array( "name" => __( "Pause Time","wip"),
	       "desc" => __( "How long each slide will show, in milliseconds.","wip"),
	       "id" => $shortname."_nivo_pause_time",
	       "type" => "text",
	       "std" => "3000"),
		   		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Nivo slider settings"),

	array( "type" => "end"),

/* END NIVO SLIDER SETTING */ 

/* START FLEX SLIDER SETTING*/ 

	array( "type" => "start",
	       "val" => "Flex Slider settings",
	       "name" => __( "Flex Slider settings","wip")),

	array( "name" => __( "Effect","wip"),
	       "desc" => __( "Specify sets like: fade or slide","wip"),
	       "id" => $shortname."_flex_animation",
	       "type" => "select",
			"options" => array(
				'fade' => 'Fade' ,
				'slide' => 'Slide', 
			),
	       "std" => ""),
		   
	array( "name" => __( "Direction","wip"),
	       "desc" => __( "Select the sliding direction, horizontal or vertical (Only slide effect)","wip"),
	       "id" => $shortname."_flex_direction",
	       "type" => "select",
			"options" => array(
				'horizontal' => 'horizontal' ,
				'vertical' => 'vertical', 
			),
	       "std" => ""),

	array( "name" => __( "Reverse","wip"),
	       "desc" => __( "Reverse the animation direction","wip"),
	       "id" => $shortname."_flex_reverse",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "name" => __( "Slideshow Speed","wip"),
	       "desc" => __( "Set the speed of the slideshow cycling, in milliseconds.","wip"),
	       "id" => $shortname."_flex_slideshowspeed",
	       "type" => "text",
	       "std" => "7000"),

	array( "name" => __( "Animation Speed","wip"),
	       "desc" => __( "Set the speed of animations, in milliseconds.","wip"),
	       "id" => $shortname."_flex_animationspeed",
	       "type" => "text",
	       "std" => "600"),

	array( "name" => __( "View direction nav","wip"),
	       "desc" => __( "Views the direction nav?","wip"),
	       "id" => $shortname."_flex_directionnav",
	       "type" => "on-off",
	       "std" => "off"),

	array( "name" => __( "View control nav","wip"),
	       "desc" => __( "Views the control nav?","wip"),
	       "id" => $shortname."_flex_controlnav",
	       "type" => "on-off",
	       "std" => "off"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Flex slider settings"),

	array( "type" => "end"),

/* END FLEX SLIDER SETTING */ 

/* END HOME */ 

),

array( "type" => "endtab"),
	   
/* =================== END SLIDE OPTION TAB =================== */

/* =================== SIDEBAR TAB =================== */

array( "type" => "begintab",
	   "tab" => "Sidebars",
	   "element" =>
	   
	array( "type" => "form",
	       "name" => "Sidebars"),

	array( "type" => "startopen",
	       "name" => __( 'New Sidebar','wip')),

	array( "name" => __( "Sidebar Name","wip"),
	       "desc" => __( "Sidebar Position.","wip"),
	       "id" => $shortname."_sidebars",
	       "type" => "sidebar",
	       "options" => array(
		   		"side" => "Side Sidebar",
		   		"header" => "Header Sidebar",
		   		"bottom" => "Bottom Sidebar",
			),
	       "std" => "Sidebar Name"),
		   
	array( "type" => "save-button",
	       "class" => "Sidebars",
	       "value" => "Add Sidebar"),
	   
	array( "type" => "end"),
	
	array( "type" => "startopen",
	       "name" => __( 'Edit a sidebar','wip')),
	   
	array( "name" => __( "Sidebar Name","wip"),
	       "sidebar" => $shortname."_sidebars",
	       "type" => "viewsidebars",
	       "std" => "Sidebar Name"),
	   
	array( "type" => "end"),

),

array( "type" => "endtab"),
	   
/* =================== END SIDEBAR TAB =================== */
	   
/* =================== BEGIN BACKGROUNDS TAB =================== */

array( "type" => "begintab",
	   "tab" => "Backgrounds",
	   "element" =>
	   
/* START BACKGROUNDS */ 

	array( "type" => "form",
	       "name" => "Backgrounds"),
	   
	array( "type" => "start",
	       "val" => "Body Background",
	       "name" => __( "Body Background","wip")),

	array( "name" => __( "Color","wip"),
	       "desc" => __( "Select a color for body background.","wip"),
	       "id" => $shortname."_body_background_color",
	       "type" => "color",
	       "std" => "#f3f3f3"),

	array( "name" => __( "Custom image background","wip"),
	       "desc" => __( "Upload a image for body background.","wip"),
           "id" => $shortname."_body_custom_background",     
           "data" => "array",
           "type" => "upload",
           "class" => "hidden-element",
	       "std" => ""),

	array( "name" => __( "Default image background","wip"),
	       "desc" => __( "Select a image for body background.","wip"),
	       "id" => $shortname."_body_background",
	       "type" => "background",
	       "options" => wip_jsonfile("patterns.json"),
	       "std" => "/images/background/patterns/pattern10.jpg"),

	array( "name" => __( "Repeat","wip"),
	       "desc" => __( "Repeat","wip"),
	       "id" => $shortname."_body_background_repeat",
	       "type" => "select",
	       "options" => array(
	   	   		"" => "None",
	   	   		"repeat" => __( "Repeat","wip"),
				"no-repeat" => __( "No repeat","wip"),
	   			"repeat-x" => __( "Repeat orizzontal","wip"),
				"repeat-y" => __( "Repeat vertical","wip"),
		   ),
	       "std" => "repeat"),

	array( "name" => __( "Background Position","wip"),
	       "desc" => __( "Background Position","wip"),
	       "id" => $shortname."_body_background_position",
	       "type" => "select",
	       "options" => array(
	   			"" => "None",
	   			"top left" => "top left",
				"top center" => "top center",
	   			"top right" => "top right",
				"center" => "center",
	   			"bottom left" => "bottom left",
				"bottom center" => "bottom center",
				"bottom right" => "bottom right",
		    ),
	       "std" => ""),

	array( "name" => __( "Background Attachment","wip"),
	       "desc" => __( "Background Attachment","wip"),
	       "id" => $shortname."_body_background_attachment",
	       "type" => "select",
	       "options" => array(
	   			"normal" => "normal",
				"fixed" => "fixed",
		    ),
	       "std" => "normal"),
	   
	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END BACKGROUNDS */ 

/* START HEADER BACKGROUND */ 

	array( "type" => "form",
	       "name" => "Backgrounds"),
	   
	array( "type" => "start",
	       "val" => "Header Background",
	       "name" => __( "Header Background","wip")),

	array( "name" => __( "Header color","wip"),
	       "desc" => __( "Select a color for header background.","wip"),
	       "id" => $shortname."_header_background_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Subheader color","wip"),
	       "desc" => __( "Select a color for subheader background.","wip"),
	       "id" => $shortname."_subheader_background_color",
	       "type" => "color",
	       "std" => "#f1f1f1"),

	array( "name" => __( "Border color","wip"),
	       "desc" => __( "Select a color for header borders.","wip"),
	       "id" => $shortname."_header_border_color",
	       "type" => "color",
	       "std" => "#dddddd"),

	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END HEADER BACKGROUNDS */ 

/* START HEADER BACKGROUND */ 

	array( "type" => "form",
	       "name" => "Backgrounds"),
	   
	array( "type" => "start",
	       "val" => "Bottom Background",
	       "name" => __( "Bottom Background","wip")),

	array( "name" => __( "Bottom","wip"),
	       "desc" => __( "Select a color for bottom background.","wip"),
	       "id" => $shortname."_bottom_background_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Social box","wip"),
	       "desc" => __( "Select a color for social box background.","wip"),
	       "id" => $shortname."_socialbox_background_color",
	       "type" => "color",
	       "std" => "#f1f1f1"),

	array( "name" => __( "Footer","wip"),
	       "desc" => __( "Select a color for footer background.","wip"),
	       "id" => $shortname."_footer_background_color",
	       "type" => "color",
	       "std" => "#ffffff"),

	array( "name" => __( "Border color","wip"),
	       "desc" => __( "Select a color for bottom borders.","wip"),
	       "id" => $shortname."_bottom_border_color",
	       "type" => "color",
	       "std" => "#dddddd"),

	array( "type" => "save-button",
	       "class" => "Body Background",
	       "value" => "Save"),

	array( "type" => "end"),

/* END HEADER BACKGROUNDS */ 

),

array( "type" => "endtab"),
	   
/* =================== END BACKGROUNDS TAB =================== */

array( "type" => "endpanel"),  

);

require_once dirname(__FILE__) . '/../panel.php'; 

wip_panel( $panel ); 

?>
