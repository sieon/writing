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

<article class="card card-shadow card-quote">
  <section class="card-block">
    <blockquote class="card-blockquote">
      <?php the_content(); ?>
      <?php the_title( sprintf( '<footer><cite><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></cite></footer>' ); ?>
    </blockquote>
  </section>
</article>