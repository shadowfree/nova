<?php

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */
	
	/* Template Name: Masonry Two Columns */

	get_header(); 
	do_action('wip_header_content', wip_postmeta('wip_header_sidebar'));
	
?> 

<div class="container content">

	<?php 
	
		do_action('wip_custom_masonry','span6');
		wp_reset_query();
		do_action( 'wip_pagination', 'page'); 
		
	?>

</div>

<?php get_footer(); ?>