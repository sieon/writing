<?php get_header(); ?>



<div class="container mt-4">
  <div class="main-content">

    <header class="jumbotron bg-white border l-shadow-v28 mb-4 py-4 pl-2">
      <div class="container">
        <?php
        lean_the_archive_title( '<h1>', '</h1>' );
        lean_the_archive_description( '<div>', '</div>' );
        ?>
      </div>
    </header>

    <div class="card">
      <div class="card-body">
        <!-- Timeline #01 -->
        <section class="g-pb-100">
          <div class="container">

            <?php

            $postsnum=1;
            if ( have_posts() ) : ?>

            <div class="row u-timeline-v1-wrap g-mx-minus-15">

              <?php  while ( have_posts() ) : the_post(); ?>
                <?php

                if ($postsnum%2==1) {
                  get_template_part( 'template-parts/timeline', 'left' );
                }else{
                  get_template_part( 'template-parts/timeline', 'right' );
                }

                $postsnum++;

                ?>
              <?php endwhile; ?>

            </div>

          </div>
        </section>
        <!-- End Timeline #01 -->

        <div class="pagination">
          <?php lean_pagination();?>
        </div>

        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; wp_reset_postdata();?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
