<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lean
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry media mb-4 clearfix'); ?>>
	<div class="media-body">
		<header class="entry-header">
			<?php the_title( sprintf( '<h3 class="mt-0 mb-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="mb-2">
				<small><?php echo the_time(); ?></small>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer">
			<small class="text-muted"><?php echo get_the_author(); ?>&nbsp;<?php lean_entry_footer(); ?></small>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
