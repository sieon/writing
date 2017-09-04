<?php
/**
 * 相关文章
**/
?>

<article class="mb-4">

	<?php if( has_post_thumbnail() ) : ?>

		<a href="<?php the_permalink(); ?>">
			<figure class="entry-img">
				<?php the_post_thumbnail( 'medium', ['class' => ''] ); ?>
			</figure>
	  </a>

		<?php the_title( sprintf( '<p class="l-link-v9 line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>

	<?php else: // no thumbnail ?>

		<a href="<?php the_permalink(); ?>">
			<figure class="entry-img">
				<?php if ( get_theme_mod( 'placeholder') ) {
					echo '<img src="' . esc_url( get_theme_mod( 'placeholder' ) ) . '" alt="图片占位符" class="card-img rounded-0">';
				} else {
					echo '<img src="' . THEME_URI . '/assets/img/placeholder.png" alt="图片占位符" class="card-img rounded-0">';
				} ?>
			</figure>
		</a>

		<?php the_title( sprintf( '<p class="l-link-v9 line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>

	<?php endif; ?>

</article>
