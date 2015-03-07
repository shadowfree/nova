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

/*-----------------------------------------------------------------------------------*/
/* Bottom content */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_bottom_content')) {

	function wip_bottom_content() {
	
		if ( (is_single()) || (is_page())) {
			
			$sidebarname = wip_postmeta('wip_bottom_sidebar');
		
		} else {
			
			$sidebarname = "bottom_sidebar_area";
		
		}
	
		if ( ( $sidebarname <> "none" ) && ( is_active_sidebar($sidebarname) ) ) : ?>
		
		<section class="bottom bottom_widget content">
	
    		<div class="container">
						
				<section class="row widget">
					
					<?php dynamic_sidebar($sidebarname) ?>
				
                </section>
			
			</div>
			
		</section>
		
<?php 
		
		endif; 
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Analytics code */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_analytics_function')) {

	function wip_analytics_function() {
	
		if(wip_setting('wip_analytics_code'))
		echo stripslashes ( wip_setting('wip_analytics_code'));
	}
	
	add_action('wp_footer', 'wip_analytics_function');

}

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_socials_function')) {

function wip_socials_function() {
	
	$socials = array ( 
	
		"fa-facebook" => "facebook" , 
		"fa-twitter" => "twitter" ,
		"fa-flickr" => "flickr" ,
		"fa-google-plus" => "google" ,
		"fa-linkedin" => "linkedin" ,
		"fa-pinterest" => "pinterest" ,
		"fa-tumblr" => "tumblr" ,
		"fa-youtube" => "youtube" ,
		"fa-vimeo-square" => "vimeo" ,
		"fa-skype" => "skype" ,
		"fa-instagram" => "instagram" ,
		"fa-github" => "github" ,
		"fa-xing" => "xing" ,
		"fa-envelope-o" => "email" ,
	
	);
	
	$i = 0;
	$html = "";
	
	foreach ( $socials as $social_icon => $social_name) { 
	
	
		if (wip_setting('wip_footer_'.$social_name.'_button')): 
		
			$i++;	
            $html.= '<a href="'.wip_setting('wip_footer_'.$social_name.'_button').'" target="_blank" class="social"> <i class="fa '.$social_icon.'" ></i> </a> ';
		
		endif;
		
	}
	
	if (wip_setting('wip_footer_rss_button') == "on"): 
	
		$i++;	
		$html.= '<a href="'. get_bloginfo('rss2_url'). '" title="Rss" class="social rss"> <i class="fa fa-rss" ></i>  </a> ';
	
	endif; 
		
	if ( $i > 0 ) {
		
	?>

    <section class="bottom bottom_socials">
    
        <div class="container">
    
            <div class="row copyright" >
      
                <div class="span12">
        
                    <div class="socials">
                        
                        <?php echo $html; ?>
                        
                    </div>
        
                </div>
    
            </div>
  
        </div>
   
    </section>

<?php

	}
	
}

add_action( 'wip_socials', 'wip_socials_function', 10, 2 );

}

?>