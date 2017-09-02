<?php
/**
 * 图片模板
 * @package lean
 */
?>
<div class="card l-shadow-v28">
	<div class="card-body">
		<?php if(is_single()): ?>

		<?php the_title( '<h1 class="h2 card-title mb-4">','</h1>' ); ?>

		<p class="card-text text-link-color-muted small"><?php lean_entry_meta(); ?></p>

		<div class="entry-content pt-3">

			<?php
			if ( get_theme_mod( 'post-tags')==top ) {
				$posttags = get_the_tags();
				if ( $posttags ) {
					echo '<div class="post-tags mb-3">';
					foreach( $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-outline-danger btn-sm mr-3 mb-2">' . $tag->name . '</a>';
					}
					echo '</div>';
				}
			}
			?>

			<?php the_content(); ?>

			<?php
			if ( get_theme_mod( 'post-tags')==bottom ) {
				$posttags = get_the_tags();
				if ( $posttags ) {
					echo '<div class="post-tags mt-4 mb-3">';
					foreach( $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-light btn-sm mr-2 mb-2">' . $tag->name . '</a>';
					}
					echo '</div>';
				}
			} ?>

		</div>

		<?php else: // not single ?>

		<?php the_title( sprintf( '<h2 class="card-title h5 text-link-color line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta text-link-color-muted mb-3">
			<small><?php lean_entry_meta2(); ?></small>
		</div>

		<a href="<?php the_permalink(); ?>" class="card-img entry-img">
			<?php
				the_post_thumbnail('full', ['class' => 'card-img img-fluid']);
			?>
		</a>

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
		<?php endif; // end is_single ?>
	</div>
</div>
