<?php get_header(); ?>
<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">
          <?php
          if ( have_posts() ) :?>
            <div class="posts-list">
              <?php  while ( have_posts() ) : the_post();
                /* 显示内容 */
                get_template_part( 'template-parts/posts', get_post_format() );
              endwhile; ?>
            </div>
            <div class="pagination p-3">
              <?php lean_pagination();?>
            </div>
          <?php else :
            get_template_part( 'template-parts/content', 'none' );
          endif;wp_reset_postdata();
          ?>
        </main><!--/.col-8-->

      </div>
      <?php get_sidebar();?>
    </div><!--/.row-->
  </div>
</div>
<?php get_footer(); ?>
