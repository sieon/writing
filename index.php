<?php get_header(); ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="main-content">
        <?php if ( have_posts() ) : ?>
          <div class="posts">
            <?php  while ( have_posts() ) : the_post();
              /* 显示内容 */
              get_template_part( 'template-parts/content', get_post_format() );
            endwhile; ?>
          </div>
          <div class="pagination">
            <?php lean_pagination();?>
          </div>
        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;wp_reset_postdata();
        ?>
      </div>
    </div>

    <?php get_sidebar();?>
  </div><!--/.row-->
</div>
<?php get_footer(); ?>
