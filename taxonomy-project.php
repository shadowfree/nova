<?php 

	get_header();
	do_action('wip_header_content', 'header_sidebar_area' );

?>
		

<section id="subheader">

	<div class="container">
    
    	<div class="row">
        
        	<div class="span12">
            
            	<p> <?php _e( 'Project','wip'); ?> : <?php echo $wp_query->queried_object->name; ?> </p>
                
            </div>
            
        </div>
        
    </div>
    
</section>

<div class="container main-content blog content">
	
    <div class="row">

        <div class="<?php echo wip_template('span')." ".wip_postmeta('wip_template'); ?>"> 
   		
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
                            <p><?php _e( 'Sorry, no posts matched into ',"wip" ) ?> <strong> <?php echo $wp_query->queried_object->name; ?></strong></p>
                         
                        </article>
                        
                    </div>
                        
                <?php endif; ?>

            </div>
		
			<?php do_action( 'wip_pagination', 'archive');  ?>
            
        </div>

		<?php if ( ( is_active_sidebar('category-sidebar-area') ) && ( wip_template('span') == "span8" ) ) : ?>
    
            <div class="row"> 
            
                <section id="sidebar" class="span4 <?php echo wip_template('sidebar'); ?>">
                
                    <div class="row">
                    
                        <?php dynamic_sidebar('category-sidebar-area') ?>
                        
                    </div>
                    
                </section>
                
            </div>
        
		<?php endif; ?>
           
    </div>
    
</div>

<?php get_footer(); ?>