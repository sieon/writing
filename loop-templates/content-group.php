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

				<a href="<?php the_permalink(); ?>">
					<figure class="img-grow">
						<?php the_post_thumbnail( 'full', ['class' => ''] ); ?>
					</figure>
				</a>

		</div>

		<div class="card-body py-0 pr-0">

			<header class="entry-header mb-3">

				<?php the_title( sprintf( '<h3 class="entry-title h5 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>' ); ?>

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

			<!-- <footer class="entry-footer small l-link-v4">

				<?php //understrap_entry_footer(); ?>

			</footer> -->

		</div>

	</div>

	<?php else: ?>

		<div class="card border-0">



				<header class="entry-header mb-3">

					<?php the_title( sprintf( '<h2 class="entry-title h4 mb-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
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

	<?php endif; ?>

</article><!-- #post-## -->
