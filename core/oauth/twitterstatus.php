<?php

/*-----------------------------------------------------------------------------------*/
/* TWITTER STATUS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_status')) {

	function wip_status($status){
									 
		$status = preg_replace("/((http:\/\/|https:\/\/)[^ )
			]+)/e", "'<a href=\"$1\" title=\"$1\" target=\"_blank\" >$1</a>'", $status);
										 
		$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" target=\"_blank\">$1</a>",$status);
										 
		$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" target=\"_blank\">$1</a>",$status);
										 
		return $status;
				
	}

}

?>