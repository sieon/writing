<?php get_header(); ?>

<div class="container mt-4">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">
        <main class="main-content">
          <div class="single-header single-header-border mb-3">
            <div class="single-header-body">
              <p class="tag-tip"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;标签</p>
                <?php
              lean_the_archive_title( '<div class="single-header-title"><h1 class="d-inline">', '</h1>&nbsp;<span>相关的文章</span></div>' );
              lean_the_archive_description( '<div class="text-muted mt-2 mb-3">', '</div>' );
              ?>
            </div>
          </div>

          <?php if ( have_posts() ) : ?>
          <div class="posts">
            <?php while ( have_posts() ) : the_post();?>
              <?php get_template_part( 'template-parts/posts', get_post_format() ); ?>
            <?php endwhile; ?>
          </div>
            <div class="pagination p-3">
              <?php lean_pagination();?>
            </div>

      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      wp_reset_postdata(); ?>
        </main>

      </div><!-- ./ col-lg-8 -->

      <?php get_sidebar();?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
