<?php
/**
 * Page
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="jumbotron rounded-0 bg-dark border-0 text-white mb-20 l-shadow">
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="container">
    <div class="">
      <div class="row">
        <div class="content-area">
          <div class="w-100 bg-white border-bottom-1 mb-4 p-4">
            <div class="entry-content clearfix">
              <?php the_content(); ?>
            </div>
          </div>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif; ?>
          <?php endwhile;?>
        </div>

        <div class="widget-area hidden-md-down">
          <?php if ( !dynamic_sidebar('sidebar-2') ) { _e('','lean'); } ?>
        </div>
      </div>

    </div>
  </div><!--./container -->

<?php get_footer(); ?>
