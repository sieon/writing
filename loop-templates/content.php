<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>



<article <?php post_class('entry'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>
	<div class="row gutter-20">

		<div class="col-4">

			<a href="<?php the_permalink(); ?>">
				<figure class="img-grow mb-0">
					<?php the_post_thumbnail( 'v1', ['class' => ''] ); ?>
				</figure>
			</a>

		</div>

		<div class="col-8">

			<header class="entry-header mb-3">

				<?php the_title( sprintf( '<h2 class="entry-title h5 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content text-secondary mb-3">

				<?php echo wp_trim_words( get_the_excerpt(), 45, '...' );?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta small">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</div>

	</div>

	<?php else: ?>

		<header class="entry-header mb-3">

			<?php the_title( sprintf( '<h2 class="entry-title h5 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content mb-3">

			<?php echo wp_trim_words( get_the_excerpt(), 90, '...' );?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta small">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	<?php endif; ?>

</article><!-- #post-## -->
