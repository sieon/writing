<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('mb-4'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>
	<div class="card card-horizontal border-0">

		<div class="card-img">

			<a class="img-grow" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full', ['class' => ''] ); ?>
			</a>

		</div>

		<div class="card-body py-0 pr-0">

			<header class="entry-header mb-3">

				<?php the_title( sprintf( '<h2 class="entry-title h6 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta small">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php echo wp_trim_words( get_the_excerpt(), 45, '...' );?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->

		</div>

	</div>

	<?php else: ?>

		<div class="card border-0">

			<div class="card-body">

				<header class="entry-header mb-3">

					<?php the_title( sprintf( '<h2 class="entry-title h6 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>' ); ?>

					<?php if ( 'post' == get_post_type() ) : ?>

						<div class="entry-meta small">
							<?php understrap_posted_on(); ?>
						</div><!-- .entry-meta -->

					<?php endif; ?>

				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php echo wp_trim_words( get_the_excerpt(), 90, '...' );?>

					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					) );
					?>

				</div><!-- .entry-content -->

			</div>

		</div>

	<?php endif; ?>

</article><!-- #post-## -->
