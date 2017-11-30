<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('col-md-6 mb-3'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>

	<div class="media">

		<a class="mr-3 img-grow" href="<?php the_permalink(); ?>">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'news-thumb-v0'); ?>" alt="" class="l-w-90 l-h-50">
		</a>

		<div class="media-body">
			<?php the_title( sprintf( '<a class="text-dark line-clamp-2" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a>' ); ?>
		</div>

	</div>

	<?php else: ?>

		<div class="entry-header mb-3">

			<?php the_title( sprintf( '<h3 class="entry-title fw-400 h6 mb-2"><a class="text-dark line-clamp-2" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>' ); ?>

		</div>

	<?php endif; ?>

</article><!-- #post-## -->
