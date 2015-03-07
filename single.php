<?php get_header(); ?>

<div class="container content">
	
    <div class="row">
       
        <div <?php post_class(array('pin-article', wip_template('span') , wip_template('sidebar'))); ?> >
            
            <?php 
            
                while ( have_posts() ) : the_post();
            
                    do_action('wip_postformat');
                    
                    wp_link_pages(array('before' => '<div class="wip-pagination">' . __('Pages:','wip'), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>') ); 
                
            ?>
                
            <div style="clear:both"></div>
            
        </div>

		<?php 
        
            get_sidebar();
            endwhile;
            
        ?>
           
    </div>

</div>

<?php get_footer(); ?>