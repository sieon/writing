<?php
/**
 * Template Name: 标签云
 *
 * @package leanstrap
 * @since leanstrap 0.5
 */
get_header(); ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1>标签云</h1>
    </div>
</div>
<div class="container">
  <div class="entry-content pb-4">
    <?php //lean_wp_tag_cloud();
    $poststags= get_tags();
    if ( $poststags ) {
      echo '<div class="posts-tags">';
      foreach( $poststags as $tag ) {
        echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-secondary btn-sm mb-2"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;' . $tag->name . '</a>&nbsp;';
      }
      echo '</div>';
    } ?>
  </div>
</div>

<?php get_footer(); ?>
