<?php 

class wip_soundcloud_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::WP_Widget( "wip_soundcloud_widget", "Wip Soundcloud Widget", array("description" => "Wip Soundcloud Widget"));
	
	}
	
	public function form( $instance )
	{
		global $positions;

		$defaults = array( 
			'title' => 'Soundcloud Player',
			'url' => NULL,
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( "Title","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">
				<?php _e( "Url","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" />
			
		</p>  

		<?php
	}
	
	public function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['url'] = strip_tags( $new_instance['url'] );
		
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
		
		echo do_shortcode('[soundcloud url="'.$instance['url'].'"][/soundcloud]'); 
		
		echo $after_widget;
	}
	
}

?>