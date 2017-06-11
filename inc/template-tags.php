<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lean
 */
/**
  * next posts link
  *
  */
 function lean_get_next_posts_link( $label = null, $max_page = 0 ) {
 	global $paged, $wp_query;

 	if ( !$max_page )
 		$max_page = $wp_query->max_num_pages;

 	if ( !$paged )
 		$paged = 1;

 	$nextpage = intval($paged) + 1;

 	if ( null === $label )
 		$label = __( 'Next Page &raquo;' );

 	if ( !is_single() && ( $nextpage <= $max_page ) ) {
 		/**
 		 * Filter the anchor tag attributes for the next posts page link.
 		 *
 		 * @since 2.7.0
 		 *
 		 * @param string $attributes Attributes for the anchor tag.
 		 */
 		$attr = apply_filters( 'next_posts_link_attributes', '' );

 		return '<a class="page-link" href="' . next_posts( $max_page, false ) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
 	}
 }

 function lean_next_posts_link( $label = null, $max_page = 0 ) {
 	echo lean_get_next_posts_link( $label, $max_page );
 }


/**
 * previous posts link
 */

 function lean_get_previous_posts_link( $label = null ) {
 	global $paged;

 	if ( null === $label )
 		$label = __( '&laquo; Previous Page' );

 	if ( !is_single() && $paged > 1 ) {
 		/**
 		 * Filter the anchor tag attributes for the previous posts page link.
 		 *
 		 * @since 2.7.0
 		 *
 		 * @param string $attributes Attributes for the anchor tag.
 		 */
 		$attr = apply_filters( 'previous_posts_link_attributes', '' );
 		return '<a class="page-link" href="' . previous_posts( false ) . "\" $attr>". preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) .'</a>';
 	}
 }


 /**
  * Posts pagination
  */
	if (!function_exists( 'lean_content_nav')):
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function lean_content_nav($nav_id) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous )
				return;
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
			return;

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

		?>
		<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
			<h4 class="sr-only sr-only-focusable"><?php _e( 'Post navigation', 'lean' ); ?></h4>

		<?php if ( is_single() ) : // navigation links for single posts ?>

			<div class="row">
				<div class="col-md-4">
					<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'lean' ) . '</span> %title' ); ?>
				</div><!-- .col-md-4 -->
				<div class="col-md-4 col-nav-next">
					<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'lean' ) . '</span>' ); ?>
				</div><!-- .col-md-4 -->
			</div><!-- .row -->

		<?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages ?>
			<div class="row">
				<div class="col-md-4">

					<?php if (get_next_posts_link()) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lean' ) ); ?></div>
					<?php endif; ?>

				</div><!-- .col-md-4 -->
				<div class="col-md-4 col-nav-next">

					<?php if (get_previous_posts_link()) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lean' ) ); ?></div>
					<?php endif; ?>

				</div><!-- .col-md-4 -->
			</div><!-- .row -->

		<?php endif; ?>

		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
		<?php
	}
	endif; // lean_content_nav


