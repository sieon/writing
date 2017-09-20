<?php
/**
 * 加载 css 和 js.
 */
function lean_scripts() {

  wp_enqueue_style( 'style', THEME_URI . '/style.min.css');
	wp_enqueue_style( 'iconic', THEME_URI . '/assets/css/open-iconic-bootstrap.min.css');
	wp_enqueue_script( 'bs4', THEME_URI . '/assets/js/scripts.min.js', array('jquery'), '20170616', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );
