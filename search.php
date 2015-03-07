<?php 

	get_header();
	do_action('wip_header_content', 'header_sidebar_area' );

?>
		

<section id="subheader">

	<div class="container">
		
        <div class="row">
			
            <div class="span12">
			
            	<h1><?php _e( '<span>Search </span> results for', 'wip' ) ?> <strong><?php echo $s; ?> </strong></h1>
			
            </div>

		</div>
        
	</div>
    
</section>

<?php

	if ( strstr ( wip_setting('wip_search_layout'), 'span' ) ) { 
	
		get_template_part('layouts/search', 'masonry'); 

		
	} else if ( strstr ( wip_setting('wip_search_layout'), 'masonry' ) ) {

		get_template_part('layouts/search-masonry', 'sidebar'); 

	} else { 

		get_template_part('layouts/search', 'sidebar'); 
			
	}

	get_footer(); 
	
?>