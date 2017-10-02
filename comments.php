<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package writing
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area bg-white w-100 mb-4 p-4 border rounded l-shadow">

	<?php comment_form(); // Render comments form. ?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-above">
				<h3 class="sr-only sr-only-focusable"><?php esc_html_e( 'Comment navigation', 'writing' ); ?></h3>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'writing' ) ); ?></div>
				<?php }
if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'writing' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation. ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			<nav class="comment-navigation" id="comment-nav-below">
				<h1 class="sr-only sr-only-focusable"><?php esc_html_e( 'Comment navigation', 'writing' ); ?></h1>
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'writing' ) ); ?></div>
				<?php }
if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'writing' ) ); ?></div>
				<?php } ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation. ?>

	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'writing' ); ?></p>

	<?php endif; ?>
</div><!-- #comments -->
