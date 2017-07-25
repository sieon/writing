<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<div class="card card-shadow">
	<?php if( has_post_thumbnail() ) : ?>

		<a class="card-img-top" href="<?php the_permalink(); ?>">
	    <?php
	      the_post_thumbnail( 'medium', ['class' => 'img-fluid card-img-top'] );
	    ?>
	  </a>
		<div class="card-body">
			<?php the_title( sprintf( '<h2 class="card-title h6 line-clamp-2 text-overflow-ellipsis text-link-color mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>

	<?php else: // no thumbnail ?>

		<div class="card-body">
			<?php the_title( sprintf( '<h2 class="card-title h6 line-clamp-2 text-overflow-ellipsis text-link-color"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<p class="entry-excerpt hidden-sm-down line-clamp-2 text-overflow-ellipsis">
					<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
				</p>
		 </div>
	<?php endif; ?>
	<div class="card-footer text-link-color-muted">
		<small class="d-flex justify-content-between">
			<span><?php the_time(); ?></span>
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( __( '去抢首评', 'lean' ), get_the_title() ) );
			// comments_popup_link( sprintf( __( '去抢首评<span class="sr-only sr-only-focusable"> on %s</span>', 'lean' ), get_the_title() ) );
			echo '</span>';
			} ?>
		</small>
	</div>
</div>
