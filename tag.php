<?php get_header(); ?>



<div class="container mt-4">
  <div class="row">
    <div class="content-area">

        <header class="media bg-white border rounded mb-4 p-4 l-shadow">
          <div class="bg-light p-4 d-flex mr-3">
            <span class="oi oi-tag"></span>
          </div>
          <div class="media-body">
            <?php
            lean_the_archive_title( '<h1>', '</h1>' );
            lean_the_archive_description( '<div class="text-muted mt-3">', '</div>' );
            ?>
          </div>

        </header>

        <?php if ( have_posts() ) : ?>
        <div class="posts">
          <?php while ( have_posts() ) : the_post();?>
            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
          <?php endwhile; ?>
        </div>
          <div class="pagination p-3">
            <?php lean_pagination();?>
          </div>

    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    wp_reset_postdata(); ?>

    </div><!-- ./ col-lg-8 -->

    <?php get_sidebar();?>

  </div>
</div>

<?php get_footer(); ?>
