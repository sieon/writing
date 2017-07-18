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

<article class="card">
  <div class="card-block">
    <div class="entry-meta mb-3"><?php the_author(); ?>：<span class="float-right"><?php the_time("Y-m-d H:i"); ?></span></div>
    <?php the_title( sprintf( '<h2 class="card-title">', esc_url( get_permalink() ) ), '</h2>' ); ?>
    <?php the_content(); ?>
  </div>
</article>
