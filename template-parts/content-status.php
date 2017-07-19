<?php
/**
 *******************************************************************************
 * //formats/format-status.php
 *******************************************************************************
 *
 * Post format for a status based post.
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

<article class="card card-shadow card-status">
  <div class="card-block">
    <blockquote class="card-blockquote">
      <?php the_content(); ?>
      <footer><cite><a href="<?php echo get_permalink(); ?>"><?php the_time(); ?></a></cite></footer>
    </blockquote>
  </div>
</article>
