<?php
/**
 * Template Name: 标签云
 */
get_header(); ?>
<div class="container mt-4">
  <div class="site-main">
    <main class="main-content bg-white border rounded p-4 l-shadow">
      <h1 class="mb-4">标签云</h1>
      <hr class="mb-4">

      <div class="entry-content">
        <?php //lean_wp_tag_cloud();
        $poststags= get_tags();
        if ( $poststags ) {
          echo '<div class="posts-tags">';
          foreach( $poststags as $tag ) {
            echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-light btn-sm mb-2"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;' . $tag->name . '</a>&nbsp;';
          }
          echo '</div>';
        } ?>
      </div>
    </main>
  </div>
</div>
<?php get_footer(); ?>
