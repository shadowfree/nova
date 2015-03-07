<div class="container content">

	<div class="row" id="masonry">
    
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
			<div class="pin-article <?php echo wip_setting('wip_category_layout') ?>" >
                
				<?php do_action('wip_postformat'); ?>
                    
                <div style="clear:both"></div>
                        
            </div>
                    
		<?php endwhile; else:  ?>
            
			<div class="pin-article <?php echo wip_setting('wip_category_layout'); ?>" >
                        
				<article class="article">
        
					<h1 class="title"><?php _e( 'Not found',"wip" ) ?></h1>           
                            
					<p><?php _e( 'Sorry, no posts matched into ',"wip" ); echo ":".single_cat_title(); ?></p>
                             
				</article>
                            
            </div>
                            
		<?php endif; ?>
            
	</div>
			
	<?php 
	
		wp_reset_query();
		do_action( 'wip_pagination', 'archive'); 
		
	?>
        
</div>

<?php do_action('wip_masonry_script'); ?>
