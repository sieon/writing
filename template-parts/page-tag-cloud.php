<?php
/**
 * Template Name: 标签云
 */
get_header(); ?>

<div class="jumbotron rounded-0 bg-dark border-0 text-white l-shadow d-flex justify-content-center">
  <div class="container">
    <h1 class="">标签云</h1>
  </div>
</div>

<div class="container mt-4">
  <main class="w-100 bg-white border p-4 l-shadow">
    <div class="entry-content">
      <?php //lean_wp_tag_cloud();
      $poststags= get_tags();
      if ( $poststags ) {
        echo '<div class="posts-tags">';
        foreach( $poststags as $tag ) {
          echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="btn btn-light btn-sm mb-4 mr-3"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;' . $tag->name . '</a>&nbsp;';
        }
        echo '</div>';
      } ?>
    </div>
  </main>
</div>
<?php get_footer(); ?>
