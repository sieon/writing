<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>

<?php if(is_single()): ?>
	<div class="card l-shadow-v28">
		<div class="card-body">
			<?php the_title( '<h1 class="card-title mb-4">','</h1>' ); ?>

			<p class="l-link-v3 small"><?php lean_entry_meta(); ?></p>

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

		</div>
	</div>

<?php else: // not single ?>

	<?php if( has_post_thumbnail() ) : ?>

		<div class="row bg-white mb-4 mx-0 l-shadow rounded">

			<div class="col-sm-4 px-0">
				<a class="d-block" href="<?php the_permalink(); ?>">
					<div class="height-90 rounded-left" style="background-image:url('<?php $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');echo $medium_image_url[0]; ?>');background-size: cover;">
					</div>
				</a>
			</div>

			<div class="col-sm-8 align-self-center px-4">

					<?php the_title( sprintf( '<h2 class="h5 line-height-1-5 l-link-dark line-clamp-2 text-overflow-ellipsis mb-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
					<p class="text-secondary mb-auto">
						<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
					</p>
					<?php } else { echo ''; } ?>

					<p class="l-link-v3 small">
						<?php lean_entry_meta(); ?>
					</p>

			</div>
		</div><!-- ./row -->

	<?php else: ?>

		<div class="l-info bg-white mb-4 py-3 px-3 rounded l-shadow">
			<?php the_title( sprintf( '<h2 class="h5 l-link-dark line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
			<?php } else { echo ''; } ?>

			<p class="l-link-v3 mb-0 small">
				<?php lean_entry_meta(); ?>
			</p>
		</div>

	<?php endif; //end thumbnail ?>

<?php endif; // end is_single ?>
