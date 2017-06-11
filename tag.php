<?php get_header(); ?>

<?php if ( have_posts() ) : ?>


<div class="container mt-5">
  <div class="main-content row">
    <div class="col-lg-8">

          <p class="tag-tip"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;标签</p>
            <?php
          lean_the_archive_title( '<div class="page-title"><h1 class="d-inline">', '</h1>&nbsp;<span>相关的文章</span></div>' );
          lean_the_archive_description( '<div class="header-subtitle mt-2 mb-3">', '</div>' );
          ?>

      <?php  while ( have_posts() ) : the_post(); ?>
         <?php get_template_part( 'template-parts/posts', 'list' ); ?>
        <?php endwhile; ?>
        <div class="pagination pt-2 mt-2">
          <?php lean_pagination();?>
        </div>
        <?php else : ?>
     <?php get_template_part( 'template-parts/content', 'none' ); ?>
     <?php endif;     // Reset Post Data
       wp_reset_postdata();?>
    </div>

    <?php get_sidebar();?>
  </div>
</div>

<?php get_footer(); ?>
