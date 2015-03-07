<?php

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */
	
	/* Template Name: Masonry + Sidebar */

	get_header(); 
	do_action('wip_header_content', wip_postmeta('wip_header_sidebar'));
	
?> 

<div class="container content">

	<div class="row" >
    
        <div class="span8 <?php echo wip_postmeta('wip_template'); ?>"> 

			<?php 
            
                do_action('wip_custom_masonry','span4');
                wp_reset_query();
                do_action( 'wip_pagination', 'page'); 
                
            ?>

        </div>

        <section id="sidebar" class="span4 <?php echo wip_postmeta('wip_template'); ?>">
            
            <div class="row">
            
            	<?php dynamic_sidebar(wip_postmeta('wip_sidebar')) ?>
            
            </div>
        
        </section>

    </div>
    
</div>

<?php get_footer(); ?>