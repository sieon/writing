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

		<div class="entry-content clearfix pt-3">
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
	</article>

<?php else: // not single ?>

	<?php if( has_post_thumbnail() ) : ?>

		<article class="w-100 bg-white mb-4 p-4 rounded border l-shadow">
			<div class="row">
                <div class="col-4">
                    <figure class="g-pos-rel mb-0">
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
						<a class="g-pos-abs l-link-v0" href="<?php echo get_permalink(); ?>"></a>
					</figure>
				</div>

				<div class="col-8 align-self-center">
                    <?php the_title( sprintf( '<h2 class="l-link-v9 mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    <?php lean_entry_meta(); ?>
                    <p class="l-color-v7 hidden-sm-down mt-3 mb-0">
                        <?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
					</p>
                </div>
			</div><!-- .row -->
		</article>

	<?php else: ?>

		<article class="w-100 bg-white mb-4 p-4 rounded border l-shadow">

			<?php the_title( sprintf( '<h2 class="l-link-v9 mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php lean_entry_meta(); ?>

			<p class="l-color-v7 mt-3 mb-0 hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>

		</article>

	<?php endif; //end thumbnail ?>

<?php endif; // end is_single ?>
