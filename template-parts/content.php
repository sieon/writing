<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>
<div class="card">
	<div class="card-block">

		<?php if(is_single()): ?>

		<?php the_title( '<h1 class="card-title mb-4">','</h1>' ); ?>

		<p class="entry-meta">
		<?php lean_entry_meta(); ?>
		</p>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php else: ?>

			<?php if( has_post_thumbnail() ) : ?>

			<div class="row">

				<div class="col-4">
					<a class="entry-img" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
					</a>
				</div>

				<div class="col-8">
					<?php the_title( sprintf( '<h2 class="card-title mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<p class="card-text entry-meta">
						<?php lean_entry_meta(); ?>
					</p>

					<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
					<p class="card-text mt-3 hidden-sm-down">
						<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
					</p>
					<?php } else {
						echo '';
					 } ?>
				</div>
			</div><!-- ./row -->

			<?php else: ?>

			<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<p class="entry-meta">
				<?php lean_entry_meta(); ?>
			</p>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text entry-excerpt hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
			<?php } else { echo ''; } ?>

			<?php endif; //end thumbnail ?>
		<?php endif; // end is_single ?>
	</div>
</div>
