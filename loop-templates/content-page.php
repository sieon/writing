<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">

	<div class="card-body">

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title mb-4">', '</h1>' ); ?>

		</header><!-- .entry-header -->

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

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

			<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
