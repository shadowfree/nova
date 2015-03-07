<?php

if (!function_exists('wip_togglecontainer_function')) {

	function wip_togglecontainer_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
	
		), $atts));
	
		$content = '<div class="toggle_container">' . $content . '</div>' ;
		
		return do_shortcode($content);
	}
	
	add_shortcode('toggle_container','wip_togglecontainer_function');

}

?>
