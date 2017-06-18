<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="container mt-5">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <header class="page-header">
          <?php
          lean_the_archive_title( '<h1 class="page-title">', '</h1>' );
          lean_the_archive_description( '<div class="text-muted mb-3">', '</div>' );
          ?>
        </header>

        <div class="posts-list">
          <?php
          while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/posts', get_post_format() );
        endwhile; ?>
        </div>
        <div class="pagination pt-2 mt-2">
          <?php lean_pagination();?>
        </div>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; wp_reset_postdata();?>
      </div><!---..//-->

      <?php get_sidebar();?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
