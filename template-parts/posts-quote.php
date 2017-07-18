<?php
/**
 *******************************************************************************
 * //formats/format-quote.php
 *******************************************************************************
 *
 * Post format for quote post.
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

<article class="card">
  <section class="card-block">
    <blockquote class="card-blockquote">
      <?php the_content(); ?>
      <?php the_title( sprintf( '<footer><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></footer>' ); ?>
    </blockquote>
  </section>
</article>
