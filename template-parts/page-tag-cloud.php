<?php
/**
 * Template Name: 标签云
 */
get_header(); ?>
<div class="container mt-5">
  <div class="site-main">
    <main class="main-content">
      <div class="page-header">
        <h1 class="card-title">标签云</h1>
      </div>

      <div class="entry-content p-3">
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
    </main>
  </div>
</div>
<?php get_footer(); ?>
