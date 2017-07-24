<?php get_header(); ?>

<header class="jumbotron bg-success text-white rounded-0 mb-3">
  <div class="container">
    <?php
    lean_the_archive_title( '<h1>', '</h1>' );
    lean_the_archive_description( '<div>', '</div>' );
    ?>
  </div>
</header>

<div class="container mt-4">
  <div class="main-content">

    <?php if ( have_posts() ) : ?>
      <div class="posts">
        <div class="row-contanier">
          <?php  while ( have_posts() ) : the_post(); ?>

            <?php
            get_template_part( 'template-parts/content-image', get_post_format() ); ?>
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
