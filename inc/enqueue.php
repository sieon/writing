<?php
/**
 * 加载 css 和 js.
 */
function lean_scripts() {

  wp_enqueue_style( 'bootstrap', THEME_URI . '/assets/css/bootstrap/bootstrap.css');
	wp_enqueue_style( 'font-awesome', THEME_URI . '/assets/css/font-awesome.min.css');
  wp_enqueue_style( 'main', THEME_URI . '/assets/css/main.css');

	wp_enqueue_script( 'lean-jquery', THEME_URI . '/assets/js/jquery-3.2.1.min.js', array(), '20170609', true );
  wp_enqueue_script( 'lean-popper', THEME_URI . '/assets/js/popper.min.js', array(), '20170416', true );
	wp_enqueue_script( 'lean-tether', THEME_URI . '/tether.min.js', array(), '20170609', true );
	wp_enqueue_script( 'lean-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array(), '20170417', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );
