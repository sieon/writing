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

<article class="card">
  <section class="card-block">
    <div class="entry-content">
      <blockquote class="card-blockquote">
        <?php the_content(); ?>
      </blockquote>
    </div>
  </section>
  <div class="card-footer">
    <?php lean_entry_meta(); ?>
  </div>
</article>
