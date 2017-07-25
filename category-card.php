<?php get_header(); ?>

<div class="container mt-4">
  <div class="main-content">
    <header class="jumbotron bg-white card-shadow mb-3 pb-4 pt-4 pl-3">
      <?php
      lean_the_archive_title( '<h1>', '</h1>' );
      lean_the_archive_description( '<div class="text-muted">', '</div>' );
      ?>
    </header>
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
