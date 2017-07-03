<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">
          <header class="page-header mb-3">
            <?php
            lean_the_archive_title( '<h1 class="card-title">', '</h1>' );
            lean_the_archive_description( '<div class="text-muted mb-3">', '</div>' );
            ?>
          </header>

              <div class="posts-list">
                <?php
                while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/posts', get_post_format() );
              endwhile; ?>
              </div>
              <div class="pagination p-3">
                <?php lean_pagination();?>
              </div>
          <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
          <?php endif; wp_reset_postdata();?>
        </main>
      </div><!---..//-->

      <?php get_sidebar();?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
