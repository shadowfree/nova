<?php

if (!function_exists('wip_fourcolumns_function')) {
	
	function wip_fourcolumns_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'icon' => '',
			'span' => 'true'
		), $atts));
	
		if ($icon) { $icon = '<i class="'.$icon.'"></i>'; } 
	
		if ($title) { $title = '<h3 class="title">'.$icon.$title.'</h3>'; }
		
		$content = "<div class='span3'>" . $title .  $content . "</div>" ;
		
		return do_shortcode($content);
	}
	
	add_shortcode('four_columns','wip_fourcolumns_function');
	
}

?>
