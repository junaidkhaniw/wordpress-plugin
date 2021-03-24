<?php

// Our custom post type function
function create_custom_internship_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Internships', 'Post Type General Name' ),
		'singular_name'       => _x( 'Internship', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Internships' ),
		'parent_item_colon'   => __( 'Parent Internship' ),
		'all_items'           => __( 'All Internships' ),
		'view_item'           => __( 'View Internship' ),
		'add_new_item'        => __( 'Add New Internship' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Internship' ),
		'update_item'         => __( 'Update Internship' ),
		'search_items'        => __( 'Search Internship' ),
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
		'description'         => 'Internship news and reviews',
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
		'rewrite' => array('slug' => 'internships'),
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-megaphone',
 
	);
	 
	// Registering your Custom Post Type
	register_post_type( 'Internships', $args );
 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_internship_post_type' );

// -----------------------
add_action( 'gform_after_submission_2', 'create_internship', 10, 2 );

function create_internship( $entry, $form ) {

	$name 		= rgar( $entry, '1' );

	$my_post = array(
		'post_title'    => $name,
		'post_type' => 'Internships',
		'post_status'   => 'publish'
	);

	//updating post
	wp_insert_post( $my_post );

}

add_filter( 'gform_pre_render_2', 'populate_posts_schools' );
// add_filter( 'gform_pre_validation_51', 'populate_posts' );
// add_filter( 'gform_pre_submission_filter_51', 'populate_posts' );
// add_filter( 'gform_admin_pre_render_51', 'populate_posts' );

function populate_posts_schools( $form ) {
 
    foreach ( $form['fields'] as $field ) {
 
        if ( $field->id != 3 ) {
            continue;
        }

        $posts = get_posts( 'numberposts=-1&post_type=schools' );
 
        $choices = array();
 
        foreach ( $posts as $post ) {
            $choices[] = array( 
				'text' => $post->post_title, 
				'value' => $post->ID
			);
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Schools';
        $field->choices = $choices;
 
    }
 
    return $form;
}

add_filter( 'gform_pre_render_2', 'populate_posts_companies' );
// add_filter( 'gform_pre_validation_2', 'populate_posts_companies' );
// add_filter( 'gform_pre_submission_filter_2', 'populate_posts_companies' );
// add_filter( 'gform_admin_pre_render_2', 'populate_posts_companies' );

function populate_posts_companies( $form ) {
 
    foreach ( $form['fields'] as $field ) {
 
        if ( $field->id != 4 ) {
            continue;
        }

        $posts = get_posts( 'numberposts=-1&post_type=companies' );
 
        $choices = array();
 
        foreach ( $posts as $post ) {
            $choices[] = array( 
				'text' => $post->post_title, 
				'value' => $post->ID
			);
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a Companies';
        $field->choices = $choices;
 
    }
 
    return $form;
}

?>