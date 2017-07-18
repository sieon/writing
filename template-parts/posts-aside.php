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
  	<blockquote>
      <p class="card-text entry-excerpt hidden-sm-down">
        <?php echo wp_trim_words( get_the_excerpt(), get_theme_mod( 'excerpt_length'), '...' );?>
      </p>
    </blockquote>
    <div class="entry-meta">
      <?php lean_entry_meta(); ?>
    </div>
  </section>
</article>
