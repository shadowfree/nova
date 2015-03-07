<?php

if (!function_exists('wip_twocolumns_function')) {

	function wip_twocolumns_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'icon' => '',
			'span' => 'true'
		), $atts));
	
		if ($icon) { $icon = '<i class="'.$icon.'"></i>'; } 
	
		if ($title) { $title = '<h3 class="title">'.$icon.$title.'</h3>'; }
		
		$content = "<div class='span6'>" . $title .  $content . "</div>" ;
		
		return do_shortcode($content);
	}
	
	add_shortcode('two_columns','wip_twocolumns_function');

}

?>
