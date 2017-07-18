<?php
/**
 * 图片模板
 * @package lean
 */
?>

<?php if(has_post_thumbnail()) : ?>
<div class="card">
	<div class="card-block">

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
</div>

<?php else: ?>

<div class="card">
	<div class="card-block">
		<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<p class="entry-meta">
			<?php lean_entry_meta(); ?>
		</p>

		<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
			<p class="card-text entry-excerpt hidden-sm-down">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>
		<?php } else {
			echo '';
		 } ?>

	</div>
	<div class="card-footer">
		<?php echo get_permalink(); ?>
	</div>
</div><!-- ./entry -->
<?php endif; ?>
