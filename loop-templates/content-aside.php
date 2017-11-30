<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('entry'); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php
		the_content();
		?>

	</div><!-- .entry-content -->

	<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta small">
			<?php understrap_posted_on(); ?>
		</div><!-- .entry-meta -->

	<?php endif; ?>

</article><!-- #post-## -->
