<?php
/**
 * Template Name: 标签云
 */
get_header(); ?>
<div class="container mt-5">
  <div class="site-main">
    <div class="page-header mb-4">
      <h1 class="page-title">标签云</h1>
    </div>
    <div class="entry-content">
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
</div>
<?php get_footer(); ?>
