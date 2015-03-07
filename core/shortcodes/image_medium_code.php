<?php

if (!function_exists('wip_imagemedium_function')) {

	function wip_imagemedium_function ($atts,  $content = null) {
		
		$size = str_replace(".jpg","-290x220.jpg",$content);
		$html =  '<div class="overlay-image shortcode-thumb medium">
		<img src="' . $size . '" class="attachment-works wp-post-image" alt="img5" title="img5">
		<a data-rel="prettyPhoto" href="' . $content . '" class="overlay zoom"></a></div>';
		
		return $html;
	
	}
	
	add_shortcode('image-medium','wip_imagemedium_function');

}

?>
