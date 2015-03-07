<div class="container content">
	
    <div class="row">

        <div class="<?php echo wip_template('span')." ".wip_template('sidebar'); ?>"> 

            <div class="row">
            
                <?php if ( have_posts() ) :  ?>
        
                    <?php while ( have_posts() ) : the_post(); ?>
            
                    <div class="pin-article <?php echo wip_template('span'); ?>" >
                
                        <?php do_action('wip_postformat'); ?>
                    
                        <div style="clear:both"></div>
                        
                    </div>
                    
                    <?php endwhile; else:  ?>
            
                    <div class="pin-article <?php echo wip_template('span'); ?>" >
                        
                        <article class="article">
        
                            <h1 class="title"><?php _e( 'Not found',"wip" ) ?></h1>           
                            <p><?php _e( 'Sorry, no posts matched found ',"wip" ) ?></p>
                         
                        </article>
                        
                    </div>
                        
                <?php endif; ?>
            </div>
			<?php do_action( 'wip_pagination', 'home'); ?>
        </div>
        
		<?php if ( ( is_active_sidebar('home-sidebar-area') ) && ( wip_template('span') == "span8" ) ) : ?>
    
                <section id="sidebar" class="span4">
                    <div class="row">
                        <?php dynamic_sidebar('home-sidebar-area') ?>
                    </div>
                </section>
        
		<?php endif; ?>
           
    </div>
</div>