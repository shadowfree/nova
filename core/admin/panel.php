<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('wip_panel')) {

	function wip_panel( $panel ) { 
	
	wip_save_option ( $panel );
	wip_delete_sidebar();
	
	if (!isset($_GET['tab']))  { $_GET['tab'] = "General"; }
	
	foreach ($panel as $element) {

		switch ( $element['type'] ) { 
		
			case 'navigation': ?>
				
				<div class="header">
                    
                    <div class="left">
                    
                    	<a href="https://www.themeinprogress.com/" target="_blank">
					
                    		<img src="<?php echo get_template_directory_uri(); ?>/core/admin/include/images/logo.png">
                    		
                        </a>
                    
                    </div>
                    
                    <div class="theme_desc">
                    
                        <h2 class="maintitle"> 
                        
							<?php echo wip_theme_data('Name'); _e( ' Settings','wip'); ?><br />
                            <span><?php _e( 'Version ','wip'); echo wip_theme_data('Version'); ?></span>
                            
                        </h2>
                    
                    </div>
                    
                    <div class="clear"></div>
                
                </div>
                
				<?php wip_message($panel); ?>
                
                <div id="tabs">

                <ul>
    
					<?php 
                    
                        foreach ($element['item'] as $option => $name ) {
                        
                            if (str_replace(" ", "", $option) == $_GET['tab'] ) { 
							
								$class = "class='ui-state-active'";
							
							} else { 
							
								$class = "";
							
							}
							
                            echo "<li ".$class."><a href='themes.php?page=novaoption&tab=".str_replace(" ", "", $option)."'>".$name."</a></li>";
                        
                        }
                    
                    ?>
				
                	<li class="clear"></li>
                
                </ul>
               
                <?php	
			
			break;
			
			case 'endpanel':  ?>
				
				</div>
			
			<?php break;
			
		}

	if (isset($element['tab'])) : 
	
	switch ( $element['tab'] ) { 

		case $_GET['tab']:  

			foreach ($element as $value) {
			
				if (isset($value['type'])) :
				
					switch ( $value['type'] ) { 
					
						case 'form':  ?>
							
							<div id="<?php echo str_replace(" ", "", $value['name']); ?>">
							<form method="post" action="?page=novaoption&tab=<?php echo $_GET['tab']; ?>">
						
						<?php break;
						
						case 'endtab':  ?>
							
							</form>
							</div>
						
						<?php break;
							
						case 'start':  ?>
	
						<?php 
			
							if ( ('Save' == wip_request('action'))  && ( $value['val'] == wip_request('element-opened')) ) { 
								$class=" inactive"; $style='style="display:block;"'; } else { $class="";  $style=''; 
							}  
				
							?>
	
							<div class="wip_container">
			
							<h5 class="element<?php echo $class; ?>" id="<?php echo $value['val']; ?>"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox"> 
			
						<?php break;
				
						case 'startopen':  ?>
				
							<div class="wip_container">
			
							<h5 class="element-open"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox wip_openbox"> 
			
						<?php break;
				
						case 'end':  ?>
				
							</div>            
			
							</div>
			   
						<?php break;
			
						case 'multioptions': ?>
			
							<div class="wip_inputbox">
			
                                <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                                <?php foreach ( $value['options'] as $val => $option ) { 
                
                                    $checked = '';
                
                                    if ( wip_setting($value['id']) != false ) {
                
                                        foreach ( wip_setting($value['id']) as $check ) { 

                                        if ( $check == $val ) { 
											
											$checked = 'checked="checked"'; 
											
										} 
											
									} 
                
                                } 
                                    
                                ?> 
                
                                    <p>
                                        <input name="<?php echo $value['id']; ?>[]" type="checkbox" value="<?php echo $val; ?>" <?php echo $checked; ?> />
                                        <?php echo $option; ?> 			
                                    </p> 
									
								<?php } ?>  
                                
                                <p> <?php echo $value['desc']; ?> </p>
			
							</div>
			
							<?php break;

							case 'pages': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<?php foreach ( $value['options'] as $page ) { 
			
								$checked ='';
			
								if ( wip_setting($value['id']) != false ) {
			
									foreach (wip_setting($value['id']) as $check ) { 
			
									if ($check == $page->ID )  { $checked ='checked="checked"'; } } 
			
								} ?> 
				  
								<p><input name="<?php echo $value['id']; ?>[]" type="checkbox" value="<?php echo $page->ID; ?>" <?php echo $checked; ?> /> <?php echo $page->post_title; ?></p>
			
								<?php } ?>  
								
								<p><?php echo $value['desc']; ?></p>
			 
								</div>
			 
							<?php break;
							
							case 'thumbs': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								
								<input name="width" type="text" value="940" disabled="disabled" style="width:50px; display:inline-block"/>  
                                
                                <span class="separator">X</span> 
                                
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( wip_setting($value['id']) != "") { echo stripslashes(wip_setting($value['id'])); } else { echo $value['std']; } ?>" style="width:50px; display:inline-block"/>
								
								<p> <?php echo $value['desc']; ?> </p>
			
								</div>
			
							<?php break;
							
							case 'text': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( wip_setting($value['id']) != "") { echo stripslashes(wip_setting($value['id'])); } else { echo $value['std']; } ?>" />
								
								<p> <?php echo $value['desc']; ?> </p>
			
								</div>
			
							<?php break;
				
							case "upload": ?>
			
								<?php if (isset( $value['class'] )) { $classe = " ".$value['class']; } ?>
			
								<div class="wip_inputbox <?php echo $classe; ?>">  
			 
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			 
								<input id="<?php echo $value['id']; ?>" type="text" name="<?php echo $value['id']; ?>" class="idattachment" value="<?php if ( wip_setting($value['id']) != "") { echo wip_setting($value['id']) ; } else { echo $value['std']; } ?>" />
								
								<input type="button" name="just_button" class="button" value="<?php esc_attr_e('Upload'); ?>" />
			 
								<p><?php echo $value['desc']; ?></p>
			
								<?php if ( wip_setting($value['id']) != "") { echo "<img src='".wip_setting($value['id'])."' class='upload-preview' alt='image'/>"; } ?>
								
								</div>
			
							<?php break; 
							
							case 'form':  ?>
				
							<?php break;
				
							case 'navigation':  ?>
				
								<?php echo $value['start']; ?>
			
								<?php foreach ($value['item'] as $option) { echo "<li><a href='#".str_replace(" ", "", $option)."'>".$option."</a></li>"; } ?>
			
								<?php echo $value['end']; ?>
			   
							<?php break;
			 
							case 'textarea':  ?>
				
								<div class="wip_inputbox">
			
								<label for="bl_custom_style"> <?php echo $value['name']; ?> </label>
								
								<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( wip_setting($value['id']) != "") { echo stripslashes(wip_setting($value['id'])); } else { echo $value['std']; } ?></textarea>
			
								<p><?php echo $value['desc']; ?></p>
			
								</div> 
				
							<?php break;
			
							case "on-off": ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<div class="bool-slider <?php if ( wip_setting($value['id']) != "") { echo stripslashes(wip_setting($value['id'])); } else { echo $value['std']; } ?>">
									<div class="inset">
										<div class="control"></div>
									</div>
									<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="on-off" type="hidden" value="<?php if ( wip_setting($value['id']) != "") { echo stripslashes(wip_setting($value['id'])); } else { echo $value['std']; } ?>" />
								</div>  
								
								<div class="clear"></div>      
								
								<p><?php echo $value['desc']; ?></p>
								
								</div>
			
							<?php break;
				 
							case 'category': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( wip_setting($value['id']) == get_cat_id($option)) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo get_cat_id($option); ?>" ><?php echo $option; ?></option><?php } ?></select>
			 
								<p><?php echo $value['desc']; ?></p>
			
								</div>
				
							<?php break;
				 
							case 'select': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
								
								<?php foreach ( $value['options'] as $val => $option ) { ?>  
								
								<option <?php if (( wip_setting( $value['id'] ) == $val) || ( ( !wip_setting($value['id'])) && ( $value['std'] == $val) )) { echo 'selected="selected"'; } ?> value="<?php echo $val; ?>"><?php echo $option; ?></option><?php } ?>  
								</select>  
			 
								<p><?php echo $value['desc']; ?></p>
			
								</div>
				
				
							<?php break;
							
							case 'background': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
					
								<input type="hidden" name="template_directory" class="template_directory" value="<?php echo get_template_directory_uri(); ?>" />
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="select-background">  
								
								<option value="None">None</option>
			
								<?php foreach ($value['options'] as $val => $option ) { ?>  
									
									<option <?php if ( ( wip_setting($value['id']) == $val) || ( ( !wip_setting($value['id'])) && ( $value['std'] == $val) )) { echo 'selected="selected"'; } ?> value="<?php echo $val; ?>"><?php echo $option; ?></option>							
									
								<?php } ?>  
								
								</select>  
					
								<div class="preview"></div>
					
								<div class="clear"></div>
					
								<p><?php echo $value['desc']; ?></p>
			   
							</div>
							
							<?php break;
			
							case "save-button": ?>
			
								<div class="wip_inputbox">
			
								<input name="action" id="element-open" type="submit" value="<?php echo $value['value']; ?>" class="button"/>
			
								</div>
			
							<?php break;
			 
							case "color": ?>
							
								<div class="wip_inputbox">
			
								<label for="bl_custom_style"> <?php echo $value['name']; ?> </label>
			
								<input data-hex="true" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( wip_setting($value['id']) != "") { echo wip_setting($value['id']) ; } else { echo $value['std']; } ?>" />
			
								<p><?php echo $value['desc']; ?></p>
			
								</div> 
			
							<?php break;
							
						case 'viewsidebars': ?>
		
							<div class="wip_inputbox_sidebars">
		
							<?php
		
								$sidebars = get_option(wip_themename());
			
								if (!empty($sidebars[$value['sidebar']])) :
			
								foreach ($sidebars[$value['sidebar']] as $id => $singlesidebar) {  
								
								$sidebar_type = explode("_", $singlesidebar); ?>
							   
								<div class="delete">
								
								<a href="?page=<?php echo $_GET['page']?>&tab=Sidebars&action=delete&key=<?php echo $id; ?>#Sidebars" alt="delete">
									<img src="<?php echo get_template_directory_uri('template_directory'); ?>/core/admin/include/images/close_16.png" alt="delete" />
		   
								</a>
								
								</div>
			
								<div class="sidebar_list" style="margin-bottom:15px">
									
									<?php 
									
										echo "<strong>" . __( 'Sidebar position','wip').":</strong> " . ucfirst($sidebar_type[0]) . "<br /></strong>";
										echo "<strong>" . __( 'Sidebar name','wip').":</strong> " . $sidebar_type[1];
										
									?>
		   
								</div>
			
								<div class="clear"></div>
								
								<?php }
			
								else :
									
									_e( 'No sidebar yet','wip');
								
								endif;
		
								?>
		
								</div>
			
							<?php break;
							
							case 'sidebar': ?>
			
								<div class="wip_inputbox">
				
                                   <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                                   <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" />
							   
									<div class="clear"></div>
							   
								</div>

								<div class="wip_inputbox">

                                   <label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label>
                                   
                                   <select name="sidebar_type" id="sidebar_type" >  
                
                                    <?php foreach ($value['options'] as $val => $option ) { ?>  
                                        
                                        <option <?php if ( wip_setting($value['id']) == $val) { echo 'selected="selected"'; } ?> value="<?php echo $val; ?>"><?php echo $option; ?></option>							
                                        
                                    <?php } ?>  
                                    
                                    </select>  
			   
								</div>
			
							<?php break;
							
					}
					
				endif;
			}
		}	
		
		endif;	

	}
	
}

}  

?>