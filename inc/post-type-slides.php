<?php
/**
 *   Carousel
 */
 if ( ! function_exists('lean_slides_post_type') ) {

 // Register Custom Post Type
 function lean_slides_post_type() {

 	$labels = array(
 		'name'                  => _x( '幻灯片', 'Post Type General Name', 'lean' ),
 		'singular_name'         => _x( '幻灯片', 'Post Type Singular Name', 'lean' ),
 		'menu_name'             => __( '幻灯片', 'lean' ),
 		'name_admin_bar'        => __( '幻灯片', 'lean' ),
 		'archives'              => __( '幻灯片 Archives', 'lean' ),
 		'attributes'            => __( '幻灯片 Attributes', 'lean' ),
 		'parent_item_colon'     => __( 'Parent 幻灯片:', 'lean' ),
 		'all_items'             => __( '所有幻灯片', 'lean' ),
 		'add_new_item'          => __( '添加新幻灯片', 'lean' ),
 		'add_new'               => __( '添加幻灯片', 'lean' ),
 		'new_item'              => __( '新幻灯片', 'lean' ),
 		'edit_item'             => __( '编辑幻灯片', 'lean' ),
 		'update_item'           => __( '更新幻灯片', 'lean' ),
 		'view_item'             => __( '浏览幻灯片', 'lean' ),
 		'view_items'            => __( '浏览幻灯片', 'lean' ),
 		'search_items'          => __( '搜索幻灯片', 'lean' ),
 		'not_found'             => __( '什么也没有', 'lean' ),
 		'not_found_in_trash'    => __( 'Not found in Trash', 'lean' ),
 		'featured_image'        => __( '幻灯片图片', 'lean' ),
 		'set_featured_image'    => __( '设置幻灯片图片', 'lean' ),
 		'remove_featured_image' => __( '移除幻灯片图片', 'lean' ),
 		'use_featured_image'    => __( '用作幻灯片图片', 'lean' ),
 		'insert_into_item'      => __( 'Insert into item', 'lean' ),
 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lean' ),
 		'items_list'            => __( 'Items list', 'lean' ),
 		'items_list_navigation' => __( 'Items list navigation', 'lean' ),
 		'filter_items_list'     => __( 'Filter items list', 'lean' ),
 	);
 	$args = array(
 		'label'                 => __( '幻灯片', 'lean' ),
 		'description'           => __( '幻灯片描述', 'lean' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
 		'taxonomies'            => array( 'slides-category' ),
 		'hierarchical'          => true,
 		'public'                => true,
 		'show_ui'               => true,
 		'show_in_menu'          => true,
 		'menu_position'         => 5,
    'menu_icon'             => 'dashicons-slides',
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => false,
 		'exclude_from_search'   => false,
 		'publicly_queryable'    => true,
 		'capability_type'       => 'page',
 	);
 	register_post_type( 'slides', $args );

 }
 add_action( 'init', 'lean_slides_post_type', 0 );

 }

 if ( ! function_exists( 'lean_slides_category' ) ) {

  // Register Custom Taxonomy
  function lean_slides_category() {

  	$labels = array(
  		'name'                       => _x( '分类目录', 'Taxonomy General Name', 'lean' ),
  		'singular_name'              => _x( '分类目录', 'Taxonomy Singular Name', 'lean' ),
  		'menu_name'                  => __( '分类目录', 'lean' ),
  		'all_items'                  => __( 'All categories', 'lean' ),
  		'parent_item'                => __( 'Parent Category', 'lean' ),
  		'parent_item_colon'          => __( 'Parent Category:', 'lean' ),
  		'new_item_name'              => __( 'New Category Name', 'lean' ),
  		'add_new_item'               => __( 'Add New Category', 'lean' ),
  		'edit_item'                  => __( 'Edit Category', 'lean' ),
  		'update_item'                => __( 'Update Category', 'lean' ),
  		'view_item'                  => __( 'View Category', 'lean' ),
  		'separate_items_with_commas' => __( 'Separate categories with commas', 'lean' ),
  		'add_or_remove_items'        => __( 'Add or remove Categories', 'lean' ),
  		'choose_from_most_used'      => __( 'Choose from the most used', 'lean' ),
  		'popular_items'              => __( 'Popular Categories', 'lean' ),
  		'search_items'               => __( 'Search Items', 'lean' ),
  		'not_found'                  => __( 'Not Found', 'lean' ),
  		'no_terms'                   => __( 'No items', 'lean' ),
  		'items_list'                 => __( 'Items list', 'lean' ),
  		'items_list_navigation'      => __( 'Items list navigation', 'lean' ),
  	);
  	$args = array(
  		'labels'                     => $labels,
  		'hierarchical'               => false,
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => false,
  		'show_tagcloud'              => false,
  		'rewrite'                    => false,
  	);
  	register_taxonomy( 'slides-category', array( 'slides' ), $args );

  }
  add_action( 'init', 'lean_slides_category', 0 );

}

 ?>
