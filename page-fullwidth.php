<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<div class="container mt-4">
  <div class="site-main">
    <main class="main-content">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="card card-shadow">
        <h1 class="card-header bg-white py-4"><?php the_title(); ?></h1>
        <div class="card-body">
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </main>

  </div>
</div><!--./container -->

<?php get_footer(); ?>
