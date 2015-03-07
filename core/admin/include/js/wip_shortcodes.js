(function() {
	tinymce.PluginManager.add( 'add_shortcodes_button', function( editor, url ) {
		editor.addButton( 'add_shortcodes_button', {
			title: 'Add shortcodes',
			type: 'menubutton',
			icon: 'icon add-shortcodes-icon',
			menu: [

				/** Layout **/
				{
					text: 'Layout',
					menu: [

						/* Columns */
						{
							text: 'Columns',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert a column section',
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnSize',
										label: 'Size',
										'values': [
											{text: 'Four columns', value: 'four_columns'},
											{text: 'Three columns', value: 'three_columns'},
											{text: 'Two columns', value: 'two_columns'},
											{text: 'One column', value: 'one_column'},
										]
									},

									// Column Position
									{
										type: 'listbox',
										name: 'columnPosition',
										label: 'Position',
										'values': [
											{text: 'First element', value: 'first'},
											{text: 'Middle element', value: ''},
											{text: 'Last element', value: 'last'},
										]
									},

									// Column Title
									{
										type: 'textbox', 
										name: 'columnTitle', 
										label: 'Insert the title',
										value: 'The title'
									},

									// Column Icon
									{
										type: 'textbox', 
										name: 'columnIcon', 
										label: 'Insert the name of icon',
										value: ''
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: 'Insert the content',
										value: 'Lorem ipsum...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],

									// Column generator

									onsubmit: function( e ) {
									
										if (e.data.columnSize != "one_column") {
											
											var iconHtml = "";
											if (e.data.columnIcon != "") { iconHtml = 'icon="' + e.data.columnIcon + '"'; }
	
											var columnStart = "";
											if (e.data.columnPosition == "first" ) { columnStart = '[columns]<br />'; }
	
											var columnEnd = "";
											if (e.data.columnPosition == "last" ) { columnEnd = '[/columns]<br />'; }
	
											editor.insertContent( columnStart + '[' + e.data.columnSize + ' title="' + e.data.columnTitle + '" ' + iconHtml + ']' + e.data.columnContent + '[/' + e.data.columnSize + ']<br />' + columnEnd );
										
										} else {

											var iconHtml = "";
											if (e.data.columnIcon != "") { iconHtml = 'icon="' + e.data.columnIcon + '"'; }

											editor.insertContent( '[columns][' + e.data.columnSize + ' title="' + e.data.columnTitle + '" ' + iconHtml + ']' + e.data.columnContent + '[/' + e.data.columnSize + '][/columns]<br />');

										}
									
									}
									
								});
							}
						}, // End columns

					]
				}, // End Layout Section


				/** Elements **/
				{
					text: 'Elements',
					menu: [

						/* Lists */
						{
							text: 'Precode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert a precode',
									body: [

									// List content
									{
										type: 'textbox',
										name: 'precodeContent',
										label: 'Starting Content',
										value: 'Your content...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],

									onsubmit: function( e ) {
										
										var iconHtml = "";
										editor.insertContent( '[pre]' + e.data.precodeContent + '[/pre] <br/> ');
									}
									
								});
							}
						}, // End Precode

						/* Lists */
						{
							text: 'Lists',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert a list',
									body: [

									// List icon
									{
										type: 'textbox',
										name: 'listIcon',
										label: 'Insert the name of icon',
										value: 'fa-check'
									},

									// List content
									{
										type: 'textbox',
										name: 'listContent',
										label: 'Starting Content',
										value: '<li>Your content</li><li>Your content</li>',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],

									onsubmit: function( e ) {
										
										var iconHtml = "";
										if (e.data.listIcon != "") { iconHtml = 'icon="' + e.data.listIcon + '"'; }

										editor.insertContent( '[list ' + iconHtml + ']' + e.data.listContent + '[/list] <br/> ');
									}
								});
							}
						}, // End Lists

						
						/* Icons */
						{
							text: 'Icons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert an icon',
									body: [

									// Icon name
									
									{
										type: 'textbox',
										name: 'iconName',
										label: 'Insert the name of icon',
										value: 'fa-code'
									},

									// Icon content
									{
										type: 'textbox',
										name: 'iconContent',
										label: 'Insert the content',
										value: 'Lorem ipsum...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									},

									// Icon size
									{
										type: 'listbox',
										name: 'iconSize',
										label: 'Icon size',
										'values': [
											{text: 'Default', value: ''},
											{text: 'Large', value: 'fa-lg'},
											{text: '2X', value: 'fa-2x'},
											{text: '3X', value: 'fa-3x'},
											{text: '4X', value: 'fa-4x'},
											{text: '5X', value: 'fa-5x'},
										]
									},

									],
									
									onsubmit: function( e ) {
									
										var iconSize = "";
										if (e.data.iconSize != "") { iconSize = 'size="' + e.data.iconSize + '"'; }
									
										editor.insertContent( '[icon name="' + e.data.iconName + '" ' + iconSize + '] ' + e.data.iconContent + '[/icon] <br /> ' );
										
									}
								});
							}
						}, // End Icons

						/* Highlight */
						{
							text: 'Highlight',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Highlight',
									body: [

									// Highlight background
									{
										type: 'textbox',
										name: 'highlightBackground',
										label: 'Insert the background color',
										value: '#1abc9c'
									},

									// Highlight text color
									{
										type: 'textbox',
										name: 'highlightColor',
										label: 'Insert the text color',
										value: '#fff'
									},

									// Highlight content
									{
										type: 'textbox',
										name: 'highlightContent',
										label: 'Insert the content',
										value: 'Lorem ipsum...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									
									onsubmit: function( e ) {
										editor.insertContent( '[highlight background="' + e.data.highlightBackground + '" color="' + e.data.highlightColor + '"] ' + e.data.highlightContent + '[/highlight] <br /> ' );
									}
								});
							}
						}, // End Highlight

						/* Dropcap */
						{
							text: 'Dropcap',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Dropcap',
									body: [

									// Dropcap content
									{
										type: 'textbox',
										name: 'dropcapContent',
										label: 'Insert the content',
										value: 'Lorem ipsum...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									
									onsubmit: function( e ) {
										editor.insertContent( '[dropcap] ' + e.data.dropcapContent + '[/dropcap] <br /> ' );
									}
								});
							}
						}, // End Dropcap

						/* Toggle */
						{
							text: 'Toggle',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Toggle',
									body: [

									// Toggle Position
									{
										type: 'listbox',
										name: 'togglePosition',
										label: 'Position',
										'values': [
											{text: 'First element', value: 'first'},
											{text: 'Middle element', value: ''},
											{text: 'Last element', value: 'last'},
										]
									},

									// Toggle Title
									{
										type: 'textbox', 
										name: 'toggleTitle', 
										label: 'Insert the title',
										value: 'The title'
									},

									// Toggle Content
									{
										type: 'textbox',
										name: 'toggleContent',
										label: 'Insert the content',
										value: 'Lorem ipsum...',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],

									// Toggle generator

									onsubmit: function( e ) {
										
										var toggleStart = "";
										if (e.data.togglePosition == "first" ) { toggleStart = '[toggle_container]<br />'; }

										var toggleEnd = "";
										if (e.data.togglePosition == "last" ) { toggleEnd = '[/toggle_container]<br />'; }

										editor.insertContent( toggleStart + '[toggle title="' + e.data.toggleTitle + '"]' + e.data.toggleContent + '[/toggle]<br />' + toggleEnd );
									}
									
								});
							}
						}, // End Toggle

						/* Tabs */
						{
							text: 'Tabs',
							onclick: function() {
								editor.insertContent('[tabs_container tab1="Tab 1" tab2="Tab 2"]<br/>[tabs id="tab1" title="Tab 1" ] Your text[/tabs]<br/>[tabs id="tab2" title="Tab 2" ] Your text[/tabs]<br/>[/tabs_container]<br/>');
								}
						}, // End Tabs

						/* Alert */
						{
							text: 'Alert',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Alert',
									body: [

									// Alert icon
									{
										type: 'textbox',
										name: 'alertIcon',
										label: 'Insert the icon name of alert',
										value: ''
									},

									// Alert class
									{
										type: 'listbox',
										name: 'alertClass',
										label: 'Class',
										'values': [
											{text: 'Blue alert', value: 'alert-info'},
											{text: 'Orange alert', value: 'alert-alert'},
											{text: 'Green alert', value: 'alert-success'},
											{text: 'Red alert', value: 'alert-error'},
											
										]
									},

									// Alert size
									{
										type: 'listbox',
										name: 'alertSize',
										label: 'Size',
										'values': [
											{text: 'mini', value: 'mini'},
											{text: 'small', value: 'small'},
											{text: 'medium', value: 'medium'},
											{text: 'large', value: 'large'},
										]
									},

									// Alert content
									{
										type: 'textbox',
										name: 'alertContent',
										label: 'Insert the content of alert',
										value: 'Info alert'
									},

									],

									// Alert generator

									onsubmit: function( e ) {
										
										var alertIcon = "";
										if (e.data.alertIcon != "" ) { alertIcon = 'icon="' + e.data.alertIcon + '" '; }

										editor.insertContent( '[alert ' + alertIcon + 'class="' + e.data.alertClass + '" ' + 'size="' + e.data.alertSize + '" ' + ']' + e.data.alertContent + '[/alert]<br />');
									}
									
								});
							}
						}, // End Button

						/* Button */
						{
							text: 'Button',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Button',
									body: [

									// Button url
									{
										type: 'textbox',
										name: 'buttonUrl',
										label: 'Insert the url of button',
										value: ''
									},

									// Button icon
									{
										type: 'textbox',
										name: 'buttonIcon',
										label: 'Insert the icon name of button',
										value: 'fa-external-link'
									},

									// Button class
									{
										type: 'listbox',
										name: 'buttonClass',
										label: 'Class',
										'values': [
											{text: 'Default', value: ''},
											{text: 'Green button', value: 'btn-success'},
											{text: 'Red button', value: 'btn-danger'},
											{text: 'Blue button', value: 'btn-primary'},
											{text: 'Cyan button', value: 'btn-info'},
											
										]
									},

									// Button size
									{
										type: 'listbox',
										name: 'buttonSize',
										label: 'Size',
										'values': [
											{text: 'Default', value: ''},
											{text: 'Small', value: 'small'},
											{text: 'Large', value: 'large'},
										]
									},

									// Icon size
									{
										type: 'listbox',
										name: 'buttonIconsize',
										label: 'Icon Size',
										'values': [
											{text: 'Default', value: ''},
											{text: 'Large', value: 'fa-lg'},
											{text: '2X', value: 'fa-2x'},
											{text: '3X', value: 'fa-3x'},
											{text: '4X', value: 'fa-4x'},
											{text: '5X', value: 'fa-5x'},
										]
									},

									// Button label
									{
										type: 'textbox',
										name: 'buttonLabel',
										label: 'Insert the label of button',
										value: 'Read more'
									},

									],

									// Button generator

									onsubmit: function( e ) {
										
										var buttonIcon = "";
										if (e.data.buttonIcon != "" ) { buttonIcon = 'icon="' + e.data.buttonIcon + '" '; }

										var buttonClass = "";
										if (e.data.buttonClass != "" ) { buttonClass = 'class="' + e.data.buttonClass + '" '; }

										var buttonSize = "";
										if (e.data.buttonSize != "" ) { buttonSize = 'size="' + e.data.buttonSize + '" '; }

										var buttonIconsize = "";
										if (e.data.buttonIconsize != "" ) { buttonIconsize = 'iconsize="' + e.data.buttonIconsize + '"'; }

										editor.insertContent( '[button href="' + e.data.buttonUrl + '" ' + buttonIcon + buttonClass + buttonSize + buttonIconsize + ']' + e.data.buttonLabel + '[/button]  <br />');
									}
									
								});
							}
						}, // End Button

						/* Google Maps */
						{
							text: 'Google Maps',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Google Maps',
									body: [

									// Google Maps Address
									{
										type: 'textbox',
										name: 'googlemapsAddress',
										label: 'Insert the address',
										value: '',
									},
									
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[googlemaps src="' + e.data.googlemapsAddress + '" ] <br /> ' );
									}
								});
							}
						}, // End Google Maps

						/* Contact Form */
						{
							text: 'Contact Form',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Contact Form',
									body: [

									// Contact Form Email
									{
										type: 'textbox',
										name: 'contactformEmail',
										label: 'Insert your email',
										value: '',
									},
									
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[contactform email="' + e.data.contactformEmail + '" ] <br /> ' );
									}
								});
							}
							
						}, // End Contact Form

					]
				}, // End Elements Section


				/** Media Section **/
				{
				text: 'Media',
				menu: [

						/* Vimeo */
						{
							text: 'Vimeo',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Vimeo',
									body: [

									// Vimeo ID
									{
										type: 'textbox',
										name: 'vimeoID',
										label: 'Insert the ID of Vimeo video',
										value: '',
									},

									// Vimeo Autoplay
									{
										type: 'listbox',
										name: 'vimeoAutoplay',
										label: 'You want to start the video automatically?',
										'values': [
											{text: 'False', value: 'false'},
											{text: 'True', value: 'true'},
										]
									},

									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[vimeo id_video="' + e.data.vimeoID + '" autoplay="' + e.data.vimeoAutoplay + '" ] <br /> ' );
									}
								});
							}
						}, // End Vimeo

						/* Youtube */
						{
							text: 'Youtube',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Youtube',
									body: [

									// Youtube ID
									{
										type: 'textbox',
										name: 'youtubeID',
										label: 'Insert the ID of Vimeo video',
										value: '',
									},

									// Youtube Autoplay
									{
										type: 'listbox',
										name: 'youtubeAutoplay',
										label: 'You want to start the video automatically?',
										'values': [
											{text: 'False', value: 'false'},
											{text: 'True', value: 'true'},
										]
									},

									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[youtube id_video="' + e.data.youtubeID + '" autoplay="' + e.data.youtubeAutoplay + '" ] <br /> ' );
									}
								});
							}
						}, // End Youtube

						/* Soundcloud */
						{
							text: 'Soundcloud',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Youtube',
									body: [

									// Soundcloud Url
									{
										type: 'textbox',
										name: 'soundcloudUrl',
										label: 'Insert the url of Soundcloud track',
										value: '',
									},
									
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[soundcloud url="' + e.data.soundcloudUrl + '" ] <br /> ' );
									}
								});
							}
						}, // End Soundcloud

						/* Pop up image */
						{
							text: 'Pop up image',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Pop up image',
									body: [

									// Size
									{
										type: 'listbox',
										name: 'imageSize',
										label: 'Size',
										'values': [
											{text: 'Extra small', value: 'xsmall'},
											{text: 'Small', value: 'small'},
											{text: 'Medium', value: 'medium'},
											{text: 'Large', value: 'large'},
										]
									},

									// Image Url
									{
										type: 'textbox',
										name: 'imageUrl',
										label: 'Insert the url of internal image',
										value: '',
									},
									
									],
									
									onsubmit: function( e ) {
										editor.insertContent( '[image-' + e.data.imageSize + ']' + e.data.imageUrl + '[/image-' + e.data.imageSize + '] <br /> ' );
									}
								});
							}
						}, // End Pop up image

					]
				} // End Media Section

			]
		});
	});
})();