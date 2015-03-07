<?php 

class wip_contactform_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::WP_Widget( "wip_contactform_widget", "Wip Contact Form Widget", array("description" => "Wip Contact Form Widget"));
	
	}
	
	public function form( $instance ) {
		
		$defaults = array( 
			'title' => 'Contact Form',
			'email' => NULL,
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( "Title","wip"); ?>:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">
				<?php _e( "Email","wip"); ?>:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" />
			
		</p>  

		<?php
	}
	
	public function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		
		return $instance;
	}                     
	
		public function widget( $args, $instance )
	{
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( $title ) {
			echo $before_title.$title.$after_title;
		}

		echo do_shortcode('[contactform email="'.$instance['email'].'"][/contactform]'); 

		echo $after_widget;
	}
	
                 

}

?>