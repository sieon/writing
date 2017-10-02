<?php
/**
 * 图片模板
 * @package lean
 */
?>

<?php if(is_single()): ?>

	<div class="bg-white w-100 mb-4 p-4 border rounded l-shadow-v28">
        <?php the_title( '<h1 class="mb-4">','</h1>' ); ?>

        <?php lean_entry_meta(); ?>
        <div class="entry-content pt-3">
            <?php the_content(); ?>
		</div>
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

	<article class="bg-white mb-4 p-4 rounded border l-shadow">

		<?php
		if ( is_single() ) {
			the_title( '<h1 class="mb-4">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="l-link-v9 mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="l-link-v9 mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>

		<?php lean_entry_meta(); ?>

		<a class="entry-img mb-3" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
		</a>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="l-color-v7 hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
		<?php } else {
			echo '';
		} ?>

		<a class="" href="<?php echo get_permalink(); ?>">阅读全文</a>
	</article>
<?php endif; // end is_single ?>