if ( ! function_exists( 'lean_the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function lean_the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav>
		<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
			<li><?php next_posts_link( esc_html__( '下一页', 'lean' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li><?php previous_posts_link( esc_html__( '上一页', 'lean' ) ); ?></li>
			<?php endif; ?>
		</ul>
	</nav><!-- .navigation -->
	<?php
}
endif;

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
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="sr-only sr-only-focusable"><?php esc_html_e( 'Post navigation', 'lean' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * WordPress 修改时间的显示格式为几天前
 * https://www.wpdaxue.com/time-ago.html
 */
function lean_filter_time() {
 global $post ;
 $to = time();
 $from = get_the_time('U') ;
 $diff = (int) abs($to - $from);
 if ($diff <= 3600) {
   $mins = round($diff / 60);
   if ($mins <= 1) {
     $mins = 1;
   }
   $time = sprintf(_n('%s 分钟', '%s 分钟', $mins), $mins) . __( '前' , 'lean' );
 }
 else if (($diff <= 86400) && ($diff > 3600)) {
   $hours = round($diff / 3600);
   if ($hours <= 1) {
     $hours = 1;
   }
   $time = sprintf(_n('%s 小时', '%s 小时', $hours), $hours) . __( '前' , 'lean' );
 }
 elseif ($diff >= 86400) {
   $days = round($diff / 86400);
   if ($days <= 1) {
     $days = 1;
     $time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'lean' );
   }
   elseif( $days > 29){
     $time = get_the_time(get_option('date_format'));
   }
   else{
     $time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'lean' );
   }
 }
 return $time;
}
add_filter('the_time','lean_filter_time');


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

  if ( is_singular() || is_multi_author() ) {
    printf( '<span class="byline hidden-sm-down"><span class="author vcard"><span class="sr-only sr-only-focusable">%1$s </span><a class="url" href="%2$s">%3$s</a>&nbsp;&bull;&nbsp;</span></span>',
      _x( '作者', 'Used before post author name.', 'lean' ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      get_the_author()
    );
  }

  echo '<time class="time">' . the_time() . '</time>&nbsp;&bull;&nbsp;';

  //echo '<span class="post-views"> <i class="fa fa-eye" aria-hidden="true"></i> '.lean_get_post_views(get_the_ID()).'</span>';

  // $categories = get_the_category();
  // $separator = ' ';
  // $output = '';
  // if ( ! empty( $categories ) ) {
  //   foreach( $categories as $category ) {
  //     $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( '查看 %s 下的所有文章', 'lean' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
  //   }
  //   echo trim( $output, $separator );
  // }

  echo the_category(' ');

  if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link float-right">';
    comments_popup_link( sprintf( __( '去抢首评', 'lean' ), get_the_title() ) );
    // comments_popup_link( sprintf( __( '去抢首评<span class="sr-only sr-only-focusable"> on %s</span>', 'lean' ), get_the_title() ) );
    echo '</span>';
  }

}
endif;


if ( ! function_exists( 'lean_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'twentyfifteen' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="sr-only sr-only-focusable">%s </span>', _x( 'Format', 'Used before post format.', 'twentyfifteen' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><span class="sr-only sr-only-focusable">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'twentyfifteen' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="sr-only sr-only-focusable">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( 'Author', 'Used before post author name.', 'twentyfifteen' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
		if ( $categories_list && twentyfifteen_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="sr-only sr-only-focusable">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'twentyfifteen' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="sr-only sr-only-focusable">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'twentyfifteen' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="sr-only sr-only-focusable">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'twentyfifteen' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( __( 'Leave a comment<span class="sr-only sr-only-focusable"> on %s</span>', 'twentyfifteen' ), get_the_title() ) );
		echo '</span>';
	}
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
		$title = sprintf( esc_html__( 'Archives: %s', 'lean' ), post_type_archive_title( '', false ) );
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

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lean_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lean_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lean_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lean_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lean_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in lean_categorized_blog.
 */
function lean_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'lean_categories' );
}
add_action( 'edit_category', 'lean_category_transient_flusher' );
add_action( 'save_post',     'lean_category_transient_flusher' );


// add custom active class in menu items 多余的 active
/** function lean_custom_active_item_class($classes = array(), $menu_item = false)
{
    if (in_array('current-menu-item', $menu_item->classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'lean_custom_active_item_class', 10, 2);**/


if ( ! function_exists( 'lean_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Twenty Fifteen 1.0
 */
function lean_post_thumbnail() {
 if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
   return;
 }

 if ( is_singular() ) :
 ?>

 <div class="post-thumbnail mb-4">
   <?php
     // Post thumbnail.
     the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']);
   ?>
 </div><!-- .post-thumbnail -->

 <?php else : ?>

 <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
   <?php
     // Post thumbnail.
     the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top img-fluid']);
   ?>
 </a>
 <?php endif; // End is_singular()
}
endif;


if ( ! function_exists( 'lean_entry_taxonomies' ) ) :
/**
 *  Taxonomies terms links.
 *  获取所有分类方式分类链接.
 *
 * @since lean 1.0
 */
function lean_entry_taxonomies( ) {
  // get post by post id
  $post = get_post( $post->ID );
  // get post type by post
  $post_type = $post->post_type;
  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );
  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );
    if ( !empty( $terms ) ) {
      //$out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
      foreach ( $terms as $term ) {
        $out[] =
          '  <a href="'
        .    get_term_link( $term->slug, $taxonomy_slug ) .'">'
        .    $term->name
        . "</a>\n";
      }
      //$out[] = "</ul>\n";
    }
  }
  return implode('', $out );
}
endif;

if ( ! function_exists( 'lean_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own lean_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function lean_excerpt_more() {
	$link = sprintf( '<br/><br/><a href="%1$s" class="more-link btn btn-warning btn-sm">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '阅读全文<span class="sr-only sr-only-focusable"> "%s"</span>', 'lean' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'lean_excerpt_more' );
endif;
