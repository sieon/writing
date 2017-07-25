<?php get_header();?>

  <div class="container mt-4">
    <div class="site-main">
      <div class="row">
        <div class="col-lg-8">
           <main class="main-content">

               <?php while ( have_posts() ) : the_post(); ?>

                 <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                 <?php
                 //上一篇、下一篇
                 if ( get_theme_mod( 'post-nav')==yes ) {
                   lean_the_post_navigation();
                 } ?>

               <?php //相关文章
               if ( get_theme_mod( 'related_posts')==yes ) {
                related_posts();
               } ?>

               <?php // 加载评论
               if ( comments_open() || get_comments_number() ) :
                 comments_template();
               endif;
               ?>
               <?php endwhile; // end of the loop. ?>

           </main>
        </div>

        <?php get_sidebar();?>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php get_footer();?>
