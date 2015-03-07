<?php

if (!function_exists('wip_list_function')) {
	
	function wip_list_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'icon' => '',
		), $atts));
		
		$content = str_replace('<li>','<li><i class="' . $icon . '"></i>',$content);
		
		$html =  '<ul class="icons">' . $content . '</ul>';
		
		return $html;
	
	}
	
	add_shortcode('list','wip_list_function');
	
}

?>
