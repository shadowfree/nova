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

if (!function_exists('wip_portfolio_filtrable_function')) {

	function wip_portfolio_filtrable_function($span) { 
	
		global $post;
	
	?>
	
	<script type="text/javascript">
	
	jQuery(document).ready(function($){
	
		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems
			
		$filter = jQuery('.filter li.active a').attr('class');
			
		$container = jQuery('ul.filterable-grid');
			
		$filterLink = jQuery('.filter li a');
			
		$containerClone = $container.clone();
		$filteredItems = $containerClone.find('li');

		$filterLink.click(function(e) {
			
			jQuery('.filter li').removeClass('active');
				
			$filter = jQuery(this).attr('class').split(' ');
				
			jQuery(this).parent().addClass('active');
				
			if ($filter == 'all') {
			
				$filteredItems = $containerClone.find('li'); 
			
			} else {
			
				$filteredItems = $containerClone.find('li[data-type~=' + $filter + ']'); 
		
			}
				
			$container.quicksand($filteredItems, 
				{
					duration: 750,
					// the easing effect when animation
					easing: 'easeInOutCirc',
					// height adjustment becomes dynamic
					adjustHeight: 'dynamic' 
				
				});
	
	
			$container.quicksand($filteredItems, 
				function () { lightbox(); }
			);	
	
			return false;
	
		});
	
		function lightbox() {
	
			jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
	
				animationSpeed:'fast',
				slideshow:5000,
				theme:'pp_default',
				show_title:false,
				overlay_gallery: false,
				social_tools: false
				
			});
			
		}
	
	});
		
	</script>
	
	<div class="container">
		
		<div class="row">
		   
			<div class="span12">
	
				<div style="position:relative;" class="skills">
				
				<div class="views">View projects <i class="fa fa-chevron-down"></i> </div>
				
				<ul class="filter" style="list-style:none; padding:0; margin:0">
				
				<li class="active"><a href="#" class="all">All projects</a></li>
				
				<?php
				
					$terms = get_terms('project');
					$count = count($terms); 
					if(!empty($terms)) {
						foreach ($terms  as $term) {
						$i++;
						$term_list  .= '<li style="display:block"><a href="#" class="'.  $term->slug .'">' . $term->name .' </a></li> ';
						}
						echo $term_list;
					}
					
				?>
				
				</ul>
				
				</div>
	
			</div>
		
		</div>
	
		<div class="row portfolio-grid" style="overflow:hidden" >
		
			<ul class="filterable-grid" >
		  
			<?php
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$maxpost = get_option('posts_per_page');
				$offset = $paged*get_option('posts_per_page')-get_option('posts_per_page');
				$query = new WP_Query( 'post_type=portfolio&posts_per_page=-1' );
				if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query->the_post(); 
				$postterms = get_the_terms( $post->ID, 'project' );
				
			?>
					
				<li data-id="id-<?php echo $count; ?>" data-type="<?php if ( $postterms && ! is_wp_error( $postterms ) ) : foreach ($postterms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name).' '); } endif; ?>" class="<?php echo $span; ?>" >
						
					<article class="works" style="background:#fff; padding:4px; border:solid 1px #ccc; display:block; position:relative">
						
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
							
							$large_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), array( 300,300 ));
							the_post_thumbnail('portfolio'); 
						?>
						
							<div class="overlay">
								<?php if (has_post_thumbnail()) : ?> <a data-rel="prettyPhoto" href="<?php echo $large_image ?>" class="zoom"></a> <?php endif;?>
							</div>  
						
						<?php endif; ?>
							
						<h4 class="title"><a href="<?php echo get_permalink($post->ID); ?>" class="link"><?php echo get_the_title(); ?></a> </h4>
							
					</article>
						
				</li>
			
				<?php 
							
					$count++; 
					endwhile; 
					endif; 
					wp_reset_query();
				?>
				
			</ul>
	
		</div>
		
	</div>
	
<?php 
	
	}

	add_action( 'wip_portfolio_filtrable', 'wip_portfolio_filtrable_function', 10, 2 );

}

?>