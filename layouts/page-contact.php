<?php 

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */
	
	/* Template Name: Contact page */

	get_header(); 

?>

<div class="contact-map">
	
	<?php echo do_shortcode('[googlemaps src="'.wip_postmeta('wip_contact_address').'"][/googlemaps]'); ?>

</div>

<?php 

	do_action('wip_header_content', wip_postmeta('wip_header_sidebar'));
	
	if ( (wip_postmeta('wip_content') == "on") || (!wip_postmeta('wip_content') )): ?>

    <div class="container content">
    
        <div class="row" >
        
            <div class="pin-article <?php echo wip_template('span') . " ". wip_template('sidebar'); ?>" >
                
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   
					<?php do_action('wip_postformat'); ?> 
                
                    <?php wp_link_pages(); ?>
            
                <?php endwhile; endif;?>
            
            </div>
        
			<?php get_sidebar(); ?>
    
        </div>
        
    </div>

<?php 
	
	endif; 
	
	do_action( 'wip_footer_content' ); 

	get_footer(); 

?>