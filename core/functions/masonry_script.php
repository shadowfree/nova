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

function wip_masonry_script_function() { ?>

	<script type="text/javascript">
    
	jQuery.noConflict()(function($){
    
		function wip_masonry() {
	   
			var $container = $('#masonry');
		
			$container.imagesLoaded(function(){
			
				$container.masonry({
					itemSelector: '.pin-article',
					isAnimated: true
				});
			
			});
		
		}
	
		$(window).load(function($){
		 
			wip_masonry(); 
	
		});
			
		$(window).resize(function($){
		   
			wip_masonry(); 
		   
		});

    });
    
    </script>

<?php 

} 

add_action( 'wip_masonry_script', 'wip_masonry_script_function', 10, 2 );

?>