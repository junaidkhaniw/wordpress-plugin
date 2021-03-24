<?php

// Our custom post type function
function create_custom_schools_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Schools', 'Post Type General Name' ),
		'singular_name'       => _x( 'School', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Schools' ),
		'parent_item_colon'   => __( 'Parent School' ),
		'all_items'           => __( 'All Schools' ),
		'view_item'           => __( 'View School' ),
		'add_new_item'        => __( 'Add New School' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit School' ),
		'update_item'         => __( 'Update School' ),
		'search_items'        => __( 'Search School' ),
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
		'description'         => 'School news and reviews',
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
		'rewrite' => array('slug' => 'schools'),
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-megaphone',
 
	);
	 
	// Registering your Custom Post Type
	register_post_type( 'Schools', $args );
 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_schools_post_type' );

// -----------------------
add_action( 'gform_after_submission_4', 'create_schools', 10, 2 );

function create_schools( $entry, $form ) {

	$name 		= rgar( $entry, '1' );

	$my_post = array(
		'post_title'    => $name,
		'post_type' => 'Schools',
		'post_status'   => 'publish'
	);

	//updating post
	wp_insert_post( $my_post );

}

?>