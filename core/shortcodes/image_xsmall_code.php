<?php

if (!function_exists('wip_imagexsmall_function')) {

	function wip_imagexsmall_function ($atts,  $content = null) {
		
		$size = str_replace(".jpg","-150x150.jpg",$content);
		$html =  '<div class="overlay-image shortcode-thumb xsmall">
		<img src="' . $size . '" class="attachment-works wp-post-image" alt="img5" title="img5">
		<a data-rel="prettyPhoto" href="' . $content . '" class="overlay zoom"></a></div>';
		
		return $html;
	
	}
	
	add_shortcode('image-xsmall','wip_imagexsmall_function');
	
}

?>
