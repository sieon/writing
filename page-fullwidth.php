<?php
/**
 * Template Name: 全宽页面模板
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container mt-5">
  <div class="site-main">

    <div class="page-header mb-4">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

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
  </div>
</div><!--./container -->

<?php get_footer(); ?>
