<?php
/* 获取所有置顶文章 */
$sticky = get_option( 'sticky_posts' );
/* 对这些文章排序, 日期最新的在最上 */
rsort( $sticky ); /* 获取5篇文章 */
$sticky = array_slice( $sticky, 0, 2 );
query_posts(array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ));
while ( have_posts() ) : the_post();
?>
  <div class="card">
    <?php if(has_post_thumbnail()) : ?>
      <a class="post-thumbnail" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
      </a>
    <?php else: ?>
      <a class="post-thumbnail" href="<?php the_permalink(); ?>">
        <img src="<?php echo THEME_URI;?>/assets/img/placeholder.png" class="card-img-top"/>
      </a>
    <?php endif; ?>

    <div class="card-block">
      <?php
      echo '<div class="posts-categories mb-2">';
			foreach((get_the_category()) as $category) {
				echo  '<span class="badge badge-warning">'.$category->cat_name.'</span>&nbsp;';
			}
			echo "</div>"; ?>
	    <?php the_title( sprintf( '<p class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
      <?php //echo '<p class="card-text entry-excerpt">'.wp_trim_words( get_the_excerpt(), 50, '...' ).'</p>';?>
      <p class="card-text entry-footer"><small><?php the_time('j M, Y'); ?></small></p>
    </div>
  </div>
<?php endwhile; wp_reset_postdata(); ?>
