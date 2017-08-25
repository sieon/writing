<?php
/**
 * 相关文章
**/
?>

<div class="card border-0">
	<?php if( has_post_thumbnail() ) : ?>

		<a class="entry-img" href="<?php the_permalink(); ?>">
	    <?php
	      the_post_thumbnail( 'medium', ['class' => 'card-img rounded-0'] );
	    ?>
	  </a>
		<div class="card-body px-0 py-2">
			<?php the_title( sprintf( '<p class="card-title line-clamp-2 text-overflow-ellipsis text-link-color mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
		</div>

	<?php else: // no thumbnail ?>

		<a class="entry-img" href="<?php the_permalink(); ?>">
			<?php if ( get_theme_mod( 'placeholder') ) {
				echo '<img src="' . esc_url( get_theme_mod( 'placeholder' ) ) . '" alt="图片占位符" class="card-img rounded-0">';
			} else {
				echo '<img src="' . THEME_URI . '/assets/img/placeholder.png" alt="图片占位符" class="card-img rounded-0">';
			} ?>
		</a>
		<div class="card-body px-0 py-2">
			<?php the_title( sprintf( '<p class="card-title text-link-color line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
		</div>

	<?php endif; ?>
</div>
