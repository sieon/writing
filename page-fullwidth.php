<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container mt-4">
  <div class="site-main">
    <main class="main-content">
      <div class="page-header mb-4">
        <h1 class="card-title"><?php the_title(); ?></h1>
      </div>

      <div class="entry-content card-block">
        <?php the_content(); ?>
      </div>
      <?php
        // If comments are open or we have at least one comment, load up the comment template
      //  if ( comments_open() || get_comments_number() ) :
          comments_template();
      //  endif;
      ?>
      <?php endwhile; ?>
    <?php endif; ?>
    </main>

  </div>
</div><!--./container -->

<?php get_footer(); ?>
