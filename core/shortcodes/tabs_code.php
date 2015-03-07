<?php

if (!function_exists('wip_tabs_function')) {

	function wip_tabs_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'id' => '',
		), $atts));
		
		$html = '<div id="'.$id.'"><p>'.$content.'</p></div>';
		
		return $html;
	
	}
	
	add_shortcode('tabs','wip_tabs_function');

}

?>
