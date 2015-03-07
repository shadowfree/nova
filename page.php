<?php 

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */

	get_header(); 
	do_action('wip_header_content', wip_postmeta('wip_header_sidebar'));

?> 

<div class="container content">

    <div class="row" >
    
        <div class="pin-article <?php echo wip_template('span') . " ". wip_template('sidebar'); ?>" >
            
        <?php 
        
            while ( have_posts() ) : the_post();
        
                do_action('wip_postformat'); 
            
                wp_link_pages(array('before' => '<div class="wip-pagination">' . __('Pages:','wip'), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>') ); 
            
            endwhile; 
        
        ?>
        
        </div>
        
        <?php get_sidebar(); ?>

    </div>
    
</div>

<?php get_footer(); ?>