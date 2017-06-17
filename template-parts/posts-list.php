<?php
/**
 * 文章列表-无图片时有占位符
 * @package lean
 */
?>

<?php if(has_post_thumbnail()) : ?>
<div class="entry">
	<div class="row">
		<div class="col-lg-4">
			<a class="entry-img" href="<?php the_permalink(); ?>">
		    <?php
		      the_post_thumbnail('medium', ['class' => 'img-fluid']);
		    ?>
		  </a>
		</div>
		<div class="col-lg-8">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php lean_entry_meta(); ?>
			</div>

			<div class="entry-excerpt hidden-sm-down">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div><!-- ./row -->
</div>

<?php else: ?>

<div class="entry">
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="entry-meta">
		<?php lean_entry_meta(); ?>
	</div>

	<div class="entry-excerpt hidden-sm-down">
		<?php the_excerpt(); ?>
	</div>
</div><!-- ./entry -->
<?php endif; ?>
