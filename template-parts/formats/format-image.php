<?php
/**
 *******************************************************************************
 * //formats/format-image.php
 *******************************************************************************
 *
 * Post format for an image post.
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>

<?php edit_post_link( '编辑此文章', '<span class="edit-link">', '</span>' ); ?>
