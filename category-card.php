<?php get_header(); ?>

<header class="jumbotron bg-secondary text-white border card-shadow rounded-0 mb-4 border-0">
  <div class="container">
    <?php
    lean_the_archive_title( '<h1>', '</h1><hr>' );
    lean_the_archive_description( '<div>', '</div>' );
    ?>
  </div>
</header>

<div class="container mt-4">
  <div class="main-content">
    <?php if ( have_posts() ) : ?>
      <div class="posts posts-card">
        <div class="row">
          <?php  while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-3">
              <?php
              get_template_part( 'template-parts/content-card', get_post_format() ); ?>
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
