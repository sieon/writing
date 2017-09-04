<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<div class="card border-info">
	<div class="card-body d-flex flex-column justify-content-center">
		<blockquote class="blockquote mb-0">
			<div class="line-clamp-4 text-overflow-ellipsis">
				<?php the_content(); ?>
			</div>
			<?php the_title( sprintf( '<footer class="blockquote-footer mt-3 line-clamp-2 text-overflow-ellipsis l-link-dark"><cite><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></cite></footer>' ); ?>
		</blockquote>
	</div>
</div>
