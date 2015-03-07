<?php

if (!function_exists('wip_soundcloud_function')) {

	function wip_soundcloud_function($atts,  $content = null)  {
		
		extract(shortcode_atts(array(
			'url' => ''
		), $atts));
		
		global $wp_embed;
		
		$music = '<div class="soundcloud">';
		$music .= '<iframe src="https://w.soundcloud.com/player/?url='.$url.'&amp;output=embed"></iframe>';
		$music .= '</div>';
	
		return $music;
		
	}
	
	add_shortcode('soundcloud','wip_soundcloud_function');
	
}

?>
