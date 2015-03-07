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

if (!function_exists('wip_add_menu')) {

	function wip_add_menu() {
		
		global $themename, $adminmenuname, $optionfile;
		add_theme_page("Nova Options", "Nova Options", 'administrator',  'novaoption', 'novaoption');
	
	}
	
	add_action('admin_menu', 'wip_add_menu'); 

}

if (!function_exists('wip_shortcodes_button')) {

	function wip_shortcodes_button() {
		
		global $wp_version;
		
		if ( $wp_version >= '3.9.0' ) {
	
			if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
				return;
			}
		
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', 'wip_shortcodes_add_button' );
				add_filter( 'mce_buttons', 'wip_shortcodes_register_button' );
			}
		
		}
	}
	
	add_action('admin_head', 'wip_shortcodes_button');

}

if (!function_exists('wip_shortcodes_add_button')) {

	function wip_shortcodes_add_button( $plugin_array ) {
		
		$file_dir = get_template_directory_uri()."/core/admin/include";
	
		$plugin_array['add_shortcodes_button'] = get_template_directory_uri()."/core/admin/include/js/wip_shortcodes.js";
	
		return $plugin_array;
	}

}

if (!function_exists('wip_shortcodes_register_button')) {

	function wip_shortcodes_register_button( $buttons ) {
		
		array_push( $buttons, 'add_shortcodes_button' );
		
		return $buttons;
	}
	
}

if (!function_exists('novaoption')) {

	function novaoption() {
			
			$shortname = "wip";
			require_once dirname(__FILE__) . '/options/options.php';   
	
	}
	
}

if (!function_exists('wip_add_script')) {

	function wip_add_script() {
		
		 global $wp_version;
		 wp_enqueue_style( "thickbox" );
		 add_thickbox();
	
		 $file_dir = get_template_directory_uri()."/core/admin/include";
	
		 wp_enqueue_style ( 'wip_panel', $file_dir.'/css/wip_panel.css' ); 
		 wp_enqueue_style ( 'wip_on_off', $file_dir.'/css/wip_on_off.css' );
		 wp_enqueue_style ( 'wip_shortcodes', $file_dir.'/css/wip_shortcodes.css' );
		 wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto');

		 wp_enqueue_script( 'wip_panel', $file_dir.'/js/wip_panel.js',array('jquery','media-upload','thickbox'),'1.0',TRUE ); 
		 wp_enqueue_script( 'wip_on_off', $file_dir.'/js/wip_on_off.js','3.5', '', TRUE); 
		 wp_enqueue_script( "mColorPicker", $file_dir."/mColorPicker.php", '', '1.0', TRUE ); 
		
		 wp_enqueue_script( "jquery-ui-core", array('jquery'));
		 wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		 wp_enqueue_script( "jquery-ui-sortable", array('jquery'));
	
	}
	
	add_action('admin_init', 'wip_add_script');

}

if (!function_exists('wip_save_option')) {

	function wip_save_option ( $panel ) {
		
		global $message_action;
		
		$wip_setting = get_option( wip_themename() );
		
		if ( $wip_setting != false ) {
		
			$wip_setting = maybe_unserialize( $wip_setting );
		
		} else {
			
			$wip_setting = array();
		
		}      
			
		if ( "Add Sidebar" == wip_request('action') ) {
		
			require_once dirname(__FILE__) . '/sidebars.php';
	
		} 
		
		else if ( "Save" == wip_request('action') ) {
	
			foreach ($panel as $element ) {
				
				if ( ( isset($element['tab']) )  && ( $element['tab'] == $_GET['tab'] ) ){
						
					foreach ($element as $value ) {
						
						if ( $_REQUEST['element-opened'] == "Skins" ) {
									
							require_once dirname(__FILE__) . '/options/skins.php';
							update_option( wip_themename(), array_merge( $wip_setting  ,$current) );
							break;
						
						} else if ( ( isset( $value['id']) ) && ( $value['id'] <> "wip_sidebars" ) && ( $value['id'] == "wip_charset" )) {	
							
							$current[$value["id"]] = $_POST[$value["id"]]; 
							update_option( wip_themename(), array_merge( $wip_setting  ,$current) );

						} else if ( ( isset( $value['id']) ) && ( isset( $_POST[$value["id"]] ) ) && ( $value['id'] <> "wip_sidebars" ) && ( $value['id'] <> "wip_charset" )) {	
									
							$current[$value["id"]] = $_POST[$value["id"]]; 
							update_option( wip_themename(), array_merge( $wip_setting  ,$current) );
						
						}
								
						$message_action = __('Options saved successfully.','wip');
						
					}
				}
			}
		}
	}
}

if (!function_exists('wip_message')) {

	function wip_message () {
			
			global $message_action;
			if (isset($message_action))
			echo '<div id="message" class="updated fade message_save wip_message"><p><strong>'.$message_action.'</strong></p></div>';
	
	}

}

if (!function_exists('wip_delete_sidebar')) {

	function wip_delete_sidebar () {

		global $message_action;
		
		$wip_sidebars = get_option(wip_themename());
		
		if ( ('delete' == wip_request('action')) && ($wip_sidebars) ) {

			$message_action = __('Sidebar deleted successfully.','wip');
			unset($wip_sidebars["wip_sidebars"][$_REQUEST['key']]);
			update_option( wip_themename(), $wip_sidebars );
		}

	}
	
}

?>