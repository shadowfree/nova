<div class="container content">

	<div class="row" >
    
        <div class="span8 <?php echo str_replace( "masonry-" , "" , wip_setting('wip_home') ); ?>"> 
			
			<?php do_action('wip_masonry','span4'); ?>       
			
			<?php wp_reset_query(); ?>
			
			<?php do_action( 'wip_pagination', 'home'); ?>
        
        </div>

		<?php if ( is_active_sidebar('home-sidebar-area') ) : ?>
    
			<section id="sidebar" class="span4">
            
				<div class="row">
                
					<?php dynamic_sidebar('home-sidebar-area') ?>
                    
				</div>
                
			</section>
        
		<?php endif; ?>
           
    </div>
    
</div>