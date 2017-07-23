<?php
/**
 * 图片模板
 * @package lean
 */
?>

<div class="card card-shadow">

	<a href="<?php //the_permalink(); ?>" class="card-img-top">
		<?php
			the_post_thumbnail('full', ['class' => 'card-img-top img-fluid']);
		?>
	</a>

	<div class="card-body">
		<?php the_title( sprintf( '<h2 class="card-title h5 text-link-color line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta text-link-color-muted">
			<small><?php lean_entry_meta2(); ?></small>
		</div>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text line-clamp-2 text-overflow-ellipsis mt-3 hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
		<?php } else {
			echo '';
		} ?>

		<p class="card-text text-link-color-muted mt-3">
		<small class="d-flex justify-content-between">
		<span><a href="<?php echo get_permalink(); ?>">阅读全文</a></span>
		<?php
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( '去抢首评', 'lean' ), get_the_title() ) );
		// comments_popup_link( sprintf( __( '去抢首评<span class="sr-only sr-only-focusable"> on %s</span>', 'lean' ), get_the_title() ) );
		echo '</span>';
		} ?>
		</small>
		</p>
	</div>

</div>
