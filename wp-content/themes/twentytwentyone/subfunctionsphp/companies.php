<?php

// Our custom post type function
function create_custom_companies_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Companies', 'Post Type General Name' ),
		'singular_name'       => _x( 'Company', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Companies' ),
		'parent_item_colon'   => __( 'Parent Company' ),
		'all_items'           => __( 'All Companies' ),
		'view_item'           => __( 'View Company' ),
		'add_new_item'        => __( 'Add New Company' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Company' ),
		'update_item'         => __( 'Update Company' ),
		'search_items'        => __( 'Search Company' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
	);

	$taxonomies = array(
		'category', 
		'post_tag', 
		'genres',
	);
	 
	// Set other options for Custom Post Type
	$args = array(
		'description'         => 'Company news and reviews',
		'labels'              => $labels,
		'supports'            => $supports,
		'taxonomies'          => $taxonomies,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'can_export' => true,
		'capability_type' => 'post',
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'companies'),
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 3,
		'menu_icon' => 'dashicons-megaphone',
 
	);
	 
	// Registering your Custom Post Type
	register_post_type( 'Companies', $args );
 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_companies_post_type' );

// -----------------------
add_action( 'gform_after_submission_5', 'create_companies', 10, 2 );

function create_companies( $entry, $form ) {

	$name 		= rgar( $entry, '1' );

	$my_post = array(
		'post_title'    => $name,
		'post_type' => 'Companies',
		'post_status'   => 'publish'
	);

	//updating post
	wp_insert_post( $my_post );

}

?>