<?php 

class wip_nivoslider_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::WP_Widget( "wip_nivoslider_widget", "Wip Nivo Slider Widget", array("description" => "Wip Nivo Slider Widget"));
	
	}
	
	public function form( $instance ) {
		
		global $positions;

		$defaults = array( 
			'numbers_elements' => 'All',
			'post_type' => 'post',
        );

		$post_type = array("post","portfolio");
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'numbers_elements' ); ?>">
				<?php _e( "Numbers of elements to display ( Insert 'All' to display all elements) ","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'numbers_elements' ); ?>" name="<?php echo $this->get_field_name( 'numbers_elements' ); ?>" value="<?php echo $instance['numbers_elements']; ?>" />
			
		</p>  
        
		<p>
        
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"> <?php _e( "Post type","wip"); ?> </label>
            
            <select class="widefat" name="<?php echo $this->get_field_name( 'post_type' ); ?>" id="<?php echo $this->get_field_id( 'post_type' ); ?>">
				<?php
                foreach ($post_type as $post_name)
                    {
                        if ($post_name == $instance['post_type'] ) 
                                { echo "<option value='".$post_name."' selected='selected' >".$post_name."</option>"; } else
                                { echo "<option value='".$post_name."'>".$post_name."</option>"; };
                    }
                ?>
            </select>

		</p>
		<?php
	
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['numbers_elements'] = strip_tags( $new_instance['numbers_elements'] );
		$instance['post_type'] = strip_tags( $new_instance['post_type'] );
		
		return $instance;
	}                     
	
		public function widget( $args, $instance ) {
			
		extract( $args );

		echo str_replace('<div class="article">','<div class="nivo-widget">',$before_widget);
		$post_type = $instance['post_type'];
		
		if ($instance['numbers_elements'] == "All") :
			$numbers_elements = "-1";
		else : 
			$numbers_elements = $instance['numbers_elements'];
		endif;
		
		do_action('wip_nivoslider' , $numbers_elements, $post_type);
	
		echo $after_widget;
	}
	
}

?>