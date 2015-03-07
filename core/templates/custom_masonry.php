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

if (!function_exists('wip_custom_masonry_function')) {

	function wip_custom_masonry_function($span) { ?>

        <div class="row" id="masonry">
            
            <?php
    
                $maxpost = get_option('posts_per_page');
                $offset = wip_paged()*get_option('posts_per_page')-get_option('posts_per_page');
                $query = new WP_Query( 'post_type=post&posts_per_page='.$maxpost.'&offset='.$offset.'&paged='.wip_paged() );
                if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query->the_post(); 
    
            ?>
       
            <div <?php post_class(array('pin-article', $span )); ?>>
    
                <?php do_action('wip_postformat'); ?>
    
            </div>
    
            <?php endwhile; endif; ?>
            
        </div>
    
<?php 
    
        do_action('wip_masonry_script'); 
    
    }

	add_action( 'wip_custom_masonry', 'wip_custom_masonry_function', 10, 2 );

}

?>