<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('mb-4'); ?> id="post-<?php the_ID(); ?>">

	<div class="card l-shadow-v0">

		<div class="card-body">
			<header class="entry-header mb-3">

				<?php the_title( sprintf( '<h2 class="entry-title h5"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta small">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="card-img">
				<?php if( has_post_thumbnail() ) : ?>

					<a href="<?php the_permalink(); ?>">
						<figure class="img-grow">
							<?php the_post_thumbnail( 'full', ['class' => ''] ); ?>
						</figure>
					</a>

				<!-- <?php //else: // no thumbnail ?>

					<a href="<?php// the_permalink(); ?>">
						<figure class="img-grow">
							<img src="<?php// echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="图片占位符">
						</figure>
					</a> -->
				<?php endif; ?>
			</div>

			<div class="entry-content">

				<?php
				the_excerpt();
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->

			<hr>

			<footer class="entry-footer small l-link-v4">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
