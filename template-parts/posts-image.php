<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>

<?php if(has_post_thumbnail()) : ?>
<div class="card">
	<div class="card-block">

		<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta mb-3">
			<?php lean_entry_meta(); ?>
		</div>

		<a class="entry-img" href="<?php the_permalink(); ?>">
			<?php
				the_post_thumbnail('full', ['class' => 'card-img img-fluid']);
			?>
		</a>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text entry-excerpt mt-3 hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
		<?php } else {
			echo '';
		 } ?>

	</div>
</div>

<?php else: ?>

<div class="card">
	<div class="card-block">
		<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<p class="entry-meta">
			<?php lean_entry_meta(); ?>
		</p>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<div class="entry-excerpt hidden-sm-down">
				<?php the_excerpt(); ?>
			</div>
		<?php } else {
			echo '';
		 } ?>

	</div>
</div><!-- ./entry -->
<?php endif; ?>
