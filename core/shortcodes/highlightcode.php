<?php

if (!function_exists('wip_highlight_function')) {

	function wip_highlight_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'background' => '',
			'color' => '',
	
		), $atts));
	
		$content = '<span style="background:' . $background . '; color:'. $color .'">' . $content . '</span>' ;
		
		return $content;
	
	}
	
	add_shortcode('highlight','wip_highlight_function');

}

?>
