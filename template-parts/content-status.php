<?php
/**
 * 状态
**/
?>

<article class="w-100 bg-white p-4 mb-4 rounded border l-shadow">
  <blockquote class="blockquote mb-0">
    <?php the_content(); ?>
    <footer class="blockquote-footer mt-3"><cite><a href="<?php echo get_permalink(); ?>"><?php the_time('Y-m-d g:i'); ?></a></cite></footer>
  </blockquote>
</article>
