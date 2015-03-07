<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('wip_get_title_function')) {
	
	function wip_get_title_function() {
		
		global $post;
		
		$title = get_the_title();
		
		if (!empty($title)) {
	
			if ( (is_home()) || (is_category()) || (is_page_template('masonry-three-columns.php')) || (is_page_template('masonry-two-columns-sidebar.php')) || (is_page_template('masonry-two-columns.php')) || (is_page_template('portfolio-four-columns.php')) || (is_page_template('portfolio-three-columns.php')) || (is_page_template('portfolio-two-columns.php')) || (is_search()) || (is_tag()) ) :
	
?>
					
				<h3 class="title"> <a href="<?php echo get_permalink($post->ID); ?>"> <?php echo $title; ?> </a> </h3>
					
		<?php 
		
			else: 
			
		?>
				
				<h1 class="title"> <?php echo $title; ?> </h1>
				
		<?php 
			
			endif; 
			
		}
		
	}

	add_action( 'wip_get_title', 'wip_get_title_function', 10, 2 );

}

?>