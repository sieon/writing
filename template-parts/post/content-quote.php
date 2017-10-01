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

<article class="card l-shadow-v28 card-quote">
  <section class="card-body">
    <blockquote class="blockquote mb-0">
      <?php the_content(); ?>
      <?php the_title( sprintf( '<footet class="blockquote-footer"><cite><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></cite></footer>' ); ?>
    </blockquote>
  </section>
</article>
