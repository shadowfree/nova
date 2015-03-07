<?php 

class wip_category_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::WP_Widget( "wip_category_widget", "Wip Category Widget", array("description" => "Wip Menu Widget"));
	
	}
	
	public function form( $instance ) {

		$defaults = array( 
			'title' => 'Blog Category',
			'counts' => NULL,
			'positions' => NULL,
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$counts = array("No","Yes");

		?>
        
		<p>
			
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> <?php _e('Title','wip'); ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
        
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"> <?php _e('Display the counts?','wip'); ?> </label>
           
            <select class="widefat" name="<?php echo $this->get_field_name( 'counts' ); ?>" id="<?php echo $this->get_field_id( 'counts' ); ?>">
				
				<?php  
					
					foreach ($counts as $count => $countname ) {
						
                        if ($count == $instance['counts'] ) { 
						
							echo "<option value='".$count."' selected='selected' >".$countname."</option>"; 
							
						} else { 
						
							echo "<option value='".$count."'>".$countname."</option>"; 
						
						}
                    
					}
                
				?>
                
            </select>

		</p>

		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['counts'] = strip_tags( $new_instance['counts'] );
		
		return $instance;
	
	}                     
	
		public function widget( $args, $instance ) {
			
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
		
		if ( $title ) {
			
			echo $before_title.$title.$after_title;
		
		}
		
?>
      
        <ul class="widget-category">
			
			<?php wp_list_categories('orderby=name&show_count=0&title_li=0&hierarchical=0&show_count='.$instance['counts'].''); ?> 
		
        </ul>

<?php
		echo $after_widget;

	}
	
}

?>