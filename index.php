<?php get_header(); ?>
<div class="container mt-5">
  <div class="site-main">
    <div class="row">
      <main class="col-lg-8">
        <?php if ( have_posts() ) :?>
          <div class="posts-list">
            <?php  while ( have_posts() ) : the_post();
              /* 显示内容 */
              get_template_part( 'template-parts/posts', 'list' );
            endwhile; ?>
          </div>
          <div class="pagination pt-2 mt-2">
            <?php lean_pagination();?>
          </div>
        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
      </main><!--/.col-8-->
      <?php get_sidebar();?>
    </div><!--/.row-->
  </div>
</div>
<?php get_footer(); ?>
