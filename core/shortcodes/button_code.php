<?php

if (!function_exists('wip_button_function')) {
	
	function wip_button_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'icon' => '',
			'class' => '',
			'size' => '',
			'iconsize' => '',
			'href' => '#',
	
		), $atts));
	
		if ($icon) { $icon = '<i class="fa ' . $icon . '"></i>'; } 
		if ($size) { $size = ' btn-'.$size; } 
	
		$content = '<a class="btn '.$class. ' ' .$size. ' ' . $iconsize .'" href="' .$href.'">' . $icon . ' ' . $content . '</a>' ;
		
		return do_shortcode($content);
	
	}
	
	add_shortcode('button','wip_button_function');

}

?>