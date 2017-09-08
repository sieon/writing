<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

/**
 * 移除默认的小工具
 */
// function unregister_widgets() {
  //unregister_widget( 'WP_Widget_RSS' );
  //unregister_widget( 'WP_Widget_Pages' );
  //unregister_widget( 'WP_Widget_Search' );
  //unregister_widget( 'WP_Widget_Recent_Comments' );
  //unregister_widget( 'WP_Nav_Menu_Widget' );
  //unregister_widget( 'WP_Widget_Archives' );
  //unregister_widget( 'WP_Widget_Calendar' );
  //unregister_widget( 'WP_Widget_Categories' );
  //unregister_widget( 'WP_Widget_Links' );
  //unregister_widget( 'WP_Widget_Meta' );
  //unregister_widget( 'WP_Widget_Recent_Posts' );
  //unregister_widget( 'WP_Widget_Tag_Cloud' );
  //unregister_widget( 'WP_Widget_Text' );
// }
//
// add_action( 'widgets_init', 'unregister_widgets' );

/**
 * 注册边栏
 */
function lean_widgets_init() {
  register_sidebar( array(
  	'name'          => esc_html__( '全局边栏', 'lean' ),
  	'id'            => 'sidebar-1',
  	'description'   => '这是默认全局的边栏。',
  	'before_widget' => '<aside class="widget l-shadow %2$s">',
  	'after_widget'  => '</aside>',
  	'before_title'  => '<h4 class="widget-header h6">',
  	'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( '页面边栏', 'lean' ),
    'id'            => 'sidebar-2',
    'description'   => '这里只会在页面显示。',
    'before_widget' => '<aside class="widget l-shadow %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-header h6">',
    'after_title'   => '</h4>',
  ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '底部', 'lean' ),
  //   'id'            => 'sidebar-3',
  //   'description'   => '这里只会在页面显示。',
  //   'before_widget' => '<aside class="widget p-0 border-0 bg-transparent %2$s ">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="widget-header bg-transparent mx-0 mt-0 px-0 border-bottom-0 pb-0 h5 font-weight-bold">',
  //   'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '底部2', 'lean' ),
  //   'id'            => 'sidebar-4',
  //   'description'   => '这里只会在页面显示。',
  //   'before_widget' => '<aside class="widget p-0 border-0 bg-transparent %2$s ">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="widget-header bg-transparent mx-0 mt-0 px-0 border-bottom-0 pb-0 h5 font-weight-bold">',
  //   'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '底部3', 'lean' ),
  //   'id'            => 'sidebar-5',
  //   'description'   => '这里只会在页面显示。',
  //   'before_widget' => '<aside class="widget p-0 border-0 bg-transparent %2$s ">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="widget-header bg-transparent mx-0 mt-0 px-0 border-bottom-0 pb-0 h5 font-weight-bold">',
  //   'after_title'   => '</h4>',
  // ) );
  // register_sidebar( array(
  //   'name'          => esc_html__( '底部4', 'lean' ),
  //   'id'            => 'sidebar-6',
  //   'description'   => '这里只会在页面显示。',
  //   'before_widget' => '<aside class="widget p-0 border-0 bg-transparent %2$s ">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h4 class="widget-header bg-transparent mx-0 mt-0 px-0 border-bottom-0 pb-0 h6 font-weight-bold">',
  //   'after_title'   => '</h4>',
  // ) );
}
add_action( 'widgets_init', 'lean_widgets_init' );
