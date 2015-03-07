<?php

if (!function_exists('wip_columns_function')) {
	
	function wip_columns_function($atts,  $content = null) {
	
		$content = "<div class='container-fluid'><div class='row-fluid'>" . $title .  do_shortcode($content)  . "</div></div>" ;
		
		return do_shortcode($content);
	}
	
	add_shortcode('columns','wip_columns_function');

}

?>
