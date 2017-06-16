<?php
/**
 * 加载 css 和 js.
 */
function lean_scripts() {

  wp_enqueue_style( 'lean-bootstrap', THEME_URI . '/assets/css/bootstrap.css'); //20170613
	wp_enqueue_style( 'lean-font-awesome', THEME_URI . '/assets/css/font-awesome.min.css');
  wp_enqueue_style( 'lean-main', THEME_URI . '/assets/css/main.css');

	wp_enqueue_script( 'lean-jquery', THEME_URI . '/assets/js/jquery.js', array(), '20170613', true );
  //wp_enqueue_script( 'lean-popper', THEME_URI . '/assets/js/popper.js', array(), '20170416', true );
	wp_enqueue_script( 'lean-tether', THEME_URI . '/tether.js', array(), '20170609', true );
	wp_enqueue_script( 'lean-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array(), '20170616', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );
