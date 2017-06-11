<?php
if ( ! function_exists('lean_product_post_type') ) {

// Register Custom Post Type
function lean_product_post_type() {

	$labels = array(
		'name'                  => _x( '产品', 'Post Type General Name', 'lean' ),
		'singular_name'         => _x( '产品', 'Post Type Singular Name', 'lean' ),
		'menu_name'             => __( '产品', 'lean' ),
		'name_admin_bar'        => __( '产品', 'lean' ),
		'archives'              => __( 'Item Archives', 'lean' ),
		'attributes'            => __( 'Item Attributes', 'lean' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lean' ),
		'all_items'             => __( 'All Items', 'lean' ),
		'add_new_item'          => __( 'Add New Item', 'lean' ),
		'add_new'               => __( 'Add New', 'lean' ),
		'new_item'              => __( 'New Item', 'lean' ),
		'edit_item'             => __( 'Edit Item', 'lean' ),
		'update_item'           => __( 'Update Item', 'lean' ),
		'view_item'             => __( 'View Item', 'lean' ),
		'view_items'            => __( 'View Items', 'lean' ),
		'search_items'          => __( 'Search Item', 'lean' ),
		'not_found'             => __( 'Not found', 'lean' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lean' ),
		'featured_image'        => __( 'Featured Image', 'lean' ),
		'set_featured_image'    => __( 'Set featured image', 'lean' ),
		'remove_featured_image' => __( 'Remove featured image', 'lean' ),
		'use_featured_image'    => __( 'Use as featured image', 'lean' ),
		'insert_into_item'      => __( 'Insert into item', 'lean' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lean' ),
		'items_list'            => __( 'Items list', 'lean' ),
		'items_list_navigation' => __( 'Items list navigation', 'lean' ),
		'filter_items_list'     => __( 'Filter items list', 'lean' ),
	);
	$args = array(
		'label'                 => __( '产品', 'lean' ),
		'description'           => __( '这是产品。', 'lean' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'hh',
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'lean_product_post_type', 0 );

}

 ?>
