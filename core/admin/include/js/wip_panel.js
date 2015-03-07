jQuery.noConflict()(function($){

/* ===============================================
   Choose page format
   =============================================== */

	function wip_pageformat (page_type) { 
		
		var page_format = page_type;
		
		if ( ( page_format == "gallery" ) || ( page_format == "maps" ) || ( page_format == "video" ) ) {
			
			$(".pageformat").css({'display':'block'});
			$( "#tabs" ).tabs({ active: 2 });
	
		} else {
		
			$(".pageformat").css({'display':'none'});
			$( "#tabs" ).tabs({ active: 0 });
		
		}
		
		$(".postformat").css({'display':'none'});
		$( ".postformat#" + page_format).css({'display':'block'});
		
	}

	$('#wip_content_type').change(function() {

		var page_type = $(this).val();
		wip_pageformat(page_type);
	
	});
	
	$('#wip_content_type').each(function() {
		
		var page_type = $(this).val();
		wip_pageformat(page_type);
	
	});

/* ===============================================
   Choose post  format
   =============================================== */

	$('#post-formats-select input[type="radio"]').click(function() { 	
		
		var post_type = $(this).val();
		wip_postformat(post_type);
	
	}); 
	
	$('#post-formats-select input[type="radio"]:checked').each(function() {
		
		var post_type = $(this).val();
		wip_postformat(post_type);
	
	}); 

	function wip_postformat(post_type) { 

		var post_format = post_type;
		
		$(".postformat").css({'display':'none'});
		$(".postformat#" + post_format ).css({'display':'block'});
		
		if ( (post_format == 'link') || (post_format == 'quote') ) {
			
			$("#postdivrich").css({'display':'none'});
			
		} else {
			
			$("#postdivrich").css({'display':'block'});
			
		}
			
		if (  (post_format == '0' ) || (post_format == 'aside') ) {
			
			$(".postformats").css({'display':'none'});
			$( "#tabs" ).tabs({ active: 0 });
			
		}
		
		else {
			
			$(".postformats").css({'display':'block'});
			$( "#tabs" ).tabs({ active: 2 });
			
		}
	
	}

/* ===============================================
   Message, after save options
   =============================================== */

	$('.wip_message').delay(1000).fadeOut(1000);

/* ===============================================
   On off
   =============================================== */

	$('.on-off').live("change",function() {
		
		if ($(this).val() == "on" ) { 
			$('.hidden-element').css({'display':'none'});
			alert("ca");
		} 
		else { 
			$('.hidden-element').slideDown("slow");
		} 
	
	}); 

	$('input[type="checkbox"].on_off').live("change",function() { 
	
		if (!this.checked) { 
			$(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideUp("slow");
		} else { 
			$(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideDown("slow");
		} 
	
	}); 

/* ===============================================
   Background
   =============================================== */

	var url = $(".template_directory").val();
	
	$('.select-background').each(function() {
		
		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
		
	}); 
	
	$('.select-background').change(function() {
		
		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
		
	}); 

/* ===============================================
   Upload media
   =============================================== */

	$('.wip_inputbox input[type="button"]').live("click", function(){
		var upField = $(this).parent().find('input[type="text"]');
		var upId = $(this).parent().find('input.idattachment');
			
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');    
		
		window.send_to_editor = function(html) {
				
			imgurl = $('a', '<div>' + html + '</div>').attr('href');
			upField.val(imgurl);
			$(this).parent('.idattachment').val(imgurl);
			$image_preview = upField.parents('.sortItem').find('.ss-ImageSample');
			if( $image_preview.length > 0 ) $image_preview.attr('src',imgurl);
				
			tb_remove();
		}          
			
		return false;
	});

/* ===============================================
   Option panel
   =============================================== */

	$('.wip_mainbox').css({'display':'none'});
	$('.inactive').next('.wip_mainbox').css({'display':'block'});

	$('.wip_container h5.element').each(function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
			$(this).next('input[name="element-opened"]').remove();	
		}
						
		else {	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
				
		}
						
	});

	$('.wip_container h5.element').live("click", function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
		
			$(this).addClass('inactive');
			$(this).children('img').addClass('inactive');
			$('input[name="element-opened"]').remove();	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
		}
						
		else {	
		
			$(this).removeClass('inactive');
			$(this).children('img').removeClass('inactive');
			$(this).next('input[name="element-opened"]').remove();	
				
		}
						
		$(this).next('.wip_mainbox').stop(true,false).slideToggle('slow');
	
	});

/* ===============================================
   Gallery
   =============================================== */

	var counter = $('#elements').val();

	$('.button.delete').live("click", function(){ 
		var deletes = $(this).attr('rel');
		$('.wip_container.' + deletes).remove();
	}); 

	$('#add_gallery').live("click", function(){ 
		counter++;
		$('.orders').append('<div class="wip_container slide' + counter + '"><h5 class="element">Untitle slide</h5><div class="wip_mainbox" style="display: none;"><div class="wip_inputbox"><label for="wip_skins">Title</label><input type="text" name="galleries[slide' + counter + '][title]" value=""></div><div class="wip_inputbox"><label for="wip_skins">Image</label><input type="text" name="galleries[slide' + counter + '][url]" class="idattachment" /><input type="button" name="just_button" class="button" value="Upload" /></div><div class="wip_inputbox"><a class="button delete" rel="slide' + counter + '">Delete</a></div></div></div>' );

	}); 
	
	$( "#tabs.metaboxes" ).tabs();
	$( "#tabs.metaboxes .orders" ).sortable({ revert: true });

});