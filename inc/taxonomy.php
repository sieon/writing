<?php

/**
 *  首页栏目
 */

if ( ! function_exists( 'lean_cp_category' ) ) {

 // Register Custom Taxonomy
 function lean_cp_category() {

   $labels = array(
     'name'                       => _x( '产品', 'Taxonomy General Name', 'lean' ),
     'singular_name'              => _x( '产品', 'Taxonomy Singular Name', 'lean' ),
     'menu_name'                  => __( '产品', 'lean' ),
     'all_items'                  => __( 'All Column', 'lean' ),
     'parent_item'                => __( 'Parent Column', 'lean' ),
     'parent_item_colon'          => __( 'Parent Column:', 'lean' ),
     'new_item_name'              => __( 'New Column Name', 'lean' ),
     'add_new_item'               => __( 'Add New Column', 'lean' ),
     'edit_item'                  => __( 'Edit Column', 'lean' ),
     'update_item'                => __( 'Update Column', 'lean' ),
     'view_item'                  => __( 'View Column', 'lean' ),
     'separate_items_with_commas' => __( 'Separate Columns with commas', 'lean' ),
     'add_or_remove_items'        => __( 'Add or remove Columns', 'lean' ),
     'choose_from_most_used'      => __( 'Choose from the most used', 'lean' ),
     'popular_items'              => __( 'Popular Columns', 'lean' ),
     'search_items'               => __( 'Search Items', 'lean' ),
     'not_found'                  => __( 'Not Found', 'lean' ),
     'no_terms'                   => __( 'No items', 'lean' ),
     'items_list'                 => __( 'Items list', 'lean' ),
     'items_list_navigation'      => __( 'Items list navigation', 'lean' ),
   );
   $args = array(
     'labels'                     => $labels,
     'hierarchical'               => true,//创建像 category（true） 还是 tag（false） 的类目
     'public'                     => true,
     'show_ui'                    => true,
     'show_admin_column'          => true,//是否显示后台菜单栏中
     'show_in_nav_menus'          => true,//是否显示在菜单中
     'show_tagcloud'              => true,//是否显示在标签云中
     'rewrite'                    => true,//是否重写url
   );
   register_taxonomy( 'cp', array( 'post' ), $args ); //关联 哪种 内容类型

 }
 add_action( 'init', 'lean_cp_category', 0 );

}

/**
 *  首页栏目
 */

if ( ! function_exists( 'lean_cp_category' ) ) {

 // Register Custom Taxonomy
 function lean_cp_category() {

   $labels = array(
     'name'                       => _x( '产品', 'Taxonomy General Name', 'lean' ),
     'singular_name'              => _x( '产品', 'Taxonomy Singular Name', 'lean' ),
     'menu_name'                  => __( '产品', 'lean' ),
     'all_items'                  => __( 'All Column', 'lean' ),
     'parent_item'                => __( 'Parent Column', 'lean' ),
     'parent_item_colon'          => __( 'Parent Column:', 'lean' ),
     'new_item_name'              => __( 'New Column Name', 'lean' ),
     'add_new_item'               => __( 'Add New Column', 'lean' ),
     'edit_item'                  => __( 'Edit Column', 'lean' ),
     'update_item'                => __( 'Update Column', 'lean' ),
     'view_item'                  => __( 'View Column', 'lean' ),
     'separate_items_with_commas' => __( 'Separate Columns with commas', 'lean' ),
     'add_or_remove_items'        => __( 'Add or remove Columns', 'lean' ),
     'choose_from_most_used'      => __( 'Choose from the most used', 'lean' ),
     'popular_items'              => __( 'Popular Columns', 'lean' ),
     'search_items'               => __( 'Search Items', 'lean' ),
     'not_found'                  => __( 'Not Found', 'lean' ),
     'no_terms'                   => __( 'No items', 'lean' ),
     'items_list'                 => __( 'Items list', 'lean' ),
     'items_list_navigation'      => __( 'Items list navigation', 'lean' ),
   );
   $args = array(
     'labels'                     => $labels,
     'hierarchical'               => true,//创建像 category（true） 还是 tag（false） 的类目
     'public'                     => true,
     'show_ui'                    => true,
     'show_admin_column'          => true,//是否显示后台菜单栏中
     'show_in_nav_menus'          => true,//是否显示在菜单中
     'show_tagcloud'              => true,//是否显示在标签云中
     'rewrite'                    => true,//是否重写url
   );
   register_taxonomy( 'cp', array( 'post' ), $args ); //关联 哪种 内容类型

 }
 add_action( 'init', 'lean_cp_category', 0 );

}
