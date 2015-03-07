<?php

if (!function_exists('wip_tabscontainer_function')) {

	function wip_tabscontainer_function($atts, $content = null) {
	
		$html = '<div class="tabs"> <ul> ';
			
		foreach($atts as $id => $title)
			$html .= '<li><a href="#'.$id.'" title="'.$title.'">'.$title.'</a></li>';
	
		$html .= '<div class="clear"></div></ul><div class="tabs-container">';
		
		$html .= do_shortcode($content);
	
		$html .= '<div class="clear"></div></div></div>';
	
		return $html;
	
	}
	
	add_shortcode('tabs_container','wip_tabscontainer_function');

}

?>
