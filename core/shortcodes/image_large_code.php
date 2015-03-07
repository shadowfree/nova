<?php

if (!function_exists('wip_imagelarge_function')) {
	
	function wip_imagelarge_function ($atts,  $content = null) {
		
		$size = str_replace(".jpg","-449x304.jpg",$content);
		$html =  '<div class="overlay-image shortcode-thumb large">
		<img src="' . $size . '" class="attachment-works wp-post-image" alt="img5" title="img5">
		<a data-rel="prettyPhoto" href="' . $content . '" class="overlay zoom"></a></div>';
		
		return $html;
	
	}
	
	add_shortcode('image-large','wip_imagelarge_function');

}

?>
