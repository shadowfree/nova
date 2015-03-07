<?php

if (!function_exists('wip_alert_function')) {

	function wip_alert_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'icon' => '',
			'class' => '',
			'size' => 'small'
		), $atts));
	
		if ($icon) { $icon = '<i class="'.$icon.'"></i>'; } 
		
		$content = '<div class="alert '.$class. ' ' .$size.'">' . $icon . ' ' . $content . '</div>' ;
		
		return do_shortcode($content);
	
	}
	
	add_shortcode('alert','wip_alert_function');

}

?>
