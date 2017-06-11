<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

/**
 * Remove Default Widgets
 */
function unregister_widgets() {
  unregister_widget( 'WP_Widget_RSS' );
  unregister_widget( 'WP_Widget_Pages' );
  unregister_widget( 'WP_Widget_Search' );
  unregister_widget( 'WP_Widget_Recent_Comments' );
  unregister_widget( 'WP_Nav_Menu_Widget' );
  //unregister_widget( 'WP_Widget_Archives' );
  //unregister_widget( 'WP_Widget_Calendar' );
  //unregister_widget( 'WP_Widget_Categories' );
  unregister_widget( 'WP_Widget_Links' );
  //unregister_widget( 'WP_Widget_Meta' );
  unregister_widget( 'WP_Widget_Recent_Posts' );
  //unregister_widget( 'WP_Widget_Tag_Cloud' );
  //unregister_widget( 'WP_Widget_Text' );
}

add_action( 'widgets_init', 'unregister_widgets' );

function lean_widgets_init() {
  register_sidebar( array(
  	'name'          => esc_html__( '全局边栏', 'lean' ),
  	'id'            => 'sidebar-1',
  	'description'   => '这是默认全局的边栏。',
  	'before_widget' => '<aside class="widget %2$s">',
  	'after_widget'  => '</aside>',
  	'before_title'  => '<h4 class="widget-header">',
  	'after_title'   => '</h4>',
  ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '首页-文章列表 1', 'lean' ),
  //   'id'            => 'home-block-1',
  //   'description'   => '只有标题的列表。',
  //   'before_widget' => '<div id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</div>',
  //   'before_title'  => '<h4 class="widget-header">',
  // 	'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '首页-文章列表 2', 'lean' ),
  //   'id'            => 'home-block-2',
  //   'description'   => '只有标题的列表。',
  //   'before_widget' => '<div id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</div>',
  //   'before_title'  => '<h4 class="widget-header">',
  // 	'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '顶部广告', 'lean' ),
  //   'id'            => 'home-ad-1',
  //   'description'   => '这是顶部的长条广告。',
  //   'before_widget' => '<div id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</div>',
  //   'before_title'  => '<h4 class="card-header widget-header">',
  //   'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '右侧产品', 'lean' ),
  //   'id'            => 'home-ad-2',
  //   'description'   => '',
  //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="card-header widget-header">',
  //   'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '三个广告', 'lean' ),
  //   'id'            => 'home-ad-3',
  //   'description'   => '使用<a href="地址"><img src="图片地址" /></a>添加广告。如果是三个：<div class="row"><div class="col-md-3"><a href="地址"><img src="图片地址" /></a></div><div class="col-md-4"><a href="地址"><img src="图片地址" /></a></div><div class="col-md-5"><a href="地址"><img src="图片地址" /></a></div></div>',
  //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="widget-header">',
  //   'after_title'   => '</h4>',
  // ) );
}
add_action( 'widgets_init', 'lean_widgets_init' );
