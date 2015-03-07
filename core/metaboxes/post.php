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

$wip_new_metaboxes = new wip_metaboxes ('post', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip") , "sidebars" => __( "Sidebars","wip") , "postformats" => __( "Post Formats","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Template","wip"),
			   "desc" => __( "Select a template for this page","wip"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","wip"),
				   "left-sidebar" =>  __( "Left Sidebar","wip"),
				   "right-sidebar" => __( "Right Sidebar","wip"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "begintab",
	   "tab" => "sidebars",
	   "element" =>

		array( "name" => __( "Sidebars","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Header sidebar","wip"),
			   "desc" => __( "Select header sidebar","wip"),
			   "id" => "wip_header_sidebar",
			   "type" => "select",
			   "options" => wip_sidebar_list('header'),
			),
			
		array( "name" => __( "Sidebar","wip"),
			   "desc" => __( "Select side sidebar","wip"),
			   "id" => "wip_sidebar",
			   "type" => "select",
			   "options" => wip_sidebar_list('side'),
			),
			
		array( "name" => __( "Bottom sidebar","wip"),
			   "desc" => __( "Select bottom sidebar","wip"),
			   "id" => "wip_bottom_sidebar",
			   "type" => "select",
			   "options" => wip_sidebar_list('bottom'),
			),

),

array( "type" => "endtab"),

array( "type" => "begintab",
	   "tab" => "postformats",
	   "element" =>
	  
		array( "id" => "gallery",
			   "type" => "start",
			 ),
		
		array( "name" => __( "Add a new photo","wip"),
			   "type" => "title",
			  ),

	    array(  "name" => __( "Crea Gallery","wip"),
			   "desc" => __( "Upload the images for gallery","wip"),
			   "id" => "galleries",
			   "type" => "galleries",
       		  ),
		
		array( "type" => "end"),
		
		array( "id" => "quote",
			   "type" => "start",
			 ),
		
		array( "name" => __( "Quote Options","wip"),
			   "type" => "title",
			  ),
			  
		array( "name" => __( "Quote","wip"),
			   "desc" => __( "Insert the text of quote","wip"),
			   "id" => "wip_quote_text",
			   "type" => "textarea",
			  ),
		
		array( "name" => __( "Author","wip"),
			   "desc" => __( "Insert the author of quote","wip"),
			   "id" => "wip_quote_author",
			   "type" => "text",
			  ),
		
		array( "type" => "end"),
		
		array( "id" => "video",
			   "type" => "start",
			 ),
		
		array( "name" => __( "Video Options","wip"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Video Services","wip"),
			   "desc" => __( "Select one of this video services","wip"),
			   "id" => "wip_video_type",
			   "type" => "select",
			   "options" => array(
				   "http://player.vimeo.com/video/" => "Vimeo",
				   "http://www.youtube.com/embed/" => "Youtube" ),
			  ),
			  
		array( "name" => __( "ID Services","wip"),
			   "desc" => __( "Insert the ID of Youtube or Vimeo Video","wip"),
			   "id" => "wip_video_id",
			   "type" => "text",
			  ),
		
		array( "type" => "end"),
		
		array( "id" => "audio",
			   "type" => "start",
			 ),
		
		array( "name" => __( "Audio Options","wip"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Soundcloud","wip"),
			   "desc" => __( "Insert the url of your track","wip"),
			   "id" => "wip_mp3_audio",
			   "type" => "text",
			  ),
			  
		array( "type" => "end"),
		
		array( "id" => "link",
			   "type" => "start",
			 ),
		
		array( "name" => __( "Link Options","wip"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Name of url","wip"),
			   "desc" => __( "Insert the name of your link","wip"),
			   "id" => "wip_url_link_name",
			   "type" => "text",
			  ),
		
		array( "name" => __( "Link","wip"),
			   "desc" => __( "Insert the link with http, for example http://www.wpinprogress.com","wip"),
			   "id" => "wip_url_link",
			   "type" => "text",
			  ),
		
		array( "type" => "end"),

),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>