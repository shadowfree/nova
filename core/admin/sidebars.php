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

$sidebarname = $_REQUEST['sidebar_type']."_".$_REQUEST['wip_sidebars'];
$wip_setting = get_option( wip_themename() );


	if ( (!empty($sidebarname)) && (empty($wip_setting["wip_sidebars"])) ) {
			$wip_sidebars = array( "wip_sidebars" => array ($sidebarname) );
			update_option( wip_themename(), array_merge( $wip_setting ,$wip_sidebars) );
			$message_action = 'Sidebar saved successfully.';
		}
						
	else {
			$error = 0;
			
			foreach ($wip_setting["wip_sidebars"] as $singlesidebar) { 
			
			if (empty($_REQUEST['wip_sidebars'])) { 
			$error++;
			$message_action = 'Name missing sidebar.';
			}  
			
			else
		
			if ($singlesidebar == $sidebarname ) { 
					$error++;
					$message_action = 'Sidebar is already exist in the database.';
				} 
	
	
			} 
			
			if (!empty($sidebarname) && ( $error == 0 ) ) { 	
					/* Se la sidebar non è presente, la salvo nel database */
			 		$message_action = 'Sidebar saved successfully.';
			 		array_push ( $wip_setting["wip_sidebars"] , $sidebarname );
	         		update_option( wip_themename(), array_merge( $wip_setting ,$wip_setting["wip_sidebars"]) );
				}

		}

?>