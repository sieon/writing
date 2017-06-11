<?php
/**
 * @package start
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<div class="entry-header">
		<?php the_title( '<h1 class="">', '</h1>' ); ?>
		<div class="post-meta">
			<p class="text-muted"><?php echo the_time(); ?></p>
		</div>
	</div>

	<div class="entry-content">
		<?php
			// Post thumbnail.
			lean_post_thumbnail();
		?>
		<?php the_content(); ?>
	</div>
	<hr>
</article><!-- #post-## -->
