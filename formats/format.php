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

<article <?php post_class('mb-5'); ?>>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>

<?php edit_post_link( '编辑此文章', '<p class="edit-link mb-5">', '</p>' ); ?>
