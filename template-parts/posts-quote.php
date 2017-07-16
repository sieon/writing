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
    <?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <div class="entry-meta mb-3">
      <?php lean_entry_meta(); ?>
    </div>
    <blockquote class="card-blockquote">
      <?php the_content(); ?>
    </blockquote>
  </section>
</article>
