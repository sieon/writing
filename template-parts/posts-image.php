<?php
/**
 * 图片模板
 * @package lean
 */
?>

<div class="card">
	<div class="card-block">

	<?php if( is_single() ): ?>

		<?php the_title( '<h1 class="card-title mb-4">' ,'</h1>' ); ?>

		<p class="entry-meta">
		<?php lean_entry_meta(); ?>
		</p>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div>

	<?php else: ?>

			<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php lean_entry_meta(); ?>
			</div>

			<a class="entry-img mt-3" href="<?php the_permalink(); ?>">
				<?php
					the_post_thumbnail('full', ['class' => 'card-img img-fluid']);
				?>
			</a>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
				<p class="card-text mt-3 hidden-sm-down">
					<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
				</p>
			<?php } else {
				echo '';
			 } ?>


		</div>

		<div class="card-footer">
			<a href="<?php echo get_permalink(); ?>">阅读全文</a>
		</div>

	<?php endif; // end is_single ?>

</div>
