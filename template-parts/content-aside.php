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

<article class="card l-shadow-v28 card-aside">
  <section class="card-body">
    <div class="entry-content">
      <blockquote class="blockquote mb-0">
        <?php the_content(); ?>
        <footer class="blockquote-footer text-right"><cite><a href="<?php echo get_permalink(); ?>"><?php the_time(); ?></a></cite></footer>
      </blockquote>
    </div>
  </section>
</article>
