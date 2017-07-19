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

<article class="card card-shadow">
  <div class="card-block">
    <?php the_content(); ?>
    <p class="entry-meta card-text"><?php lean_entry_meta(); ?></p>
  </div>
</article>
