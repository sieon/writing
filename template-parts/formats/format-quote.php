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

<article class="entry-content">
  <section>
    <blockquote>
      <?php the_content(); ?>
    </blockquote>
  </section>
</article>

<?php edit_post_link( '编辑', '<span class="edit-link">', '</span>' ); ?>
