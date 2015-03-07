<?php

if (!function_exists('wip_vimeo_function')) {

	function wip_vimeo_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'id_video' => '',
			'autoplay' => 'false',
		), $atts));
		
		$html =  '<div class="video-container"><div class="video-thumb"><iframe src="http://player.vimeo.com/video/' . $id_video . '?wmode=opaque&amp;autoplay=' . $autoplay . '"></iframe></div></div>';
	
		return $html;
	
	}
	
	add_shortcode('vimeo', 'wip_vimeo_function');
	
}

?>
