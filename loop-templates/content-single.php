<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class('card mb-4'); ?> id="post-<?php the_ID(); ?>">

	<div class="card-body">

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title h3 mb-4">', '</h1>' ); ?>

			<div class="entry-meta small mb-4">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php writing_entry_tags(); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
