<?php

/*
@package nells
*/

//CONTACT FORM SUBMIT
add_action('wp_ajax_nopriv_submit_nells_contact', 'submit_nells_contact');
add_action('wp_ajax_submit_nells_contact', 'submit_nells_contact');
function submit_nells_contact(){
	$name = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	$message = wp_strip_all_tags($_POST['message']);
	$args = array(
		'post_title' 	=> $name,
		'post_content' 	=> $message,
		'post_email' 	=> $email,
		'post_type' 	=> 'contact-message',
		'post_status' 	=> 'publish',	
		'meta_input' 	=> array(
			'email' => $email
		)
	);
	$postID = wp_insert_post( $args, $wp_error = false );
	if($postID !==0)
	{
		$to = get_bloginfo( 'admin_email' );	
		$subject = "Message from: " . $name;
		$headers[] = 'From: '.get_bloginfo( 'name' ).' <'.$email.'>';
		//$headers[] = 'From: Jared\'s Website' .' <'.$email.'>';
		$headers[] = 'Reply-to: '.$name.' <'.$email.'>';
		wp_mail( $to, $subject, $message, $headers);	
		echo $postID;	
	}
	else echo 0;
	//echo $postID;
	die();
}