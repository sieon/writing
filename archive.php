<?php get_header(); ?>

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="main-content">

        <header class="jumbotron bg-white border mb-3 p-4 l-shadow">
          <?php
          lean_the_archive_title( '<h1>', '</h1>' );
          lean_the_archive_description( '<div class="text-muted">', '</div>' );
          ?>
        </header>

            <?php if ( have_posts() ) : ?>
              <div class="posts">
                <?php while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_format() );
              endwhile; ?>
              </div>


        <div class="pagination">
          <?php lean_pagination();?>
        </div>

        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; wp_reset_postdata();?>
      </div>
    </div>

    <?php get_sidebar();?>

  </div>
</div>

<?php get_footer(); ?>
