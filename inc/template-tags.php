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
	<nav class="bg-white w-100 mb-4 p-4 border rounded l-shadow" role="navigation">
		<h4 class="sr-only sr-only-focusable"><?php esc_html_e( '文章导航', 'lean' ); ?></h3>
		<div class="line-h-1-8 clearfix">
			<?php
				previous_post_link( '<div class="float-left">&larr; %link</div>', '%title' );
				next_post_link( '<div class="float-right">%link &rarr;</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/****************
 *  entry Meta ***
*****/
if ( ! function_exists( 'lean_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the time,comment counts numbers.
 *
 * @since lean 1.0
 */
function lean_entry_meta() {

	the_author();

	echo '<ul class="list-inline small l-link-v6"><li class="list-inline-item mr-3"><span class="oi oi-clock mr-1"></span>';
	the_time('Y-m-d');
	//the_time('Y-m-d g:i');
	echo '</li>';

  if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<li class="list-inline-item hidden-sm-down"><a class="l-link" href="';
		comments_link();
		echo '"><span class="oi oi-chat mr-1"></span>';
		echo get_comments_number();
		echo '</a></li>';
  }

	edit_post_link( 'Edit', '<li class="list-inline-item hidden-sm-down">', '</li></ul>' );

}
endif;

if ( ! function_exists( 'writing_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function writing_posted_on() {

	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		//__( 'by %s', 'writing' ),
		'<li class="list-inline-item author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></li>'
	);

	// Finally, let's write all of this to the page.
	//echo '<li class="list-inline-item posted-on">' . writing_time_link() . '</li><li class="list-inline-item"> &bull; </li><li class="list-inline-item byline"> ' . $byline . '</li>';
	echo '<li class="list-inline-item byline"> ' . $byline . '</li><li class="list-inline-item"> &bull; </li><li class="list-inline-item posted-on">' . writing_time_link() . '</li>';
}
endif;


if ( ! function_exists( 'writing_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function writing_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'twentyseventeen' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
endif;

if ( ! function_exists( 'writing_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function writing_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'writing' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
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
			$title = esc_html_x( '日志', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( '相册', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( '图片', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( '视频', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( '引语', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( '链接', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( '状态', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( '音频', 'post format archive title', 'lean' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( '聊天', 'post format archive title', 'lean' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( '%s', 'lean' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'lean' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( '归档', 'lean' );
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

if ( ! function_exists( 'writing_excerpt_more' ) && ! is_admin() ) :
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
function writing_excerpt_more() {
	$link = sprintf( '<br/><br/><a href="%1$s" class="more-link btn btn-warning btn-sm">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '阅读全文<span class="sr-only sr-only-focusable"> "%s"</span>', 'lean' ), get_the_title( get_the_ID() ) )
	);
	//return ' &hellip; ' . $link;
  return ' &hellip; ';
}
add_filter( 'excerpt_more', 'writing_excerpt_more' );

endif;
