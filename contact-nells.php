<?php 
/*
 @package contact-nells
 */
 /*
 Plugin Name: Contact Form
 Plugin URI: https://jaredpresnell.me
 Description: A plugin to create a contact form template that sends emails 
 Version: 1.0.0
 Author: Jared Presnell
 Author URI: https://jaredpresnell.me
 License: GPLv3
 Text Domain: contact-nells
 */
defined('ABSPATH') or die('stop that');


// include plugin_dir_path( __FILE__ ) . 'books-cpt.php';
include plugin_dir_path( __FILE__ ) . 'ajax.php';
include plugin_dir_path( __FILE__ ) . 'create-template.php';

function contact_form_enqueue(){
	wp_register_script( 'contact_form', plugin_dir_url(__FILE__) . 'js/contact-nells.js', array('jquery'),'1.0.0',true );
	wp_localize_script( 'contact_form', 'my_ajax_object',
	        array( 'ajax_url' => admin_url( 'admin-ajax.php')) );
	wp_enqueue_script('contact_form');
	if(is_page_template('page-contact.php'))
	{
		wp_enqueue_style( 'contact-css', plugin_dir_url(__FILE__) . 'css/style.min.css', array(), '1.0.0', 'all' );
	}
}

add_action( 'wp_enqueue_scripts', 'contact_form_enqueue' );

//ACTIVATION AND DEACTIVATION HOOKS
function activate_contact_nells_plugin(){
	flush_rewrite_rules();
}
function deactivate_contact_nells_plugin(){
	flush_rewrite_rules();	
}
register_activation_hook(__FILE__, 'activate_contact_nells_plugin');
register_deactivation_hook(__FILE__, 'deactivate_contact_nells_plugin');