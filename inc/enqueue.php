<?php
/**
 * 加载 css 和 js.
 */
function lean_scripts() {

  switch (get_theme_mod( 'style-colors')) {
    case 'navbar-dark bg-success':
    wp_enqueue_style( 'l-toolkit', THEME_URI . '/assets/css/toolkit1.css');
    break;
    case 'navbar-dark bg-danger':
    wp_enqueue_style( 'l-toolkit', THEME_URI . '/assets/css/toolkit2.css');
    break;
    case 'navbar-dark bg-warning':
    wp_enqueue_style( 'l-toolkit', THEME_URI . '/assets/css/toolkit3.css');
    break;
    case 'navbar-dark bg-info':
    wp_enqueue_style( 'l-toolkit', THEME_URI . '/assets/css/toolkit4.css');
    break;
    default:
    wp_enqueue_style( 'l-toolkit', THEME_URI . '/assets/css/toolkit.css');
    break;
  }

	wp_enqueue_style( 'l-font-awesome', THEME_URI . '/assets/css/open-iconic-bootstrap.min.css');

	wp_enqueue_script( 'l-jquery', THEME_URI . '/assets/js/jquery-slim.min.js', array(), '20170823', true );
  wp_enqueue_script( 'l-popper', THEME_URI . '/assets/js/popper.min.js', array(), '20170416', true );
	wp_enqueue_script( 'l-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array(), '20170616', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );
