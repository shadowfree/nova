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

if (!function_exists('wip_after_content_function')) {

function wip_after_content_function() {

	if ((is_home()) || (is_category()) || (is_page() )) {
		
		if ( (!wip_setting('wip_view_readmore')) || (wip_setting('wip_view_readmore') == "on" ) ) {
		
			do_action('wip_excerpt'); 
		
		} else if (wip_setting('wip_view_readmore') == "off" ) {
		
			the_content(); 
		
		}
	
	} else {
	
		the_content();
		
		the_tags( '<footer class="line"><span class="entry-info"><strong>Tags:</strong> ', ', ', '</span></footer>' );

		if (wip_setting('wip_view_social_buttons') == "on" ) :
			do_action('wip_social_buttons');
		endif;
		
		if (wip_setting('wip_view_comments') == "on" ) :
			comments_template();
		endif;
	
	}

} 

add_action( 'wip_after_content', 'wip_after_content_function', 10, 2 );

}

?>