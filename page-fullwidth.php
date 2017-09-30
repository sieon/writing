<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<div class="container mt-4">
  <main class="w-100">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="w-100 bg-white border rounded mb-4 p-4 l-shadow">
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
    <?php endwhile; ?>
    <?php endif; ?>
  </main>
</div><!-- .container -->

<?php get_footer(); ?>
