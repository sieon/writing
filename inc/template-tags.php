<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lean
 */

if ( ! function_exists( 'lean_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function lean_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="post-navigation card" role="navigation">
		<div class="card-body">
			<h4 class="sr-only sr-only-focusable"><?php esc_html_e( 'Post navigation', 'lean' ); ?></h3>
			<div class="nav-links clearfix">
				<?php
					previous_post_link( '<div class="nav-previous float-left">&larr; %link</div>', '%title' );
					next_post_link( '<div class="nav-next float-right">%link &rarr;</div>', '%title' );
				?>
			</div><!-- .nav-links -->

		</div>
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * 固定时间格式，只显示日期
 */

function lean_filter_time() {
  global $post ;
  echo get_the_time(get_option('date_format'));
}
add_filter('the_time','lean_filter_time');

/**
 *  Meta
 */
if ( ! function_exists( 'lean_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since lean 1.0
 */
function lean_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post hidden-sm-down">%s<span class="oblique-line">&nbsp;&bull;&nbsp;</span></span> ', __( '特色', 'lean' ) );
	}

	// if ( get_theme_mod( 'post-author') == yes ) {
	// 	if (!is_author()) {
	// 		if ( is_singular() || is_multi_author() ) {
	// 			printf( '<span class="post-author hidden-sm-down"><span class="author vcard"><span class="sr-only sr-only-focusable">%1$s </span><a class="url" href="%2$s">%3$s</a>&nbsp;&bull;&nbsp;</span></span>',
	// 				_x( '作者', 'Used before post author name.', 'lean' ),
	// 				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	// 				get_the_author()
	// 			);
	// 		}
	// 	}
	// }

	echo '<span class="post-time">';
  echo the_time();
	echo '</span>';

  if (!is_author()) {
		echo '&nbsp;&bull;&nbsp;';
    echo the_category(' ');
  }

  if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="ml-3 comments-link hidden-sm-down">';
    comments_popup_link( sprintf( __( '去抢首评', 'lean' ), get_the_title() ) );
    // comments_popup_link( sprintf( __( '去抢首评<span class="sr-only sr-only-focusable"> on %s</span>', 'lean' ), get_the_title() ) );
    echo '</span>';
  }

	edit_post_link( '编辑', '<span class="edit-link hidden-sm-down">&nbsp;&bull;&nbsp;', '</span>' );

}
endif;


/**
 *  Meta
 */
if ( ! function_exists( 'lean_entry_meta2' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since lean 1.0
 */
function lean_entry_meta2() {

	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post hidden-sm-down">%s<span class="oblique-line">&nbsp;&bull;&nbsp;</span></span> ', __( '特色', 'lean' ) );
	}

	echo '<span class="post-time">';
  echo the_time();
	echo '</span>';

  if (!is_author()) {
		echo '&nbsp;&bull;&nbsp;';
    echo the_category(' ');
  }

	edit_post_link( '编辑', '&nbsp;&bull;&nbsp;<span class="edit-link">', '</span>' );

}
endif;

if ( ! function_exists( 'lean_the_archive_title' ) ) :
/**
 * Shim for `lean_the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function lean_the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( '%s', 'lean' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( '%s', 'lean' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( '作者: %s', 'lean' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( '年: %s', 'lean' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'lean' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( '月: %s', 'lean' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'lean' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( '日: %s', 'lean' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'lean' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'lean' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( '%s', 'lean' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'lean' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'lean' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'lean_the_archive_description' ) ) :
/**
 * Shim for `lean_the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function lean_the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

if ( ! function_exists( 'lean_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own lean_excerpt_more() function to override in a child theme.
 *
 * @since 0.1
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function lean_excerpt_more() {
	$link = sprintf( '<br/><br/><a href="%1$s" class="more-link btn btn-warning btn-sm">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '阅读全文<span class="sr-only sr-only-focusable"> "%s"</span>', 'lean' ), get_the_title( get_the_ID() ) )
	);
	//return ' &hellip; ' . $link;
  return ' &hellip; ';
}
add_filter( 'excerpt_more', 'lean_excerpt_more' );
endif;
