<?php get_header(); ?>

<?php if ( have_posts() ) : ?>



<div class="container mt-5">
  <div class="main-content row">
    <div class="col-lg-8">


          <?php
          lean_the_archive_title( '<h1 class="page-title">', '</h1>' );
          lean_the_archive_description( '<p class="page-subtitle mb-3">', '</p>' );
          ?>

      <ul class="posts-list list-unstyled">
      <?php  while ( have_posts() ) : the_post(); ?>

         <?php
         /**
          * 显示内容
          */
         get_template_part( 'template-parts/posts', 'list' );
          ?>
        <?php endwhile; ?>
      </ul>
        <div class="pagination pt-2 mt-2">
          <?php lean_pagination();?>
        </div>
        <?php else : ?>
     <?php get_template_part( 'template-parts/content', 'none' ); ?>
     <?php endif;     // Reset Post Data
       wp_reset_postdata();?>
    </div><!---..//-->

    <?php get_sidebar();?>
  </div>
</div>

<?php get_footer(); ?>
