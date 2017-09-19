<?php
/**
 * 图片模板
 * @package lean
 */
?>

<?php if(is_single()): ?>

	<div class="bg-white w-100 mb-4 p-4 border rounded l-shadow-v28">

		<?php the_title( '<h1 class="h2 mb-4">','</h1>' ); ?>

		<?php lean_entry_meta(); ?>

		<div class="entry-content pt-3">

			<?php
			if ( get_theme_mod( 'post-tags')==top ) {
				$posttags = get_the_tags();
				if ( $posttags ) {
					echo '<div class="post-tags mb-3">';
					foreach( $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-outline-dark btn-sm mr-3 mb-2">' . $tag->name . '</a>';
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

	</div>

<?php else: // not single ?>

	<article class="bg-white mb-4 p-4 rounded border l-shadow">

		<?php the_title( sprintf( '<h2 class="h5 line-height-1-5 l-link-v9 line-clamp-2 text-overflow-ellipsis mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php lean_entry_meta(); ?>

		<a class="entry-img mb-3" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
		</a>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="l-color-v7 line-clamp-2 text-overflow-ellipsis hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
		<?php } else {
			echo '';
		} ?>

		<a class="" href="<?php echo get_permalink(); ?>">阅读全文</a>
	</article>
<?php endif; // end is_single ?>
