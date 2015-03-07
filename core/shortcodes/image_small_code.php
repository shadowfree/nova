<?php

if (!function_exists('wip_imagesmall_function')) {
	
	function wip_imagesmall_function ($atts,  $content = null) {
		
		$size = str_replace(".jpg","-211x150.jpg",$content);
		$html =  '<div class="overlay-image shortcode-thumb small">
		<img src="' . $size . '" class="attachment-works wp-post-image" alt="img5" title="img5">
		<a data-rel="prettyPhoto" href="' . $content . '" class="overlay zoom"></a></div>';
		
		return $html;
	
	}
	
	add_shortcode('image-small','wip_imagesmall_function');

}

?>
