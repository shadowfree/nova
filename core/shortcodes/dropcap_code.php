<?php

if (!function_exists('wip_dropcap_function')) {
	
	function wip_dropcap_function ($atts,  $content = null) {
		
		$html =  '<p class="dropcap">' . $content . '</p>';
		
		return $html;
	
	}
	
	add_shortcode('dropcap','wip_dropcap_function');

}

?>
