<?php 

class wip_menu_widget extends WP_Widget
{
	public function __construct() 
    {
		parent::WP_Widget( "wip_menu_widget", "Wip Menu Widget", array("description" => "Wip Menu Widget"));
	}
	
	public function form( $instance )
	{
		global $positions;
        /* Impostazioni di default del widget */
		$defaults = array( 
			'title' => 'Main Menu',
			'nav_menu' => NULL,
        );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( "Title","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"> <?php _e( "Select the menu","wip"); ?> </label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>" id="<?php echo $this->get_field_id( 'nav_menu' ); ?>">
				<?php
                	foreach ($menus as $menu) {
                        if ($menu->name == $instance['nav_menu'] ) 
                        	{ echo "<option value='".$menu->name."' selected='selected' >".$menu->name."</option>"; } 
						else
                        	{ echo "<option value='".$menu->name."'>".$menu->name."</option>"; };
                    }
                ?>
            </select>

		</p>

		<?php
	}
	
	public function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['nav_menu'] = strip_tags( $new_instance['nav_menu'] );
		
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

		?>
                
                <nav id="widgetmenu">
                	<?php wp_nav_menu( array('menu' => $instance['nav_menu'], 'container' => 'false','depth' => 3, 'menu_id' => 'widgetmenus' )); ?>
                </nav>                

		<?php
		echo $after_widget;
	}
	
                 

}

?>