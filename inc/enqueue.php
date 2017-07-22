<?php
/**
 * 加载 css 和 js.
 */
function lean_scripts() {

  switch (get_theme_mod( 'style-colors')) {

    case 'style-success':
      wp_enqueue_style( 'lean-toolkit', THEME_URI . '/assets/css/toolkit1.css');
      break;

      case 'style-danger':
        wp_enqueue_style( 'lean-toolkit', THEME_URI . '/assets/css/toolkit2.css');
        break;

        case 'style-warning':
          wp_enqueue_style( 'lean-toolkit', THEME_URI . '/assets/css/toolkit3.css');
          break;

          case 'style-info':
            wp_enqueue_style( 'lean-toolkit', THEME_URI . '/assets/css/toolkit4.css');
            break;

    default:
      wp_enqueue_style( 'lean-toolkit', THEME_URI . '/assets/css/toolkit.css');
      break;
  }

	//wp_enqueue_style( 'lean-font-awesome', THEME_URI . '/assets/css/font-awesome.min.css');

	wp_enqueue_script( 'lean-jquery', THEME_URI . '/assets/js/jquery.js', array(), '20170613', true );
  wp_enqueue_script( 'lean-popper', THEME_URI . '/assets/js/popper.js', array(), '20170416', true );
	wp_enqueue_script( 'lean-tether', THEME_URI . '/assets/js/tether.js', array(), '20170609', true );
	wp_enqueue_script( 'lean-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array(), '20170616', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lean_scripts' );
