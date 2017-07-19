<?php get_header(); ?>

<div class="container mt-4">
  <div class="main-content">
    <header class="single-header single-header-border mb-3">
      <div class="single-header-body">
        <?php
        lean_the_archive_title( '<h1 class="single-header-title">', '</h1>' );
        lean_the_archive_description( '<div class="text-muted">', '</div>' );
        ?>
      </div>
    </header>

    <?php if ( have_posts() ) : ?>
      <div class="posts-card">
        <div class="row">
          <?php  while ( have_posts() ) : the_post(); ?>
          <div class="col-lg-4">
            <?php
            get_template_part( 'template-parts/content-image', get_post_format() ); ?>
          </div>
          <?php endwhile; ?>
        </div>
      </div>

    <div class="pagination">
      <?php lean_pagination();?>
    </div>

    <?php else : ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; wp_reset_postdata();?>
  </div>
</div>

<?php get_footer(); ?>
