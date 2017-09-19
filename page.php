<?php get_header(); ?>

<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">
          <div class="w-100 bg-white border rounded mb-4 p-4 l-shadow">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="mb-4"><?php the_title(); ?></h1>
            <hr class="mb-4">

            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </div>


          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

          <?php endwhile;else: ?>
            <div class="jumbotron">
              <h1 class="container">oh,no!</h1>
            </div>

            <p>No content is appearing for this page!</p>
            <?php endif; ?>
        </main>
      </div>
      <div class="col-lg-4 hidden-md-down">
        <div class="sidebar">
          <?php if ( !dynamic_sidebar('sidebar-2') ) { _e('','lean'); } ?>
        </div>
      </div>

    </div>
  </div>
</div><!--./container -->

<?php get_footer(); ?>
