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
  	'before_widget' => '<aside class="widget card-shadow %2$s">',
  	'after_widget'  => '</aside>',
  	'before_title'  => '<h4 class="widget-header h6">',
  	'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'lean_widgets_init' );
