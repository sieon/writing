<?php
/**
 * 文章列表-无图片时无占位符
 * @package lean
 */
?>




<?php if(has_post_thumbnail()) : ?>
<div class="entry">
	<div class="row">
		<div class="col-4">
			<a class="entry-img" href="<?php the_permalink(); ?>">
		    <?php
		      the_post_thumbnail('medium', ['class' => 'img-fluid']);
		    ?>
		  </a>
		</div>
		<div class="col-8">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php lean_entry_meta(); ?>
			</div>


			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
				<div class="entry-excerpt hidden-sm-down">
					<?php the_excerpt(); ?>
				</div>
			<?php } else {
				echo '';
			 } ?>


		</div>
	</div><!-- ./row -->
</div>

<?php else: ?>

<div class="entry">
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="entry-meta">
		<?php lean_entry_meta(); ?>
	</div>

	<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
		<div class="entry-excerpt hidden-sm-down">
			<?php the_excerpt(); ?>
		</div>
	<?php } else {
		echo '';
	 } ?>
</div><!-- ./entry -->
<?php endif; ?>
