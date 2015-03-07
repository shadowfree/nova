<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

do_action('wip_thumbnail', 'blog'); 

?>

<article class="article">
    
	<?php 
	
		do_action('wip_get_title');
		do_action('wip_before_content');
		do_action('wip_after_content'); 
		
	?>

</article>