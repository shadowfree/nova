<?php

if (!function_exists('wip_contactform_function')) {

	function wip_contactform_function ($atts,  $content = null) {
		
		extract(shortcode_atts(array(
			'email' => '',
			'labelname' => __( 'Your Name','wip'),
			'labelemail' => __( 'Your Email','wip'),
			'labelsubject' => __( 'Email Object','wip'),
			'labelsend' => __( 'Send','wip'),
		), $atts));
		
		$messages = "";
		
		$html = '<form id="contact-form-example" class="contact-form" method="post" action="#" enctype="multipart/form-data">';
		$html .= '<div class="text-field-half">';
		$html .= '<input type="text" id="contact-name" name="contact-name" class="required" placeholder="'.$labelname.'">';
		$html .= '</div>';
		$html .= '<div class="text-field-half">';
		$html .= '<input type="text" id="contact-email" name="contact-email" class="required" placeholder="'.$labelemail.'">';
		$html .= '</div>';
		$html .= '<div class="text-field-full">';
		$html .= '<input type="text" id="contact-subject" name="contact-subject" class="required" placeholder="'.$labelsubject.'">';
		$html .= '</div>';
		$html .= '<div class="text-field-full">';
		$html .= '<textarea id="contact-message" name="contact-message" cols="45" rows="8" class="required" ></textarea>';
		$html .= '</div>';
		$html .= '<input type="hidden" id="contact-control" name="contact-control" value="passed">';
		$html .= '<span class="error">'.__( 'Error trying to send email, please check the data entered.','wip').'</span>';
		$html .= '<p class="form-submit">';
		$html .= '<input type="submit" value="'.$labelsend.'" id="submit" name="send" class="buttons">';
		$html .= '</p>';
		$html .= '</form>';
	
		if ( ( isset($_REQUEST['contact-control']) ) && ( ($_REQUEST['contact-control'] == "passed") ) ) {
			
			$headers[] = 'From: '.$_REQUEST['contact-name'].' <'.$_REQUEST['contact-email'].'>';
			$messagge = "<p>Hi admin, you received the following message from:</p> 
			<p> <b>Name:</b> ".$_REQUEST['contact-name']." </p>   
			<p><strong>Email:</strong> ".$_REQUEST['contact-email']."</p>  
			<p><b>Message:</b>  ".$_REQUEST['contact-message']."</p>" ; 
		
			$funz = "";
			
			add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
			wp_mail( $email,$_REQUEST['contact-subject'],$messagge, $headers );
			$messages = '<span class="messaggeok">'.__( 'Message sent successfully.','wip').'</span>';
		
		}
	
		return do_shortcode($messages.$html);
		
	}
	
	add_shortcode('contactform','wip_contactform_function');

}

?>