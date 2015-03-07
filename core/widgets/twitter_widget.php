<?php 

class wip_twitter_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::WP_Widget( "wip_twitter_widget", "Wip Twitter Box", array("description" => "Wip Twitter Box"));
	
	}
	
	public function form( $instance ) {

		$defaults = array( 
            'wip_account' => 'WPinProgress',
            'wip_number' => 4,
			'consumer_key' => '',
			'consumer_secret' => '',
			'token' => '',
			'token_secret' => '',
			'title' => 'Latest Tweets',

        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				Title:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>">
				Consumer Key :
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" value="<?php echo $instance['consumer_key']; ?>" />
			
		</p>  


		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>">
				Consumer Secret:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
			
		</p>  


		<p>
			<label for="<?php echo $this->get_field_id( 'token' ); ?>">
				Token:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'token' ); ?>" name="<?php echo $this->get_field_name( 'token' ); ?>" value="<?php echo $instance['token']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'token_secret' ); ?>">
				Token Secret:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'token_secret' ); ?>" name="<?php echo $this->get_field_name( 'token_secret' ); ?>" value="<?php echo $instance['token_secret']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'wipaccount' ); ?>">
				Your Twitter Account:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wip_account' ); ?>" name="<?php echo $this->get_field_name( 'wip_account' ); ?>" value="<?php echo $instance['wip_account']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'wip_number' ); ?>">
				Numbers of tweets to display:
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wip_number' ); ?>" name="<?php echo $this->get_field_name( 'wip_number' ); ?>" value="<?php echo $instance['wip_number']; ?>" />
            
		</p> 

		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['wip_account'] = strip_tags( $new_instance['wip_account'] );
		$instance['wip_number'] = strip_tags( $new_instance['wip_number'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['consumer_key'] = strip_tags( $new_instance['consumer_key'] );
		$instance['consumer_secret'] = strip_tags( $new_instance['consumer_secret'] );
		$instance['token'] = strip_tags( $new_instance['token'] );
		$instance['token_secret'] = strip_tags( $new_instance['token_secret'] );

		return $instance;
	}                     
	
		public function widget( $args, $instance ) {
		
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
		
		if ( $title ) {
		
			echo $before_title.$title.$after_title;
		
		}
			
		require_once( dirname(dirname(__FILE__)).'/oauth/twitterclass.php');

		$config = array(
		
			'directory' => '', 
			'key' => $instance['consumer_key'],
			'secret' => $instance['consumer_secret'],
			'token' => $instance['token'],
			'token_secret' => $instance['token_secret'],
			'screenname' => $instance['wip_account'],
			'cache_expire' => 3600 
		
		);
			
		$twitter = new StormTwitter($config);
			
		$tweets = $twitter->getTweets($instance['wip_number'], $instance['wip_account'],array('exclude_replies' => false, 'include_rts' => true));
			
		echo "<ul id='twitter_update_list'>";
			
		foreach($tweets as $list) {
				
			$date = strtotime($list["created_at"]);
			echo "<li>". date('d/m/Y - H:i',$date)  . "<br />" . wip_status($list["text"]) . "</li>" ;
		}

		echo "</ul>";
		
		echo $after_widget;
		
	}
	
}

?>