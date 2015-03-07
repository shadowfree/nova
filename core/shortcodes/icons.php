<?php

if (!function_exists('wip_icon_function')) {

	function wip_icon_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'name' => '',
			'size' => '',
		), $atts));
	
		$icon = '<i class="fa '.$name.' '.$size.'"></i> '; 
		
		return do_shortcode($icon.$content);
	}
	
	add_shortcode('icon','wip_icon_function');

}

?>
