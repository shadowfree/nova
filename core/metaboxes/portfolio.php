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

$wip_new_metaboxes = new wip_metaboxes ('portfolio', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip") , "sidebars" => __( "Sidebars","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Url","wip"),
			   "desc" => __( "Work's url.","wip"),
			   "id" => "wip_folio_url",
			   "type" => "text",
			  ),

		array( "name" => __( "Skills","wip"),
			   "desc" => __( "Insert the skills","wip"),
			   "id" => "wip_folio_skills",
			   "type" => "text",
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

array( "type" => "endtab")
)

);


?>