<?php
/**
 * 文章列表-卡片
 * @package lean
 */
?>

<div class="card border-warning">
	<div class="card-body d-flex flex-column justify-content-center">
		<div class="entry-content">
      <blockquote class="blockquote mb-0">
				<div class="line-clamp-8 text-overflow-ellipsis">
					<?php the_content(); ?>
				</div>
        <footer class="blockquote-footer text-right l-link-v3 mt-3"><cite><a href="<?php echo get_permalink(); ?>"><?php the_time(); ?></a></cite></footer>
      </blockquote>
    </div>
	</div>
</div>
