<?php

if (!function_exists('wip_maps_function')) {

	function wip_maps_function($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'src' => '',
			'width' => '',
			'height' => '',
		), $atts));
		
		$country = explode('_', get_locale());
		
		$map  = '<div class="maps-container"><div class="maps-thumb">';
		$map .= '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=' . $country[0] . '&amp;geocode=&amp;q=' . $src . '&amp;hnear=' . $src . '&amp;output=embed"></iframe>';
		$map .= '</div></div>';

		return do_shortcode($map);
		
	}

	add_shortcode('googlemaps','wip_maps_function');

}

?>
