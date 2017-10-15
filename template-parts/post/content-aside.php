<?php
/**
 *******************************************************************************
 * //formats/format-aside.php
 *******************************************************************************
 *
 * Post format for an aside post.
 *
 * CODEX REF
 * https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @author
 * @copyright
 * @link
 * @todo
 * @license
 * @since
 * @version
**/
?>

<article class="w-100 bg-white p-4 mb-4 rounded border l-shadow">
  <div class="entry-content">
    <blockquote class="blockquote mb-0">
      <?php the_content(); ?>
      <footer class="blockquote-footer text-right"><cite><a href="<?php echo get_permalink(); ?>"><?php the_time('Y-m-d g:i'); ?></a></cite></footer>
    </blockquote>
  </div>
</article>
