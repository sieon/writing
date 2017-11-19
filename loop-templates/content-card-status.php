<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('mb-4'); ?> id="post-<?php the_ID(); ?>">

	<div class="card">

		<div class="card-body">

			<header class="entry-header mb-3">

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta small">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php the_content(); ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer small l-link-v4">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

	</div>

</article><!-- #post-## -->
