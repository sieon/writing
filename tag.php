<?php get_header(); ?>

<div class="container mt-5">
  <div class="site-main">
    <div class="row">
      <div class="col-lg-8">

        <div class="page-header">
          <p class="tag-tip"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;标签</p>
            <?php
          lean_the_archive_title( '<div class="page-title"><h1 class="d-inline">', '</h1>&nbsp;<span>相关的文章</span></div>' );
          lean_the_archive_description( '<div class="mt-2 mb-3">', '</div>' );
          ?>
        </div>

        <?php if ( have_posts() ) : ?>
        <div class="posts-list">
          <?php while ( have_posts() ) : the_post();?>
            <?php get_template_part( 'template-parts/posts', get_post_format() ); ?>
          <?php endwhile; ?>
        </div>
          <div class="pagination pt-2 mt-2">
            <?php lean_pagination();?>
          </div>

        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        wp_reset_postdata(); ?>

      </div><!-- ./ col-lg-8 -->

      <?php get_sidebar();?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
