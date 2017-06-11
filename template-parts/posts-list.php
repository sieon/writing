<?php
/**
 * 文章列表
 * @package lean
 */
?>

<li class="entry media">
	<?php if(has_post_thumbnail()) : ?>
	<div class="img-box d-flex mr-3">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	    <?php
	      // Post thumbnail.
	      the_post_thumbnail('medium', ['class' => 'img-fluid']);
	    ?>
	  </a>
	</div>

<?php else: ?>
	<div class="img-box d-flex mr-3">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	    <img src="<?php echo THEME_URI;?>/assets/img/placeholder.png" class="img-fluid"/>
	  </a>
	</div>

<?php endif; ?>

	<div class="media-body">
		<?php the_title( sprintf( '<h3 class="entry-title mt-0 mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<p class="entry-meta">
			<?php lean_entry_meta(); ?>
		</p><!-- .entry-footer -->

		<div class="entry-excerpt hidden-sm-down">
			<?php the_excerpt(); ?>
		</div>
	</div>
</li><!-- #post-## -->
