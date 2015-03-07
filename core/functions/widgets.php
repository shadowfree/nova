<?php

if (!function_exists('wip_loadwidgets')) {

	function wip_loadwidgets() {
	
/*-----------------------------------------------------------------------------------*/
/* 		LOAD ALL SIDEBAR AREAS
/*-----------------------------------------------------------------------------------*/    

		register_sidebar(array(
		
			'name' => 'Sidebar',
			'id'   => 'side_sidebar_area',
			'description'   => 'This sidebar will be shown after the content.',
			'before_widget' => '<div id="%1$s" class="pin-article span4 %2$s"><div class="article">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Home Sidebar',
			'id'   => 'home-sidebar-area',
			'description'   => 'This sidebar will be shown in the homepage.',
			'before_widget' => '<div id="%1$s" class="pin-article span4 %2$s"><div class="article">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Category Sidebar',
			'id'   => 'category-sidebar-area',
			'description'   => 'This sidebar will be shown at the side of content.',
			'before_widget' => '<div id="%1$s" class="pin-article span4 %2$s"><div class="article">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Search Sidebar',
			'id'   => 'search-sidebar-area',
			'description'   => 'This sidebar will be shown at the side of content.',
			'before_widget' => '<div id="%1$s" class="pin-article span4 %2$s"><div class="article">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Header Sidebar',
			'id'   => 'header_sidebar_area',
			'description'   => 'This sidebar will be shown before the content.',
			'before_widget' => '<div id="%1$s" class="pin-article ' . wip_setting('wip_header_sidebar_area') . ' %2$s"><div class="article">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
	
		register_sidebar(array(
		
			'name' => 'Bottom Sidebar',
			'id'   => 'bottom_sidebar_area',
			'description'   => 'This sidebar will be shown after the content.',
			'before_widget' => '<div id="%1$s" class="' . wip_setting('wip_bottom_sidebar_area') . ' %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		
		));
		
		$wip_sidebars = get_option(wip_themename());
		 
		if((isset($wip_sidebars["wip_sidebars"]))) :
		 
		 foreach ($wip_sidebars["wip_sidebars"] as $sidebar ) {
		
		 $sidebar_type = explode("_", $sidebar);
		 
		 if ($sidebar_type[0] == "header") {
			 
			$before_widget =  '<div id="%1$s" class="pin-article ' . wip_setting('wip_header_sidebar_area') . ' %2$s"><div class="article">';
			$after_widget = '</div></div>';
		 
		 } else if ($sidebar_type[0] == "side") {
	
			$before_widget = '<div id="%1$s" class="pin-article span4"><div class="article">';
			$after_widget  = '</div></div>';
	
		 } else if ($sidebar_type[0] == "bottom") {
	
			$before_widget = '<div id="%1$s" class="' . wip_setting('wip_bottom_sidebar_area') . ' %2$s"><div class="widget-box">';
			$after_widget  = '</div></div>';
			 
		 }
		 
		 register_sidebar(array(
		
			'name' => $sidebar_type[1],
			'id'   => $sidebar_type[0]."_".str_replace(" ","",strtolower($sidebar_type[1])),
			'description'   => $sidebar_type[0]."_".str_replace(" ","",strtolower($sidebar_type[1])),
			'before_widget' => $before_widget,
			'after_widget'  => $after_widget,
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
			));
		 
		 }
		 
		 endif;

/*-----------------------------------------------------------------------------------*/
/* 		REGISTER CUSTOM WIDGETS
/*-----------------------------------------------------------------------------------*/    

		register_widget( 'wip_category_widget' );
		register_widget( 'wip_contactform_widget' );
		register_widget( 'wip_contact_info_widget' );
		register_widget( 'wip_facebook_widget' );
		register_widget( 'wip_googlemaps_widget' );
		register_widget( 'wip_menu_widget' );
		register_widget( 'wip_nivoslider_widget' );
		register_widget( 'wip_page_widget' );
		register_widget( 'wip_popup_image_widget' );
		register_widget( 'wip_search_widget' );
		register_widget( 'wip_soundcloud_widget' );
		register_widget( 'wip_twitter_widget' );

	}

	add_action( 'widgets_init', 'wip_loadwidgets' );

}

?>