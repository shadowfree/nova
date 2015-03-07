<?php 

if (!function_exists('wip_nivoslider_function')) {

	function wip_nivoslider_function($numbers_elements, $post_type) {
		
		global $post, $nivoitems;
		
		$nivoitems++;
		
?>
		
	<div class="pin-container">
		
        <div class="slider-wrapper theme-default">
			  
			<?php
                
                global $post;
                $query = new WP_Query( array ('post_type' => $post_type, 'posts_per_page' => $numbers_elements, 'meta_key' => '_thumbnail_id' ));
                while( $query->have_posts() ) : $query->the_post();
                    the_post_thumbnail('blog',array('title' => '<h4><a href="'.get_permalink().'">'.get_the_title().' → </a></h4>' ));
                endwhile;
                wp_reset_postdata();
            
            ?>
                    
		</div>
	
	</div>

<?php 

	} 

	add_action( 'wip_nivoslider', 'wip_nivoslider_function', 10, 2 );

}

if (!function_exists('wip_nivoslider_script_function')) {
	
	function wip_nivoslider_script_function() { 
	
		global $nivoitems;
		
		if ( $nivoitems >= 1 ) {
	
?>
	
			<script type="text/javascript">
		
				jQuery.noConflict()(function($){
	
					$('.slider-wrapper').nivoSlider({
						
						<?php 

							if ( wip_setting('wip_nivo_effect')) : 
								echo "effect : '" . wip_setting('wip_nivo_effect') . "',";
							else : 
								echo "effect : 'random',";
							endif; 

							if ( wip_setting('wip_nivo_animationspeed')) : 
								echo "animSpeed : " . wip_setting('wip_nivo_animationspeed') . ",";
							else : 
								echo 'animSpeed : 500,';
							endif; 
							
							if ( wip_setting('wip_nivo_pause_time')) : 
								echo 'pauseTime : ' . wip_setting('wip_nivo_pause_time') .',';
							else : 
								echo 'pauseTime : 3000,';
							endif; 
		
						?>
	
						directionNav: true,
						controlNav: false,
						controlNavThumbs: false,
						manualAdvance: false,
						pauseOnHover: false
	
					});
	
				});
							
			</script>
		
<?php 
	
		}
	
	}

	add_action( 'wp_footer', 'wip_nivoslider_script_function');

}

?>