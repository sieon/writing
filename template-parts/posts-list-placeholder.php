<?php
/**
 * 文章列表
 * @package lean
 */
?>

<div class="entry row">

	<div class="col-lg-4">
		<a href="<?php the_permalink(); ?>">
			<?php if(has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('medium', ['class' => 'img-fluid']);?>
			<?php else: ?>
				<img src="<?php echo THEME_URI;?>/assets/img/placeholder.png" class="img-fluid"/>
			<?php endif; ?>
	  </a>
	</div>

	<div class="col-lg-8">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<p class="entry-meta">
			<?php lean_entry_meta(); ?>
		</p><!-- .entry-footer -->

		<div class="entry-excerpt hidden-sm-down">
			<?php the_excerpt(); ?>
		</div>
	</div>

</div><!-- #entry-## -->
