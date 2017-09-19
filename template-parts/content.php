<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>

<?php if(is_single()): ?>
	<article class="bg-white w-100 mb-4 p-4 border rounded l-shadow">
		<?php the_title( '<h1 class="mb-4">','</h1>' ); ?>

		<?php lean_entry_meta(); ?>

		<div class="entry-content pt-3">

			<?php
			if ( get_theme_mod( 'post-tags')==top ) {
				$posttags = get_the_tags();
				if ( $posttags ) {
					echo '<div class="mb-3">';
					foreach( $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-outline-secondary btn-sm mr-3 mb-3">' . $tag->name . '</a>';
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
	</article>

<?php else: // not single ?>

	<?php if( has_post_thumbnail() ) : ?>

		<article class="w-100 bg-white p-4 mb-4 rounded border l-shadow">
			<div class="row">
				<div class="col-4">
					<figure class="g-pos-rel mb-0">
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
						<figcaption class="g-pos-abs g-left-0 g-top-0 z-101 hidden-sm-down">
							<?php
							$categories = get_the_category();
							$arraybtn =array();
							$arraybtn["primary"]="primary";
							$arraybtn["secondary"]="secondary";
							$arraybtn["success"]="success";
							$arraybtn["danger"]="danger";
							$arraybtn["warning"]="warning";
							$arraybtn["info"]="info";
							$arraybtn["dark"]="dark";
							$catbg = array_rand($arraybtn,1);
							if ( ! empty( $categories ) ) {
								echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="btn btn-'.$catbg.' btn-sm text-uppercase rounded-0">' . esc_html( $categories[0]->name ) . '</a>';
							} ?>
						</figcaption>
						<a class="g-pos-abs l-link-v0" href="<?php echo get_permalink(); ?>"></a>
					</figure>
				</div>

				<div class="col-8 align-self-center">

					<?php the_title( sprintf( '<h2 class="h4 line-height-1-5 l-link-v9 line-clamp-2 text-overflow-ellipsis mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php lean_entry_meta(); ?>

					<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
					<p class="l-color-v7 hidden-sm-down mb-0">
						<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
					</p>
					<?php } else { echo ''; } ?>

				</div>
			</div><!-- ./row -->
		</article>

	<?php else: ?>

		<article class="bg-white mb-4 p-4 rounded border l-shadow">

			<?php the_title( sprintf( '<h2 class="h4 l-link-v9 line-clamp-2 text-overflow-ellipsis mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php lean_entry_meta(); ?>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="l-color-v7 mb-0 hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
			<?php } else { echo ''; } ?>

		</article>

	<?php endif; //end thumbnail ?>

<?php endif; // end is_single ?>
