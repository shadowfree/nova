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

do_action('wip_thumbnail', 'portfolio'); 

?>
    
<article class="article">

	<?php do_action('wip_get_title'); ?>

    <div class="line"> 
    
        <div class="entry-info">
       
            <div class="entry-date"><strong><?php _e( 'Created on:','wip'); ?></strong> <?php echo get_the_date(); ?> </div>

        </div>

    </div>

	<?php 
	
	the_content();
	
	if (wip_postmeta('wip_folio_url')):
		
		echo '<a class="button" href="'.wip_postmeta('wip_folio_url').'" title="More"> Open </a>';
	
	endif;

	if (wip_postmeta('wip_folio_skills')):
		
		echo '<footer class="line"><span class="entry-info"><strong>Skills:</strong> ' . wip_postmeta('wip_folio_skills') . '</span></footer>';
	
	endif;

	if (wip_setting('wip_view_social_buttons') == "on" ) :
		
		do_action('wip_social_buttons');
		
	endif;


?>

</article>