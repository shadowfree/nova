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

if (!function_exists('wip_thumbnail_function')) {

	function wip_thumbnail_function($id) {
		
		global $post;
		
		if ( ( (is_single()) || (is_page()) )  && (!is_page_template() ) ) {
		
			if ( has_post_thumbnail() ) {
			
				echo '<div class="pin-container">';
					the_post_thumbnail($id);
				echo '</div>';
			
			} 
	
		} else {
		
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog');
			
			if (!empty($thumb)) :
			
?>
			
			<div class="pin-container">
				
                <div class="overlay-image blog-thumb">
					
                    <img src="<?php echo $thumb[0]; ?>" class="attachment-blog wp-post-image" alt="post image" title="post image"> 
                    <a href="<?php echo get_permalink($post->ID); ?>" class="overlay link"></a>
					
				</div>
			
            </div>
				
<?php
		
		endif;
		
		}
	
	}

	add_action( 'wip_thumbnail', 'wip_thumbnail_function', 10, 2 );

}

if (!function_exists('wip_video_function')) {

	function wip_video_function() {
		
		global $post ;
		
		echo '<div class="pin-container video-thumb"><iframe src="'. wip_postmeta('wip_video_type') . wip_postmeta( 'wip_video_id' ) . '"></iframe></div>';
		
	}

	add_action( 'wip_video', 'wip_video_function', 10, 2 );

}

?>