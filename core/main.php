<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @theme Sueva
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('wip_title')) {

	function wip_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'wip' ), max( $paged, $page ) );
	
		return $title;
		
	}
	
	add_filter( 'wp_title', 'wip_title', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* ADMIN CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_admin_body_class')) {

	function wip_admin_body_class( $classes ) {
		
		global $wp_version;
		
		if ( ( $wp_version >= 3.8 ) && ( is_admin()) ) {
			$classes .= 'wp-8';
		}
			return $classes;
	}
		
	add_filter( 'admin_body_class', 'wip_admin_body_class' );

}

/*-----------------------------------------------------------------------------------*/
/* SHORTCODES */
/*-----------------------------------------------------------------------------------*/   

add_filter('widget_text', 'do_shortcode');

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_require')) {

	function wip_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !wip_setting('wip_loadsystem') ) || ( wip_setting('wip_loadsystem') == "mode_a" ) ) {
		
				$folder = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($folder);  
				  
				foreach ($files as $key => $name) {  
				
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
					
						require_once $folder . $name;
					
					} 
				}  
			
			} else if ( wip_setting('wip_loadsystem') == "mode_b" ) {
	
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
					
						require_once get_template_directory()."/".$folder.$filename;
					
					}
				}
			}
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_enqueue_script')) {

	function wip_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !wip_setting('wip_loadsystem') ) || ( wip_setting('wip_loadsystem') == "mode_a" ) ) {
		
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  

					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
						
					} 
				}  
			
			} else if ( wip_setting('wip_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
					
					}
					
				}
		
			}
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_enqueue_style')) {

	function wip_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !wip_setting('wip_loadsystem') ) || ( wip_setting('wip_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  
					
					if ( (!is_dir($name)) && ( $name <> ".DS_Store" ) ) { 
						
						wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
						
					} 
				}  
			
			
			} else if ( wip_setting('wip_loadsystem') == "mode_b" ) {
	
			
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				
					}
				
				}
			
			}
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* REQUEST FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_request')) {

	function wip_request($id) {
		
		if ( isset ( $_REQUEST[$id])) 
		return $_REQUEST[$id];	
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME PATH */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_theme_data')) {

	function wip_theme_data($id) {
		
		 global $wp_version;	
		 
		 if ( $wp_version <= 3.4 ) :
		
			$themedata = get_theme_data(TEMPLATEPATH. '/style.css');
			return $themedata[$id];
		 
		 else:
		
			$themedata = wp_get_theme();
			return $themedata->get($id);
		
		 endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME NAME */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_themename')) {

	function wip_themename() {
		
		$themename = "nova_theme_settings";
		return $themename;	
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_setting')) {
	
	function wip_setting($id) {
	
		$wip_setting = get_option(wip_themename());
		if(isset($wip_setting[$id]))
			return $wip_setting[$id];
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_postmeta')) {
	
	function wip_postmeta($id) {
	
		global $post;
		
		if (!is_404()) {
			
			$val = get_post_meta( $post->ID , $id, TRUE);
			if(isset($val))
			return $val;
		
		} else {
			
			return null;
		
		}
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAILS */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('wip_get_thumbs')) {

	function wip_get_thumbs($type) {
		
		if (wip_setting('wip_'.$type.'_thumbinal')):
			
			return wip_setting('wip_'.$type.'_thumbinal');
		
		else:
		
			return "429";
		
		endif;
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* DEFAULT STYLE, AFTER THEME ACTIVATION */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$wip_setting = get_option(wip_themename());

	if (!$wip_setting) {	
		
		$skins = array( 

		"wip_loadsystem" => "mode_a",
		"wip_skins" => "light_turquoise", 
		
		"wip_logo_font" => "Montez", 
		"wip_logo_font_size" => "55px", 
		
		"wip_menu_font" => "Oxygen", 
		"wip_menu_font_size" => "14px", 

		"wip_content_font" => "Oxygen", 
		"wip_content_font_size" => "14px", 

		"wip_titles_font" => "Yanone Kaffeesatz", 
		
		"wip_text_font_color" => "#616161", 
		
		"wip_link_color" => "#48c9b0", 
		"wip_link_color_hover" => "#1abc9c",
	
		"wip_header_text_color" => "#616161",
		"wip_subheader_text_color" => "#616161",
	
		"wip_bottom_text_color" => "#616161",
		"wip_social_icons_color" => "#dddddd",
		"wip_social_icons_hover" => "#ffffff",
		"wip_copyright_text_color" => "#616161",
	
		"wip_body_background" => "/images/background/patterns/pattern12.jpg",
		"wip_body_background_repeat" => "repeat",
		"wip_body_background_color" => "#f3f3f3",
	
		"wip_header_background_color" => "#ffffff",
		"wip_subheader_background_color" => "#f1f1f1",
		"wip_header_border_color" => "#dddddd",
	
		"wip_bottom_background_color" => "#ffffff",
		"wip_socialbox_background_color" => "#f1f1f1",
		"wip_footer_background_color" => "#ffffff",
		"wip_bottom_border_color" => "#dddddd",
	
		"wip_home" => "full",
		"wip_category_layout" => "full",
		"wip_search_layout" => "full",
		
		"wip_view_comments" => "on",
		"wip_view_social_buttons" => "on",

		"wip_header_sidebar_area" => "span12",
		"wip_bottom_sidebar_area" => "span4",
		
		"wip_footer_facebook_button" => "http://www.facebook.com/WpInProgress",
		"wip_footer_twitter_button" => "https://twitter.com/#!/WPinProgress",
		"wip_footer_skype_button" => "skype:alexvtn",
		"wip_footer_email_button" => "mailto:info@wpinprogress.com",
		
		"wip_nivo_effect" => "random",
		"wip_flex_directionnav" => "on",
		
		);
	
		update_option( wip_themename(), $skins ); 
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* CONTENT TEMPLATE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_template')) {

	function wip_template($id) {
	
		$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );
	
		$span = $template["full"];
		$sidebar =  "full";
	
		if ( is_search() ) {
			
			$span = $template[wip_setting('wip_search_layout')];
			$sidebar =  wip_setting('wip_search_layout');
				
		} else if ( (is_category()) || (is_tag()) || (is_tax()) || (is_month()) ) {
			
			$span = $template[wip_setting('wip_category_layout')];
			$sidebar =  wip_setting('wip_category_layout');
				
		} else if (is_home()) {
			
			$span = $template[wip_setting('wip_home')];
			$sidebar =  wip_setting('wip_home');
				
		} else if (wip_postmeta('wip_template')) {
			
			$span = $template[wip_postmeta('wip_template')];
			$sidebar =  wip_postmeta('wip_template');
				
		}
	
		return ${$id};
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR LIST */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_sidebar_list')) {

	function wip_sidebar_list($sidebar_type) {
		
		$wip_sidebars = get_option(wip_themename());
	
		$default = array("none" => "None", $sidebar_type."_sidebar_area" => "Default");
			
		$sidebar_list = array();
			
		if(!empty($wip_sidebars["wip_sidebars"])):
			
			foreach ($wip_sidebars["wip_sidebars"] as $sidebar_item => $sidebar_items) {
					
				$sidebar = explode("_", $sidebar_items);
	
					if ($sidebar[0] == $sidebar_type)
					
						$sidebar_list[str_replace(" ","",strtolower($sidebar_items))] =  $sidebar[1];
						
					} 
					
			return array_merge($default, $sidebar_list);
	
		else:
				
			return $default;
				
		endif;
			
	}

}

/*-----------------------------------------------------------------------------------*/
/* TWITTER STATUS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_status')) {

	function wip_status($status){
									 
		$status = preg_replace("/((http:\/\/|https:\/\/)[^ )
			]+)/e", "'<a href=\"$1\" title=\"$1\" target=\"_blank\" >$1</a>'", $status);
										 
		$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" target=\"_blank\">$1</a>",$status);
										 
		$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" target=\"_blank\">$1</a>",$status);
										 
		return $status;
				
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_paged')) {

	function wip_paged() {
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		return $paged;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* ADMIN MENU */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_option_panel')) {

	function wip_option_panel() {
	
		global $wp_admin_bar, $wpdb;
		$wp_admin_bar->add_menu( array( 'id' => 'novaoptions', 'title' => '<span> Nova Options </span>', 'href' => get_admin_url() . 'themes.php?page=novaoption' ) );
	
	}
	
	add_action( 'admin_bar_menu', 'wip_option_panel', 1000 );

}

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_prettyPhoto')) {

	function wip_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}
	
	add_filter( 'wp_get_attachment_link', 'wip_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* CUSTOM EXCERPT MORE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_hide_excerpt_more')) {

	function wip_hide_excerpt_more() {
		return '';
	}
	
	add_filter('the_content_more_link', 'wip_hide_excerpt_more');
	add_filter('excerpt_more', 'wip_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_remove_category_list_rel')) {

	function wip_remove_category_list_rel($output) {
	
		$output = str_replace('rel="category"', '', $output);
		return $output;
	
	}
	
	add_filter('wp_list_categories', 'wip_remove_category_list_rel');
	add_filter('the_category', 'wip_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_remove_thumbnail_dimensions')) {

	function wip_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	
	}
	
	add_filter( 'post_thumbnail_html', 'wip_remove_thumbnail_dimensions', 10, 3 );
  
}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_my_gallery_style')) {

	function wip_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'wip_my_gallery_style', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* GET FONTS */
/*-----------------------------------------------------------------------------------*/  
 
if (!function_exists('wip_jsonfile')) {
	
	function wip_jsonfile( $name ) {

		$ch = curl_init();
		
		curl_setopt ($ch, CURLOPT_URL, get_template_directory_uri() . '/core/admin/options/json/' . $name );
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$file_contents = curl_exec($ch);
		curl_close($ch);
		
		$jsonfile = json_decode( $file_contents, true );
		
		return $jsonfile;

	}
	
}

/*-----------------------------------------------------------------------------------*/
/* GOOGLE FONTS */
/*-----------------------------------------------------------------------------------*/  
 
if (!function_exists('wip_get_font')) {
	
	function wip_get_font( $name, $type) {
	
		$jsonfile = wip_jsonfile("googlefonts.json");
		
		$fontsarray = $jsonfile['items'];

		if (!function_exists('wip_variants')) {

			function wip_variants( $array ) {
			  
				$search = array( 
				
					"regular" => "400", 
					"italic" => "400italic" 
				
				);
				
				foreach ( $search as $key => $val ) {
				
					if ( in_array( $key, $array)) {
						
						$array[ array_search( $key, $array )]= $val; 
					
					}
					
				}
			
				return $array;
			
			}
		
		}
		
		foreach ( $fontsarray as $font ) {
		
			$getfont[$font['family']] = implode( ",", wip_variants( $font['variants']));
			$getlist[$font['family']] = $font['family'];

		}

		if ( $type == "getfont" ) :
		
			return $getfont[$name];
		
		else:
		
			return $getlist;
		
		endif;
			
	}

}

/*-----------------------------------------------------------------------------------*/
/* FONT LIST */
/*-----------------------------------------------------------------------------------*/  
 
if (!function_exists('wip_fontlist')) {
	
	function wip_fontlist() {

		$fontsarray = array (
			
			'Yanone+Kaffeesatz', 
			'Montez', 
			'Oxygen', 
			
			wip_setting("wip_logo_font"), 
			wip_setting("wip_menu_font"), 
			wip_setting("wip_logo_description_font"), 
			wip_setting("wip_titles_font"),
			wip_setting("wip_content_font")
			
		);
		
		$fonts = array_unique($fontsarray); 
		
		foreach ( $fonts as $fontname ) {
			
			if ($fontname) { 
				
				$fontlist[] = str_replace(" ","+", $fontname) . ":" . wip_get_font( $fontname, "getfont" ); 
			
			}
	
		}
		
		$charset = ""; 
		
		if ( wip_setting('wip_charset') ) {
			
			$charset = "&subset=" . implode(",", wip_setting('wip_charset'));
			
		}
		
		return implode( "|", $fontlist) . $charset;
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wip_scripts_styles')) {

	function wip_scripts_styles() {
	
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family= "' . wip_fontlist() );
		
		wip_enqueue_style('/css');
	
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		
		wip_enqueue_script('/js');
	
	}
	
	add_action( 'wp_enqueue_scripts', 'wip_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wip_setup')) {

	function wip_setup() {

		global $nivoitems, $flexitems;

		$nivoitems = 0;
		$flexitems = 0;

		if ( ! isset( $content_width ) )
			
			$content_width = 1170;

		load_theme_textdomain('wip', get_template_directory() . '/languages');

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	
		add_image_size( 'blog', 1170,wip_get_thumbs('blog'), TRUE ); 
		add_image_size( 'portfolio', 1170,wip_get_thumbs('portfolio'), TRUE ); 
		add_image_size( 'slide', 1170,wip_get_thumbs('slide'), TRUE ); 
		
		add_image_size( 'large', 449,304, TRUE ); 
		add_image_size( 'medium', 290,220, TRUE ); 
		add_image_size( 'small', 211,150, TRUE ); 
	
		register_nav_menu( 'main-menu', 'Main menu' );
		
		$require_array = array (
		
			"/core/shortcodes/",
			"/core/widgets/",
			"/core/templates/",
			"/core/functions/",
			"/core/sliders/",
			"/core/oauth/",
			"/core/classes/",
			"/core/custom-post/",
			"/core/metaboxes/"
		
		);
		
		foreach ( $require_array as $require_file ) {	
		
			wip_require($require_file);
		
		}

	}
	
	add_action( 'after_setup_theme', 'wip_setup' );
	
}

?>