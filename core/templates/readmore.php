<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('wip_excerpt_function')) {

	function wip_excerpt_function() {
		
		global $post,$more;
		
		$more = 0;
		
		if ($pos=strpos($post->post_content, '<!--more-->')): 
		
			$output = '<p>'.strip_tags(get_the_content()).'</p><p><a class="button" href="'.get_permalink($post->ID).'" title="More"> ' . __( "Read More","wip") . ' →</a></p>';
		
		else:
		
			$output = '<p>'.get_the_excerpt().'</p><p><a class="button" href="'.get_permalink($post->ID).'" title="More"> ' . __( "Read More","wip") . ' →</a></p>';
		
		endif;
		
		echo $output;
	
	}

	add_action( 'wip_excerpt', 'wip_excerpt_function', 10, 2 );

}

?>