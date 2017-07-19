<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<div class="card">
	<?php if( has_post_thumbnail() ) : ?>

		<a class="entry-img" href="<?php the_permalink(); ?>">
	    <?php
	      the_post_thumbnail( 'medium', ['class' => 'img-fluid card-img-top'] );
	    ?>
	  </a>
		<div class="card-block">
			<?php the_title( sprintf( '<h2 class="card-title line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>

	<?php else: // no thumbnail ?>

		<div class="card-block">
			<?php the_title( sprintf( '<h2 class="card-title line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'posts_list_excerpt')==yes ) { ?>
				<p class="entry-excerpt hidden-sm-down line-clamp-2 text-overflow-ellipsis">
					<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
				</p>
			<?php } else { echo ''; } ?>
		 </div>
	<?php endif; ?>
	<div class="card-footer">
		<?php lean_entry_meta(); ?>
	</div>
</div>
