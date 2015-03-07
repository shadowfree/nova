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

$wip_new_metaboxes = new wip_metaboxes ('page', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip") , "sidebars" => __( "Sidebars","wip"), "contactpage" => __( "Contact Page","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Slogan","wip"),
			   "desc" => __( "Insert the slogan of page","wip"),
			   "id" => "wip_slogan",
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
array( "type" => "begintab",
	   "tab" => "contactpage",
	   "element" =>
	  
		array( "name" => __( "Contact Page Options","wip"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Address","wip"),
			   "desc" => __( "Insert the address for Contact page","wip"),
			   "id" => "wip_contact_address",
			   "type" => "text",
			  ),


),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>