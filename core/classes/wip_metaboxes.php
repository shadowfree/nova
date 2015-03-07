<?php

	class wip_metaboxes {
	   
		public $posttype;
		public $metaboxes_fields;
	   
		public function __construct( $posttype, $fields = array() ) {
	
			$this->posttype = $posttype;
			$this->metaboxes_fields = $fields;
			
			add_action( 'add_meta_boxes', array( &$this, 'new_metaboxes' ) ); 
			add_action( 'save_post', array( &$this, 'wip_metaboxes_save' ) );
		}
	
		public function new_metaboxes() {
	
			$posttype = $this->posttype ;
			add_meta_box( $posttype, ucfirst($posttype).' settings', array( &$this, 'metaboxes_panel' ), $posttype, 'normal', 'high' );
		
		}
		
		public function metaboxes_panel() {
	
			$metaboxes_fields = $this->metaboxes_fields ;
	
			global $post, $post_id;
			
			foreach ($metaboxes_fields as $value) {
			switch ( $value['type'] ) { 
		
			case 'navigation': ?>
			
				<div id="tabs" class="metaboxes">
						
					<ul>
			
						<?php 
										
						foreach ($value['item'] as $option => $name ) {
							echo "<li class='".$option."'><a href='#".str_replace(" ", "", $option)."'>".$name."</a></li>";
						}
						
						?>
					   	
                        <li class="clear"></li>
                        
					</ul>
					   
			<?php	
					
			break;
		
			case 'begintab': ?>
			
				<div id="<?php echo $value['tab'];?>" >
		
			<?php	
					
			break;
		
			case 'endtab': ?>
			
				</div>
		
			<?php	
					
			break;
			}
			foreach ($value as $field) {
		
			if (isset($field['type'])) : 
		
				switch ( $field['type'] ) { 
		
					case 'start':  ?>
					<div class="postformat" id="<?php echo $field['id']; ?>">
				
					<?php break;
					
					case 'end':  ?>
					</div>
					
					<?php break;
					
					case "on-off": ?>
				
					<p class="wip_inputbox">
		
						<div class="input-left">
		
							<label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label>
							
							<p><?php echo $field['desc']; ?></p>
							
						</div>
						<div class="input-right">
		
								<div class="bool-slider <?php if ( wip_postmeta($field['id']) != "") { echo stripslashes(wip_postmeta($field['id'])); } else { echo "on"; } ?>">
									
									<div class="inset">
										<div class="control"></div>
									</div>
									
									<input name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" type="hidden" value="<?php if ( wip_postmeta( $field['id']) != "") { echo wip_postmeta( $field['id']); } else { echo $field['std']; } ?>" class="on-off" />
	
								</div>  
								
								<div class="clear"></div>      
						
						</div>	
							
						<div class="clear"></div>
						
					</p>
				
					<?php break;
		
					case 'title':  ?>
					
					<h2 class="title"><?php echo $field['name']; ?></h2>
					
					<?php break;
		
					case 'text':  ?>
					
					<p class="wip_inputbox">
						
						<div class="input-left">
						
							<label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label><br />
							<em> <?php echo $field['desc']; ?> </em>
							
						</div>
						
						<div class="input-right">
						
							<input name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" type="<?php echo $field['type']; ?>" value="<?php if ( wip_postmeta( $field['id']) != "") { echo wip_postmeta( $field['id']); } ?>" style="width:100%"/>
							
						</div>
						
						<div class="clear"></div>
					</p>
				
					<?php break;
		
					case 'select':  ?>
					
					<p class="wip_inputbox">
						
						<div class="input-left">
						
							<label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label><br />
							<em> <?php echo $field['desc']; ?> </em>
							
						</div>
						
						<div class="input-right">
						
							<select name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" style="width:100%">
								<?php foreach ($field['options'] as $option => $values) { ?>
								<option <?php if (wip_postmeta( $field['id']) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $values; ?></option><?php } ?>
							</select>
						
						</div>
						
						<div class="clear"></div>
					</p>
					
					<?php break;
					
					case 'taxonomy-select':  
					
					$slideshows = get_terms("slideshows");
					foreach ($slideshows as $slideshow)	
						{
							$wp_terms[$slideshow->term_id] = $slideshow->name;
						}
					?>
					
					<p class="wip_inputbox">
						<label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label>
						<select name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" style="width:100%">
							<option value="all"> All </option>
							<?php foreach ( $wp_terms as $option => $values) { ?>
							<option <?php if (wip_postmeta( $field['id']) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $values; ?></option><?php } ?>
						</select>
						<em> <?php echo $field['desc']; ?> </em>
					</p>
				
				
					<?php break;
		
					case 'textarea':  ?>
							
					<p class="wip_inputbox">
						
						<div class="input-left">
							<label for="<?php echo $field['id']; ?>"><?php echo $field['name']; ?></label><br />
							<em> <?php echo $field['desc']; ?> </em>
						</div>
						<div class="input-right">
						<textarea name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" type="<?php echo $field['type']; ?>" style="width:100%"><?php if ( wip_postmeta( $field['id']) != "") { echo stripslashes(wip_postmeta( $field['id'])); } ?></textarea>
						</div>
						<div class="clear"></div>
					</p>
							
					<?php break;
		
					case 'galleries':
		
						$wip_gallery = wip_postmeta('galleries');

					?>
                    
                        <ul class='orders'>
                    
					<?php	
						
						if ($wip_gallery) { 
						
						$i = 0;

						foreach ( $wip_gallery as $slide => $input) { 
							
							$i++;
							
					?>
							<li class="wip_container <?php echo $slide; ?>">
								
								<h5 class="element"><?php if ($input['title']) { echo $input['title']; } else { echo "Untitle slide";} ?></h5>
								<div class="wip_mainbox" style="display: none;"> 
												
									<?php foreach ( $input as $gallery => $element ) { ?>
									
										<?php if( $gallery == "title") { ?>
										
											<div class="wip_inputbox">
												<label for="wip_skins"><?php echo $gallery; ?></label>
												<input type="text" name="galleries[<?php echo $slide; ?>][<?php echo $gallery; ?>]" value="<?php echo $element; ?>">
											</div>
															
											<?php } else if( $gallery == "description") { ?>
																
											<div class="wip_inputbox">
												<label for="wip_skins"><?php echo $gallery; ?></label>
												<textarea name="galleries[<?php echo $slide; ?>][<?php echo $gallery; ?>]" type="textarea"><?php echo $element; ?></textarea>
											</div>
		
											<?php } else if( $gallery == "url") { ?>
		
											<div class="wip_inputbox">
												<label for="wip_skins">Image</label>
												<input type="text" name="galleries[<?php echo $slide; ?>][url]" class="idattachment" value="<?php echo $element; ?>" />
												<input type="button" name="just_button" class="button" value="<?php esc_attr_e('Upload'); ?>" />
											</div>
						
											<div class="wip_inputbox">
												<label for="wip_skins">Preview</label>
												<div class="preview" style="background:url(<?php echo $element; ?>) no-repeat; width:610px"></div>
												<div class="clear"></div>
											</div>
																		
											<?php } ?>
									
										<?php } ?>
											   
											 
											<div class="wip_inputbox">
												<a class="button delete" rel="<?php echo $slide; ?>">Delete</a>
											</div>
											<div class="clear"></div>
									</div>				
								</li>  
					
					<?php } ?> 
							
							
					<?php } ?>

							</ul>

							<input type="hidden" id="elements" value="<?php echo $i; ?>">
							<p class="wip_input"> <input type="button" class="button" id="add_gallery" value="+"> </p>
                            
					<?php
						
						break;
				
					}
				
				endif;
				
				}
			}
	
		}
		
		public function wip_metaboxes_save() {
		
			global $post_id, $post;
				
			$metaboxes_fields = $this->metaboxes_fields ;
		
				foreach ($metaboxes_fields as $value) {
					
					foreach ($value as $field) {

						if ( isset($field['id']) ) {
		
							$new = $_REQUEST[$field['id']];

							if ( $field['id'] == "galleries" ) {	
		
								$wip_gallery = wip_postmeta('galleries');
						
								if ( $wip_gallery != false ) {
									
									$wip_gallery = maybe_unserialize( $wip_gallery );
								
								} 
													
								else {
									
									$wip_gallery = array();
								}      
								
								$keys = 0;

								if ( isset($new) ) {
		
									foreach ( $new as $slide => $gallery) { 
				
										unset ($new[$slide]);
										$keys++;
										$slideshow['slide'.$keys] = $gallery;
											
									}
								
								}
								
								update_post_meta( $post_id , $field['id'] , $slideshow );
								
							} else if ( ( $field['id'] <> "galleries" ) && (isset( $_REQUEST[$field['id']])) ) {
								
								update_post_meta( $post_id , $field['id'], $new );
		
							}
							
						}
						
					}
					
				}
				
			}
	
		}

?>