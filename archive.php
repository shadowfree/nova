<?php 

	get_header();
	do_action('wip_header_content', 'header_sidebar_area' );

?>
		
<section id="subheader">

	<div class="container">
    
    	<div class="row">
        
            <div class="span12">
            
				<?php if (is_tag()) { ?>

                    <p><?php _e( 'Tag','wip'); ?> : <?php echo get_query_var('tag');  ?> </p>
				
				<?php  } else if (is_category()) { ?>
                
                    <p><?php _e( 'Category','wip'); ?> : <?php single_cat_title(); ?> </p>

				<?php  } else if (is_month()) { ?>

                    <p><?php _e( 'Archive for','wip'); ?> : <?php the_time('F, Y'); ?> </p>

                <?php } ?>
                
            </div>
                    
		</div>
        
    </div>
    
</section>

<?php

	if ( strstr ( wip_setting('wip_category_layout'), 'span' ) ) { 

		get_template_part('layouts/archive', 'masonry'); 

		
	} else if ( strstr ( wip_setting('wip_category_layout'), 'masonry' ) ) { 
 
		get_template_part('layouts/archive-masonry', 'sidebar'); 

	} else { 
		
		get_template_part('layouts/archive', 'blog'); 
			
	}

	get_footer(); 
	
?>