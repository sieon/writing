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

<article class="card card-inverse card-danger">
  <section class="card-block">
    <div class="entry-content">
      <blockquote class="card-blockquote">
        <?php the_content(); ?>
        <footer class="text-right"><cite><a href="<?php echo get_permalink(); ?>" class="alert-link"><?php the_time(); ?></a></cite></footer>
      </blockquote>
    </div>
  </section>
</article>
