<?php 

if (!function_exists('wip_flexslider_function')) {

	function wip_flexslider_function() {
		
		global $post, $flexitems;
		
		$flexitems++;
		
?>
		
	<div class="pin-container slider-flexslider">
	
		<section class="flexslider">
	
			<ul class="slides">
			  
				<?php 
                    
                	foreach ( wip_postmeta( 'galleries' ) as $slide => $input ) { 
                                
						echo '<li> <img src="'.$input['url'].'" alt="'.$input['title'].'" /> </li>';  
                            
                    }
                    
                ?> 

			</ul>
	
		</section>
	
	</div>
	
<?php 

	} 

	add_action( 'wip_flexslider', 'wip_flexslider_function', 10, 2 );

}

if (!function_exists('wip_flexslider_script_function') ) {

	function wip_flexslider_script_function() { 

		global $flexitems;
		
		if ( $flexitems >= 1 ) {

?>

			<script type="text/javascript">
        
                jQuery.noConflict()(function($){
                            
                    $('.flexslider').flexslider({
                        
                        <?php 

                            if ( wip_setting('wip_flex_animation')) : 
                                echo "animation : ' " . wip_setting('wip_flex_animation') . " ',";
                            else : 
                                echo "animation : 'fade',";
                            endif; 
                            
                            if ( wip_setting('wip_flex_direction')) : 
                                echo "direction : '" . wip_setting('wip_flex_direction') . "',";
                            else : 
                                echo "direction : 'horizontal',";
                            endif; 

                            if ( wip_setting('wip_flex_directionnav') == "on") : 
                                echo 'directionNav : true,';
                            else : 
                                echo 'directionNav : false,';
                            endif; 
        
                            if ( wip_setting('wip_flex_reverse') == "on") : 
                                echo 'reverse : true,';
                            else : 
                                echo 'reverse : false,';
                            endif; 
        
                            if ( wip_setting('wip_flex_slideshowspeed')) : 
                                echo 'slideshowSpeed : ' . wip_setting('wip_flex_slideshowspeed') .',';
                            else : 
                                echo 'slideshowSpeed : 7000,';
                            endif; 
                            
                            if ( wip_setting('wip_flex_animationspeed')) : 
                                echo 'animationSpeed : ' . wip_setting('wip_flex_animationspeed') .',';
                            else : 
                                echo 'slideshowSpeed : 600,';
                            endif; 
        
                        ?>
                        
                        controlNav: false,
                        keyboardNav: false,
                        prevText: "&lt;",
                        nextText: "&gt;",
                        touch: true,
                        
                    });
                        
                });
                            
            </script>
        
<?php 
		
		}
		
	}
	
	add_action( 'wp_footer', 'wip_flexslider_script_function');
	
}

?>