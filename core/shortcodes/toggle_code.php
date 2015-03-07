<?php

if (!function_exists('wip_toggle_function')) {

	function wip_toggle_function( $atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
	
		), $atts));
	
		$content = '<h5 class="element">' . $title . ' <i class="fa fa-chevron-down"></i> </h5><div class="toggle" style="display: none; ">' . $content . '</div>' ;
		
		return do_shortcode($content);
	}
	
	add_shortcode('toggle', 'wip_toggle_function');

}

?>
