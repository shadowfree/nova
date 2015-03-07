<?php

	class wip_cptype {
	   
		public $post_type_name;
		public $post_type_supports;
		public $post_type_cats;
	   
		public function __construct( $name, $supports = array(), $cats ) {
	
			$this->post_type_name = $name ;
			$this->post_type_supports = $supports;
			$this->post_type_cats = $cats;
	
			if ( ! post_type_exists( $this->post_type_name ) ) :  
				add_action( 'init', array( &$this, 'reg_cptype' ) ); 
			endif; 
			 
			if ( isset($cats) ):
				add_action( 'init', array( &$this, 'reg_taxonomy' ) );
			endif;  
	
		}
	
	   public function reg_cptype() {
			
			$cpt_name = $this->post_type_name ;
			$cpt_supports = $this->post_type_supports ;
			
			$labels = 
			array(
				'name' => ucfirst($cpt_name), 
				'singular_name' => $cpt_name,
				'rewrite' => 
					array(
						'slug' => $cpt_name 
					),
				'add_new' => _x('Add Item', $cpt_name), 
				'edit_item' => __('Edit ' .$cpt_name .' Item'),
				'new_item' => __('New ' .$cpt_name .' Item'), 
				'view_item' => __('View ' .$cpt_name ),
				'search_items' => __('Search ' .$cpt_name ), 
				'not_found' =>  __('No ' .$cpt_name. ' Items Found'),
				'not_found_in_trash' => __('No ' .$cpt_name. ' Found In Trash'),
				'parent_item_colon' => '' 
			);
			
			$args = 
			array(
				'labels' => $labels, 
				'public' => true, 
				'publicly_queryable' => true, 
				'show_ui' => true, 
				'query_var' => true, 
				'rewrite' => true, 
				'capability_type' => 'post', 
				'hierarchical' => false, 
				'menu_position' => null,
				'supports' => $cpt_supports 
			);
			
			register_post_type(__( $cpt_name ),$args);
	
	   }
	
		public function reg_taxonomy() {
	
			$cpt_name = $this->post_type_name ;
			$cpt_cat = $this->post_type_cats ;
	
			register_taxonomy(__( $cpt_cat ), 
			array(__( $cpt_name )), 
			array(
				"hierarchical" => true, 
				"label" => __( ucfirst($cpt_cat) ), 
				"singular_label" => __( "category-project" ), 
				"rewrite" => array(
						'slug' => $cpt_cat, 
						'hierarchical' => true
						)
				)
			); 
		}
	
	}

?>