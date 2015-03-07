<div class="container content">

	<div class="row">
    
        <div class="span8 <?php echo str_replace( "masonry-" , "" , wip_setting('wip_category_layout') ); ?>"> 
			
            <div class="row" id="masonry">
            
                <?php if ( have_posts() ) :  ?>
        
                    <?php while ( have_posts() ) : the_post(); ?>
            
                    <div class="pin-article span4" >
                
                        <?php do_action('wip_postformat'); ?>
                    
                        <div style="clear:both"></div>
                        
                    </div>
                    
                    <?php endwhile; else:  ?>
            
                    <div class="pin-article span4" >
                        
                        <article class="article">
        
                            <h1 class="title"><?php _e( 'Not found',"wip" ) ?></h1>           
                            
                            <p><?php _e( 'Sorry, no posts matched into ',"wip" ); echo ":".single_cat_title(); ?></p>
                         
                        </article>
                        
                    </div>
                        
                <?php endif; ?>
            
            </div>
			
			<?php wp_reset_query(); ?>
			
			<?php do_action( 'wip_pagination', 'archive'); ?>
        
        </div>

		<?php if ( is_active_sidebar('category-sidebar-area') ) : ?>
    
			<section id="sidebar" class="span4">
            
				<div class="row">
                
					<?php dynamic_sidebar('category-sidebar-area') ?>
                    
				</div>
                
			</section>
        
		<?php endif; ?>
           
    </div>
    
</div>

<?php do_action('wip_masonry_script'); ?>