<?php 

	get_header();
	
	do_action('wip_header_content', 'header_sidebar_area' );

	if ( strstr ( wip_setting('wip_home'), 'span' ) ) { 
		
?>
		
		<div class="container content">
		
			<?php 

				do_action('wip_masonry', wip_setting('wip_home'));      
				do_action( 'wip_pagination', 'home');
			
			?>
		
		</div>
		
<?php 
		
	} else if ( strstr ( wip_setting('wip_home'), 'masonry' ) ) { 
		
		get_template_part('layouts/home', 'masonry'); 

	} else { 
		
		get_template_part('layouts/home', 'blog'); 
			
	}
	
	get_footer(); 

?>