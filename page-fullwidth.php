<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="main-content container p-a mt-5" id="site-content">

  <h1 class="mb-3"><?php the_title(); ?></h1>

  <div class="entry-content">
    <?php
      // 显示页面内容
      get_template_part( 'template-parts/content', 'page' );
    ?>
  </div>
      <hr>
      <?php
        // If comments are open or we have at least one comment, load up the comment template
      //  if ( comments_open() || get_comments_number() ) :
          comments_template();
      //  endif;
      ?>
    <?php endwhile; ?>  <?php endif; ?>
</div><!--./container -->

<?php get_footer(); ?>
