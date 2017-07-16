<?php
/**
 *******************************************************************************
 * //formats/format.php
 *******************************************************************************
 *
 * Post format for a regular, plain ol' post.
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
  <?php the_content(); ?>
  <?php edit_post_link( '编辑此文章', '<p class="edit-link">', '</p>' ); ?>
</article>
