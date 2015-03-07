<?php

/**
 * Provides a notification everytime the theme is updated
 * Original code courtesy of João Araújo of Unisphere Design - http://themeforest.net/user/unisphere
 */

if (!function_exists('wip_update_notifier_menu')) {

	function wip_update_notifier_menu() {  
		
		$xml = wip_latest_theme_version(21600); 
		
		if(version_compare(wip_theme_data('Version'), $xml->latest) == -1) {
		
			add_dashboard_page(wip_theme_data('Name') . ' Theme Updates', wip_theme_data('Name').'<span class="update-plugins count-1"><span class="update-count">1 Update</span></span>', 'read', strtolower(wip_theme_data('Name')) . '-updates', 'wip_update_notifier');
			
		}
		
	}  
	
	add_action('admin_menu', 'wip_update_notifier_menu');

}

if (!function_exists('wip_update_notifier_bar_menu')) {

	function wip_update_notifier_bar_menu() {
	   
		if (function_exists('simplexml_load_string')) {
			global $wp_admin_bar, $wpdb;
		
			$xml = wip_latest_theme_version(21600); 
			
			if ( ! is_object( $xml ) )
				return;
		
				if(version_compare(wip_theme_data('Version'), $xml->latest) == -1) {
				$wp_admin_bar->add_menu( array( 'id' => 'update_notifier', 'title' => '<span> '.wip_theme_data('Name').' <span id="ab-updates">1 Update</span></span>', 'href' => get_admin_url() . 'index.php?page=' . strtolower(wip_theme_data('Name')) . '-updates' ) );
			}
			
		}
		
	}
	
	add_action( 'admin_bar_menu', 'wip_update_notifier_bar_menu', 1000 );
	
}

if (!function_exists('wip_update_notifier')) {

	function wip_update_notifier() { 
	
		$xml = wip_latest_theme_version(21600); 
		
?>
	
		<style>
            .update-nag {display: none;}
            h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
        </style>
    
        <div class="wrap">
        
            <div id="icon-tools" class="icon32"></div>
            <h2><?php echo wip_theme_data('Name') ?> Theme Updates</h2>
            
            <div id="message" class="updated below-h2"><p><strong>There is a new version of the <?php echo wip_theme_data('Name'); ?> theme available.</strong> You have version <?php echo wip_theme_data('Version'); ?> installed. Update to version <?php echo $xml->latest; ?>.</p></div>
            
            <img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd; width:500px" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
            
            <div id="instructions" >
             
                <h3>Update Download and Instructions</h3>
                <p><strong>Please note:</strong> make a <strong>backup</strong> of the Theme inside your WordPress installation folder <strong>/wp-content/themes/<?php echo strtolower(wip_theme_data('Name')); ?>/</strong></p>
                <p>To update the Theme, login to your account, head over to your <strong>downloads</strong> section and re-download the theme like you did when you bought it.</p>
                <p>Before, you have to delete the old version of <strong><?php echo wip_theme_data('Name'); ?></strong> theme and, after, you can install the theme again, from WordPress.</p>
                <p>Important, for don't have this message error <strong>"The package could not be installed. The theme is missing the style.css stylesheet. Theme install failed"</strong>, you have to extract the downloaded package, <strong><?php echo wip_theme_data('Name'); ?>_package.zip</strong> and, after, install the inside archive.</p>
            </div>
            
                <div class="clear"></div>
            
            <h3 class="title">Changelog</h3>
            
			<?php echo $xml->changelog; ?>
    
        </div>
        
<?php

	} 

}

if (!function_exists('wip_latest_theme_version')) {

	function wip_latest_theme_version($interval) {
	
		$notifier_file_url = 'http://demo.themeinprogress.com/' . strtolower(wip_theme_data('Name')) . '/' . strtolower(wip_theme_data('Name')) . 'premium.xml';

		$db_cache_field = wip_theme_data('Name') . '-notifier-cache';
		$db_cache_field_last_updated = wip_theme_data('Name') . '-notifier-last-updated';
		
		$last = get_option( $db_cache_field_last_updated );
		
		$now = time();
	
		if ( !$last || (( $now - $last ) > $interval) ) {
	
			if( function_exists('curl_init') ) { 
				
				$ch = curl_init($notifier_file_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$cache = curl_exec($ch);
				curl_close($ch);
			
			} else {
				
				$cache = file_get_contents( $notifier_file_url ); 
			
			}
			
			if ($cache) {			

				update_option( $db_cache_field, $cache );
				update_option( $db_cache_field_last_updated, time() );			
			}

			$notifier_data = get_option( $db_cache_field );
		}
		
		else {

			$notifier_data = get_option( $db_cache_field );
		}
		
		$xml = @simplexml_load_string($notifier_data); 
		
		return $xml;
		
	}
	
}

?>