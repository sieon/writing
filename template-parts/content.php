<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>
<div class="card l-shadow">
	<div class="card-body">

		<?php if(is_single()): ?>

		<?php the_title( '<h1 class="card-title mb-4">','</h1>' ); ?>

		<p class="card-text text-link-color-muted">
			<small>
				<?php lean_entry_meta(); ?>
			</small>
		</p>

		<div class="entry-content pt-3">

			<?php
			if ( get_theme_mod( 'post-tags')==top ) {
				$posttags = get_the_tags();
				if ( $posttags ) {
					echo '<div class="post-tags mb-3">';
					foreach( $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-light btn-sm mr-3 mb-2">' . $tag->name . '</a>';
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

			<?php if( has_post_thumbnail() ) : ?>

			<div class="row">

				<div class="col-4">
					<a class="entry-img" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
					</a>
				</div>

				<div class="col-8">
					<?php the_title( sprintf( '<h2 class="card-title h5 text-link-color line-clamp-2 text-overflow-ellipsis mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
					<p class="card-text mt-3 hidden-sm-down">
						<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
					</p>
					<?php } else {
						echo '';
					 } ?>

					 <p class="card-text text-link-color-muted">
		 				<small>
		 					<?php lean_entry_meta(); ?>
		 				</small>
		 			</p>

				</div>
			</div><!-- ./row -->

			<?php else: ?>

			<?php the_title( sprintf( '<h2 class="card-title h5 text-link-color line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
			<?php } else { echo ''; } ?>

			<p class="card-text text-link-color-muted">
				<small>
					<?php lean_entry_meta(); ?>
				</small>
			</p>

			<?php endif; //end thumbnail ?>
		<?php endif; // end is_single ?>
	</div>
</div>
