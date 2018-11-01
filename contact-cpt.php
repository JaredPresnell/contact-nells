<?php 
function add_contact_form(){
	$args = array(
		'labels' => array(
			'name' => __( 'Contact Messages' ),
			'singular_name' => __( 'Contact Message' ),
		),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'contact-message' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author',  'excerpt',)
	);
	register_post_type( 'contact-message', $args );
}
add_action( 'init', 'add_contact_form' );
add_action('admin_init', 'add_custom_contact_message_fields');

function add_custom_contact_message_fields(){
	add_meta_box( 'nells_contact_form_email', 'Email', 'nells_contact_meta_options_callback', 'contact-message' ); 
}
function nells_contact_meta_options_callback(){
	global $post;
	$custom = get_post_custom($post->ID); 	
	(isset($custom["email"][0])) ? $email = $custom["email"][0] : $email = "";
	echo '<div><h1>' . $email . '</h1></div>';
	//echo $custom;
}

add_filter('manage_contact-message_posts_columns', 'nells_filter_contact_columns');
add_action('manage_contact-message_posts_custom_column', 'nells_contact_column',10,2);



function nells_filter_contact_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['content'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function nells_contact_column($column, $post_id){
	switch ($column){
		case 'name' : 
			echo get_the_title( $post_id );
			break;

		case 'content' :
			echo get_the_excerpt($post_id);
			break;

		case 'email' :
			//echo get_the_content($post_id);
			echo get_post_meta( $post_id, $key = 'email', $single = true );
			//echo 'hey tehre';
			break;
	}
}	
?>