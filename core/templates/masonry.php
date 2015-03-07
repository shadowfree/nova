<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('wip_masonry_function')) {

	function wip_masonry_function($span) { ?>

        <div class="row" id="masonry">
            
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       
            <div <?php post_class(array('pin-article', $span )); ?>>
    
                <?php do_action('wip_postformat'); ?>
    
            </div>
    
            <?php endwhile; endif; ?>
            
        </div>
    
<?php 
    
        do_action('wip_masonry_script'); 
    
    }

	add_action( 'wip_masonry', 'wip_masonry_function', 10, 2 );

}

?>