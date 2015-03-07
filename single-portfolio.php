<?php get_header(); ?>

<!-- start content -->

<div class="container content">

	<div class="row">
       
        <div <?php post_class(array('pin-article', wip_template('span') , wip_template('sidebar'))); ?> >
            
            <?php while ( have_posts() ) : the_post();
            
                do_action('wip_postformat');
    
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