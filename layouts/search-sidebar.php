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
        
                        <h1 class="title"><?php _e( 'Not Found',"wip" ) ?></h1>
                                
                        <p> <?php _e( 'You can repeat your search with the following form.',"wip" ) ?> </p>
                        
                            <section class="contact-form searchform">
                                
                            <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                
                                <div>
                                <input type="text" placeholder="<?php _e( 'Search here', 'wip' ) ?>"  name="s" id="s" class="input-search"/>
                                <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'wip' ) ?>" />
                                </div>
    
                            </form>
                                
                            <div class="clear"></div>  
                                
                            </section>
                        
                        </article>
                        
                    </div>
                        
                <?php endif; ?>
            </div>
    		
			<?php do_action( 'wip_pagination', 'archive'); ?>
        
        </div>
        
		<?php if ( ( is_active_sidebar('search-sidebar-area') ) && ( wip_template('span') == "span8" ) ) : ?>
    
                <section id="sidebar" class="span4 <?php echo wip_template('sidebar'); ?>">
                
                    <div class="row">
                    
                        <?php dynamic_sidebar('search-sidebar-area') ?>
                        
                    </div>
                    
                </section>
        
		<?php endif; ?>
           
    </div>
    
</div>