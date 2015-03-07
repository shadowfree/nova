<?php 

/*-----------------------------------------------------------------------------------*/
/* START CATEGORY
/*-----------------------------------------------------------------------------------*/    
    
class wip_popup_image_widget extends WP_Widget
{
	public function __construct() 
    {
		parent::WP_Widget( "wip_popup_image_widget", "Wip Popup Image Widget", array("description" => "Wip Popup Image Widget"));
	}
	
	public function form( $instance )
	{
		global $positions;

		$defaults = array( 
			'title' => 'Image',
			'size' => 'medium',
			'image' => NULL,
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$sizelist = array('xsmall' => 'Extra Small', 'small' => 'Small', 'medium' => 'Medium','large' => 'Large');	

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( "Title","wip"); ?>:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			
            <label for="<?php echo $this->get_field_id( 'size' ); ?>">
				<?php _e( "Size","wip"); ?>:
			</label>
            
            <select class="widefat" name="<?php echo $this->get_field_name( 'size' ); ?>" id="<?php echo $this->get_field_id( 'size' ); ?>">
           
            <?php
            foreach ($sizelist as $size => $image)
                {
                    if ($size == $instance['size'] ) 
                            { echo "<option value='".$size."' selected='selected' >".$image."</option>"; } else
                            { echo "<option value='".$size."'>".$image."</option>"; };
                }
            ?>
            
            </select>
            
		</p> 

		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>">
				<?php _e( "Image","wip"); ?>:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
			
		</p>  

		<?php
	}
	
	public function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['size'] = strip_tags( $new_instance['size'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		
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

		echo do_shortcode('[image-'.$instance['size'].']'.$instance['image'].'[/image-'.$instance['size'].']'); 

		echo $after_widget;
	}
	
                 

	}
function add_wip_popup_image_widget()
{
	register_widget( 'wip_popup_image_widget' );
}
add_action( 'widgets_init', 'add_wip_popup_image_widget' );

/*-----------------------------------------------------------------------------------*/
/* END CATEGORY
/*-----------------------------------------------------------------------------------*/    

?>