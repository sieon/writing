<?php
/**
 * 文章列表-卡片
 * @package writing
 */
?>

<div class="card l-shadow-v1-4 g-oc-0-5">
	<?php if( has_post_thumbnail() ) : ?>

		<a class="entry-img card-img-top" href="<?php the_permalink(); ?>">
	    <?php
	      the_post_thumbnail( 'medium', ['class' => 'card-img-top'] );
	    ?>
	  </a>

		<div class="card-body">
			<?php the_title( sprintf( '<p class="card-title line-clamp-2 text-overflow-ellipsis l-link-v9 mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
		</div>

	<?php else: // no thumbnail ?>

		<div class="card-body">

			<?php the_title( sprintf( '<h2 class="card-title h5 l-link-v9 line-clamp-2 text-overflow-ellipsis"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<p class="card-text entry-excerpt hidden-sm-down line-clamp-4 text-overflow-ellipsis text-muted">
				<?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
			</p>

			<p class="card-text l-link-v4 d-flex justify-content-between small">
				<span class="post-time"><?php the_time(); ?></span>
				<?php
				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link( sprintf( __( '去抢首评', 'writing' ), get_the_title() ) );
				// comments_popup_link( sprintf( __( '去抢首评<span class="sr-only sr-only-focusable"> on %s</span>', 'writing' ), get_the_title() ) );
				echo '</span>';
				} ?>
			</p>
		</div>

	<?php endif; ?>

</div>
