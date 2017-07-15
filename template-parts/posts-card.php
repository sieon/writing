<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<?php if(has_post_thumbnail()) : ?>

	<div class="card">
		<a class="entry-img" href="<?php the_permalink(); ?>">
	    <?php
	      the_post_thumbnail('medium', ['class' => 'img-fluid card-img-top']);
	    ?>
	  </a>
		<div class="card-block">
			<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>
		<div class="card-footer">
			<?php lean_entry_meta(); ?>
		</div>
	</div>

<?php else: ?>
	<div class="card">
		<!-- <a href="<?php //the_permalink(); ?>">
			<img src="<?php //echo THEME_URI;?>/assets/img/placeholder.png" class="card-img-top"/>
		</a> -->
		<div class="card-block">
			<?php the_title( sprintf( '<h2 class="card-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
				<p class="entry-excerpt hidden-sm-down">
					<?php echo wp_trim_words( get_the_excerpt(), 120, '...' );?>
				</p>
			<?php } else {
				echo '';
			 } ?>

		</div>
		<div class="card-footer">
			<?php lean_entry_meta(); ?>
		</div>
	</div>

<?php endif; ?>
