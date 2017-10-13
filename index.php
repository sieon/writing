<?php get_header(); ?>

<div class="jumbotron bg-dark text-white d-flex justify-content-center">
  <div class="container">
    <h1 class="display-4 text-center">Writing</h1>
    <p class="lead mt-4 text-center">为写作而设计的WordPress主题</p>
    <!-- <hr class="my-4">
    <p class="text-center">It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
    <p class="mt-5 text-center">
      <a class="btn btn-outline-light btn-lg" href="#" role="button">下载</a>
    </p>
  </div>
</div>

<div class="container">
    <div class="row">

        <div class="content-area">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/post/content', get_post_format() );
                endwhile; ?>

                <div class="pagination">
                    <?php lean_pagination();?>
                </div>

            <?php else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;wp_reset_postdata(); ?>

        </div><!-- .content-area -->

		<?php get_sidebar();?>

    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
