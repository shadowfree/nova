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

if (!function_exists('wip_header_content_function')) {

	function wip_header_content_function($header) {
		
	if ( ( is_page()) && (wip_postmeta('wip_slogan')) ) : 
	
?>
	
	<section id="subheader">

		<div class="container">
	
    		<div class="row">
	
    			<div class="span12">
	
    				<p> <?php echo wip_postmeta('wip_slogan'); ?> </p>
	
    			</div>
	
    		</div>
	
    	</div>
	
    </section>
	
<?php 
	
	endif;
	
	if ( is_active_sidebar( $header ) ) : ?>
		
		<section class="container head_widget content">
		
        	<div class="container">

				<section class="row widget">
						
					<?php dynamic_sidebar($header) ?>
					
                </section>
			
			</div>
			
		</section>
		
<?php 
		
		endif; 
		
	}

	add_action( 'wip_header_content', 'wip_header_content_function', 10, 2 );

}

?>