<?php

if (!function_exists('wip_youtube_function')) {

	function wip_youtube_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'id_video' => '',
			'autoplay' => '0',
		), $atts));
		
		if ($autoplay == "true" ) $autoplay = "1";
		
		$html =  '<div class="video-container"><div class="video-thumb"><iframe src="http://www.youtube.com/embed/' . $id_video . '?wmode=opaque&amp;autoplay=' . $autoplay . '"></iframe></div></div>';
		
		return $html;
	
	}
	
	add_shortcode('youtube','wip_youtube_function');
	
}

?>
