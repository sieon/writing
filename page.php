<?php get_header(); ?>

<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="page-header">
              <h1 class="card-title"><?php the_title(); ?></h1>
            </div>

            <div class="entry-content p-3">
              <?php the_content(); ?>
            </div>
            <?php
              // If comments are open or we have at least one comment, load up the comment template
            //  if ( comments_open() || get_comments_number() ) :
                comments_template();
            //  endif;
            ?>
          <?php endwhile;else: ?>
            <div class="jumbotron">
              <h1 class="container">oh,no!</h1>
            </div>

            <p>No content is appearing for this page!</p>
            <?php endif; ?>
        </main>
      </div>
      <?php get_sidebar();?>

    </div>
  </div>
</div><!--./container -->

<?php get_footer(); ?>
