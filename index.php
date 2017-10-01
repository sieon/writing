<?php get_header(); ?>

<div class="container mt-4">
  <div class="row">
    <div class="content-area">
      <?php if ( have_posts() ) : ?>
        <div class="posts">
          <?php  while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );
          endwhile; ?>
        </div>
        <div class="pagination">
          <?php lean_pagination();?>
        </div>
      <?php else :
        get_template_part( 'template-parts/post/content', 'none' );
      endif;wp_reset_postdata();
      ?>
    </div>

    <?php get_sidebar();?>
  </div><!--/.row-->
</div>

<?php get_footer(); ?>
