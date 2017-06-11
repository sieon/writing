<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package start
 */
?>

<article id="post-<?php the_ID(); ?>"  class="card">

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			// Post thumbnail.
			lean_post_thumbnail();
		?>
	</a>
	<div class="card-block">
		<div class="entry-header">
			<?php the_title( sprintf( '<h3 class="card-title mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<small class="text-muted"><?php echo the_time(); ?></small>
		</div>
		<div class="card-text entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_excerpt();
			?>
			<a href="<?php echo get_permalink(); ?>" class="" rel="nofollow">阅读全文</a>
		</div>
		<p class="card-text entry-footer"><small class="text-muted"><?php echo get_the_author(); ?>&nbsp;<?php lean_entry_footer(); ?></small></p>
	</div>
</article>
