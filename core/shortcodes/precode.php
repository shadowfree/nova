<?php

if (!function_exists('wip_precode_function')) {
	
	function wip_precode_function($atts,  $content = null) {
		
		$content = '<pre>' . $content . '</pre>' ;
		return $content;
	
	}
	
	add_shortcode('pre','wip_precode_function');
	
}

?>
