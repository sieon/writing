<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<div class="card">

	<div class="card-body d-flex flex-column justify-content-center">

		<?php the_title( sprintf( '<h2 class="card-title h6 text-link-color line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="card-text entry-excerpt hidden-sm-down line-clamp-8 text-overflow-ellipsis text-muted">
			<?php the_content();?>
		</div>
	</div>

	<div class="card-footer text-link-color-muted bg-white border-top-0 pt-0">
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
